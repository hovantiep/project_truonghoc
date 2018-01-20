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
        $filter = 'news';
        $news = DB::table('categories')
            ->join('news', 'news.category_id', '=', 'categories.id')
            ->where('categories.strAttr', $filter)
            ->select('news.id', 'news.category_id', 'news.title', 'news.alias as slug', 'news.intro', 'news.image', 'categories.name', 'categories.alias', 'categories.id as categoryId')
            ->get();

//        Thong bao
        $keyword = 'thong_bao';
        $alerts = DB::table('categories')
            ->join('news', 'news.category_id', '=', 'categories.id')
            ->where('categories.alias', $keyword)
            ->select('news.id', 'news.category_id', 'news.title', 'news.alias as slug', 'news.intro', 'news.image', 'news.created_at',
                'categories.name', 'categories.alias', 'categories.id as categoryId')
            ->take(5)
            ->orderBy('created_at','DES')
            ->get();
        return view('frontend.index',
            compact('news'),
            compact('alerts')
        );
    }

    /**
     * Hien thi trang tinh nhu gioi thieu, lien he nam tren menu chinh
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function staticPage($slug)
    {
        $view = 'frontend.static.' . $slug;
        if (view()->exists($view)) {
            return view($view);
        }
        return view('frontend.static.404');
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

//        Cap nhat luot xem
        $news = News::find($id);
        $news->views = $news->views + 1;
        $news->save();

//        Hien thi view dang hoat_dong_detail, tin_tuc_detail
        $view = 'frontend.news.' . $parentName . '_detail';
        if (view()->exists($view)) {
            return view($view);
        }
        return view('frontend.static.404');
    }

    /**
     * Hien thi cac loai trang (thuoc common route), view co tinh ke thua, dung chung layout
     * @param $type
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function common($type, $id) //van ban,... // id cua category
    {
//        Tim parentName khi biet $id cua category
        $parentID = DB::table('categories')->where('id', $id)->first()->parent_id; //47
        $parentName = Category::select('alias')->where('id', $parentID)->first()->alias; // van_ban

//        Hien thi view dang van ban, ...
        $view = 'frontend.common.' . $parentName . '_' . $type;
        return view($view);
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

}
