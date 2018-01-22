<?php

namespace truonghoc\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use truonghoc\Category;
use truonghoc\Http\Controllers\Controller;
use truonghoc\Http\Requests\PostStoreRequest;
use truonghoc\Http\Requests\PostUpdateRequest;
use truonghoc\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->orderByDesc('id')->get();
        return view('backend.post.index', compact('posts'));
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
        return view('backend.post.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');
        $post->user_id = Auth::id();
        $post->alias = str_slug($request->input('title'));
        $post->order = $request->input('order');
        $post->intro = $request->input('intro');
        $post->content = $request->input('content');
        $post->keywords = $request->input('keywords');
        $post->highlights = ($request->input('highlights') != null) ? 1 : 0;
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
            $post->image = $image_newName;
            $imageName = $image_newName;
        };
//        Lua chon hanh dong khong duoc do xung dot textboxio
        if ($post->save()) {
//            Luu duoc moi sao chep hinh anh (su dung ten toan cuc)
            $image->move('resources/upload/post/', $imageName);
            session()->put('success', 'Item created successfully.');
        } else {
            session()->put('danger', 'Item save fail.');
        }
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('backend.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $types = Category::all();
        return view('backend.post.edit', compact('post'), compact('types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');
        $post->alias = str_slug($request->input('title'));
        $post->order = $request->input('order');
        $post->intro = $request->input('intro');
        $post->content = $request->input('content');
        $post->keywords = $request->input('keywords');
        $post->highlights = ($request->input('highlights') != null) ? 1 : 0;
//        Thay doi hinh (su dung bien toan cuc cho if sau)
        $imageName = '';
        if (!empty($request->file('image'))) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
//            Doi ten file -> khi bi ghi de
            $onlyName = pathinfo($image_name, PATHINFO_FILENAME);
            $extension = pathinfo($image_name, PATHINFO_EXTENSION);
            $image_newName = str_slug($onlyName) . "-" . str_random() . "." . $extension;
//        Xoa file cu
            $delImg = 'resources/upload/post/' . $post->image;
            if (\File::exists($delImg)) {
                \File::delete($delImg);
            } else {
                session()->put('warning', 'File not exists.');
            }
//        Luu file moi
            $post->image = $image_newName;
            $image->move('resources/upload/post/', $image_newName);
        }
//        Lua chon hanh dong khong duoc do xung dot textboxio
        if ($post->save()) {
            session()->put('success', 'Item update successfully.');
        } else {
            session()->put('success', 'Item update fail.');
        }
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->delete()) {
            session()->put('success', 'Delete item successfully.');
            //            Xoa hinh
            $delImg = 'resources/upload/post/' . $post->image;
            if (\File::exists($delImg)) {
                \File::delete($delImg);
            } else {
                session()->put('warning', 'Image not exists.');
            }
        } else {
            session()->put('error', 'Delete item failed.');
        }
        return redirect()->route('post.index');
    }
}
