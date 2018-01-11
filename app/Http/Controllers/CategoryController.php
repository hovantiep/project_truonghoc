<?php

namespace truonghoc\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $categories = Category::all()->sortByDesc('id');
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
        $category->alias = str_slug($request->input('name'));
        $category->order = $request->input('order');
        $category->parent_id = $request->input('parent_id');
        $category->keywords = $request->input('keywords');
        $category->description = $request->input('description');
//        Lua chon hanh dong [rat hay]
        if ($request->get('action') === 'save') {
            $category->save();
            return redirect()->route('category.create');
        } elseif ($request->get('action') === 'save_and_close') {
            $category->save();
            return redirect()->route('category.index');
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
        $category->alias = str_slug($request->input('name'));
        $category->order = $request->input('order');
        $category->parent_id = $request->input('parent_id');
        $category->keywords = $request->input('keywords');
        $category->description = $request->input('description');
//        Lua chon hanh dong [rat hay]
        if ($request->get('action') == 'save_and_close') {
            $category->save();
            return redirect()->route('category.index');
        } elseif ($request->get('action') == 'save_and_show') {
            $category->save();
            return redirect()->route('category.show', $id);
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
        Category::find($id)->delete();
        return redirect()->route('category.index');
    }
}
