<?php

namespace App\Http\Controllers\Backend;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     *  show all list
     */
    public function index()
    {
        $all_data = Booking::latest()->get();
        return view('backend.booking.index', compact('all_data'));
    }
    /**
     *  cretae booking form
     */
    public function create()
    {
        return view('backend.booking.create');
    }
    /**
     *  cretae booking form
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'room_id'   => 'required',
            'checkin_date'   => 'required',
            'checkout_date'   => 'required',
            'customer_phone'   => 'required',
        ]);

        $booking_data = new Booking();

        $booking_data->room_id = $request->room_id;
        $booking_data->checkin_date = $request->checkin_date;
        $booking_data->checkout_date = $request->checkout_date;
        $booking_data->customer_phone = $request->customer_phone;
        $booking_data->booking_status = '0';
        $booking_data->save();
        return redirect()->back()->with('success','Room Booked successfully');
    }
    /**
     * edit booking data
     */
    public function editBookingData($id)
    {
        // $edit_data = Booking::findOrFail($id);
        // return view('backend.booking.edit', compact('edit_data'));

        try {
            $edit_data = Booking::findOrFail($id);
         } 
         catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404);
        } 
         return view('backend.booking.edit',compact('edit_data'));
    }
    /**
     *  update booking data
     */
    public function updateBookingData(Request $request, $id)
    {
        $validateData = $request->validate([
            'checkin_date'   => 'required',
            'checkout_date'   => 'required',
            'customer_phone'   => 'required',
        ]);

        $booking_data = Booking::findOrFail($id);

        $booking_data->room_id = $request->room_id;
        $booking_data->checkin_date = $request->checkin_date;
        $booking_data->checkout_date = $request->checkout_date;
        $booking_data->customer_name = $request->customer_name;
        $booking_data->customer_phone = $request->customer_phone;
        $booking_data->booking_status = $request->booking_status;
        $booking_data->update();
        return redirect()->route('booking')->with('success','Data Updated successfully');
    }
    /**
     *  check available rooms
     */
    public function checkAvailableRoom(Request $request, $checkindate)
    {
        $available_rooms = DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkindate' BETWEEN checkin_date AND checkout_date )");

        $data = [];
        foreach($available_rooms as $room){
            $roomType = RoomType::find($room->room_type_id);
            $data[] = ['room' => $room, 'roomtype' =>$roomType];
        }

        return response()->json(['data' => $data]);
    }
    /**
     *  delete booking data
     */
    public function deleteData($id)
    {
        Booking::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data Deleted Successful');
    }
}
