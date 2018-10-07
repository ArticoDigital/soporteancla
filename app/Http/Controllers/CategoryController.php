<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\ServiceSubcategory;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = ServiceCategory::all();
      //dd($categories);
        return view('categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        //$categories = ServiceCategory::all();
        return view('category-create');
        //return view('users', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,ServiceCategory $category)
    {
        //
        $category->fill($request->all())->save();
        $categories = ServiceCategory::all();
        return view('categories', compact('categories'))->with(['messageok' => 'Registro exitoso de la categoría '.$category->name]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceCategory $category)
    {
        //
        //$category->load('tickets');
        $subcategories = ServiceSubcategory::where('service_category_id', '=', $category->id)->get();
        //dd($subcategory);
        //$subcategory=ServiceSubcategory::find()
        return view('category', compact('category','subcategories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceCategory $category)
    {
        $category = ServiceCategory::find($request->id);
        $category->update($request->all());
        $categories = ServiceCategory::all();
        return view('categories', compact('categories'))->with(['messageok' => 'Categoría "'.$category->name.'" actualizada']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
