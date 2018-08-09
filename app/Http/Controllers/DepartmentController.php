<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
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
	//
	public function index()
	{
		$departments = Department::latest()->paginate(10);
		return view('department.index',compact('departments'))
			->with('i', (request()->input('page', 1) - 1) * 5);
	}
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
		request()->validate([
			'name' => 'required',
			'description' => 'required',
		]);
		Department::create($request->all());
		return redirect()->route('department.index')
						->with('success','Department created successfully');
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Department $department)
	{
		return view('department.show',compact('department'));
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Department $department)
	{
		return view('department.edit',compact('department'));
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request,Department $Department)
	{
		request()->validate([
			'name' => 'required',
			'description' => 'required',
		]);
		$Department->update($request->all());
		return redirect()->route('department.index')
						->with('success','Department updated successfully');
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id){

		Department::destroy($id);
		return redirect()->route('department.index')
						->with('success','Department deleted successfully');
	}
}
