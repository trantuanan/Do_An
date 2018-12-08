<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KhohangRequest;
use App\Models\Khohang;

class KhohangController extends Controller
{
    public $khohang;

    public function __construct(Khohang $khohang) {
        $this->middleware('auth');
        $this->khohang = $khohang;
    }

    public function index(Request $request)
    {
        $this->authorize('Q4_4');
        $khohangs = $this->khohang->getList($request->all());
        return view('BackEnd.QLKH.Khohang', ['khohangs' => $khohangs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('Q4_4');
        return view('BackEnd.TacVu.CreateKhohang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KhohangRequest $request)
    {
        $this->authorize('Q4_4');
        $khohangs = $this->khohang->createKhoHang($request->all());
        flash('Thêm kho mới thành công.')->success();
        return redirect()->route('quanlykhohang.index');
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
        $this->authorize('Q4_4');
        $khohangs = $this->khohang->getKhoHang($id);
        return view('BackEnd.TacVu.EditKhohang', ['khohangs' => $khohangs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KhohangRequest $request, $id)
    {
        $this->authorize('Q4_4');
        $khohangs = $this->khohang->updateKhoHang($request->all(),$id);
        flash('Sửa thông tin kho hàng thành công.')->success();
        return redirect()->route('quanlykhohang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('Q4_4');
        $khohangs = $this->khohang->deleteKhoHang($id);
        flash('Xóa kho hàng thành công.')->success();
        return redirect()->route('quanlykhohang.index');
    }
}
