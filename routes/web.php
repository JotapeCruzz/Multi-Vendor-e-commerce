<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->group(function (){
    //Show login form
    Route::get('login', [AdminController::class, 'create'])->name('admin.login');

    //Handle login form submission
    Route::post('login', [AdminController::class, 'store'])->name('admin.login.request');

    Route::group(['middleware' => ['admin']], function (){

        // Dashboard route
        Route::resource('dashboard', AdminController::class)->only(['index']);

        // Display update password page route
        Route::get('update-password', [AdminController::class,'edit'])->name('admin.update-password');
        //Verify password route
        Route::post('verify-password', [AdminController::class,'verifyPassword'])->name('admin.verify.password');
        //Update password route
        Route::post('admin/update-password', [AdminController::class,'updatePasswordRequest'])->name('admin.update-password.request');

        //Display update details admin page route
        Route::get('update-details', [AdminController::class, 'editDetails'])->name('admin.update-details');
        //Update Admin Details route
        Route::post('update-details', [AdminController::class, 'updateDetails'])->name('admin.update-details.request');
        // Delete Admin Image profile route
        Route::post('delete-profile-image', [AdminController::class, 'deleteProfileImage']);

        // Sub-Admin Route
        Route::get('subadmins', [AdminController::class, 'subadmins']);
        Route::post('update-subadmin-status', [AdminController::class, 'updateSubadminStatus']);
        Route::get('add-edit-subadmin/{id?}', [AdminController::class, 'addEditSubadmin']);
        Route::get('delete-subadmin/{id}', [AdminController::class, 'deleteSubadmin']);
        Route::post('add-edit-subadmin/request', [AdminController::class, 'addEditSubadminRequest']);
        Route::get('/update-role/{id}', [AdminController::class, 'updateRole']);
        Route::post('/update-role/request', [AdminController::class, 'updateRoleRequest']);

        // Admin logout
        Route::get('logout', [AdminController::class, 'destroy'])->name('admin.logout');

    });
});

