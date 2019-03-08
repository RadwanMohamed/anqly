<?php

namespace App\Http\Controllers\Admin\Product;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    private  $data = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::paginate(50);
        return view('products.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = $this->objectToArray(Category::all());
        return view('products.create',compact('categories'));
    }

    public function objectToArray($object)
    {
        $data = [];
        foreach ($object as $value)
        {
            $data[$value->id] = $value->name_ar;
        }
        return $data;
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
            'name_ar' => 'required|string|max:190',
            'name_en' => 'required|string|max:190',
            'photo' => 'required|image',
            'price' => 'required|numeric',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $product = Product::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'photo' =>   $request->photo->store(''),
            'price' =>   $request->price,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
        ]);

        return redirect(route('products.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->data['product'] = $product;
        $this->data['categories'] = $this->objectToArray(Category::all());
        return view('products.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules  = [
            'name_ar' => 'required|string|max:190',
            'name_en' => 'required|string|max:190',
            'photo' => 'image',
            'price' => 'required|numeric',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
        ];
        $this->validate($request,$rules);
        if ($request->has('photo'))
        {
            if (is_file($product->photo))
                File::delete($product->photo);
            $product->photo = $request->photo->store('');
        }

        $product->name_ar =$request->name_ar;
        $product->name_en =$request->name_en;
        $product->description_ar =$request->description_ar;
        $product->description_en =$request->description_en;
        $product->quantity =$request->quantity;
        $product->category_id =$request->category_id;
        if ($product->isClean())
            return redirect()->back()->with('status','يجب ادخال قيم جديدة لاتمام عملية التعديل');
        $product->save();

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'));
    }
}
