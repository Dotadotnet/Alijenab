<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Morilog\Jalali\Jalalian;
use Stichoza\GoogleTranslate\GoogleTranslate;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        for ($i = 0; $i < count($blogs); $i++) {
            $blogs[$i]['link'] = '/blog/' . $blogs[$i]['id'];
            $dom = \HTMLDomParser\DomFactory::load($blogs[$i]['amount']);
            try {
                $blogs[$i]['img'] = str_replace(env('APP_URL') . '/storage/', '', $dom->findOne('img')->getAttribute('src'));
            } catch (\Throwable $th) {
                $blogs[$i]['img'] = '/img/image/noimg.png';
            }
        }
        return view('admin.edite_blog', ["blogs" => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'caption' => 'required'
        ]);

        if ($request->filled('title_en')) {
            $titleEn = $request->title_en;
        } else {
            $titleEn =  GoogleTranslate::trans($request->title, 'en', 'fa');
        }

        if (count(Blog::where(['title_en' => $titleEn])->get())) {
            return redirect()->back()->with('error',  "شناسه انگلیسی $titleEn تکراری است");
        }


        $path = $request->file('thumbnail')->storeAs(
            'img/blog',
            $titleEn . '.' . $request->file('thumbnail')->extension()
        );
        $blog = new Blog();
        $blog->amount = $request->amount;
        $blog->title = $request->title;
        $blog->thumbnail = $path;
        $blog->title_en = $titleEn;
        $blog->caption = $request->caption;
        $blog->save();
        session()->flash('status', 'successful');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Blog::find($id);
        return view('admin.blog', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'caption' => 'required',
        ]);
        $data_update = $request->all();
        unset($data_update['_token']);
        unset($data_update['_method']);
        unset($data_update['id']);
        $titleEn = $request->title_en;
        if (!$request->filled('title_en')) {
            $titleEn =  GoogleTranslate::trans($request->title, 'en', 'fa');
        }


        $this_blog = Blog::find($id);
        if ($data_update['title_en'] !== $this_blog->title_en &&  count(Blog::where(['title_en' => $titleEn])->get())) {
            return redirect()->back()->with('error',  "شناسه انگلیسی $titleEn تکراری است");
        }



        $data_update['title_en'] = $titleEn;

        if ($request->hasFile('thumbnail')) {
            Storage::delete($this_blog->thumbnail);
            $path = $request->file('thumbnail')->storeAs(
                'img/blog',
                $titleEn . '.' . $request->file('thumbnail')->extension()
            );
            $url_image = $path;
            $data_update['thumbnail'] = $url_image;
        }


        Blog::where(['id' => $id])->update($data_update);
        session()->flash('status', 'successful');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);
        Blog::where(['id' => $id])->delete();
        Storage::delete($blog->thumbnail);
        $blogs = Blog::all();
        foreach (glob(storage_path('app\public\img\blog') . '\*.*') as $file) {
            $file_name = str_replace(storage_path('app\public\img\blog') . '\\', '', $file);
            $founded = false;
            foreach ($blogs as $blog) {
                if (str_contains($blog['amount'], $file_name)) {
                    $founded = true;
                }
            }
            if (!$founded) {
                unlink($file);
            }
        }
        return response('ok');
    }

    public function insertImage(Request $request)
    {
        $path = $request->file('upload')->storeAs(
            'img/blog',
            md5(time()) . '.' . $request->file('upload')->extension()
        );
        return response()->json([
            'fileName' => md5(time()),
            'uploaded' => 1,
            'url' => env("APP_URL") . '/storage/' . $path
        ]);
    }
    public function shortLink($id)
    {
        $data = Blog::find($id);
        return redirect(route('userShowBlog', ['id' => $id, 'name' => str_replace(' ', '-', $data['title_en'])]));
    }
    public function userShow($id, $name)
    {
        $data = Blog::find($id);
        $time_converted = explode(' ', Jalalian::forge($data['created_at'])->format('%d %B %Y h:m:s'));
        return view('user.show_blog', $data, ['data' => $time_converted]);
    }
    public function about()
    {
        $data = Blog::find(1);
        $time_converted = explode(' ', Jalalian::forge($data['created_at'])->format('%d %B %Y h:m:s'));
        return view('user.show_blog', $data, ['data' => $time_converted]);
    }


    public function viewAll(Request $request)
    {
        $search = trim($request->search);

        $query = Blog::query();

        if ($search) {

            $words = preg_split('/\s+/', $search);

            $scoreSql = [];
            $bindings = [];

            foreach ($words as $word) {

                $scoreSql[] = "
                (CASE WHEN title LIKE ? THEN 10 ELSE 0 END)
                +
                (CASE WHEN caption LIKE ? THEN 3 ELSE 0 END)
            ";

                $bindings[] = "%{$word}%";
                $bindings[] = "%{$word}%";

                $query->where(function ($q) use ($word) {
                    $q->where('title', 'LIKE', "%{$word}%")
                        ->orWhere('caption', 'LIKE', "%{$word}%");
                });
            }

            $scoreExpression = implode(' + ', $scoreSql);

            $query->select('*')
                ->selectRaw("({$scoreExpression}) as score", $bindings)
                ->orderByDesc('score');
        }

        $blogs = $query
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('user.blogs', compact('blogs', 'search'));
    }
}
