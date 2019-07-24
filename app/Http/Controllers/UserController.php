<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Auth;


class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getLogin()
    {
        $user = Auth::user();
        if (isset($user)) {
            if ($user->role > 0) {
                return redirect('admin/');
            } else {
                return view('admin.pages.login');
            }
        } else {
            return view('admin.pages.login');
        }
    }

    public function loginAdmin(LoginRequest $request)
    {

        $data = $request->only('email', 'password');
        if (Auth::attempt($data, $request->has('remember'))) {
            if (Auth::user()->role == 1) {
                return redirect()->route('category.index')->with('thongbao','Đăng nhập thành công ');
            } else {
                return redirect('admin/login')->with('error','Đăng nhập thất bại');
            }
        } else {
            return redirect('admin/login')->with('error','Đăng nhập thất bại');
        }

    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return back()->with('thongbao', 'Đăng xuất thành công');
        }
    }

    public function checkMD()
    {
        dd('checkMD');
    }
}
