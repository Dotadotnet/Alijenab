<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Config;
use App\Models\Events;
use App\Models\Product;
use App\notification\sms;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $ids = json_decode(Config::where(['key' => 'favorites'])->get()[0]->amount);
        $selecteds = [];
        $offers = [];
        $mostOff = 0;
        foreach ($products as $product) {
            if (in_array($product["id"], $ids)) {
                array_push($selecteds, $product);
            }
            if ($product["off"]) {
                array_push($offers, $product);
                if ($mostOff < $product["off"]) {
                    $mostOff = $product["off"];
                }
            }
        }

        $blogs = Blog::latest()->take(5)->get()->toArray();
        for ($i = 0; $i < count($blogs); $i++) {
            $blogs[$i]['link'] = '/blog/' . $blogs[$i]['id'];
            $dom = \HTMLDomParser\DomFactory::load($blogs[$i]['amount']);
            try {
                $blogs[$i]['img'] = env('APP_URL') . '/storage/' . $blogs[$i]["thumbnail"];
            } catch (\Throwable $th) {
                $blogs[$i]['img'] = '/image/noimg.png';
            }
            $blogs[$i]['data'] = explode(' ', Jalalian::forge($blogs[$i]['created_at'])->format('%d %B %Y h:m:s'));
        }
        $blogs = array_reverse($blogs);


        return view('user.home', [
            'events' => Events::all(),
            'categorys' => Category::all()->toArray(),
            'products' => $products,
            'selecteds' =>  $selecteds,
            'offers' => $offers,
            'blogs' => $blogs,
            'mostOff' => $mostOff
        ]);
    }
    public function showAll()
    {

        return view('user.all_items', [
            'events' => Events::all(),
            'categorys' => Category::all(),
            'products' => Product::all(),
        ]);
    }
    public function call()
    {
        return view('user.call');
    }

    public function about()
    {
        return view('user.about');
    }


    public function sendSms()
    {
        sms::send("سلام", '09999935106');
    }
}
