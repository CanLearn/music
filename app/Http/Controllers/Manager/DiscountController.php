<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\DiscountRequest;
use App\Http\Resources\DiscountCollection;
use App\Models\Manager\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DiscountCollection(Discount::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountRequest $request , Discount $discount)
    {
        $request->validated();
        $dis = new Discount();
        $dis->title = $request->title;
        $dis->name = $request->name;
        $dis->code = $request->code;
        $dis->percent = $request->percent;
        $dis->save();

        return response(['ok'] , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        return $discount ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountRequest $request, Discount $discount)
    {
        $data = $request->validated();
        $discount->update($data);
        return response(['ok'] , 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
        return response(['ok'] , 200 );
    }
}
