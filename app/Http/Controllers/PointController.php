<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PointRequest;
use App\Point;
use App\Flow;



class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $points = Point::with('flow')->sortable()->paginate(\Config::get('constants.pagination_size'));
        
        return view('pages.points.index',compact('points'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flows = Flow::all();
        return view('pages.points.create', compact('flows'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PointRequest $request)
    {
        
        $point = new Point();
        $point->content = $request->input('content');
        $point->version=$request->input('version');
        $point->flow_id=$request->input('flow');
        
        $point->save();
        \Toastr::success('Point Created successfully', 'Success', []);

        return redirect()->route('points.index');
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
        $point = Point::find($id);
        $flows = Flow::all();
        return view('pages.points.create',compact('point', 'flows'));
        
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
        $point = Point::find($id);
        $point->content = $request->input('content');
        $point->version=$request->input('version');
        $point->flow_id=$request->input('flow');
        $point->update();
        \Toastr::success('Point Update successfully', 'Success', []);
        
        return redirect()->route('points.index')
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
        $point = Point::find($id);

        $point->delete();
        \Toastr::success('Point Deleted successfully', 'Success', []);

        return redirect()->route('points.index')
                        ->with('success','Point deleted successfully');
    }
}
