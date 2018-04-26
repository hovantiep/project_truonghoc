<?php

namespace truonghoc\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use truonghoc\Category;
use truonghoc\Http\Controllers\Controller;
use truonghoc\News;
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

    public function index()
    {
//        Lay tat ca news
        $news = DB::table('categories')
            ->join('news', 'news.category_id', '=', 'categories.id')
            ->select('news.id', 'news.category_id', 'news.user_id', 'news.title', 'news.alias as newsAlias', 'news.intro', 'news.intro',
                'news.content', 'news.image', 'news.highlights', 'news.views', 'news.updated_at',
                'categories.id as categoryId', 'categories.name', 'categories.alias as categoryAlias', 'categories.order as categoryOrder',
                'categories.parent_id', 'categories.description', 'categories.route', 'categories.updated_at')
            ->get();
        return view('frontend.index',
            compact(['news'])
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
    public function page($type, $id, $postId = null)
    {
//        Tim parentName khi biet $id cua category
        $category = DB::table('categories')->where('id', $id)->first(); //47
        $parent = Category::select('name', 'alias')->where('id', $category->parent_id)->first(); // truong_hoc
//        $route = Route::currentRouteName();
//        Hien thi view dang hoat_dong, tin_tuc

//        Tat ca post
        $posts = DB::table('categories')
            ->join('news', 'news.category_id', '=', 'categories.id')
            ->select('news.id', 'news.category_id', 'news.user_id', 'news.title', 'news.alias as postAlias', 'news.intro', 'news.order', 'news.intro',
                'news.content', 'news.keywords', 'news.image', 'news.highlights', 'news.views', 'news.created_at',
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
        $alertsPaginate = $posts->where('categoryAlias', $keyword)->sortByDesc('created_at')->all();
//        Ham phan trang trong function rieng tu tao
        $alertsPaginate = paginater($alertsPaginate, 10);
        //        Cai dat duong dan moi dung duoc: do paginate tu viet
        $alertsPaginate->setPath($id);
//        Van ban moi
        $arrCate = [64, 65, 66]; // id co ten la van ban... nhin trong csdl :)
        $documents = $posts->whereIn('categoryId', $arrCate)->sortByDesc('created_at')->take(5)->all();

//        Xem nhieu [tin]
        $views = $posts->where('route', $cate)->sortByDesc('views')->take(5)->all();

//        Noi bat [tin]
        $highlights = $posts->where('route', $cate)->where('highlights', 1)->sortByDesc('created_at')->take(6)->all();

//      Hien thi thong bao
        $route = Route::currentRouteName();
        $view = 'frontend.pages.' . $type;
        if (view()->exists($view)) {
            return view($view,
                compact(['category', 'parent', 'news', 'alerts', 'alertsPaginate', 'documents', 'views', 'highlights', 'postId'])
            );
        }
        return view('frontend.static.404');
    }

    public function news() //tin_tuc
    {
        $news = DB::table('news')->orderBy('updated_at', 'DESC')->get();
        return view('frontend.news.news', compact(['news']));
    }

    public function news_group($type, $id) //tin_giao_duc // id cua category
    {
        $category = DB::table('categories')->where('id', $id)->first(); //47
        $parent = Category::select('name', 'alias')->where('id', $category->parent_id)->first(); // tin_tuc
        $news_group = DB::table('news')->where('category_id', $id)->get();
        $news_group = paginater($news_group, 2);
        $news_group->setPath($id);
        return view('frontend.news.group', compact(['news_group']));
    }

    public function news_detail($type, $slug, $id) //tin_giao_duc //id cua news
    {
//        Tim parentName khi biet $type cua category
        $category = DB::table('categories')->where('alias', $type)->first(); //47
        $parent = Category::select('name', 'alias')->where('id', $category->parent_id)->first(); // tin_tuc

////        Cap nhat luot xem
//        $news = Post::find($id);
//        $news->views = $news->views + 1;
//        $news->save();

        $news = News::find($id);
////        Tim ra nhom tin tuc (co route la news)
//        $cate = 'news';
////        Thong bao
//        $keyword = 'thong_bao';
//        $alerts = $posts->where('categoryAlias', $keyword)->sortByDesc('created_at')->take(5)->all();
//
////        Van ban moi
//        $arrCate = [64, 65, 66]; // id co ten la van ban... nhin trong csdl :)
//        $documents = $posts->whereIn('categoryId', $arrCate)->sortByDesc('created_at')->take(5)->all();
//
////        Xem nhieu [tin]
//        $views = $posts->where('route', $cate)->sortByDesc('views')->take(5)->all();
//
////        Noi bat [tin]
//        $highlights = $posts->where('route', $cate)->where('highlights', 1)->sortByDesc('created_at')->take(6)->all();
//
//        Hien thi view dang hoat_dong_detail, tin_tuc_detail
        return view('frontend.news.detail', compact(['news']));
    }

    public function active() //hoat_dong
    {
        $active = DB::table('actives')->orderBy('updated_at', 'DESC')->get();
        return view('frontend.active.active', compact(['active']));
    }

    public function active_group($type, $id) //hoat_dong_ngoai_gio // id cua category
    {
//        Tim parentName khi biet $id cua category
//        $category = DB::table('categories')->where('id', $id)->first(); //47
//        $parent = Category::select('name', 'alias')->where('id', $category->parent_id)->first(); // tin_tuc

        $active_group = DB::table('actives')->where('category_id', $id)->get();
//        Ham phan trang trong function rieng tu tao
        $active_group = paginater($active_group, 2);
//        Cai dat duong dan moi dung duoc: do paginate tu viet
        $active_group->setPath($id);

////        Thong bao
//        $keyword = 'thong_bao';
//        $alerts = $posts->where('categoryAlias', $keyword)->sortByDesc('created_at')->take(5)->all();
//
////        Van ban moi
//        $arrCate = [64, 65, 66]; // id co ten la van ban... nhin trong csdl :)
//        $documents = $posts->whereIn('categoryId', $arrCate)->sortByDesc('created_at')->take(5)->all();
//
////        Xem nhieu [tin]
//        $views = $posts->where('route', $cate)->sortByDesc('views')->take(5)->all();
//
////        Noi bat [tin]
//        $highlights = $posts->where('route', $cate)->where('highlights', 1)->sortByDesc('created_at')->take(6)->all();
//
//
//        $view = 'frontend.news.' . $parent->alias;
//        if (view()->exists($view)) {
//            return view($view,
//                compact(['category', 'parent', 'news', 'alerts', 'documents', 'views', 'highlights'])
//            );
//        }
//        return view('frontend.static.404');
        return view('frontend.actives.group', compact(['active_group']));
    }

    public function active_detail($type, $slug, $id) //hoat_dong_tap_the //id cua active
    {
//        Tim parentName khi biet $type cua category
//        $category = DB::table('categories')->where('alias', $type)->first(); //47
//        $parent = Category::select('name', 'alias')->where('id', $category->parent_id)->first(); // tin_tuc

////        Cap nhat luot xem
//        $news = Post::find($id);
//        $news->views = $news->views + 1;
//        $news->save();

        $active = Actives::find($id);
////        Tim ra nhom tin tuc (co route la news)
//        $cate = 'news';
////        Thong bao
//        $keyword = 'thong_bao';
//        $alerts = $posts->where('categoryAlias', $keyword)->sortByDesc('created_at')->take(5)->all();
//
////        Van ban moi
//        $arrCate = [64, 65, 66]; // id co ten la van ban... nhin trong csdl :)
//        $documents = $posts->whereIn('categoryId', $arrCate)->sortByDesc('created_at')->take(5)->all();
//
////        Xem nhieu [tin]
//        $views = $posts->where('route', $cate)->sortByDesc('views')->take(5)->all();
//
////        Noi bat [tin]
//        $highlights = $posts->where('route', $cate)->where('highlights', 1)->sortByDesc('created_at')->take(6)->all();
//
//        Hien thi view dang hoat_dong_detail, tin_tuc_detail
        return view('frontend.active.detail', compact(['active']));
    }

    public function document() //van_ban
    {
        $document = DB::table('documents')->orderBy('updated_at', 'DESC')->get();
        return view('frontend.documents.document', compact(['document']));
    }

    public function document_group($type, $id) //hoat_dong_ngoai_gio // id cua category
    {
//        Tim parentName khi biet $id cua category
//        $category = DB::table('categories')->where('id', $id)->first(); //47
//        $parent = Category::select('name', 'alias')->where('id', $category->parent_id)->first(); // tin_tuc

        $document_group = DB::table('documents')->where('category_id', $id)->get();
//        Ham phan trang trong function rieng tu tao
        $document_group = paginater($document_group, 2);
//        Cai dat duong dan moi dung duoc: do paginate tu viet
        $document_group->setPath($id);

////        Thong bao
//        $keyword = 'thong_bao';
//        $alerts = $posts->where('categoryAlias', $keyword)->sortByDesc('created_at')->take(5)->all();
//
////        Van ban moi
//        $arrCate = [64, 65, 66]; // id co ten la van ban... nhin trong csdl :)
//        $documents = $posts->whereIn('categoryId', $arrCate)->sortByDesc('created_at')->take(5)->all();
//
////        Xem nhieu [tin]
//        $views = $posts->where('route', $cate)->sortByDesc('views')->take(5)->all();
//
////        Noi bat [tin]
//        $highlights = $posts->where('route', $cate)->where('highlights', 1)->sortByDesc('created_at')->take(6)->all();
//
//
//        $view = 'frontend.news.' . $parent->alias;
//        if (view()->exists($view)) {
//            return view($view,
//                compact(['category', 'parent', 'news', 'alerts', 'documents', 'views', 'highlights'])
//            );
//        }
//        return view('frontend.static.404');
        return view('frontend.documents.group', compact(['document_group']));
    }

    public function document_detail($type, $slug, $id) //hoat_dong_tap_the //id cua document
    {
//        Tim parentName khi biet $type cua category
//        $category = DB::table('categories')->where('alias', $type)->first(); //47
//        $parent = Category::select('name', 'alias')->where('id', $category->parent_id)->first(); // tin_tuc

////        Cap nhat luot xem
//        $news = Post::find($id);
//        $news->views = $news->views + 1;
//        $news->save();

        $document = Actives::find($id);
////        Tim ra nhom tin tuc (co route la news)
//        $cate = 'news';
////        Thong bao
//        $keyword = 'thong_bao';
//        $alerts = $posts->where('categoryAlias', $keyword)->sortByDesc('created_at')->take(5)->all();
//
////        Van ban moi
//        $arrCate = [64, 65, 66]; // id co ten la van ban... nhin trong csdl :)
//        $documents = $posts->whereIn('categoryId', $arrCate)->sortByDesc('created_at')->take(5)->all();
//
////        Xem nhieu [tin]
//        $views = $posts->where('route', $cate)->sortByDesc('views')->take(5)->all();
//
////        Noi bat [tin]
//        $highlights = $posts->where('route', $cate)->where('highlights', 1)->sortByDesc('created_at')->take(6)->all();
//
//        Hien thi view dang hoat_dong_detail, tin_tuc_detail
        return view('frontend.documents.detail', compact(['document']));
    }
// =============================================================
    public function school()
    {
        return view('frontend.pages.school');
    }

    public function notification($slug1, $id)
    {
        return view('frontend.pages.' . $slug1);
    }

    public function menu($slug2, $id)
    {
        return view('frontend.pages.' . $slug2);
    }

    public function schedule($slug3, $id)
    {
        return view('frontend.pages.' . $slug3);
    }
// =============================================================
    public function library()
    {
        return view('frontend.pages.library');
    }

    public function lessonPlan($slug1, $id)
    {
        return view('frontend.pages.' . $slug1);
    }
}
