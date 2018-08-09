<?php

namespace App\Http\Controllers;
use App\Jobs;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
	//
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		//  $jobs = Jobs::latest()->paginate(10);

        $jobs = DB::table('job')->join('department', 'department.id', '=', 'job.dep_id')->select('job.*')->paginate(15);

		return view('jobs.index',compact('jobs'))
			->with('i', (request()->input('page', 1) - 1) * 5);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$jobs = [];
		$selectedJobs = Department::all();
		return view('jobs.create',compact('jobs','selectedJobs'));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		request()->validate([
			'name' => 'required',
			'description' => 'required',
			'dep_id' => 'required',
            'status'=> 'required',
		]);
		Jobs::create($request->all());
		return redirect()->route('jobs.index')
						->with('success','Jobs created successfully');
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Jobs $jobs)
	{
		return view('jobs.show',compact('jobs'));
	}

	public function displays($id){
		 $jobs = DB::table('job')->where('id', '=', $id)->get();
		 return view('jobs.show',compact('jobs'));
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Jobs $jobs)
	{
		$selectedJobs = Department::all();
		return view('jobs.edit',compact('jobs','selectedJobs'));
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request,Jobs $jobs)
	{
		request()->validate([
			'name' => 'required',
			'description' => 'required',
            'dep_id' => 'required',
            'status'=> 'required',
		]);
		$jobs->update($request->all());
		return redirect()->route('jobs.index')
						->with('success','Jobs updated successfully');
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{	
		Jobs::destroy($id);
		return redirect()->route('jobs.index')
						->with('success','Jobs deleted successfully');
	}


	public function applyjobs(){

        $jobs = DB::table('jobs')->where('jobs.status','==','open')->join('department', 'department.id', '=', 'jobs.dep_id')->select('jobs.*')->paginate(15);

        return view('jobs.applyjob',compact('jobs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

}
