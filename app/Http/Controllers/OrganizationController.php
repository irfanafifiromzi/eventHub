<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('login');
    }

    public function index()
    {
        return view('organization');
    }
}
