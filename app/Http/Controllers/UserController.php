<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use Laracasts\Flash\FlashServiceProvider;
use App\Jobs\SendRegisterEmail;
use Illuminate\Support\Facades\Auth;
use Helper;
use Validator;

class UserController extends Controller
{
    public $user;

    public function __construct(User $user) {
        $this->middleware('auth');
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('Q6_1');
        $users = $this->user->getList($request->all());
        return view('BackEnd.QLHT.users', ['users' => $users]);
    }

    public function profileShow()
    {
        return view('BackEnd.QLHT.profile');
    }

    public function profileEdit(UpdateProfileRequest $request)
    {
        $users = $this->user->updateProfile($request->all());
        flash('Thay đổi mật khẩu thành công.')->success();
        return redirect()->route('quanlytaikhoan.profile');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        $listRole = $role->getListRole();
        return view('BackEnd.TacVu.CreateUsers')->with('roles', $listRole);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {   
        $this->authorize('Q6_1');
        if ($request->hasFile('anh')) {
            $file = $request->file('anh');
            $file->move('upload/avatarNV', $file->getClientOriginalName());
        }
        $user = $this->user->createUser($request->all());
        flash('Thêm mới người dùng thành công.')->success();
        return redirect()->route('quanlytaikhoan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = new Role();
        $listRole = $role->getListRole();
        $user = $this->user->getUser($id);
        return view('BackEnd.TacVu.EditUsers')
        ->with('users', $user)
        ->with('roles', $listRole);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {   
        $this->authorize('Q6_1');  
        if ($request->hasFile('anh_1')) {
            $file = $request->file('anh_1');
            $file->move('upload/avatarNV', $file->getClientOriginalName());
        } else {
            $request->anh = $request->anh_1;
        }
        
        $user = $this->user->updateUser($request->all());
        flash('Sửa thông tin người dùng thành công.')->success();
        return redirect()->route('quanlytaikhoan.index');
    }

    // public function showProfile()
    // {
    //     return view('hello');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->authorize('Q6_1');
        if ($request->ajax()) {
            $users = $this->user->deleteUser($request->all());
            return Response('Xóa tài khoản thành công!');
        }
    }
}
