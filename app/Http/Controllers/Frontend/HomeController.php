<?php

namespace truonghoc\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use truonghoc\Category;
use truonghoc\Http\Controllers\Controller;
use truonghoc\Post;

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
//        Tat ca post
        $posts = DB::table('categories')
            ->join('posts', 'posts.category_id', '=', 'categories.id')
            ->select('posts.id', 'posts.category_id', 'posts.user_id', 'posts.title', 'posts.alias as postAlias', 'posts.intro', 'posts.order', 'posts.intro',
                'posts.content', 'posts.keywords', 'posts.image', 'posts.highlights', 'posts.views', 'posts.created_at',
                'categories.id as categoryId', 'categories.name', 'categories.alias as categoryAlias', 'categories.order as categoryOrder',
                'categories.parent_id', 'categories.keywords as categoryKeywords', 'categories.description', 'categories.route')
            ->get();

//        Tim ra nhom tin tuc (co route la news) nhung khong phai la noi bat
        $cate = 'news';
        $news = $posts->where('route', $cate)->where('highlights', 0)->sortByDesc('created_at')->take(5)->all();

//        Thong bao
        $keyword = 'thong_bao';
        $alerts = $posts->where('categoryAlias', $keyword)->sortByDesc('created_at')->take(5)->all();

//        Van ban moi
        $category = [64, 65, 66]; // id co ten la van ban... nhin trong csdl :)
        $documents = $posts->whereIn('categoryId', $category)->sortByDesc('created_at')->take(5)->all();

//        Xem nhieu [tin]
        $views = $posts->where('route', $cate)->sortByDesc('views')->take(5)->all();

//        Noi bat [tin]
        $highlights = $posts->where('route', $cate)->where('highlights', 1)->sortByDesc('created_at')->take(6)->all();

        return view('frontend.index',
            compact(['news', 'alerts', 'documents', 'views', 'highlights'])
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
        $category = DB::table('categories')->where('id', $id)->first(); //47
        $parent = Category::select('name', 'alias')->where('id', $category->parent_id)->first(); // tin_tuc
//        $route = Route::currentRouteName();
//        Hien thi view dang hoat_dong, tin_tuc

//        Tat ca post
        $posts = DB::table('categories')
            ->join('posts', 'posts.category_id', '=', 'categories.id')
            ->select('posts.id', 'posts.category_id', 'posts.user_id', 'posts.title', 'posts.alias as postAlias', 'posts.intro', 'posts.order', 'posts.intro',
                'posts.content', 'posts.keywords', 'posts.image', 'posts.highlights', 'posts.views', 'posts.created_at',
                'categories.id as categoryId', 'categories.name', 'categories.alias as categoryAlias', 'categories.order as categoryOrder',
                'categories.parent_id', 'categories.keywords as categoryKeywords', 'categories.description', 'categories.route')
            ->get();

//        Tim ra nhom tin tuc (co route la news)
        $cate = 'news';
        $news = $posts->where('route', $cate)->where('categoryAlias', $type)->sortByDesc('created_at')->all();
//        Ham phan trang trong function rieng tu tao
        $news = paginater($news, 5);
//        Cai dat duong dan moi dung duoc: do paginate tu viet
        $news->setPath($id);

//        Thong bao
        $keyword = 'thong_bao';
        $alerts = $posts->where('categoryAlias', $keyword)->sortByDesc('created_at')->take(5)->all();

//        Van ban moi
        $arrCate = [64, 65, 66]; // id co ten la van ban... nhin trong csdl :)
        $documents = $posts->whereIn('categoryId', $arrCate)->sortByDesc('created_at')->take(5)->all();

//        Xem nhieu [tin]
        $views = $posts->where('route', $cate)->sortByDesc('views')->take(5)->all();

//        Noi bat [tin]
        $highlights = $posts->where('route', $cate)->where('highlights', 1)->sortByDesc('created_at')->take(6)->all();


        $view = 'frontend.news.' . $parent->alias;
        return view($view,
            compact(['category', 'parent', 'news', 'alerts', 'documents', 'views', 'highlights'])
        );
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
        $category = DB::table('categories')->where('alias', $type)->first(); //47
        $parent = Category::select('name', 'alias')->where('id', $category->parent_id)->first(); // tin_tuc

//        Cap nhat luot xem
        $news = Post::find($id);
        $news->views = $news->views + 1;
        $news->save();

        //        Tat ca post
        $posts = DB::table('categories')
            ->join('posts', 'posts.category_id', '=', 'categories.id')
            ->select('posts.id', 'posts.category_id', 'posts.user_id', 'posts.title', 'posts.alias as postAlias', 'posts.intro', 'posts.order', 'posts.intro',
                'posts.content', 'posts.keywords', 'posts.image', 'posts.highlights', 'posts.views', 'posts.created_at',
                'categories.id as categoryId', 'categories.name', 'categories.alias as categoryAlias', 'categories.order as categoryOrder',
                'categories.parent_id', 'categories.keywords as categoryKeywords', 'categories.description', 'categories.route')
            ->get();

//        Tim ra nhom tin tuc (co route la news)
        $cate = 'news';
//        Thong bao
        $keyword = 'thong_bao';
        $alerts = $posts->where('categoryAlias', $keyword)->sortByDesc('created_at')->take(5)->all();

//        Van ban moi
        $arrCate = [64, 65, 66]; // id co ten la van ban... nhin trong csdl :)
        $documents = $posts->whereIn('categoryId', $arrCate)->sortByDesc('created_at')->take(5)->all();

//        Xem nhieu [tin]
        $views = $posts->where('route', $cate)->sortByDesc('views')->take(5)->all();

//        Noi bat [tin]
        $highlights = $posts->where('route', $cate)->where('highlights', 1)->sortByDesc('created_at')->take(6)->all();

//        Hien thi view dang hoat_dong_detail, tin_tuc_detail
        $view = 'frontend.news.' . $parent->alias . '_detail';
        if (view()->exists($view)) {
            return view($view,
                compact(['category', 'parent', 'news', 'alerts', 'documents', 'views', 'highlights'])
            );
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
