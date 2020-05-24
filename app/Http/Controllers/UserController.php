<?php

namespace App\Http\Controllers;

use App\Mail\RegisteredUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Mail;
//use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Hash;
//use Auth;

class UserController extends Controller
{
    // Sua tai khoan admin dang dang nhap
    public function get_repairAccount(){
        $user = Auth::user();
        return view('admin.users.repair_account',['user'=>$user]);
    }
    public function post_repairAccount(Request $request){
        $user =  Auth::user();
        $this->validate($request,
            [
                'name' => 'min:3|max:100',
                'email' => 'min:6|max:50',
                '_password' =>'required',
            ],
            [
                'name.min'=>'Tên quá ngắn',
                'name.max'=>'Tên quá dài',
                '_password'=>'Bạn phải nhập mật khẩu',

                'email.min'=>'Tên quá ngắn',
                'email.max'=>'Tên quá dài',
            ]);
        if($request->password != "")
        {
            $this->validate($request,[
                'password'=>'min:6|max:20',
                're_password' =>'required|same:password'
            ],[
                're_password.required'=> 'Bạn phải xác nhận mật khẩu',
                're_password.same'=>'Password nhập lại chưa đúng',
                'password.min'=>'password quá ngắn',
                'password.max'=>'password quá dài',
            ]);

        }
        if( Hash::check($request->_password, $user->password) )
        {
            $user->name = $request->name;
            $user->email = $request->email;
            if($request->password != "")
            {
                $user->password = Hash::make($request->password); // mã hóa password
            }
            $user->save();
            return redirect('admin/users/repair_account')->with('thongbao','Sửa thành công ');
        }
        else{
            return redirect()->back()->with('thongbao','Mật khẩu cũ không đúng ');
        }

    }
//    end sua tai khoan admin dang dang nhap


