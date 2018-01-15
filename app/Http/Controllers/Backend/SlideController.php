<?php

namespace truonghoc\Http\Controllers\Backend;

use truonghoc\Http\Controllers\Controller;
use truonghoc\Http\Requests\SlideStoreRequest;
use truonghoc\Http\Requests\SlideUpdateRequest;
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
    public function store(SlideStoreRequest $request)
    {
        $slide = new Slide();
        $slide->name = $request->input('name');
        $slide->order = $request->input('order');
        $slide->link = $request->input('link');
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
            $slide->image = $image_newName;
            $imageName = $image_newName;
        };
//        Lua chon hanh dong [rat hay]
        if ($request->get('action') === 'save') {
            if ($slide->save()) {
                $image->move('resources/upload/slide/', $imageName);
                session()->put('success', 'Item created successfully.');
            };
        } elseif ($request->get('action') === 'save_and_close') {
            if ($slide->save()) {
                $image->move('resources/upload/slide/', $imageName);
                session()->put('success', 'Item created successfully.');
            };
        }
        return redirect()->route('slide.index');
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
    public function update(SlideUpdateRequest $request, $id)
    {
        $slide = Slide::find($id);
        $slide->name = $request->input('name');
        $slide->order = $request->input('order');
        $slide->link = $request->input('link');
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
            $delImg = 'resources/upload/slide/' . $slide->image;
            if (\File::exists($delImg)) {
                \File::delete($delImg);
            }
//        Luu file moi
            $slide->image = $image_newName;
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
        $slide = Slide::find($id);
        if ($slide->delete()) {
            session()->put('success', 'Delete item successfully.');
//            Xoa hinh
            $delImg = 'resources/upload/slide/' . $slide->image;
            if (\File::exists($delImg)) {
                \File::delete($delImg);
            } else {
                session()->put('warning', 'Image not exists.');
            }
            return redirect()->route('slide.index');
        };
        session()->put('error', 'Delete item failed.');
        return redirect()->route('slide.index');
    }
}
