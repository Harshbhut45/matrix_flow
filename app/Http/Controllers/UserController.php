<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use DB;
use DataTable;
use Image;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     * 
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        $users = User::sortable();
        
        if($request->filter_gender != null){
            $users= $users->where('gender', $request->filter_gender);
        }
        $users= $users->paginate(\Config::get('constants.pagination_size'));
       
        
        return view('pages.users.index',compact('users'));
       
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $statuses = ['Pending', 'Active', 'Inactive'];
        return view('pages.users.create', compact('users', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->status=$request->input('status');
        $user->gender=$request->input('gender');
        $user->save();

         if($request->hasfile('profile') != null)
        {
            $file = $request->file('profile');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.' .$extension;
            $user->profile = $filename;
            
            $data = $request->profile_picture;
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);

            $public_storage_path = 'app/public/';
            $path = 'users/' . $user->id . '/';
            $app_path = storage_path($public_storage_path . $path);
            if (!file_exists($app_path)) {
                \File::makeDirectory($app_path, 0777, true);
            }
            // $file->move($app_path, $filename);
            file_put_contents($app_path.$filename, $data);
        }
   
        $user->update();
        return redirect()->route('users.index');
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
        $statuses = ['Pending', 'Active', 'Inactive'];
        return view('pages.users.create',compact('user', 'statuses'));
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
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->hasfile('profile') != null)
        {
            $file = $request->file('profile');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.' .$extension;
            $user->profile = $filename;
            
            $data = $request->profile_picture;
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);

            $public_storage_path = 'app/public/';
            $path = 'users/' . $user->id . '/';
            $app_path = storage_path($public_storage_path . $path);
            if (!file_exists($app_path)) {
                \File::makeDirectory($app_path, 0777, true);
            }
            
            // $file->move($app_path, $filename);
            file_put_contents($app_path.$filename, $data);
             \Toastr::success('User Created successfully', 'Success', []);
            
        }
        
        $user->status = $request->input('status');
        $user->gender = $request->input('gender');
        $user->save();
        
        return redirect()->route('users.index')
                        ->with('success','User update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
    
        $user->delete();
        \Toastr::success('User Deleted successfully', 'Success', []);

        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
