<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\yeucausanxuatDetails;

class YcsxDetailsController extends Controller
{
    public $ycsxDetails;

    public function __construct(yeucausanxuatDetails $ycsxDetails) {
        $this->middleware('auth');
        $this->ycsxDetails = $ycsxDetails;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $check = $this->ycsxDetails->checkYCSXdetails($request->ycsx_id, $request->product_id);
        if (count($check) > 0) {
            $this->ycsxDetails->addqtyYCSXdetails($request->ycsx_id, $request->product_id);
        } else {
            $this->ycsxDetails->createYCSXdetails($request->all());
        }
        return redirect()->route('yeucausanxuat.edit',$request->ycsx_id);
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
       $this->ycsxDetails->editYCSXdetails($request->all());
       return redirect()->route('yeucausanxuat.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->ycsxDetails->deleteYCSXdetails($request->id);
        return redirect()->route('yeucausanxuat.edit',$request->ycsx_id);
    }

    public function chooseDesign(Request $request)
    {
        // dd($request);
        $this->ycsxDetails->editDesign($request->all());
    }
}
