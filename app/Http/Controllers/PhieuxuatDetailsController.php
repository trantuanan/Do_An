<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhieuXuatDetails;
use Session;

class PhieuxuatDetailsController extends Controller
{
    public $phieuxuatdetail;

    public function __construct(PhieuXuatDetails $phieuxuatdetail) {
        $this->middleware('auth');
        $this->phieuxuatdetail = $phieuxuatdetail;
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
        if (Session::has('phieuxuat_detail')) {
           $item = Session::get('phieuxuat_detail');
           $khoa = '';
           foreach ($item as $key => $value) {
               if ($value['supplie'] == $request->supplies_id) {
                   $khoa = $key;
                   break; 
               }
           }
           if ($khoa !== '') {
                $items = Session::get('phieuxuat_detail.'.$khoa);
                $items['soluong']++;
                Session::put('phieuxuat_detail.'.$khoa,$items);
           } else {
                $input = [
                'supplie' => $request->supplies_id,
                'name' => $request->name,
                'soluong' => $request->soluong,
                'dongia' => $request->dongia,
                ];
                Session::push('phieuxuat_detail', $input);
           }           
        } else {
            $input = [
            'supplie' => $request->supplies_id,
            'name' => $request->name,
            'soluong' => $request->soluong,
            'dongia' => $request->dongia,
            ];
            Session::push('phieuxuat_detail', $input);
        }
        
        return redirect()->Route('quanlyphieuxuat.create');
    }

    public function delete($id)
    {
        Session::forget('phieuxuat_detail.'.$id);
    }

    public function updateSoLuong(Request $request)
    {
        $item = Session::get('phieuxuat_detail.'.$request->id);
        $item['soluong'] = $request->soluong;
        Session::put('phieuxuat_detail.'.$request->id,$item);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('Q4_3');
        $check = $this->phieuxuatdetail->checkPhieuXuatDetails($request->phieuxuat_id,$request->supplie_id);
        if (count($check) > 0) {
            $phieuxuatdetails = $this->phieuxuatdetail->addPhieuXuatDetails($request->phieuxuat_id,$request->supplie_id);
        } else {
            $phieuxuatdetails = $this->phieuxuatdetail->createPhieuXuatDetails($request->all());
        }
        return redirect()->route('quanlyphieuxuat.edit',$request->phieuxuat_id);
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

    public function editsoluong(Request $request)
    {
        $this->authorize('Q4_3');
        $check = $this->phieuxuatdetail->editSLPhieuXuatDetails($request->id,$request->soluong);
        return redirect()->route('quanlyphieuxuat.edit',$request->phieuxuat_id);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function deleterow(Request $request)
    {
        $this->authorize('Q4_3');
        $check = $this->phieuxuatdetail->deletePhieuXuatDetails($request->id);
        return redirect()->route('quanlyphieuxuat.edit',$request->phieuxuat_id);
    }

    public function destroy($id)
    {
        //
    }
}
