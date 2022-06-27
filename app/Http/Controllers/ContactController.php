<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends OsnovniController
{
    public function index(){
        return view('pages.main.contact', $this->data);
    }
}
