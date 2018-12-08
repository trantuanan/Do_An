<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class YcnxDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        if (Session::has('yeucauxuatnhap_detail')) {
           $item = Session::get('yeucauxuatnhap_detail');
           $khoa = '';
           foreach ($item as $key => $value) {
               if ($value['supplie'] == $request->supplies_id) {
                   $khoa = $key;
                   break; 
               }
           }
           if ($khoa !== '') {
                $items = Session::get('yeucauxuatnhap_detail.'.$khoa);
                $items['soluong']++;
                Session::put('yeucauxuatnhap_detail.'.$khoa,$items);
           } else {
                $input = [
                'supplie' => $request->supplies_id,
                'name' => $request->name,
                'soluong' => $request->soluong,
                'dongia' => $request->dongia,
                ];
                Session::push('yeucauxuatnhap_detail', $input);
           }           
        } else {
            $input = [
            'supplie' => $request->supplies_id,
            'name' => $request->name,
            'soluong' => $request->soluong,
            'dongia' => $request->dongia,
            ];
            Session::push('yeucauxuatnhap_detail', $input);
        }
        
        return redirect()->Route('yeucauxuatnhap.create');
    }

    public function updateSoLuong(Request $request)
    {
        $item = Session::get('yeucauxuatnhap_detail.'.$request->id);
        $item['soluong'] = $request->soluong;
        Session::put('yeucauxuatnhap_detail.'.$request->id,$item);
    }

    public function delete($id)
    {
        Session::forget('yeucauxuatnhap_detail.'.$id);
    }

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
        //
    }
}
