<?php

namespace truonghoc\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use truonghoc\Category;
use truonghoc\Http\Controllers\Controller;
use truonghoc\Http\Requests\NewsStoreRequest;
use truonghoc\Http\Requests\NewsUpdateRequest;
use truonghoc\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $news = News::with('category')->get();
//        $category = $news[1]->category->get();
//        dd($category);
        $news = News::with('category')->orderByDesc('id')->get();
        return view('backend.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        Chi lay category con (loai tin) lam type cho news
        $types = Category::all();
        return view('backend.news.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsStoreRequest $request)
    {
        $news = new News();
        $news->title = $request->input('title');
        $news->category_id = $request->input('category_id');
        $news->alias = str_slug($request->input('title'));
        $news->order = $request->input('order');
        $news->intro = $request->input('intro');
        $news->content = $request->input('content');
        $news->keywords = $request->input('keywords');
        $news->highlights = ($request->input('highlights') != null) ? 1 : 0;
//        Luu file anh
        $image = $request->file('image');
//        Su dung de luu ten dung cho if sau
        $imageName = '';
        if (isset($image)) {
            $image_name = $image->getClientOriginalName();
//            Doi ten file
            $onlyName = pathinfo($image_name, PATHINFO_FILENAME);
            $extension = pathinfo($image_name, PATHINFO_EXTENSION);
            $image_newName = str_slug($onlyName) . "-" . str_random() . "." . $extension;
            $news->image = $image_newName;
            $imageName = $image_newName;
        };
//        Lua chon hanh dong khong duoc do xung dot textboxio
        if ($news->save()) {
//            Luu duoc moi sao chep hinh anh (su dung ten toan cuc)
            $image->move('resources/upload/news/', $imageName);
            session()->put('success', 'Item created successfully.');
        } else {
            session()->put('danger', 'Item save fail.');
        }
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        return view('backend.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, $id)
    {
        $news = Slide::find($id);
        $news->name = $request->input('name');
        $news->order = $request->input('order');
        $news->link = $request->input('link');
//        Thay doi hinh
        if (!empty($request->file('image'))) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
//            Doi ten file -> khi bi ghi de
            $onlyName = pathinfo($image_name, PATHINFO_FILENAME);
            $extension = pathinfo($image_name, PATHINFO_EXTENSION);
            $image_newName = str_slug($onlyName) . "-" . str_random() . "." . $extension;
            $image->move('resources/upload/slide/', $image_newName);
//        Xoa file cu
            $delImg = 'resources/upload/slide/' . $news->image;
            if (\File::exists($delImg)) {
                \File::delete($delImg);
            }
//        Luu file moi
            $news->image = $image_newName;
        }
//        Lua chon hanh dong [rat hay]
        if ($request->get('action') == 'save_and_close') {
            if ($slide->save()) {
                session()->put('success', 'Item update successfully.');
            };
            return redirect()->route('slide.index');
        } elseif ($request->get('action') == 'save_and_show') {
            if ($slide->save()) {
                session()->put('success', 'Item update successfully.');
            };
            return redirect()->route('slide.show', $id);
        }
        session()->put('success', 'Item update fail.');
        return redirect()->route('slide.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        if ($news->delete()) {
            session()->put('success', 'Delete item successfully.');
            //            Xoa hinh
            $delImg = 'resources/upload/news/' . $news->image;
            if (\File::exists($delImg)) {
                \File::delete($delImg);
            } else {
                session()->put('warning', 'Image not exists.');
            }
        } else {
            session()->put('error', 'Delete item failed.');
        }
        return redirect()->route('news.index');
    }
}
