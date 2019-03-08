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
        $orders = Order::with('client')->get();
        return $this->showAll($orders);
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
            'from' => 'required|email',
            'to' => 'required|string',
            'datetime' => 'required|date',
            'desc' => 'required|string',
            'value' => 'required|string',
        ];
        $this->validate($request, $rules);


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
        $order  = $order->with('client')->get();
        return $this->showOne('order',$order);
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
