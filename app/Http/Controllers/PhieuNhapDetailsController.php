<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhieuNhapDetails;
use Session;

class PhieuNhapDetailsController extends Controller
{
    public $phieunhapdetail;

    public function __construct(PhieuNhapDetails $phieunhapdetails) {
        $this->middleware('auth');
        $this->phieunhapdetail = $phieunhapdetails;
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

    public function session(Request $request)
    {
        if (Session::has('phieunhau_detail')) {
           $item = Session::get('phieunhau_detail');
           $khoa = '';
           foreach ($item as $key => $value) {
               if ($value['supplie'] == $request->supplies_id) {
                   $khoa = $key;
                   break; 
               }
           }
           if ($khoa !== '') {
                $items = Session::get('phieunhau_detail.'.$khoa);
                $items['soluong']++;
                Session::put('phieunhau_detail.'.$khoa,$items);
           } else {
                $input = [
                'supplie' => $request->supplies_id,
                'name' => $request->name,
                'soluong' => $request->soluong,
                'dongia' => $request->dongia,
                'baohanh' => $request->baohanh
                ];
                Session::push('phieunhau_detail', $input);
           }           
        } else {
            $input = [
            'supplie' => $request->supplies_id,
            'name' => $request->name,
            'soluong' => $request->soluong,
            'dongia' => $request->dongia,
            'baohanh' => $request->baohanh
            ];
            Session::push('phieunhau_detail', $input);
        }
        
        return redirect()->Route('quanlyphieunhap.create');
    }

    public function delete($id)
    {
        Session::forget('phieunhau_detail.'.$id);
        return redirect()->Route('quanlyphieunhap.create');
    }

    public function updateSoLuong(Request $request)
    {
        $item = Session::get('phieunhau_detail.'.$request->id);
        $item['soluong'] = $request->soluong;
        Session::put('phieunhau_detail.'.$request->id,$item);
        return redirect()->Route('quanlyphieunhap.create');
    }

    public function updatebaohanh(Request $request)
    {
        $item = Session::get('phieunhau_detail.'.$request->id);
        $item['baohanh'] = $request->baohanh;
        Session::put('phieunhau_detail.'.$request->id,$item);
        return redirect()->Route('quanlyphieunhap.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('Q4_2');
        $check = $this->phieunhapdetail->checkPhieuNhapDetails($request->phieunhap_id,$request->supplie_id);
        if (count($check) > 0) {
            $phieunhapdetails = $this->phieunhapdetail->addPhieuNhapDetails($request->phieunhap_id,$request->supplie_id);
        } else {
            $phieunhapdetails = $this->phieunhapdetail->createPhieuNhapDetails($request->all());
        }
        return redirect()->route('quanlyphieunhap.edit',$request->phieunhap_id);
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
    public function editsoluong(Request $request)
    {
        $this->authorize('Q4_2');
        $check = $this->phieunhapdetail->editSLPhieuNhapDetails($request->id,$request->soluong);
        return redirect()->route('quanlyphieunhap.edit',$request->phieunhap_id);
    }

    public function editbaohanh(Request $request)
    {
        $this->authorize('Q4_2');
        $check = $this->phieunhapdetail->editBHPhieuNhapDetails($request->id,$request->baohanh);
        return redirect()->route('quanlyphieunhap.edit',$request->phieunhap_id);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function deleterow(Request $request)
    {
        $this->authorize('Q4_2');
        $check = $this->phieunhapdetail->deletePhieuNhapDetails($request->id);
        return redirect()->route('quanlyphieunhap.edit',$request->phieunhap_id);
    }

    public function destroy($id)
    {
        //
    }
}
