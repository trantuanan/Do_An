<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateNCCRequest;
use App\Models\NCC;

class NCCController extends Controller
{
    
    public $ncc;

    public function __construct(NCC $ncc) {
        $this->middleware('auth');
        $this->ncc = $ncc;
    }

    public function index(Request $request)
    {
        $this->authorize('Q4_5');
        $nccs = $this->ncc->getList($request->all());
        return view('BackEnd.QLKH.nhacungcap', ['nccs' => $nccs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('Q4_5');
        return view('BackEnd.TacVu.CreateNCC');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNCCRequest $request)
    {
        $this->authorize('Q4_5');
        $nccs = $this->ncc->createNCC($request->all());
        flash('Thêm mới nhà cung cấp thành công.')->success();
        return redirect()->route('quanlyncc.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('Q4_5');
        $nccs = $this->ncc->getNCC($id);
        return view('BackEnd.TacVu.EditNCC', ['nccs' => $nccs]);
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
    public function update(CreateNCCRequest $request, $id)
    {
        $this->authorize('Q4_5');
        $nccs = $this->ncc->updateNCC($request->all(),$id);
        flash('Sửa thông tin nhà cung cấp thành công.')->success();
        return redirect()->route('quanlyncc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->authorize('Q4_5');
        $nccs = $this->ncc->deleteNCC($request->all());
        return Response('Xóa thành công nhà cung cấp!');
    }
}
