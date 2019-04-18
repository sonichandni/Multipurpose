<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\City;
use App\Employee;
use DB;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $employees =  Employee::orderBy('emp_name')->paginate(5);
        $data = [
            'countries' => $countries,
            'employees' => $employees,
            'states' => $states,
            'cities' => $cities,
        ];
        return view('emp.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('emp.create')->with('countries',$countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emp = new Employee;
        $emp->emp_name = $request->input('emp_name');
        $emp->country_id = $request->input('country');
        $emp->state_id = $request->input('state');
        $emp->city_id = $request->input('city');
        $emp->save();
        echo "suc";
        //return $post;
    
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
        $emp = Employee::find($id);
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $data = [
            'countries' => $countries,
            'states' =>$states,
            'cities' => $cities,
            'emp' => $emp
        ];
        return view('emp.edit')->with($data);
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
        $emp = Employee::find($id);
        $emp->emp_name = $request->input('emp_name');
        $emp->country_id = $request->input('country');
        $emp->state_id = $request->input('state');
        $emp->city_id = $request->input('city');
        $emp->save();
        echo "suc";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Employee::find($id);
        $emp->delete();
        echo "suc";
    }
}
