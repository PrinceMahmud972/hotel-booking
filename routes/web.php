<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\ExpenseController;
use App\Http\Controllers\Backend\RoomController;
use App\Http\Controllers\Backend\RoomTypeController;
use App\Http\Controllers\Frontend\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });


Route::get('/dashboard', function () {
    return view('backend.index');
}) -> name('dashboard');

// frontend route
    Route::get('/', [FrontendController::class, 'index']);
    Route::get('/rooms-list', [FrontendController::class, 'showRoomPage'])->name('frontend.room');
    Route::get('/details/{id}', [FrontendController::class, 'detailsPageShow'])->name('details');



    Route::get('/blog', [FrontendController::class, 'showBlogPage'])->name('frontend.blog');
    Route::get('/blog-details', [FrontendController::class, 'showBlogDetailsPage'])->name('frontend.blog.details');
    Route::get('/gallery', [FrontendController::class, 'showGalleryPage'])->name('frontend.gallery');
    Route::get('/contact', [FrontendController::class, 'showContactPage'])->name('frontend.contact');


// backend route
    Route::get('/expense',[ExpenseController::class, 'index'])->name('expense');
    Route::get('/expense-create',[ExpenseController::class, 'showExpenseForm'])->name('expense.form');
    Route::post('/expense-store',[ExpenseController::class, 'storeExpenseData'])->name('expense.store');
    Route::get('/expense-edit/{id}',[ExpenseController::class, 'editExpenseData'])->name('expense.edit');
    Route::post('/expense-update/{id}',[ExpenseController::class, 'updateExpenseData'])->name('expense.update');
    Route::get('/expense-delete/{id}',[ExpenseController::class, 'expenseDataDelete'])->name('expense.delete');
    Route::get('/expense-view/{id}',[ExpenseController::class, 'viewExpenseData'])->name('expense.view');

    Route::get('/room-type',[RoomTypeController::class, 'index'])->name('room.type');
    Route::get('/room-type-create',[RoomTypeController::class, 'create'])->name('room.type.create');
    Route::post('/room-type-store',[RoomTypeController::class, 'store'])->name('room.type.store');
    Route::get('/room-type-view/{id}',[RoomTypeController::class, 'view'])->name('room.type.view');
    Route::get('/room-type-edit/{id}',[RoomTypeController::class, 'edit'])->name('room.type.edit');
    Route::post('/room-type-update/{id}',[RoomTypeController::class, 'updateData'])->name('room.type.update');
    Route::get('/room-type-delete/{id}',[RoomTypeController::class, 'deleteData'])->name('room.type.delete');

    Route::get('/room',[RoomController::class, 'index'])->name('room');
    Route::get('/room-create',[RoomController::class, 'create'])->name('room.create');
    Route::post('/room-store',[RoomController::class, 'store'])->name('room.store');
    Route::get('/room-edit/{id}',[RoomController::class, 'edit'])->name('room.edit');
    Route::post('/room-update/{id}',[RoomController::class, 'updateData'])->name('room.update');
    Route::get('/room-delete/{id}',[RoomController::class, 'deleteData'])->name('room.delete');
    
    //delete gallery images
    Route::get('/room-type-image/{id}',[RoomTypeController::class, 'deleteRoomTypeImage'])->name('room.delete');
    // Route::get('/room-delete/{id}',[RoomController::class, 'deleteData'])->name('room.delete');

    //booking route
    Route::get('/booking',[BookingController::class, 'index'])->name('booking');
    Route::get('/booking-create',[BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking-store',[BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking-edit/{id}',[BookingController::class, 'editBookingData'])->name('booking.edit');
    Route::post('/booking-update/{id}',[BookingController::class, 'updateBookingData'])->name('booking.update');
    Route::get('/booking-delete/{id}',[BookingController::class, 'deleteData'])->name('booking.delete');

    //check available rooms
    Route::get('/booking/available-rooms/{checkindate}', [BookingController::class, 'checkAvailableRoom']);

// authentication route
    Auth::routes();
    //routes details
    Route::get('/login', [FrontendController::class, 'showLoginPage'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
// Route::get('/register', [FrontendController::class, 'showRegisterPage'])->name('register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
