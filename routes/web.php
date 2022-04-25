<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\RoomController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\ExpenseController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\RoomTypeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FrontendController;



// Route::get('/', function () {
//     return view('frontend.index');
// });

// frontend route
    Route::get('/', [FrontendController::class, 'index']);
    Route::get('/rooms-list', [FrontendController::class, 'showRoomPage'])->name('frontend.room');
    Route::get('/details/{id}', [FrontendController::class, 'detailsPageShow'])->name('details');
    Route::get('/gallery', [FrontendController::class, 'showGalleryPage'])->name('frontend.gallery');
    Route::get('/contact', [FrontendController::class, 'showContactPage'])->name('frontend.contact');
    Route::post('/contact/store', [ContactController::class, 'storeData'])->name('contact.store');

    //check available rooms
    Route::get('/booking/available-rooms/{checkindate}', [BookingController::class, 'checkAvailableRoom']);
    Route::post('/booking-store',[BookingController::class, 'store'])->name('booking.store');

    //login route
    Route::get('/login', [FrontendController::class, 'showLoginPage']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');

/******************************************************************
 * backen route Start
 */
Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard', function () {
        return view('backend.index');
    }) -> name('dashboard');

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
    Route::get('/room-type-image/{id}',[RoomTypeController::class, 'deleteRoomTypeImage']);
    // Route::get('/room-delete/{id}',[RoomController::class, 'deleteData'])->name('room.delete');

    //booking route
    Route::get('/booking',[BookingController::class, 'index'])->name('booking');
    Route::get('/booking-create',[BookingController::class, 'create'])->name('booking.create');

    Route::post('/booking-approve/{id}',[BookingController::class, 'approveBooking'])->name('booking.approve');
    Route::get('/booking-edit/{id}',[BookingController::class, 'editBookingData'])->name('booking.edit');
    Route::post('/booking-update/{id}',[BookingController::class, 'updateBookingData'])->name('booking.update');
    Route::get('/booking-delete/{id}',[BookingController::class, 'deleteData'])->name('booking.delete');


    //contact form
    Route::get('/contact-backend', [ContactController::class, 'index'])->name('contact');
    Route::get('/contact-view/{id}', [ContactController::class, 'viewContactData'])->name('contact.view');
    Route::get('/contact-edit/{id}', [ContactController::class, 'editContactData'])->name('contact.edit');
    Route::post('/contact-update/{id}', [ContactController::class, 'updateContactData'])->name('contact.update');
    Route::get('/contact-delete/{id}', [ContactController::class, 'deleteContactData'])->name('contact.delete');



    // if(Auth::user(1)){
        // services route
        Route::get('/backend/service', [ServiceController::class, 'index'])->name('backend.service');
        Route::get('/backend/service-create', [ServiceController::class, 'create'])->name('backend.service.create');
        Route::post('/backend/service-store', [ServiceController::class, 'store'])->name('backend.service.store');
        Route::get('/backend/service-edit/{id}', [ServiceController::class, 'edit'])->name('backend.service.edit');
        Route::post('/backend/service-update/{id}', [ServiceController::class, 'update'])->name('backend.service.update');
        Route::get('/backend/service-delete/{id}', [ServiceController::class, 'delete'])->name('backend.service.delete');

        //slider route
        Route::get('/backend/slider', [SliderController::class, 'index'])->name('backend.slider');
        Route::get('/backend/slider/create', [SliderController::class, 'create'])->name('backend.slider.create');
        Route::post('/backend/slider/store', [SliderController::class, 'store'])->name('backend.slider.store');
        Route::get('/backend/slider/edit/{id}', [SliderController::class, 'edit'])->name('backend.slider.edit');
        Route::post('/backend/slider/update/{id}', [SliderController::class, 'update'])->name('backend.slider.update');
        Route::get('/backend/slider/delete/{id}', [SliderController::class, 'delete'])->name('backend.slider.delete');

    //  }

});
/****
 * backen route Start
 *******************************************************************/
if (!env('ALLOW_REGISTRATION', false)) {
    Route::any('/register', function() {
        abort(403);
    });
}


// authentication route
    // Auth::routes();
    Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);
