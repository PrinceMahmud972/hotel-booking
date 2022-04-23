<?php

namespace App\Http\Controllers\Backend;

use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RoomTypeImage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RoomTypeController extends Controller
{
    /**
     *  show room type page
     */
    public function index()
    {
        $all_data = RoomType::latest()->get();
        return view('backend.room_type.index', compact('all_data'));
    }
    /**
     *  create room type
     */
    public function create()
    {
        return view('backend.room_type.create_room_type');
    }
    /**
     *  store data
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'room_type_title'   => 'required',
            'room_type_details'   => 'required',
            'room_type_price'   => 'required',
        ]);

        $room_type_data = new RoomType();

        $room_type_data->room_type_title = $request->room_type_title;
        $room_type_data->room_type_details = $request->room_type_details;
        $room_type_data->room_type_price = $request->room_type_price;
        $room_type_data->prepared_by = Auth::user()->name;
        $room_type_data->save();


        foreach($request->file('images') as $multi_img){
            $name_gen = hexdec(uniqid()).'.'.$multi_img -> getClientOriginalExtension();
            Image::make($multi_img)->resize(300,300)->save('upload/images/roomTypeImage/'.$name_gen);
            $save_img = 'upload/images/roomTypeImage/'.$name_gen;

            RoomTypeImage::create([
                'room_type_id'   => $room_type_data->id,
                'img_src'   => $save_img,
                'img_alt'   => $request->room_type_title,
            ]);
        }

        return redirect()->route('room.type')->with('success','Data added successfully');
    }
    /**
     *  edit room type data 
     */
    public function edit($id)
    {
        $edit_data = RoomType::findOrFail($id);
        return view('backend.room_type.edit', compact('edit_data'));
    }
    /**
     *  view roomtype data
     */
    public function view($id)
    {
        $view_data = RoomType::findOrFail($id);
        return view('backend.room_type.view', compact('view_data'));
    }
    /**
     * update roomType data
     */
    public function updateData(Request $request, $id)
    {
        $validateData = $request->validate([
            'room_type_title'   => 'required',
            'room_type_details'   => 'required',
            'room_type_price'   => 'required',
        ]);


        $room_type_data = RoomType::findOrFail($id);

        $room_type_data->room_type_title = $request->room_type_title;
        $room_type_data->room_type_details = $request->room_type_details;
        $room_type_data->room_type_price = $request->room_type_price;
        $room_type_data->prepared_by = Auth::user()->name;
        $room_type_data->update();

        // image upload
        if($request->hasFile('images')){
            foreach($request->file('images') as $multi_img){
                $name_gen = hexdec(uniqid()).'.'.$multi_img -> getClientOriginalExtension();
                Image::make($multi_img)->resize(300,300)->save('upload/images/roomTypeImage/'.$name_gen);
                $save_img = 'upload/images/roomTypeImage/'.$name_gen;
    
                RoomTypeImage::create([
                    'room_type_id'   => $room_type_data->id,
                    'img_src'   => $save_img,
                    'img_alt'   => $request->room_type_title,
                ]);
            }
        }
        

        return redirect()->route('room.type')->with('success','Data updated successfully');
    }
    /**
     * room type data delete
     */
    public function deleteData($id)
    {
        $data = RoomType::findOrFail($id);
        foreach($data->roomTypeImages as $img){
            unlink($img->img_src);
        }
        
        RoomType::findOrFail($id)->delete();

        return redirect()->back()->with('success','Data Deleted successfully');
    }
    
    /**
     * delete room type image
     */
    public function deleteRoomTypeImage($id)
    {
        $data = RoomTypeImage::findOrFail($id);
        unlink($data->img_src);
        RoomTypeImage::findOrFail($id)->delete();
        return response()->json(['bool'=>true]);
        // return response()->json("data delted successful");
        // echo "data delted successful";
    }
}
