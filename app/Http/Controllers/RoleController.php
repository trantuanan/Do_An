<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public $role;

    public function __construct(Role $role) {
        $this->middleware('auth');
        $this->role = $role;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->role->getListRole();
        return view('BackEnd.QLHT.role', ['roles' => $roles]);
    }

    public function find(Request $request)
    {
        if ($request->ajax()) {
            $role = $this->role->findRole($request->all());
            return Response($role);
        }
    }

    public function change(Request $request)
    {
        if ($request->ajax()) {
            $role = $this->role->changeName($request->all());
            return Response('Sửa tên quyền thành công!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $role = $this->role->createRole($request->all());
            return 'Tạo quyền thành công!';
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $role = $this->role->updateRole($request->all());
            return Response('Sửa quyền thành công!');
        }
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $role = $this->role->deleteRole($request->all());
            return Response('Xóa quyền thành công!');
        }
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
        
    }
}
