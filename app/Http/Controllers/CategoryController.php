<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Exceptions\ErrorHandler;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCategoty = Category::with('subCategories')->get();
        return response()->json(['data'=> $listCategoty]);
    }

    public function showOn()
    {
        $category = Category::whereNull('category_id')->with('subCategories')->get();
        return view('welcome', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate(['name'=>'required',
                                'price'=> 'required',
            ]);
         
            Category::create($request->all()); 
            return response()->json(['message'=> 'Data Succesfuly Inserted']);
        }catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = Category::findOrFail($id);
            $data->update($request->all());
            return response()->json(['message'=> 'Data Succesfuly Updated']);
        }catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            Category::findOrFail($request->id)->delete();
            return response()->json(['message'=> 'Data Succesfuly Deleted']);
        }catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        } 
    }
}
