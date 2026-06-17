<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    private $SitemapsName = ["index", "products", "blogs"];

    public function home()
    {
        return response()->view("user.sitemap", ["names" => $this->SitemapsName])->header('Content-Type', 'text/xml');
    }

    public function dynamicSitemap($sitemap)
    {
        $controller = new SitemapController();
        if (is_callable([$controller, $sitemap]) && in_array($sitemap, $this->SitemapsName)) {
            return $controller->{$sitemap}();
        }
        abort(404);
    }
    public function index()
    {
        $sitemap = Sitemap::create();
        $url = Url::create(
            route('home')
        )->setPriority(1)
            ->addImage(
                asset('image/unnamed.webp'),
                "کافه عالیجناب"
            );
        $sitemap->add($url);

        $url = Url::create(
            route('menu')
        )->setPriority(0.8)
            ->addImage(
                asset('image/cafePhoto1.webp'),
                "منوی کافه عالیجناب"
            );
        $sitemap->add($url);

        $url = Url::create(
            route('about')
        )->setPriority(0.8)
            ->addImage(
                asset('image/cafePhoto3.webp'),
                "صحفه درباره ما"
            );
        $sitemap->add($url);


        $url = Url::create(
            route('contact')
        )->setPriority(0.9)
            ->addImage(
                asset('image/cafePhoto2.webp'),
                "صحغه تماس با ما"
            );
        $sitemap->add($url);

        return response(
            $sitemap->render(),
            200,
            ['Content-Type' => 'application/xml']
        );
    }

    public function products()
    {
        $sitemap = Sitemap::create();
        $products =  Product::all();
        $category = new Category();
        foreach ($products as $product) {
            $url = Url::create(
                route('userShow', ['category' => str_replace(' ', '-', $category->find($product->category)->nameEn), 'name' => str_replace(' ', '-', $product->nameEn)])
            )
                ->setLastModificationDate($product->updated_at)
                ->setPriority(0.5)
                ->addImage(
                    "/storage/" . $product->thumbnail,
                    $product->name
                );
            $sitemap->add($url);
        }
        return response(
            $sitemap->render(),
            200,
            ['Content-Type' => 'application/xml']
        );
    }

    public function blogs()
    {
        $sitemap = Sitemap::create();

        $blogs = Blog::all();

        foreach ($blogs as $blog) {

            $url = Url::create(
                route('userShowBlog', ['id' => $blog->id, 'name' => str_replace(' ', '-', $blog->title_en)])
            )
                ->setLastModificationDate($blog->updated_at)
                ->setPriority(0.8)
                ->addImage(
                    "/storage/" . $blog->thumbnail,
                    $blog->title
                );

            $sitemap->add($url);
        }

        return response(
            $sitemap->render(),
            200,
            ['Content-Type' => 'application/xml']
        );
    }
}
