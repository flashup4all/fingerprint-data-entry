<?php

namespace App\Http\Controllers;

use App\User;
use App\State;
use App\UserCriminalCase;
use Illuminate\Http\Request;
use Validator, Redirect;

class UserCriminalCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('state', 'local_govt')->paginate(20);
        return view('case.index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $user_id)
    {

        return view('case.create')->with(['user' => User::findOrFail($user_id) ,'states' => State::select('id', 'state')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $user_id)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'title'             => 'required',
            'description'             => 'required',
            'state_id'             => 'required',
            'local_govt_id'             => 'required',
            'type'             => 'required',
        ]);

    // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return Redirect::back()
                ->withErrors($validator);

        }
        $data['user_id'] = $user_id;
        if(self::save($data))
        {
            return redirect('user/'.$user_id)->with('success', 'Criminal case data added successfully');
        }
        return;
    }

    /**
     * save a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @author Ahead!!
     */
    public static function save($data)
    {
        $store = UserCriminalCase::create($data);
        return $store;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id, $id)
    {
        return view('case.show')->with(['user' => User::findOrFail($user_id), "case" => UserCriminalCase::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id, $id)
    {
        return view('case.edit')->with(['user' => User::findOrFail($id), 'case' => UserCriminalCase::findOrFail($id),'states' => State::all()]);
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
        $data = $request->all();
        $update = UserCriminalCase::findOrFail($id);
        
        if(!empty($data['state_id'])){
            $update->state_id = $data['state_id'];
        }
        if(!empty($data['local_govt_id'])){
            $update->local_govt_id = $data['local_govt_id'];
        }
        if(!empty($data['title'])){
            $update->title = $data['title'];
        }
        if(!empty($data['type'])){
            $update->type = $data['type'];
        }
        if(!empty($data['description'])){
            $update->description = $data['description'];
        }
        $update->save();
        return redirect('user/'.$update->user_id)->with('success', 'User criminal data updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(UserCriminalCase::destroy($id))
        {
            return redirect()->back()->with('success', 'User data Deleted successfully');
        }
    }
}
