<?php

namespace App\Http\Controllers;
use App\User;
use App\State;
use App\UserCriminalCase;
use Illuminate\Http\Request;
use Validator, Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('state', 'local_govt')->paginate(20);
        return view('user.index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create')->with(['states' => State::select('id', 'state')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'first_name'             => 'required',
            'last_name'             => 'required',
            'phone_number'             => 'required',
            'age'             => 'required',
            'gender'             => 'required',
            'state_id'             => 'required',
            'local_govt_id'             => 'required',
        ]);

    // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return Redirect::back()
                ->withErrors($validator);

        }

        $data['password'] = bcrypt(rand(0000,9999));
        if($request->has('image'))
        {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
  
            request()->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }
        if(self::save($data))
        {
            return redirect('user')->with('success', 'User data addedd successfully');
        }
        return $store;
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
        $store = User::create($data);
        return $store;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.show')->with(['user' => User::findOrFail($id), "cases" => UserCriminalCase::where('user_id', $id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.edit')->with(['user' => User::findOrFail($id), 'states' => State::all()]);
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
        $update = User::findOrFail($id);
        if(!empty($data['first_name'])){
            $update->first_name = $data['first_name'];
        }
        if(!empty($data['last_name'])){
            $update->last_name = $data['last_name'];
        }
        if(!empty($data['middle_name'])){
            $update->middle_name = $data['middle_name'];
        }
        if(!empty($data['gender'])){
            $update->gender = $data['gender'];
        }
        if(!empty($data['age'])){
            $update->age = $data['age'];
        }
        if(!empty($data['phone_number'])){
            $update->phone_number = $data['phone_number'];
        }
        if(!empty($data['state_id'])){
            $update->state_id = $data['state_id'];
        }
        if(!empty($data['local_govt_id'])){
            $update->local_govt_id = $data['local_govt_id'];
        }
        if(!empty($data['address'])){
            $update->address = $data['address'];
        }
        $update->save();
        return redirect('user')->with('success', 'User data updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::destroy($id))
        {
            return redirect('user')->with('success', 'User data Deleted successfully');
        }
    }
}
