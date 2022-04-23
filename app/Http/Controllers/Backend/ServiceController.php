<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     *  show service index page
     */
    public function index()
    {
        $all_data = Service::latest()->get();
        return view('backend.service.index', compact('all_data'));
    }
    /**
     *  show form data
     */
    public function create()
    {
        return view('backend.service.create');
    }
    /**
     * store service data
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_icon'  => 'required',
            'service_title'  => 'required',
            'service_desc'  => 'required',
        ]);

        $service = new Service();
        $service->service_icon = $request->service_icon;
        $service->service_title = $request->service_title;
        $service->service_desc = $request->service_desc;
        $service->save();
        return redirect()->route('backend.service')->with('success', 'New Service Added Successfully');
    }
    /**
     * edit service data
     */
    public function edit($id)
    {
        $edit_data = Service::findOrFail($id);
        return view('backend.service.edit', compact('edit_data'));
    }
    /**
     *  update service data
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'service_icon'  => 'required',
            'service_title'  => 'required',
            'service_desc'  => 'required',
        ]);

        $service = Service::findOrFail($id);
        $service->service_icon = $request->service_icon;
        $service->service_title = $request->service_title;
        $service->service_desc = $request->service_desc;
        $service->update();
        return redirect()->route('backend.service')->with('success', 'Service Data Updated Successfully');
    }
    /**
     *  delete service data
     */
    public function delete($id)
    {
        Service::findOrFail($id)->delete();
        return redirect()->back()->with('success','Data Deleted Successful');
    }
}
