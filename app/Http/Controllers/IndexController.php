<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function mail()
    {
        $contact = new \stdClass();
        $contact->name = 'Name Testovich';

        Mail::to('bondarenko.v3@gmail.com')->send(new ContactMail($contact));
    }
}
