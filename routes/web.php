<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\BukusController;
    use App\Http\Controllers\PenulisController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\PasswordResetLinkController;
    use App\Http\Controllers\Auth\NewPasswordController;
    use App\Http\Controllers\ForgotPasswordController;
    use App\Http\Controllers\ResetPasswordController;

    Route::get('/', function () {
        return view('welcome');
    });
    
    //route resource for bukus
    Route::middleware(['auth', 'admin'])->group(function()   {
        Route::resource('/bukus', \App\Http\Controllers\BukuController::class);
    //route resource for penuliss
    Route::resource('penuliss', PenulisController::class);
    });

    Route::middleware(['auth', 'customer'])->group(function()   {
        Route::get('/user', [AuthController::class, 'index'])->name('dashboard');
    });


    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/password/forgot', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password');
    Route::get('/reset', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('/pasword/reset', [ResetPasswordController::class, 'showResetForm'])->name('password.resett');
    
    Route::post('/reset/pssword', [AuthController::class, 'reset'])->name('reset');

    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->middleware('guest')->name('password.request');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendEmail'])->middleware('guest')->name('pw.email');
    Route::post('/reset-password', [ForgotPasswordController::class, 'resetForm'])->middleware('guest')->name('ps.email');

    Route::get('/reset-password/{token}', function (string $token) {
        return view('auth.reset-password', ['token' => $token]);
    })->middleware('guest')->name('password.reset');

    



           
    


    