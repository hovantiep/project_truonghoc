<?php

namespace truonghoc\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use truonghoc\Http\Controllers\Controller;
use truonghoc\News;

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
        $news = News::all()->sortByDesc('id');
        return view('frontend.index', compact('news'));
    }

    /**
     * Hien thi trang tinh nhu gioi thieu, lien he nam tren menu chinh
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showStatic($slug)
    {
        $view = 'frontend.' . $slug;
        if (view()->exists($view)) {
            return view($view);
        }
        return view('frontend.404');
    }


    public function tin_tuc($type, $id)
    {
        $route = Route::currentRouteName();
        $view = 'frontend.category.' . $route;
        return view($view);
    }

    public function tin_tuc_chi_tiet($type, $slug, $id)
    {
        $route = Route::currentRouteName();
        $view = 'frontend.category.' . $route;
        return view($view);
    }

    public function hoat_dong($type, $id)
    {
        $route = Route::currentRouteName();
        $view = 'frontend.category.' . $route;
        return view($view);
    }

    public function hoat_dong_chi_tiet($type, $slug, $id)
    {
        $route = Route::currentRouteName();
        $view = 'frontend.category.' . $route;
        return view($view);
    }

    public function thuc_don($type, $id)
    {
        $route = Route::currentRouteName();
        $view = 'frontend.category.' . $route;
        return view($view);
    }

    public function thuc_don_chi_tiet($type, $slug, $id)
    {
        $route = Route::currentRouteName();
        $view = 'frontend.category.' . $route;
        return view($view);
    }

    public function thong_bao()
    {
        $route = Route::currentRouteName();
        $view = 'frontend.category.' . $route;
        return 'thongbao.html';
    }
//
//    public function showCategory($category, $type, $id)
//    {
//        // Hien thi trang category the tung the loai (tin tuc, hoat dong, tai nguyen...)
//        $view = 'frontend.category.' . $category;
//        if (view()->exists($view)) {
//            return view($view);
//        }
//        return '404';
//    }
//
//    public function showDetail($category, $type, $id)
//    {
//        // Hien thi trang chi tiet theo tung danh muc, tung the loai
//        $view = 'frontend.category.' . $category . '_detail';
//        if (view()->exists($view)) {
//            return view($view);
//        }
//        return '404';
//    }
}
