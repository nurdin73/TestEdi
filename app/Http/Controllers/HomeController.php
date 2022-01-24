<?php

namespace App\Http\Controllers;

use App\Models\BioData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $data['biodata'] = BioData::with('educations', 'trainings', 'experiences')->where('user_id', $userId)->first();
        return view('home', $data);
    }

    public function admin()
    {
        $data['biodata'] = BioData::all();
        return view('admin', $data);
    }
}
