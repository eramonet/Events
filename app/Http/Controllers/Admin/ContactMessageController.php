<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactMessageController extends Controller
{
    public function index()
    {
        $contact_messages = ContactMessage::latest()->get();

        return view('admin.contactMessages.index' , compact('contact_messages'));
    }

    public function destroy(Request $request , $id)
    {
        $message = ContactMessage::find($id)->delete();

        if ($message) {
            $request->session()->flash('success', 'Message Deleted SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect('acp/contact-messages') ;
    }

    public function show(Request $request, $id)
    {

        $contact_message=ContactMessage::find($id);

        if (!$contact_message) {
            $request->session()->flash('failed', 'Message Not Found');
            return redirect()->back();
        }
        $contact_message->update(['seen'=>'1']);

        return \view('admin.contactMessages.show', \compact('contact_message'));
    }
}
