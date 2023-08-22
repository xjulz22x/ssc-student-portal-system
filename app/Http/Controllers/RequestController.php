<?php

namespace App\Http\Controllers;
use App\Http\Requests\RequestDocument;
use App\Models\Document;
use App\Models\Requests;
use App\Models\DocumentUser;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentStudentRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Session;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requestlist()
    {

        $users = User::role('student')->has('documents','>', 0)->whereHas('documents',function($query){
            $query->where('status','0');
        })->get();
        
        // $req = Requests::orderBY('id', 'DESC')->where('status', '0')->get();
        return view('admin-request-list', compact( 'users'));
    }
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $count = 1;
        $pends = 1;
        $documents = Document::get();
        $req = Requests::orderBY('id', 'DESC')->get();
        return view('student-profile', compact('req', 'documents', 'user','count', 'pends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student-request');
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
            'name_request' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'student_number' => 'required',
            'purpose' => 'required',
            'qty_copy' => 'required',
            'price' => 'nullable',

        ]);

        $req = Requests::create([

            'name_request' => $request->name_request,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'student_number' => $request->student_number,
            'purpose' => $request->purpose,
            'qty_copy' => $request->qty_copy,

        ]);
        Alert::success('Success Title', 'Success Message');
        // return alert()->success('Request Successfully Sent!')->persistent('Close')->autoclose(3500);
        return redirect('/student-dashboard');
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
        $user = User::find($id);

//        $documents = DocumentUser::where('user_id', $id)->get();
//        if(!$documents){
//            $documents = ['No Pending Request'];
//        }
        return view('admin-request-action',compact( 'user'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestDocument $request)
    {
        $validated = $request->validated();

        foreach ($validated['documents'] as $docs){
            $documents = DocumentUser::find($docs);
            $documents->status = 1;
            $documents->save();
        }
        return redirect()->back()->with('message', 'Request has been done successfully');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Requests::findorfail($id)->delete();
        return redirect('/admin-request-list');
    }
}
