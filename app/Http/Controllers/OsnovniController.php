<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class OsnovniController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data["menu"] = Menu::all();
    }
}