    public function getadd(){
        return view('admin.users.add');

    }
    public function postadd(Request $request ){

        $this->validate($request,
            [
                'name' => 'required|min:3|max:100|unique:users,name',
                'email' => 'required|min:6|max:50|unique:users,email',
                'password' => 'required|min:6|max:20',
                're_password' =>'required|same:password'
            ],
            [
                'name.required'=>'Bạn phải nhập tên',
                'name.min'=>'Tên quá ngắn',
                'name.max'=>'Tên quá dài',
                'name.unique'=>'Đã có tên người dùng này',
                'email.required'=>'Bạn phải nhập email',
                'email.min'=>'Tên quá ngắn',
                'email.max'=>'Tên quá dài',
                'email.unique'=>'Đã có email này',
                'password.required'=>'Bạn phải nhập email',
                'password.min'=>'password quá ngắn',
                'password.max'=>'password quá dài',
                're_password.required'=> 'Bạn phải xác nhận mật khẩu',
                're_password.same'=>'Password nhập lại chưa đúng',

            ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // mã hóa password
        $user->role = true;
        $user->save();
        return redirect()->back()->with('thongbao','Thêm thành công ');
    }

    //
    public function getLogin()
    {
        return view('login');
    }
    public function postLogin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|min:6|max:50',
                'password' =>'required',
            ],
            [
                'email.required'=>'Bạn phải nhập email',
                'email.min'=>'Tên quá ngắn',
                'email.max'=>'Tên quá dài',
                'password'=>'Bạn phải nhập mật khẩu',
            ]);
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];


        if (Auth::guard('web')->attempt($arr)) {
            $m = Auth::user();
            if ($m->role == 1)
            {
                return redirect('admin/column-searching');
            }
            return redirect("customer/history_vote/".$m->id);


        }
        return redirect('login')->with('thongbao','Email hoặc mật khẩu chưa chính xác');
    }
    //

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
    // dang ky tai khoan khach
    public function getRegister(){
        return view('register');
    }
    public function postRegister(Request $request){
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100',
                'email' => 'required|min:6|max:50|unique:users,email',
                'password' => 'required|min:6|max:20',
                're_password' =>'required|same:password'
            ],
            [
                'name.required'=>'Bạn phải nhập tên',
                'name.min'=>'Tên quá ngắn',
                'name.max'=>'Tên quá dài',
//                'name.unique'=>'Đã có tên người dùng này',
                'email.required'=>'Bạn phải nhập email',
                'email.min'=>'Tên quá ngắn',
                'email.max'=>'Tên quá dài',
                'email.unique'=>'Đã email này',
                'password.required'=>'Bạn phải nhập email',
                'password.min'=>'password quá ngắn',
                'password.max'=>'password quá dài',
                're_password.required'=> 'Bạn phải xác nhận mật khẩu',
                're_password.same'=>'Password nhập lại chưa đúng',
            ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // mã hóa password
        $user->role = 0;
        $email = new RegisteredUser($user);
        Mail::to($user->email)
            ->send($email);
        $user->save();

        return redirect('/login')->with('thongbao', 'Them thanh cong');
    }
    //
    public function getlist(){
        $users = User::all();
        $currentlyUserId = Auth::user()->id;
        return view('admin.users.list',['users'=>$users,'currentlyUserId'=>$currentlyUserId]);
    }
    public function getxoa($id)
    {
        $user = User::query()->find($id);
        $user->delete();
        return redirect('admin/users/list')->with('thongbao','Xóa thành công');
    }

    // phan sua tai khoan khac cua Admin
    public function getrepair($id){
        $user = user::query()->find($id);
        return view('admin.users.repair',['customer'=>$user]);
    }
    public function postrepair(Request $request,$id){
        $user = User::query()->find($id);
        $userAdmin = Auth::user();
        $this->validate($request,
            [
                'name' => 'min:3|max:100',
                'email' => 'min:6|max:50',
                '_password' =>'required',
            ],
            [
                'name.min'=>'Tên quá ngắn',
                'name.max'=>'Tên quá dài',
                '_password'=>'Bạn phải nhập mật khẩu',

                'email.min'=>'Tên quá ngắn',
                'email.max'=>'Tên quá dài',
            ]);
        if($request->password != "")
        {
            $this->validate($request,[
                'password'=>'min:6|max:20',
                're_password' =>'required|same:password'
            ],[
                're_password.required'=> 'Bạn phải xác nhận mật khẩu',
                're_password.same'=>'Password nhập lại chưa đúng',
                'password.min'=>'password quá ngắn',
                'password.max'=>'password quá dài',
            ]);
        }
        if( Hash::check($request->_password, $userAdmin->password) )
        {
            $user->name = $request->name;
            $user->email = $request->email;
            if($request->password != "")
            {
                $user->password = Hash::make($request->password); // mã hóa password
            }
            $user->save();

            return redirect('admin/users/repair/'.$user->id)->with('thongbao','Sửa thành công ');
        }
        else{
            return redirect()->back()->with('thongbao','Mật khẩu cũ không đúng ');
        }
    }

//    Khach hang sua tai khoan cua minh tai trang cua khach hang
    public function getProfile(){
        $user = Auth::user();
        return view('customer.profile',['user'=>$user]);
    }
    public function postProfile(Request $request){

        $user =  Auth::user();
        $this->validate($request,
            [
                'name' => 'min:3|max:100',
                'email' => 'min:6|max:50',
                '_password' =>'required',
            ],
            [
                'name.min'=>'Tên quá ngắn',
                'name.max'=>'Tên quá dài',
                '_password'=>'Bạn phải nhập mật khẩu',

                'email.min'=>'Tên quá ngắn',
                'email.max'=>'Tên quá dài',
            ]);


        if($request->password != "")
        {
            $this->validate($request,[
                'password'=>'min:6|max:20',
                're_password' =>'required|same:password'

            ],[
                're_password.required'=> 'Bạn phải xác nhận mật khẩu',
                're_password.same'=>'Password nhập lại chưa đúng',
                'password.min'=>'password quá ngắn',
                'password.max'=>'password quá dài',
            ]);

        }
        if( Hash::check($request->_password, $user->password) )
        {
            $user->name = $request->name;
            $user->email = $request->email;
            if($request->password != "")
            {
                $user->password = Hash::make($request->password); // mã hóa password
            }
            $user->save();
            return redirect('customer/profile')->with('thongbao','Sửa thành công ');
        }
        else{
            return redirect()->back()->with('thongbao','Mật khẩu cũ không đúng ');
        }

    }
}
