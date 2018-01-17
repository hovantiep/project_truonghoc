<?php

namespace truonghoc\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use truonghoc\Category;
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
     * Hien thi tat ca noi dung tren trang chu
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        Tim ra nhom tin tuc (co route[strAttr] la news)
        $news = DB::table('categories')
            ->join('news', 'news.category_id', '=', 'categories.id')
            ->where('categories.strAttr', 'news')
            ->select('news.id', 'news.category_id', 'news.title', 'news.alias as slug', 'news.intro', 'news.image', 'categories.alias')
            ->get();
        return view('frontend.index', compact('news'));
    }

    /**
     * Hien thi trang tinh nhu gioi thieu, lien he nam tren menu chinh
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function static($slug)
    {
        $view = 'frontend.' . $slug;
        if (view()->exists($view)) {
            return view($view);
        }
        return view('frontend.404');
    }

    /**
     * Hien thi tat ca view dang page (route Page) la trang rieng biet khong ke thua
     * @param $type
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function page($type, $id)
    {
        $route = Route::currentRouteName();
        $view = 'frontend.pages.' . $type;
        return view($view);
    }

    /**
     * Hien thi cac loai tin tuc (thuoc news route), view co tinh ke thua
     * @param $type
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function news($type, $id) //tin_giao_duc // id cua category
    {
//        Tim parentName khi biet $id cua category
        $parentID = DB::table('categories')->where('id', $id)->first()->parent_id; //47
        $parentName = Category::select('alias')->where('id', $parentID)->first()->alias; // tin_tuc

//        $route = Route::currentRouteName();
//        Hien thi view dang hoat_dong, tin_tuc
        $view = 'frontend.news.' . $parentName;
        return view($view);
    }

    /**
     * Hien thi tin tuc chi tiet (thuoc news route)
     * @param $type
     * @param $slug
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function news_detail($type, $slug, $id) //tin_giao_duc //id cua news
    {
//        Tim parentName khi biet $type cua category
        $parentID = DB::table('categories')->where('alias', $type)->first()->parent_id; //47
        $parentName = Category::select('alias')->where('id', $parentID)->first()->alias; // tin_tuc
//        Hien thi view dang hoat_dong_detail, tin_tuc_detail
        $view = 'frontend.news.' . $parentName . '_detail';
        if (view()->exists($view)) {
            return view($view);
        }
        return view('frontend.404');
    }

    /**
     * Hien thi view thong bao, menu nay nam o menu chinh, co route ro rang +dac biet+
     * @return string
     */
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
