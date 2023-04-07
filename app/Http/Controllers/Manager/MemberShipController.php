<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\MemeberShipRequest;
use App\Http\Resources\Manager\MemberShipCollection;
use App\Models\Manager\MemberShip;
use Illuminate\Http\Request;

class MemberShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new MemberShipCollection(MemberShip::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemeberShipRequest $request)
    {
        MemberShip::create($request->all());
        return response(['ok'] , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager\MemberShip  $memberShip
     * @return MemberShip
     */

    public function show(MemberShip  $membership)
    {
       return  $membership;

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manager\MemberShip  $memberShip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $memberShip)
    {
        $mem = MemberShip::find($memberShip);
        $mem->update($request->all());
        return response(['ok'] , 200 ) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager\MemberShip  $memberShip
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberShip $membership)
    {
        $membership->delete();
        return response(['ok'], 200);
    }
}
