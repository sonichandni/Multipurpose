<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\City;
use App\Employee;

class CitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getEmp($id)
    {
        $employees = Employee::where('city_id',$id)->get();
        /*$employees = DB::table("employees")
                    ->where("city_id",$id);
        /*$employees = array(
            "adc"=>"sdc"
        );*/
        //echo json_encode($employees);
        //print_r($employees);
        return json_encode($employees);

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
         $data = [
            'countries' => $countries,
            'states' => $states,
            'cities' => $cities,
        ];
        //$city = City::where('state_id','1')->get();
        return view('csc.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $states = DB::table("cities")
                    ->where("state_id",$id)
                    ->pluck("city_name","city_id");
        return response()->json($states);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
      /*
    public function getState(Request $request)
    {
        echo "hi";exit();
        /*$states = State::where('country_id',$id)->get();
        return $states;
        $states = DB::table("states")
                    ->where("country_id",$request->country_id)
                    ->lists("state_name","state_id");
        return response()->json($states);
    }
    public function getCityList(Request $request)
    {
        $cities = DB::table("cities")
                    ->where("state_id",$request->sid)
                    ->lists("state_name","state_id");
        return response()->json($cities);
    }*/
}
