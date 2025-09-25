<?php

namespace App\Http\Controllers;

use App\Models\CognitoUser;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard');
    }

    
}
