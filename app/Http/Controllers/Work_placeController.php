<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Work_place;


class Work_placeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(["index", "create", "store", "edit", "update", "search", "destroy"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $wps = DB::table('work_place')->paginate(5);

        return view('system-mgmt/work_place/index', ['wps' => $wps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        return view('system-mgmt/work_place/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validateInput($request);
         Work_place::create([
            'name' => $request['name'],
            
        ]);

        return redirect()->intended('system-management/work_place');
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
        $wp = Work_place::find($id);
        // Redirect to state list if updating state wasn't existed
        if ($wp == null ) {
            return redirect()->intended('/system-management/work_place');
        }

       
        return view('system-mgmt/work_place/edit', ['wp' => $wp]);
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
        $state = Work_place::findOrFail($id);
         $this->validate($request, [
        'name' => 'required|max:60'
        ]);
        $input = [
            'name' => $request['name'],
           ];
        Work_place::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/work_place');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Work_place::where('id', $id)->delete();
         return redirect()->intended('system-management/work_place');
    }

    public function loadStates($countryId) {
        $states = State::where('country_id', '=', $countryId)->get(['id', 'name']);

        return response()->json($states);
    }
    
    /**
     * Search state from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'name' => $request['name']
            ];

       $wps = $this->doSearchingQuery($constraints);
       return view('system-mgmt/work_place/index', ['wps' => $wps, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = Work_place::query();
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
        'name' => 'required|max:60|unique:work_place'
    ]);
    }
}
