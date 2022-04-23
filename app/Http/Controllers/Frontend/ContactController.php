<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     *  show all data in index
     */
    public function index()
    {
        $contact_data =Contact::latest()->get();
        return view('backend.contact.index', compact('contact_data'));
    }
    /**
     *  contact store
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();

        $contact->full_name = $request->full_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success','Message Sent Successfully');
    }
    /**
     *  view contact data
     */
    public function viewContactData($id)
    {
        $single_view_data = Contact::findOrFail($id);
       return view('backend.contact.view', compact('single_view_data'));
    }
    /**
     *  edit data 
     */
    public function editContactData($id)
    {
        $edit_data = Contact::findOrFail($id);
        return view('backend.contact.edit', compact('edit_data'));
    }
    /**
     *  update contact data
     */
    public function updateContactData(Request $request, $id)
    {
        $request->validate([
            'status'    => 'required',
        ]);

        $contact = Contact::find($id);
        $contact->status = $request->status;
        $contact->update();
        return redirect()->route('contact')->with('success', 'Status Updated Successful');
    }
    /**
     *  delete contact specfic data
     */
    public function deleteContactData($id)
    {
        Contact::find($id)->delete();
        return redirect()->back()->with('success', 'Data Deleted Successful');
    }
}
