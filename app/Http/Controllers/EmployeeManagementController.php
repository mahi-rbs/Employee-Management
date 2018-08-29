<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\Employee;
use App\City;
use App\Work_place;

use App\Designation;
use App\Division;

use Auth;

class EmployeeManagementController extends Controller
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
    public function index(Request $request, $designation=NULL)
    {
      if($request->designation != null){

        // dd($designation);
        $employees = DB::table('employees')
        ->leftJoin('designation', 'employees.designation', '=', 'designation.id')
        ->leftJoin('work_place', 'employees.work_place', '=', 'work_place.id')
        ->select('employees.*', 'designation.name as designation_name', 'designation.id as designation_id', 'work_place.name as work_place')
        ->where('designation.id', $request->designation)
        ->paginate(10);
    }else{
        $employees = DB::table('employees')
        ->leftJoin('designation', 'employees.designation', '=', 'designation.id')
        ->leftJoin('work_place', 'employees.work_place', '=', 'work_place.id')
        ->select('employees.*', 'designation.name as designation_name', 'designation.id as designation_id', 'work_place.name as work_place')
        ->paginate(10);
    }


    $active = 'active';
    $designations = Designation::all();


    return view('employees-mgmt/index', ['employees' => $employees, 'active' => $active, 'designations' => $designations ]);
}
public function employeeList(Request $request, $designation=NULL){

    dd($request->designation);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $wps = Work_place::all();

        // $countries = Country::all();
        $designations = Designation::all();
        $divisions = Division::all();
        $active = 'active';
        return view('employees-mgmt/create', ['designations' => $designations, 'divisions' => $divisions, 'wps'=> $wps, 'active' => $active]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        // dd($request);
        $this->validateInput($request);
        // Upload image
       // dd($request);
        $path = $request->file('picture')->store('avatars');

        $keys = ['name', 'name_bangla', 'father', 'mother', 'pre_address', 'per_address', 'mobile', 'nid', 'designation', 'work_place', 'past_work_place', 'computer_skill', 'email', 'dob', 'date_hired', 'date_resigne'];
        $input = $this->createQueryInput($keys, $request);


        if(!empty($request->file('picture'))){
            $image = $request->file('picture');
            $base_name = preg_replace('/\..+$/', '', $image->getClientOriginalName());
            $base_name = explode(' ', $base_name);
            $base_name = implode('-', $base_name);
            $image_name = $base_name."-".uniqid().".".$image->getClientOriginalExtension();
            $file_path = '../avatars/';
            $image->move($file_path, $image_name);

            $input['picture'] = $image_name;
        }

        $input['status'] = '1';
        $input['user_id'] = Auth::user()->id;

        Employee::create($input);

        return redirect()->intended('/employee-management');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // $employee = Employee::find($id);


       $employee = DB::table('employees')
       ->where('employees.id', $id)
       ->join('work_place', 'employees.work_place', '=', 'work_place.id')
       ->join('designation', 'employees.designation', '=', 'designation.id')
       ->select('employees.*', 'work_place.name as work_place', 'designation.name as designation_name')
       ->first();
       $active = 'active';
      // dd($employee);
       if ($employee == null) {
        return redirect()->intended('/employee-management');
    }
    $edu_info = DB::table('employee_edu')->where('em_id', $employee->id)->get();


        // $work_place = DB::table('state')->where('id', $employee->work_place)->first();


    return view('employees-mgmt/show', ['employee' => $employee,'edu_info' => $edu_info, 'active' => 'active']);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        // Redirect to state list if updating state wasn't existed
        
        if ($employee == null) {
            return redirect()->intended('/employee-management');
        }
        $active = 'active';

        $wps = Work_place::all();
        $designations = Designation::all();

        return view('employees-mgmt/edit', ['employee' => $employee, 'wps' => $wps, 'designations' => $designations, 'active' => $active]);
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
        $employee = Employee::findOrFail($id);
        $this->validateInput($request);
        // Upload image
        $keys = ['name', 'name_bangla', 'father', 'mother', 'pre_address', 'per_address', 'mobile', 'nid', 'department', 'designation', 'work_place', 'date_hired','past_work_place','date_resigne', 'computer_skill', 'email', 'dob'];

        $input = $this->createQueryInput($keys, $request);
        if(!empty($request->file('picture'))){
            $image = $request->file('picture');
            $base_name = preg_replace('/\..+$/', '', $image->getClientOriginalName());
            $base_name = explode(' ', $base_name);
            $base_name = implode('-', $base_name);
            $image_name = $base_name."-".uniqid().".".$image->getClientOriginalExtension();
            $file_path = '../avatars/';
            $image->move($file_path, $image_name);

            $input['picture'] = $image_name;
        }

        Employee::where('id', $id)
        ->update($input);

        return redirect()->intended('/employee-management');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $edu_qu =  DB::table('employee_edu')->where('em_id', $id)->get();
      if($edu_qu){
        DB::table('employee_edu')->where('em_id', $id)->delete();
    }
    Employee::where('id', $id)->delete();
    return redirect()->intended('/employee-management');
}

    /**
     * Search state from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'firstname' => $request['firstname'],
            'department.name' => $request['department_name']
        ];
        $employees = $this->doSearchingQuery($constraints);
        $constraints['department_name'] = $request['department_name'];
        return view('employees-mgmt/index', ['employees' => $employees, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = DB::table('employees')
        ->leftJoin('city', 'employees.city_id', '=', 'city.id')
        ->leftJoin('department', 'employees.department_id', '=', 'department.id')
        ->leftJoin('state', 'employees.state_id', '=', 'state.id')
        
        ->leftJoin('division', 'employees.division_id', '=', 'division.id')
        ->select('employees.firstname as employee_name', 'employees.*','department.name as department_name', 'department.id as department_id', 'division.name as division_name', 'division.id as division_id');
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where($fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }

     /**
     * Load image resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
     public function load($name) {
       $path = storage_path().'/app/avatars/'.$name;
       if (file_exists($path)) {
        return Response::download($path);
    }
}

private function validateInput($request) {
    $this->validate($request, [
        'name' => 'required|max:60',
        'name_bangla' => 'required|max:60',
        'father' => 'required|max:60',
        'mother' => 'required|max:60',
        'pre_address' => 'required|max:120',
        'per_address' => 'required|max:120',
        'mobile' => 'required',
        'nid' => 'required',
        'designation' => 'required',
        'work_place' => 'required',
        'date_hired' => 'required',
        'past_work_place' => 'required',
        'date_resigne' => 'required',
        'computer_skill' => 'required',
        'email' => 'required',
        'dob' => 'required',
    ]);
}

private function createQueryInput($keys, $request) {
    $queryInput = [];
    for($i = 0; $i < sizeof($keys); $i++) {
        $key = $keys[$i];
        $queryInput[$key] = $request[$key];
    }

    return $queryInput;
}

public static function getPastWorkPlace($wpId){
    $pastWp = Work_place::find($wpId);

    return $pastWp;
}
}
