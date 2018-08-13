<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;
use App\State;
use App\Subject;

use Auth;

class EmployeeEducationController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($emId)
    {
        // dd($emId);

        $subjects = DB::table('subjects')->get();

        $ssc = DB::table('employee_edu')->where('em_id', $emId)->where('edu_level', 'SSC')->first();
        $hsc = DB::table('employee_edu')->where('em_id', $emId)->where('edu_level', 'HSC')->first();
        $diploma = DB::table('employee_edu')->where('em_id', $emId)->where('edu_level', 'Diploma')->first();
        $graduation = DB::table('employee_edu')->where('em_id', $emId)->where('edu_level', 'Graduation')->first();
        $pgraduation = DB::table('employee_edu')->where('em_id', $emId)->where('edu_level', 'Post Graduation')->first();
        $data['ssc'] = $ssc;
        $data['hsc'] = $hsc;
        $data['diploma'] = $diploma;
        $data['graduation'] = $graduation;
        $data['pgraduation'] = $pgraduation;
        $data['emId'] = $emId;
        $data['subjects'] = $subjects;
        $data['active'] = 'active';
// dd($data);

        return view('system-mgmt/education/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('system-mgmt/city/create', ['states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $insertData = array(
            'edu_level' => $request->edu_level,
            'division' => $request->division,
            'passing_year' => $request->passing_year,
            'name_inst' => $request->name_inst,
            'subject' => $request->subject,
            'em_id' => $request->em_id,
            'created_by' => Auth::user()->id,
        );

        DB::table('employee_edu')->insert($insertData);

        // dd($insertData);
        

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $edu = DB::table('employee_edu')->where('id',$id)->first();
        
        // Redirect to city list if updating city wasn't existed
        if ($edu == null) {
            return redirect()->back();
        }
        $data['edu'] = $edu;
        // dd($data);
        return view('system-mgmt/education/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:60'
        ]);
        $input = [
            'name' => $request['name'],
            'state_id' => $request['state_id']
        ];
        City::where('id', $id)
        ->update($input);
        
        return redirect()->intended('system-management/city');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($eduId)
    {

        $edu = DB::table('employee_edu')->where('id', $eduId)->delete();
        return redirect()->back();
    }

    public function loadCities($stateId) {
        $cities = City::where('state_id', '=', $stateId)->get(['id', 'name']);

        return response()->json($cities);
    }

    /**
     * Search city from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'name' => $request['name']
        ];

        $cities = $this->doSearchingQuery($constraints);
        return view('system-mgmt/city/index', ['cities' => $cities, 'searchingVals' => $constraints]);
    }
    
    private function doSearchingQuery($constraints) {
        $query = City::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }
    private function validateInput($request) {
        $this->validate($request, [
            'name' => 'required|max:60|unique:city'
        ]);
    }
}
