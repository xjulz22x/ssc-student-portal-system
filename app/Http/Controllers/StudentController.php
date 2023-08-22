<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\User;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Session;
use RealRashid\SweetAlert\Facades\Alert;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function studentlist(){
        $students = User::role('student')->get();
        return view('admin-student-list', compact('students'));
    }

    public function stafflist(){
        $staffs = User::role('ssc-staff')->get();
        return view('admin-staff-list', compact('staffs'));
    }
    
    public function index()
    {
        return view('admin-add-student');
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
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'course' => ['required', 'string', 'max:255'],
            'status'=> ['required'],
            'student_id' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

             User::create([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'middle_name' => $request['middle_name'],
                'course' => $request['course'],
                'status' => $request['status'],
                'student_id' => $request['student_id'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ])->assignRole('student');

         Alert::success('Success', 'Successfully Added Student!');
        return redirect('/admin-add-student');

    }


    public function storeStaff(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'course' => ['required', 'string', 'max:255'],
            'role_id'=> ['nullable'],
            'student_id' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

         User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'middle_name' => $request['middle_name'],
            'course' => $request['course'],
            'student_id' => $request['student_id'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ])->assignRole('ssc-staff');

        return redirect('/admin-add/store')->with('message', 'Successfully Added Staff!');

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
    
    public function destroyStaff(Request $request)
    {
        $user = User::findorfail($request->id);
        $user->delete();
        Alert::error('Deleted', 'Deleted Successfully');
        return redirect()->back()->with('message', 'Deleted Successfully');
    }

    public function destroyStudent(Request $request)
    {
        $user = User::findorfail($request->id);
        $user->delete();
        Alert::error('Deleted', 'Deleted Successfully');
        return redirect()->back()->with('message', 'Deleted Successfully');
    }


}
