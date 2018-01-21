<?php

namespace truonghoc\Http\Controllers\Backend;

use truonghoc\Http\Controllers\Controller;
use truonghoc\Category;
use truonghoc\Http\Requests\CategoryStoreRequest;
use truonghoc\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all()->sortBy('parent_id');
        return view('backend.category.index')
            ->with('categories', $categories)
            ->with('i', $i = 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        Tat ca cai nao co the la parent
        $parentAbles = Category::select('id', 'name')->where('parent_id', 0)->get();
        return view('backend.category.create')
            ->with('parentAbles', $parentAbles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->alias = str_slug($request->input('name'),'_');
        $category->order = $request->input('order');
        $category->parent_id = $request->input('parent_id');
        $category->keywords = $request->input('keywords');
        $category->description = $request->input('description');
        $category->route = $request->input('route');
//        Lua chon hanh dong [rat hay]
        if ($request->get('action') === 'save') {
            if ($category->save()) {
                session()->put('success', 'Item created successfully.');
                return redirect()->route('category.create');
            }
        } elseif ($request->get('action') === 'save_and_close') {
            if ($category->save()) {
                session()->put('success', 'Item created successfully.');
            }
        }
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $parentName = Category::select('name')->where('id', $category->parent_id)->first();
        return view('backend.category.show')
            ->with('parentName', $parentName)
            ->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
//        Co the la parent ngoai chinh no
        $parentAbles = Category::select('id', 'name')->where('parent_id', 0)->where('name', '!=', $category->name)->get();
        return view('backend.category.edit')
            ->with('category', $category)
            ->with('parentAbles', $parentAbles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->alias = str_slug($request->input('name'),'_');
        $category->order = $request->input('order');
        $category->parent_id = $request->input('parent_id');
        $category->keywords = $request->input('keywords');
        $category->description = $request->input('description');
        $category->route = $request->input('route');
//        Lua chon hanh dong [rat hay]
        if ($request->get('action') == 'save_and_close') {
            if ($category->save()) {
                session()->put('success', 'Item update successfully.');
            }
            return redirect()->route('category.index');
        } elseif ($request->get('action') == 'save_and_show') {
            if ($category->save()) {
                session()->put('success', 'Item update successfully.');
            }
            return redirect()->route('category.show', $id);
        }
        session()->put('success', 'Item update fail.');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
//        Xem co chua con khong ?
        $child = Category::where('parent_id', $id)->count();
        if ($child == 0) {
            if ($category->delete()) {
                session()->put('success', 'Delete item successfully.');
            }
        } elseif ($child > 0) {
            session()->put('error', 'Delete item failed.');
        }
        session()->put('success', 'Item delete fail.');
        return redirect()->route('category.index');
    }
}
