<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->only('fullname', 'email', 'message'));
        session()->flash('msg', 'Message send successfully!');
        return redirect('/contact');
    }
}
