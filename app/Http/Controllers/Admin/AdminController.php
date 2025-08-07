<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\AdminService;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\Admin;
use Auth;
use Session;


class AdminController extends Controller
{

    protected $adminService;

    // Inject AdminService using Constructor
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Session::put("page","dashboard");
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
    public function store(LoginRequest $request)
    {
        $data = $request->all();
        $loginStatus = $this->adminService->login($data);

        if ($loginStatus == 1) {
            return redirect()->route('dashboard.index');
        }else {
            return redirect()->back()->with('error_message', 'Invalid Email or Password');
        }

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
        Session::put('page','dashboard');
        return view('admin.update_password');
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

    public function verifyPassword(Request $request)
    {
        $data = $request->all();
        return $this->adminService->verifyPassword($data);
    }
}
