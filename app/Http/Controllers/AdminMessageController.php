<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AdminMessageController extends Controller
{
    public function index()
    {
        $messages = Contact::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.message', compact('messages'));
    }

    public function destroy($id)
    {
        $message = Contact::findOrFail($id);
        $message->delete();
        session()->flash('msg', 'Message deleted');
        return redirect('/admin/messages');
    }
}
