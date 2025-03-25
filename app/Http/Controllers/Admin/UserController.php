<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use App\Utilities\common;
use Illuminate\Http\Request;
class UserController extends Controller
{

    private $userService;

    public function __construct(UserServiceInterface $userService){
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userService->all();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->get('password') != $request->get('password_confirmation')) {
            return back()
                ->with('notification', 'ERROR: Confirm password does not match');
        }

        $data = $request->all();
        $data['password'] = bcrypt($request->get('password'));
        // xử lý file
        if($request->hasFile('image')){
            $data['avatar']=Common::uploadFile($request->file('image'),'front/img/user');
        }

        $user = $this->userService->create($data);

        return redirect('admin/user/' . $user->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        //xử lí mật khẩu (mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu)
        if($request->get('password') != null) {
            if ($request->get('password') != $request->get('password_confirmation')) {
                return back()
                    ->with('notification', 'ERROR: Confirm password does not match');
            }
            $data['password'] = bcrypt($request->get('password'));
        }else {
            unset($data['password']);
        }

        //xử lí file ảnh
        if($request->hasFile('image')){
            //thêm file mới
            $data['avatar']=Common::uploadFile($request->file('image'),'front/img/user');

            //xóa file cũ nếu có
            if($user->avatar && file_exists(public_path($user->avatar))) {
                unlink(public_path($user->avatar));
            }
        } else {
            // Nếu không tải ảnh mới, giữ nguyên ảnh cũ
            $data['avatar'] = $user->avatar;
        }

        //cập nhật dữ liệu
        $this->userService->update($data, $user->id);
        return redirect('admin/user/' . $user->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this -> userService->delete($user->id);

        // xóa file
        if($user->avatar && file_exists(public_path($user->avatar))) {
            unlink(public_path($user->avatar));
        }
        return redirect('admin/user');
    }
}
