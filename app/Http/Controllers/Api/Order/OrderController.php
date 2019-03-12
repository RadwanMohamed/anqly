<?php

namespace App\Http\Controllers\Api\Order;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class OrderController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('status','=',Order::NEW)->get();
        return $this->showAll('orders',$orders);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:190',
            'from' => 'required|string',
            'to' => 'required|string',
            'datetime' => 'required|date_format:Y-m-d H:i:s',
            'desc' => 'required|string',
            'value' => 'required|string',
        ];
        $this->validate($request, $rules);
//        dd($request->all());
        $order = Order::create([
            'name' => $request->name,
            'from' => $request->from,
            'to' => $request->to,
            'datetime' => $request->datetime,
            'desc' => $request->desc,
            'value' => $request->value,
            'client_id' => $request->client_id,
            'category_id' => $request->category_id,
        ]);

        return $this->showOne('order',$order,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $user = $order->whereHas('client')->with('client')->get();

        return $this->showAll('order',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
