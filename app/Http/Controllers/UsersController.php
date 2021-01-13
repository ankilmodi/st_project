<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Storage;


class UsersController extends Controller
{
    /**
    * auth construct
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
             $users = User::latest()->paginate(10);
            return view('user.index_user',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
        } catch (Exception $e) {
            return false;
        }

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {   
            return view('user.create_user'); 
        } catch (Exception $e) {
            return false;
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      

         $this->validate($request, array(
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|numeric'
        ));

        try {   

             User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile
            ]);

            return redirect('/users')->with('message', 'User Added Successfully!');

        } catch (Exception $e) {
            return false;
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = User::where('id', $id)->first();
            return view('user.show_user', compact('user'));
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::where('id', $id)->first();
            return view('user.edit_user', compact('user'));
        } catch (Exception $e) {
            return false;
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric'
        ));

         try {

            $user = User::where('id',$id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->save();

            return redirect('/users')->with('message', 'Successfully User Updated!');

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    
        try {
            User::find($id)->delete();
            return redirect('/users')->with('message', 'Successfully User Delete!');
        } catch (Exception $e) {
            return false;
        }
    }

}