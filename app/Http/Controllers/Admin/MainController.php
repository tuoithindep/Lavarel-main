<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Request;


class MainController extends Controller
{
    public function index()
    {
        return view('admin.home', [
            'title' => 'Quan tri Admin'
        ]);
    }
}
