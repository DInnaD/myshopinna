<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use Illuminate\Http\Request;

class MainController extends IndexController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $val = parent::index();
        $brand = Brand::take(3)->orderBy('id', 'desc')->get();
        $hits = Product::take(8)->where('status', '=', '1')->where('hit', '=', '1')->get();
        return view('pages.index', ['brand' => $brand, 'hits' => $hits , 'val' => $val]);
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('pages.show', compact('product'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $products = $tag->products()->paginate(2);

        return view('pages.list', ['products'  =>  $products]);
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = $category->products()->paginate(2);

        return view('pages.list', ['products'  =>  $products]);
    }
}
