<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kehoachvattu;

class KhvtController extends Controller
{
    public $khvt;

    public function __construct(Kehoachvattu $khvt) {
        $this->middleware('auth');
        $this->khvt = $khvt;
    }

    public function index(Request $request)
    {
        $this->authorize('Q3_2');
        $khvts = $this->khvt->getList($request->all());
        return view('BackEnd.QLSX.kehoachvattu', ['khvts' => $khvts]);
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
        //
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
        $this->authorize('Q3_2');
        $khvts = $this->khvt->deleteKHVT($id);
        flash('Xóa kế hoạch vật tư thành công.')->success();
        return redirect()->route('kehoachvattu.index');
    }
}
