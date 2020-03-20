<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\FlowRequest;
use App\Flow;
use App\Department;

class FlowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flows = Flow::with('department')->sortable()->paginate(\Config::get('constants.pagination_size'));
        
        return view('pages.flows.index',compact('flows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('pages.flows.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlowRequest $request)
    {
        $flow = new Flow();
        $flow->title = $request->input('title');
        $flow->department_id=$request->input('depautment');
        
        $flow->save();
        \Toastr::success('flow Created successfully', 'Success', []);

        return redirect()->route('flows.index');
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
        $flow = Flow::find($id);
        $departments = Department::all();
        return view('pages.flows.create',compact('flow','departments'));
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
        $flow = Flow::find($id);
        $flow->title = $request->input('title');
        $flow->department_id=$request->input('depautment');
        $flow->save();
        \Toastr::success('Flow Update successfully', 'Success', []);
        
        return redirect()->route('flows.index')
                        ->with('success','Point update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flow = Flow::find($id);

        $flow->delete();
        \Toastr::success('Flow Deleted successfully', 'Success', []);

        return redirect()->route('flows.index')
                        ->with('success','Flow deleted successfully');
    }
}
