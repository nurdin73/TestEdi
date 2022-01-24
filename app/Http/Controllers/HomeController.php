<?php

namespace App\Http\Controllers;

use App\Models\BioData;
use Illuminate\Database\Eloquent\Builder;
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
        $biodata = BioData::select('*');
        $search = request()->search ?? "";
        if($search != "") {
            $biodata = $biodata->where('name', 'like', "%$search%")
                        ->orWhere('position', 'like', "%$search%")
                        ->orWhereHas('lastEducation', function(Builder $q) use($search) {
                            $q->where('name', 'like', "%$search%");
                        });
        }
        $data['biodata'] = $biodata->get();
        $data['search'] = $search;
        return view('admin', $data);
    }
}
