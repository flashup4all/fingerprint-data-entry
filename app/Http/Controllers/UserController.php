<?php

namespace App\Http\Controllers;
use App\User;
use App\State;
use Illuminate\Http\Request;

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
        $data['password'] = bcrypt(rand(0000,9999));
        
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
        return view('user.show')->with(['user' => User::findOrFail($id)]);
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
        if(!empty($data['name'])){
            $update->name = $data['name'];
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
