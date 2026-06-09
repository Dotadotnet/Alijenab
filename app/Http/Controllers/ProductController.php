<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helpers\Helper;
use App\Models\Config;
use App\Models\ShoppingCart;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.edite_product', ["products" => Product::get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product', ["categories" => Category::get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // type
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:4',
            'image.*' => ['file', 'image', 'required'],
            'category' => 'required'
        ]);
        $all_images = [];
        $images = $request->images;
        if ($images) {
            foreach ($images as $image) {
                $path = $image->storeAs(
                    'img/products',
                    md5(time() . $image->hashName() . rand(1, 9000000)) . '.' . $image->extension()
                );
                array_push($all_images, $path);
            }
        }
        if ($request->filled('nameEn')) {
            $nameEn = $request->nameEn;
        } else {
            $nameEn =  GoogleTranslate::trans($request->name, 'en', 'fa');
        }
        $thumbnail = $request->file('thumbnail')->storeAs(
            'img/products',
            $nameEn . '.' . $request->file('thumbnail')->extension()
        );
        $product = new Product();
        $product->name = $request->name;
        $product->nameEn = $nameEn;
        $product->price = $request->price;
        $product->caption = $request->caption;
        $product->summery = $request->summery;
        $product->off = (int)$request->off ? $request->off : null;
        $product->category = $request->category;
        $product->thumbnail = $thumbnail;
        $product->images = json_encode($all_images);
        $product->save();
        session()->flash('status', 'successful');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::find($id);
        return view('admin.product', ['data' => $data, 'categories' => Category::get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function shortLink(string $id)
    {
        $product = Product::find($id);
                return redirect(route('userShow', ['category' => str_replace(' ', '-', Category::find($product->category)->nameEn), 'name' => str_replace(' ', '-', $product->nameEn)]));
    }
    public function userShow($category, $name)
    {
        $category = Category::where(['nameEn' => str_replace('-', ' ', $category)])->get()[0];
        $data = ((Product::where(['category' => $category->id, 'nameEn' => str_replace('-', ' ', $name)]))->get()[0]->toArray());
        $data['category'] = [$category->name, $data['category']];
        $data['imgs'] = [];
        array_push($data['imgs'], Storage::url($data['thumbnail']));
        foreach (json_decode($data['images']) as $img) {
            array_push($data['imgs'], Storage::url($img));
        };
        unset($data['img']);
        return view('user.show_product', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:4',
            'image.*' => ['file', 'required'],
            'category' => 'required'
        ]);
        $data_update = $request->all();
        unset($data_update['_token']);
        unset($data_update['_method']);
        unset($data_update['id']);
        unset($data_update['priceShow']);
        if (isset($data_update['image'])) {
            unset($data_update['image']);
        }
        $data_update['off'] = (int)$data_update['off'] ? $data_update['off'] : null;
        $this_product = Product::find($id);
        if ($request->hasFile('images')) {
            foreach (json_decode($this_product->images) as $image) {
                Storage::delete($image);
            }
            $all_images = [];
            $images = $request->images;
            foreach ($images as $image) {
                $path = $image->storeAs(
                    'img/products',
                    md5(time() . $image->hashName() . rand(1, 9000000)) . '.' . $image->extension()
                );
                array_push($all_images, $path);
            }
            $data_update['images'] = json_encode($all_images);
        }

        Storage::delete($this_product->thumbnail);

        if (!$request->filled('nameEn')) {
            $data_update["nameEn"] =  GoogleTranslate::trans($request->name, 'en', 'fa');
        }

        $thumbnail = $request->file('thumbnail')->storeAs(
            'img/products',
            $data_update["nameEn"] . '.' . $request->file('thumbnail')->extension()
        );

        $data_update["thumbnail"] = $thumbnail;

        Product::where('id', $this_product->id)->update($data_update);
        session()->flash('status', 'successful');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::find($id);
        foreach (json_decode($data->images) as $img) {
            Storage::delete($img);
        }
        Storage::delete($data->thumbnail);
        ShoppingCart::where('product_id', $id)->delete();
        Product::where('id', $id)->delete();
        return response('File Deleted', 200);
    }

    public function selectedProductsView()
    {
        $selected = json_decode(Config::where(['key' => 'favorites'])->get()[0]->amount);
        $product = Product::all();

        return view('admin.selected_products', ['products' => $product, 'selecteds' => $selected]);
    }
    public function selectedItemsApi()
    {
        $ids = json_decode(Config::where(['key' => 'favorites'])->get()[0]->amount);
        $result = [];
        foreach ($ids as $id) {
            array_push($result, Product::find($id));
        }
        return response($result);
    }
}
