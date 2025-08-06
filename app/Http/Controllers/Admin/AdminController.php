<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
<<<<<<< HEAD
use App\Services\Admin\AdminService;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\Admin\LoginRequest;

=======
use Illuminate\Http\Request;
use Auth;
>>>>>>> 4f73749c93bb2ab88a938c3095d9f92e5e2e9333

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.login');
    }

    /**
     * Store a newly created resource in storage.
     */
<<<<<<< HEAD
    public function store(LoginRequest $request)
    {
        $data = $request->all();
        $service = new AdminService();
        $loginStatus = $service->login($data);

        if ($loginStatus == 1) {
            return redirect()->route('dashboard.index');
        }else {
            return redirect()->back()->with('error_message', 'Invalid Email or Password');
        }

=======
    public function store(Request $request)
    {
        $data = $request->all();
        if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
            return redirect('admin/dashboard');
        }else{
            return redirect()->back()->with('error_message','Invalid Email or Password');
        }
>>>>>>> 4f73749c93bb2ab88a938c3095d9f92e5e2e9333
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
