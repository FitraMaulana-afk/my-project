<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public string $contactView = 'landing.contact-me.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactView = $this->contactView;
        return \view($contactView . 'index');
    }

    public function sendEmail(Request $request)
    {
        $contactView = $this->contactView;
        $first_name = $request->input('first_name');
        $last_name = $request->input('last-name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $message = $request->input('message');

        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'phone' => $phone,
            'email' => $email,
            'message' => $message,
        ];

        Mail::to('maulanafitra1122@gmail.com')->send(new ContactEmail($data));
        return to_route($contactView . 'index');
    }
}
