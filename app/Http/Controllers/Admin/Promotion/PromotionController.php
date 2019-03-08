<?php

namespace App\Http\Controllers\Admin\Charge;

use App\Charge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Charges = Charge::all();
        return view('promotions.index',compact('Charges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotions.create');
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
            'code' => 'required|string',
            'count' => 'required|numeric',
            'value' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $code = Charge::create([
            'name'=>$request->name,
            'code'=>$request->code,
            'count'=>$request->count,
            'value'=>$request->value,
        ]);

        return redirect(route('promotions.index'))->with("status",'تمت اضافة الكود بنجاح');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Charge::where('id',$id)->delete();
        return redirect(route('promotions.index'));
    }

    public  function activate (Charge $Charge)
    {
        if ($Charge->status == Charge::ACTIVATED)
             return redirect()->back()->with('status','عفوا هذا الكود مفعل بالفعل');
        $Charge->status = Charge::ACTIVATED;
        $Charge->save();
        return redirect(route('promotions.index'))->with('status','تم تفعيل الكود بنجاح');
    }
    public  function deactivate (Charge $Charge)
    {
        if ($Charge->status == Charge::EXPIRED)
             return redirect()->back()->with('status','عفوا هذا الكود غير مفعل بالفعل');
        $Charge->status = Charge::EXPIRED;
        $Charge->save();
        return redirect(route('promotions.index'))->with('status','تم ايقاف الكود بنجاح');
    }

}
