<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
		$users = User::latest()->paginate(10);
		return view('user.index',compact('users'))
			->with('i', (request()->input('page', 1) - 1) * 5);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{

		return view('user.create');
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
			'email' => 'required'
		]);
		User::create($request->all());
		return redirect()->route('user.index')
						->with('success','user created successfully');
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(user $user)
	{
		return view('user.show',compact('user'));
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(user $user)
	{

		return view('user.edit',compact('user'));
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request,user $user)
	{
		request()->validate([
			'name' => 'required',
			'email' => 'required',
		]);
		$user->update($request->all());
		return redirect()->route('user.index')
						->with('success','user updated successfully');
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
		return redirect()->route('user.index')
						->with('success','user deleted successfully');
	}
}
