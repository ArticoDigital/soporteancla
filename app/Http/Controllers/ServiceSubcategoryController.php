<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceSubcategory;
use App\Models\ServiceCategory;

class ServiceSubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ServiceCategory $category)
    {
        //

        //dd($category);
        return view('subcategory-create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ServiceSubcategory $subcategory)
    {
        //
        $subcategory->fill($request->all())->save();
        $subcategories = ServiceSubcategory::where('service_category_id', '=', $subcategory->service_category_id)->get();
        $category = ServiceCategory::find($subcategory->service_category_id);

        return view('category', compact('category','subcategories'))->with(['messageok' => 'Subcategoría "'.$subcategory->name.'" creada']);
        //return redirect()->back();
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
    public function edit(ServiceSubcategory $subcategory)
    {
        //
        //$category->load('tickets');
        //$subcategories = ServiceSubcategory::where('service_category_id', '=', $category->id)->get();
        //dd($subcategory);
        //$subcategory=ServiceSubcategory::find()
        return view('subcategory', compact('subcategory'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceSubcategory $subcategory)
    {
        //
        $subcategory = ServiceSubcategory::find($request->id);
        $subcategory->update($request->all());

        $subcategories = ServiceSubcategory::where('service_category_id', '=', $subcategory->service_category_id)->get();
        $category = ServiceCategory::find($subcategory->service_category_id);

        return view('category', compact('category','subcategories'))->with(['messageok' => 'Subcategoría "'.$subcategory->name.'" actualizada']);


        //return redirect()->back();
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
