<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateSuppliesRequest;
use App\Models\Supplies;
use App\Models\NCC;

class SuppliesController extends Controller
{
    public $supplie;

    public function __construct(Supplies $supplie) {
        $this->middleware('auth');
        $this->supplie = $supplie;
    }

    public function index(Request $request)
    {
        $this->authorize('Q3_2');
        $supplies = $this->supplie->getList($request->all());
        return view('BackEnd.QLSX.supplies', [ 'supplies' => $supplies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('Q3_2');
        $ncc = new NCC();
        $nccs = $ncc->getListNCC($request->all());
        return view('BackEnd.TacVu.CreateSupplies', [ 'nccs' => $nccs]);
    }

    public function findncc(Request $request)
    {
        $ncc = new NCC();
        $nccs = $ncc->getListNCC($request->all());
        return Response($nccs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSuppliesRequest $request)
    {
        $this->authorize('Q3_2');
        $supplies = $this->supplie->createSupplies($request->all());
        flash('Thêm vật tư thành công.')->success();
        return redirect()->route('quanlyvattu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $this->authorize('Q3_2');
        $ncc = new NCC();
        $nccs = $ncc->getListNCC($request->all());
        $supplies = $this->supplie->getSupplies($id);
        return view('BackEnd.TacVu.EditSupplies', [ 'supplies' => $supplies, 'nccs' => $nccs]);
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
    public function update(CreateSuppliesRequest $request, $id)
    {
        $this->authorize('Q3_2');
        $supplies = $this->supplie->updateSupplies($request->all(), $id);
        flash('Sửa vật tư thành công.')->success();
        return redirect()->route('quanlyvattu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->authorize('Q3_2');
        $supplies = $this->supplie->deleteSupplies($request->all());
        return Response('Xóa vật tư thành công!');
    }
}
