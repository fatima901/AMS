<?php

namespace App\Http\Controllers;

use App\Department;
use App\Payslip;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
// use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PayslipController extends Controller
{
    public function __construct()
    {
//        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payslippages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('payslippages.create')->with(["departments" => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'basic_salary' => 'required|numeric',
            'total_salary' => 'required|numeric',
            'total_allowance' => 'required|numeric',
            'total_deduction' => 'required|numeric',
            'payslip_year' => 'required|integer',
            'payslip_month' => 'required',
            'slip_number' => 'required',
            'status' => 'required',
            'methodOfPayment' => 'required',
        ]);


        if (request()->ajax()) {
            if (Payslip::where('slip_number', '=', $request->input('slip_number'))->exists()) {

                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Payslip has already been generated for this user'
                    ]
                );
            } else {


                $payslip = new Payslip();

                $payslip->slip_number = $request->input('slip_number');
                $payslip->basic_salary = $request->input('basic_salary');
                $payslip->user_id = $request->input('user_id');
                $payslip->total_salary = $request->input('total_salary');
                $payslip->total_allowance = $request->input('total_allowance');
                $payslip->total_deduction = $request->input('total_deduction');
                $payslip->payslip_year = $request->input('payslip_year');
                $payslip->payslip_month = $request->input('payslip_month');
                $payslip->status = $request->input('status');
                $payslip->methodOfPayment = $request->input('methodOfPayment');
                $payslip->comment = $request->input('comment');

                $payslip->save();

                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Payslip  generated Successfully'
                    ]
                );
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $payslip = Payslip::with([
            'user' => function ($query) {
                return $query->select('id', 'employee_name', 'department_id', 'designation_id', 'email', 'phone_number')
                    ->with('account', 'allowances.users', 'deductions.users');
            },
            'user.department' => function ($query) {
                return  $query->select('id', 'department_name');
            },
            'user.designation' => function ($query) {
                return $query->select('id', 'designation_name');
            },

        ])->find($id);
        return view('payslippages.show', ['payslip' => $payslip]);
    }


    public function get_payslip_data($id)
    {

        $payslip = Payslip::with([
            'user' => function ($query) {
                return $query->select('id', 'employee_name', 'department_id', 'email', 'phone_number')
                    ->with('account', 'allowances.users', 'deductions.users');
            },
            'user.department' => function ($query) {
                return  $query->select('id', 'department_name');
            },
            'user.designation' => function ($query) {
                return $query->select('id', 'designation_name');
            },

        ])->find($id);
        // return $payslip;

        return view('payslippages.pdfview', ['payslip'=>$payslip]);
        // $pdf = PDF::loadView('payslippages.pdfview', ['payslip'=>$payslip]);
        // return $pdf->download('invoice.pdf');
        // return $pdf->stream();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function load_payslips(Request $request)
    {
        $this->validate($request, [
            'payslip_year' => 'required|integer',
            'payslip_month' => 'required'
        ]);


        if (request()->ajax()) {
            if (!empty($request->payslip_year && $request->payslip_month)) {
                $data = Payslip::with('user')
                    ->select(
                        'id',
                        'user_id',
                        'basic_salary',
                        'payslip_year',
                        'payslip_month',
                        'status',
                        'basic_salary',
                        'total_salary',
                        'total_allowance',
                        'total_deduction'
                    )
                    ->where('payslip_year', array($request->payslip_year))
                    ->where('payslip_month', array($request->payslip_month));
                if (Auth::user()->role == 'employee'){
                    $data->where('user_id',Auth::id());
                }
                    $data->get();
            } else {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Payslip not found'
                    ]
                );
            }
            return  DataTables::of($data)->make(true);
        }
    }
}
