<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     *  show slider index page in backend
     */
    public function index()
    {
        $all_data = Slider::latest()->get();
        return view('backend.slider.index', compact('all_data'));
    }
    /**
     *  create slider form
     */
    public function create()
    {
        return view('backend.slider.create');
    }
    /**
     *  store slider data
     */
    public function store(Request $request)
    {
        $request->validate([
            'slider_image'  => 'required',
            'slider_title'  => 'required',
            'slider_short_desc' => 'required'
        ]);

        $sliderData = new Slider();

        //image file upload process
        $image = $request -> file('slider_image');
        $name_gen = hexdec(uniqid()).'.'.$image -> getClientOriginalExtension();
        Image::make($image) -> resize(1200,500) -> save('upload/images/slider/'.$name_gen);
        $save_url = 'upload/images/slider/'.$name_gen;

        $sliderData->slider_image = $save_url;
        $sliderData->slider_title = $request->slider_title;
        $sliderData->slider_short_desc = $request->slider_short_desc;
        $sliderData->save();
        return redirect()->route('backend.slider')->with('success', 'Slider Data Added Successful');
    }
    /**
     *  slider data edit
     */
    public function edit($id)
    {
        $edit_data = Slider::findOrFail($id);
        return view('backend.slider.edit', compact('edit_data'));
    }
    /**
     *  Update Slider data
     */
    public function update(Request $request, $id)
    {
       
        $new_slider_image = $request->file('new_slider_image');

        if($new_slider_image){

            $slider_data = Slider::findOrFail($id);

            $image = $request->file('new_slider_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,500)->save('upload/images/slider/'.$name_gen);
            $save_url = 'upload/images/slider/'.$name_gen;

            //delete old photo
            $old_image = $slider_data->slider_image;
            unlink($old_image);

            $slider_data->slider_image = $save_url;
            $slider_data->slider_title = $request->slider_title;
            $slider_data->slider_short_desc = $request->slider_short_desc;
            $slider_data->update();
            return redirect()->route('backend.slider')->with("success",'Data Updated Successful with Image');
        }else{
            $slider_data = Slider::findOrFail($id);

            $slider_data->slider_title = $request->slider_title;
            $slider_data->slider_short_desc = $request->slider_short_desc;
            $slider_data->update();
            return redirect()->route('backend.slider')->with("success",'Data Updated Successful');
        }
    }
    /****
     *  delete slider data with image
     */
    public function delete($id)
    {
        $slider_data = Slider::findOrFail($id);
        unlink($slider_data->slider_image);
        Slider::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Data Deleted Successful');
    }
}
