<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomTypeImage;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * show frontend home page
     */
    public function index()
    {
        $room_data = Room::orderBy('id', 'desc')->take(3)->get();
        $services = Service::orderBy('id', 'desc')->take(4)->get();
        $gallery_data = RoomTypeImage::latest()->get();
        return view('frontend.index', compact('room_data', 'services','gallery_data'));
    }
    // show Room page in frontend
    public function showRoomPage()
    {
        $room_data = Room::all();
       return view('frontend.room.rooms', compact('room_data'));
    }
    
    public function detailsPageShow($id)
    {
        $single_room_data = Room::findOrFail($id);
        $related_data = Room::where('id','!=','$id')->orderBy('id', 'desc')->take(3)->get();
        return view('frontend.room.details', compact('single_room_data', 'related_data'));
    }




    
    /**
     *  show blog page in frontend
     */
    public function showBlogPage()
    {
        return view('frontend.blog.blog');
    }
    /**
     *  show Blog-Details page in frontend
     */
    public function showBlogDetailsPage()
    {
        return view('frontend.blog.blog_details');
    }
    /**
     *  show gallery page in frontend
     */
    public function showGalleryPage()
    {
        $gallery_data = RoomTypeImage::all();
        return view('frontend.gallery.gallery', compact('gallery_data'));
    }
    /**
     *  show contact page in frontend
     */
    public function showContactPage()
    {
        return view('frontend.contact.contact');
    }
    /**
     *  show login page
     */
    public function showLoginPage()
    {
       return view('backend.login');
    } 
    // /**
    //  *  show Register page
    //  */
    // public function showRegisterPage()
    // {
    //    return view('auth.register');
    // }
}

