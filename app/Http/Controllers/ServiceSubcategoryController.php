<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceSubcategory;
use App\Models\ServiceCategory;
use App\Http\Requests\ServiceSubcategoryRequest;
class ServiceSubcategoryController extends Controller
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
    public function store(ServiceSubcategoryRequest $request, ServiceSubcategory $subcategory)
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
    public function update(ServiceSubcategoryRequest $request, ServiceSubcategory $subcategory)
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
     * @param ServiceSubcategory $subcategory
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(ServiceSubcategory $subcategory)
    {

        if ($subcategory->tickets()->count()){
            return redirect()->back()->with(['message' =>
                ['message' => 'La subcategoria  no puede ser elimando, tiene tickets asignados ', 'type' => 'alert-warning']
            ]);
        }
        $subcategory->delete();
        return redirect()->route('category',$subcategory->serviceCategory->id)->with(['message' =>
            ['message' => 'subcategoria eliminada', 'type' => 'alert-success']
        ]);
    }
}
