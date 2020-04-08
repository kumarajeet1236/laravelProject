<?php

namespace App\Http\Controllers;

use App\Department;
use Session;
use DB;
use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\City;

class DepartmentController extends Controller
{
    //  public function __construct()
    // {
    //     $this->middleware('auth');
    // }
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('department.index', ['departments'=>Department::paginate(5)]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
			'name' => 'required'
		]);
		
		$department = new Department;
		$department->name = $request->name;
		$department->slug = str_slug($request->name);
		$department->save();
		
		Session::flash('success', 'department created');
		return redirect()->route('departments.index');
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('department.show', ['department'=>Department::where('slug',$slug)->first()]);
    }
   /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         return view('department.edit', ['department'=>Department::findOrFail($id)]);
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
		$department = Department::findOrFail($id);
		
        $this->validate($request,[
			'name' => 'required'
		]);
		
		$department->name = $request->name;
		$department->slug = str_slug($request->name);
		$department->save();
		
		Session::flash('success', 'department updated');
		return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $department=Department::find($id);
		
		foreach($department->roles as $role){
			$role->delete();			
		}
		
		$department->delete();
		
		Session::flash('success', 'department deleted');
		return redirect()->route('departments.index');
    }

    // public function dependency()
    // {
    //     $countries = DB::table("countries")->pluck("name","id");
    //     return view('dropdown',compact('countries'));
    //     // $countries = Country::select('*')->get()->toarray();
    //     // return view('dropdown',compact('countries'));
    // }

    // public function statelist(Request $request)
    // {
    //     $state = DB::table("states")
    //     ->where('country_id',$request->country_id)
    //     ->pluck("name","id");
    //     return responce()->json($states);
    // }

    // public function citylist(Request $request)
    // {
    //     $city = DB::table("cities")
    //     ->where('state_id',$request->state_id)
    //     ->pluck("name","id");
    //     return responce()->json($city);
    // }

        public function index()
        {
            $countries = DB::table("countries")->pluck("name","id");
            return view('dropdown',compact('countries'));
        }

        public function getStateList(Request $request)
        {
            $states = DB::table("states")
            ->where("country_id",$request->country_id)
            ->pluck("name","id");
            return response()->json($states);
        }

        public function getCityList(Request $request)
        {
            $cities = DB::table("cities")
            ->where("state_id",$request->state_id)
            ->pluck("name","id");
            return response()->json($cities);
        }

        
        public  function dependency(Request $request)
        {
            $countries = Country::select('*')->pluck('country','first_name','last_name');
            if($request->isMethod('post'))
            {
                $data = $request->except('_token');
                $insert = Country::insert($data);
                if($insert)
                {
                   return redirect('dependency/listing');
                }
                else
                {
                    echo "no";
                }
            }
            return view('dropdown',compact('countries'));
        }

        public function listing(Request $request)
        {
            $userData = Country::select('*')->get()->toarray();

            return view('role.dropdownListing',compact('userData'));
        }

        public function delete1(Request $request,$id)
        {
            $country = Country::find($id);
            $country->delete();
        }
        

}
