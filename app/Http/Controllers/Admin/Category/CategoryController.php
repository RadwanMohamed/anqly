<?php

namespace App\Http\Controllers\Admin\Category;
use App\Category;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:190',
            'description' => 'required|string',
            'img' => 'required|image',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $category = Category::create([
            'name' => $request->name,
            'desc' => $request->description,
        ]);

        $id_photo = new Photo();
        $id_photo->name = 'صورة السيارة';
        $id_photo->path = $request->img->store('');
        $id_photo->imageable_id = $category->id;
        $id_photo->imageable_type = 'App\Category';
        $id_photo->save();
        return redirect(route('categories.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("categories.edit",compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $rules  = [
            'name' => 'required|string|max:190',
            'description' => 'required|string',
        ];
        $this->validate($request,$rules);



        $category->name =$request->name;
        $category->desc =$request->description;
        if ($category->isClean())
            return redirect()->back()->with('status','يجب ادخال قيم جديدة لاتمام عملية التعديل');
        $category->save();
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        $category->delete();
        return redirect(route('categories.index'));
    }
}
