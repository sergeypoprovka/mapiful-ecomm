<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::paginate(20);
        return view('admin.users.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
            'firstname'=>'nullable|string',
            'lastname'=>'nullable|string',
            'middlename'=>'nullable|string',
            'address_1'=>'nullable|string',
            'address_2'=>'nullable|string',
            'phone'=>'nullable|string',
            'country'=>'nullable|integer',
            'state'=>'nullable|integer',
            'city'=>'nullable|integer',
            'postcode'=>'nullable|string',
            'phone'=>'nullable|string',
        ]);

        $user = User::create([
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        if($user){
            $profile = $user->profile()->create([
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'middlename'=>$request->middlename,
                'address_1'=>$request->address_1,
                'address_2'=>$request->address_2,
                'phone'=>$request->phone,
                'country_id'=>$request->country,
                'state_id'=>$request->state,
                'city_id'=>$request->city,
                'postcode'=>$request->postcode,
            ]);
            if($profile){
                session()->flash('success', __('Customer created'));
                return redirect(route('admin.customers'));
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'email'=>'required|email|unique:users,email,'.$user->id,
            'password'=>'nullable|confirmed',
            'firstname'=>'nullable|string',
            'lastname'=>'nullable|string',
            'middlename'=>'nullable|string',
            'address_1'=>'nullable|string',
            'address_2'=>'nullable|string',
            'phone'=>'nullable|string',
            'country'=>'nullable|integer',
            'state'=>'nullable|integer',
            'city'=>'nullable|integer',
            'postcode'=>'nullable|string',
            'phone'=>'nullable|string',
        ]);

        $user->email = $request->email;
        if($request->password) $user->password = Hash::make($request->password);
        $user->profile->firstname = $request->firstname;
        $user->profile->lastname = $request->lastname;
        $user->profile->middlename = $request->middlename;
        $user->profile->address_1 = $request->address_1;
        $user->profile->address_2 = $request->address_2;
        $user->profile->phone = $request->phone;
        $user->profile->postcode = $request->postcode;
        $user->profile->country_id = $request->country;
        $user->profile->state_id = $request->state;
        $user->profile->city_id = $request->city;

        if($user->save()){
            if($user->profile->save()){
                session()->flash('success', __('Customer updated'));
                return redirect(route('admin.customers'));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete()){
            session()->flash('danger', __('Customer removed'));
            return redirect(route('admin.customers'));
        }
    }
}
