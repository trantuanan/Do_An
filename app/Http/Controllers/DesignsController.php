<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designs;
use App\Http\Requests\CreateDesigns;

class DesignsController extends Controller
{
    public $design;

    public function __construct(Designs $design) {
        $this->middleware('auth');
        $this->design = $design;
    }

    public function index(Request $request)
    {
        $this->authorize('Q2_5');
        $designs = $this->design->getList($request->all());
        return view('BackEnd.QLDH.designs', ['designs' => $designs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('Q2_5');
        return view('BackEnd.TacVu.CreateDesigns');
    }

    public function find(Request $request)
    {
        if ($request->ajax()) {
            $designs = $this->design->findDesign($request->all());
            return Response($designs);
        }
    }

    public function findlist(Request $request)
    {
        if ($request->ajax()) {
            $this->authorize('Q2_5');
            $designs = $this->design->getListDesign($request->all());
            return Response($designs);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDesigns $request)
    {
        $this->authorize('Q2_5');
        // dd($request);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move('upload/fileDesigns', $file->getClientOriginalName());
        }
        $designs = $this->design->createDesign($request->all());
        flash('Thêm thiết kế thành công.')->success();
        return redirect()->route('quanlythietke.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('Q2_5');
        $designs = $this->design->getDesign($id);
        return view('BackEnd.TacVu.EditDesign',[ 'designs' => $designs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('Q2_5');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateDesigns $request, $id)
    {
        $this->authorize('Q2_5'); 
        if ($request->hasFile('file_1')) {
            $file = $request->file('file_1');
            $file->move('upload/fileDesigns', $file->getClientOriginalName());
        } else {
            $request->file = $request->file_1;
        }
        $designs = $this->design->updateDesign($request->all());
        flash('Sửa thiết kế thành công.')->success();
        return redirect()->route('quanlythietke.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->authorize('Q2_5');
        $designs = $this->design->deleteDesign($request->all());
        return Response('Xóa thiết kế thành công!');
    }
}
