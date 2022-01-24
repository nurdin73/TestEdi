<?php

namespace App\Http\Controllers;

use App\Models\BioData;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BioDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['url'] = route('biodata.store');
        return view('biodata.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bio = $request->only('position','name', 'no_ktp', 'ttl', 'gender', 'religion', 'blood', 'status', 'address_ktp', 'address', 'email', 'no_telp', 'close_person', 'can_work_all_company', 'expected_salary');
        $bio['can_work_all_company'] = $bio['can_work_all_company'] == 'true' ? true : false;
        $bio['user_id'] = Auth::id();
        $biodata = Biodata::where('user_id', Auth::id())->first();
        if(!$biodata) {
            $biodata = BioData::create($bio);
        } else {
            $biodata->update($bio);
        }
        if($biodata) {
            Education::where('bio_data_id', Auth::id())->delete();
            Training::where('bio_data_id', Auth::id())->delete();
            Experience::where('bio_data_id', Auth::id())->delete();
            for ($i=0; $i < count($request->level ?? []); $i++) { 
                $education = [
                    'level' => $request->input('level')[$i],
                    'name_institution' => $request->input('name_institution')[$i],
                    'major' => $request->input('major')[$i],
                    'date_graduate' => $request->input('date_graduate')[$i],
                    'grading' => $request->input('grading')[$i],
                    'bio_data_id' => $biodata->id
                ];
                $education = Education::create($education);
            }
            for ($i=0; $i < count($request->name_training ?? []); $i++) { 
                $training = [
                    'bio_data_id' => $biodata->id,
                    'name' => $request->input('name_training')[$i],
                    'cert' => $request->input('cert')[$i] == 'true' ? true : false,
                    'date' => $request->input('date')[$i]   
                ];
                $training = Training::create($training);
            }

            for ($i=0; $i < count($request->name_employer ?? []); $i++) { 
                $experience = [
                    'bio_data_id' => $biodata->id,
                    'name' => $request->input('name_employer')[$i],
                    'position' => $request->input('position')[$i],
                    'salary' => $request->input('salary')[$i],
                    'date' => $request->input('year')[$i],
                ];
                $experience = Experience::create($experience);
            }
        }
        return redirect('/home')->with('status', 'Entry biodata success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BioData  $bioData
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['biodata'] = BioData::with('educations', 'trainings', 'experiences')->find($id);
        return view('biodata.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BioData  $bioData
     * @return \Illuminate\Http\Response
     */
    public function edit(BioData $bioData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BioData  $bioData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BioData $bioData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BioData  $bioData
     * @return \Illuminate\Http\Response
     */
    public function destroy(BioData $bioData)
    {
        //
    }
}
