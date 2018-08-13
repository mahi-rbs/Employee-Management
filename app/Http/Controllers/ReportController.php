<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Excel;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class ReportController extends Controller
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

    public function index() {
        $designations = DB::table('designation')->get();
        date_default_timezone_set('asia/dhaka');
        // date_default_timezone_set('asia/ho_chi_minh');
        $format = 'Y/m/d';
        $now = date($format);
        $to = date($format, strtotime("+30 days"));
        $constraints = [
            'from' => $now,
            'to' => $to
        ];

        $employees = $this->getHiredEmployees($constraints);
        return view('system-mgmt/report/index', ['employees' => $employees, 'searchingVals' => $constraints, 'designations' => $designations, 'designationId' => '-1']);
    }

    public function reportBbydesignation(Request $request){

         $designations = DB::table('designation')->get();
       $format = 'Y/m/d';
        $now = date($format);
        $to = date($format, strtotime("+30 days"));
        $constraints = [
            'from' => $now,
            'to' => $to
        ];
        $designationId = $request->serchByDesignation;
  
        $employees = DB::table('employees')->where('designation', $request->serchByDesignation)->get();
        return view('system-mgmt/report/index', ['employees' => $employees, 'searchingVals' => $constraints, 'designations' => $designations, 'designationId' => $designationId]);
    }

    public function exportExcel(Request $request) {

        $this->prepareExportingData($request)->export('xlsx');
        redirect()->intended('system-management/report');
    }

    public function exportPDF(Request $request) {
         $constraints = [
            'from' => $request['from'],
            'to' => $request['to']
        ];
        $employees = $this->getExportingData($constraints);
        $pdf = PDF::loadView('system-mgmt/report/pdf', ['employees' => $employees, 'searchingVals' => $constraints]);
        return $pdf->download('report_from_'. $request['from'].'_to_'.$request['to'].'.pdf');
        // return view('system-mgmt/report/pdf', ['employees' => $employees, 'searchingVals' => $constraints]);
    }
    
    private function prepareExportingData($request) {

        $author = Auth::user()->name;
       
        $employees = $this->getExportingData(['from'=> $request['from'], 'to' => $request['to']]);
         // dd($employees);
        return Excel::create('report_from_'. $request['from'].'_to_'.$request['to'], function($excel) use($employees, $request, $author) {

        // Set the title
        $excel->setTitle('List of hired employees from '. $request['from'].' to '. $request['to']);

        // Chain the setters
        $excel->setCreator($author)
            ->setCompany('HoaDang');

        // Call them separately
        $excel->setDescription('The list of hired employees');

        $excel->sheet('Hired_Employees', function($sheet) use($employees) {

        $sheet->fromArray($employees);
            });
        });
    }

    public function search(Request $request) {
        $constraints = [
            'from' => $request['from'],
            'to' => $request['to']
        ];

        $employees = $this->getHiredEmployees($constraints);
        return view('system-mgmt/report/index', ['employees' => $employees, 'searchingVals' => $constraints]);
    }

    private function getHiredEmployees($constraints) {
        $employees = Employee::where('date_hired', '>=', $constraints['from'])
                        ->where('date_hired', '<=', $constraints['to'])
                        ->get();
                        // dd($employees);
        return $employees;
    }

    private function getExportingData($constraints) {
        return DB::table('employees')
       ->leftJoin('designation', 'employees.designation', '=', 'designation.id')
        ->leftJoin('work_place as wp', 'employees.work_place', '=', 'wp.id')
        ->leftJoin('work_place as pwp', 'employees.past_work_place', '=', 'pwp.id')
        ->select('employees.name','employees.name_bangla', 'designation.name as designation_name', 'employees.mobile', 'employees.nid', 'employees.father','employees.mother', 'employees.dob', 'employees.pre_address', 'per_address', 'wp.name as work_place_name', 'employees.date_hired', 'pwp.name as past_work_place_name', 'employees.date_resigne', 'employees.computer_skill', 'employees.email')
        ->where('date_hired', '>=', $constraints['from'])
        ->where('date_hired', '<=', $constraints['to'])
        ->get()
         ->map(function ($item, $key) {
        return (array) $item;
        })
        ->all();

        }
}
