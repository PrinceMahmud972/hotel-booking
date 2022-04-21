<?php

namespace App\Http\Controllers\Backend;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
     /**
     *  show room type page
     */
    public function index()
    {
        $all_data = Room::latest()->get();
        return view('backend.room.index', compact('all_data'));
    }
    /**
     *  create room type
     */
    public function create()
    {
        $room_type_data = RoomType::all();
        return view('backend.room.create', compact('room_type_data'));
    }
    /**
     *  store data
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'room_type_id'   => 'required',
            'room_title'   => 'required',
        ]);

        $room_data = new Room();

        $room_data->room_type_id = $request->room_type_id;
        $room_data->room_title = $request->room_title;
        $room_data->prepared_by = Auth::user()->name;
        $room_data->save();
        return redirect()->route('room')->with('success','Data added successfully');
    }
    /**
     *  edit room type data 
     */
    public function edit($id)
    {
        $edit_data = Room::findOrFail($id);
        $room_types = RoomType::all();
        return view('backend.room.edit', compact('edit_data','room_types'));
    }
    /**
     * update Room data
     */
    public function updateData(Request $request, $id)
    {
        // return $request->all();
        $validateData = $request->validate([
            'room_type_id'   => 'required',
            'room_title'   => 'required',
        ]);

        $room_data = Room::findOrFail($id);

        $room_data->room_type_id = $request->room_type_id;
        $room_data->room_title = $request->room_title;
        $room_data->prepared_by = Auth::user()->name;
        $room_data->update();
        return redirect()->route('room')->with('success','Data Updated successfully');
    }
    /**
     * room type data delete
     */
    public function deleteData($id)
    {
        Room::findOrFail($id)->delete();
        return redirect()->back()->with('success','Data Deleted successfully');
    }
}
