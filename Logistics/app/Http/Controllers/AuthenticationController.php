<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use App\Clients;
use Hash;
use Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\PurchasingGroup;
use App\PurchaseGroupSupplierMap;
use App\User;
use App\UserLogin;
use DB;
use App\PuHead;
use Config;
use App\LtrpmLevel;
use App\Buyer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AuthenticationController extends Controller
{

    public function login(Request $request){
        $view_data = array();
        return view('login', compact($view_data));
    }

    public function module(){
        $inputs = Input::all();
        if($inputs && isset($inputs['email']) && isset($inputs['password'])){
           // if (Auth::attempt(array('email' => $inputs['email'], 'password' => $inputs['password']))) {
             $userData = DB::table('users')
                          ->where('email','=',$inputs['email'])
                          ->get();
                    if(count($userData) != 0){
                       $userData=$userData[0];
                   }else{
                       Session::flash('message', 'Invalid User.');
                   }
                    
                    Session::put('userId', $userData->id);
                    Session::put('user_name', $userData->user_name);
                    Session::put('email', $userData->email);
                    Session::put('password', $userData->password);
            // }
                

            $users = DB::table('users')
                         ->where('email','=',$inputs['email'])
                         ->get();
               if(count($users) !=0){
                if($inputs['password'] == $users[0]->password){
                     return Response::json(array("status"=>"success"));
                }
                else {
                     return Response::json(array("status"=>"failed"));
                }
               } else if(count($users) == 0){
                return Response::json(array("status"=>"validation"));
               }
                
        }
          
    }
    
    public function modulePage() {
        $view_data = array();
        return view('module', compact($view_data));   
    }

    public function subjectsPage() {
        $view_data = array();
        return view('subjects', compact($view_data));   
    }

    public function sample(){
        return Response::json(array('status' => 'success', 'data' => ''));
    }
    
    public function samplePage() {
        $view_data = array();
        return view('sample', compact($view_data));   
    }

    public function concept(){
        return Response::json(array('status' => 'success', 'data' => ''));
    }
    
    public function conceptPage() {
        $view_data = array();
        return view('concept', compact($view_data));   
    }

     public function timer(){
        return Response::json(array('status' => 'success', 'data' => ''));
    }
    
    public function timerPage() {
        $view_data = array();
        return view('timer', compact($view_data));   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
    public function destroy($id)
    {
        //
    }

}
