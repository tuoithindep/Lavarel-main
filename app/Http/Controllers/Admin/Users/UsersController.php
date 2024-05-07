<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Mime\Email;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.users', [
            'title' => 'Danh sách người dùng',
            'users' => $users
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('admin.users.add', [
            'title' => 'Thêm người dùng',
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:filter,rfc,dns|unique:users',
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ],[
            'required' => ':attribute là bắt buộc',
            'unique' => 'email đã được sử dụng',
            'same' => 'mật khẩu nhập lại phải giống với mật khẩu'
        ]);

        try {
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            User::create($data);
            Session::flash('success', 'Tạo tài khoản thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Tạo tài khoản thất bại');
            Log::info($err->getMessage());
            return  redirect()->back();
        }
        return redirect()->back();
    }

    public function show()
    {
        $users = User::all();
        return view('admin.users.edit', [
            'title' => 'Đổi mật khẩu',
            'users' => $users
        ]);
    }

    public function update(Request $request, $user_id)
    {
        $users = User::where('id', $user_id)->firstOrFail();
        // dd(!Hash::check($request->recent_password,$users->password));
        $this->validate($request, [
            'recent_password' => 'required',
            'new_password' => 'required',
            'retype_new_password' => 'required|same:new_password'
        ],[
            'required' => ':attribute là bắt buộc',
            'same' => 'mật khẩu nhập lại phải giống với mật khẩu'
        ]);

        if(!Hash::check($request->recent_password,$users->password)){
            Session::flash('error', 'Mật khẩu không chính xác');
            return redirect()->back();
        }else{
            $users->password = Hash::make($request->new_password);
            // dd($users->password);
            $users->save();
            Session::flash('success', 'Đổi mật khẩu thành công');
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $user = User::where('id',$request->input('id'))->first()->delete();
        if ($user) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công tài khoản'
            ]);
        }
        return response()->json([ 'error' => true ]);
    }
}
