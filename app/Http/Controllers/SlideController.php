<?php

namespace truonghoc\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\File;
use truonghoc\Slide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all()->sortByDesc("id");;
        return view('backend.slide.index')
            ->with('slides', $slides)
            ->with('i', $i = 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        Slide::create($request->all());
        $slide = new Slide();
        $slide->name = $request->input('name');
        $slide->order = $request->input('order');
        $slide->link = $request->input('link');
//        Luu file anh
        $image = $request->file('image');
        if (isset($image)) {
            $image_name = $image->getClientOriginalName();
            $slide->image = $image_name;
            $image->move('resources/upload/slide/', $image_name);
        };
//        Lua chon hanh dong [rat hay]
        if ($request->get('action') == 'save') {
            $slide->save();
            return redirect()->route('slide.create');
        } elseif ($request->get('action') == 'save_and_close') {
            $slide->save();
            return redirect()->route('slide.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide = Slide::find($id);
        return view('backend.slide.show')
            ->with('slide', $slide);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('backend.slide.edit')
            ->with('slide', $slide);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slide = Slide::find($id);
        $slide->name = $request->input('name');
        $slide->order = $request->input('order');
        $slide->link = $request->input('link');
//        Thay doi hinh
        if (!empty($request->file('image'))) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->move('resources/upload/slide/', $image_name);
//        Xoa file cu
            $delImg = 'resources/upload/slide/' . $slide->image;
            if (\File::exists($delImg)) {
                \File::delete($delImg);
            }
//        Luu file moi
            $slide->image = $image_name;
        }
//        Lua chon hanh dong [rat hay]
        if ($request->get('action') == 'save_and_close') {
            $slide->save();
            return redirect()->route('slide.index');
        } elseif ($request->get('action') == 'save_and_show') {
            $slide->save();
            return redirect()->route('slide.show', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
//        Xoa hinh
        $delImg = 'resources/upload/slide/' . $slide->image;
        if (\File::exists($delImg)) {
            \File::delete($delImg);
        }
        $slide->delete($slide);
        return redirect()->route('slide.index');
    }
}
