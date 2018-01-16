<?php

namespace truonghoc\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use truonghoc\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.index');
    }

    public function showStatic($slug)
    {
        $view = 'frontend.' . $slug;
        if (view()->exists($view)) {
            return view($view);
        }
        return view('frontend.404');
    }

    public function showCategory($category, $slug, $id)
    {
        // Hien thi trang category the tung the loai (tin tuc, hoat dong, tai nguyen...)
        $view = 'frontend.category.' . $category;
        if (view()->exists($view)) {
            return view($view);
        }
        return $category. $id;
    }

//    public function showDetail($slug, $id)
//    {
//        // page detail
//        $view = 'frontend.' . $slug . 'detail';
//        if (view()->exists($view)) {
//            return view($view);
//        }
//        return view('frontend.404');
//    }
}
