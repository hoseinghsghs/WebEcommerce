<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = UserAddress::where('user_id', auth()->id())->get();
        $provinces = Province::all();
        return view('home.page.users_profile.address' , compact('provinces','addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addresses = UserAddress::where('user_id', auth()->id())->get();
        $provinces = Province::all();
        return view('home.page.users_profile.create_address', compact('provinces','addresses'));
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
            
            'name' => 'required',
            'title' => 'required',
            'cellphone' => 'required|ir_mobile:zero',
            'cellphone2' => 'required|ir_mobile:zero',
            'province_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'lastaddress' => 'required',
            'postal_code' => 'required|ir_postal_code:without_seprate'
        ]);
        
        UserAddress::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'name' => $request->name,
            'unit' => $request->unit,
            'cellphone' => $request->cellphone,
            'cellphone2' => $request->cellphone2,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'lastaddress' => $request->address,
            'postal_code' => $request->postal_code
        ]);

        alert()->success('آدرس مورد نظر ایجاد شد', 'باتشکر');
        return redirect()->route('home.addreses.index');
        
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
    public function edit(UserAddress $address)
    {
        $provinces = Province::all();
        return view('home.page.users_profile.edit_address' , compact('address','provinces'));
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, UserAddress $address)
    {
        
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'cellphone2' => 'required|ir_mobile:zero',
            'lastaddress' => 'required',
            'cellphone' => 'required|ir_mobile:zero',
            'province_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            
            'postal_code' => 'required|ir_postal_code:without_seprate'
        ]);

       

        $address->update([
            'name' => $request->name,
            'cellphone2' => $request->cellphone2,
            'lastaddress' => $request->address,
            'unit' => $request->unit,
            'title' => $request->title,
            'cellphone' => $request->cellphone,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'postal_code' => $request->postal_code
        ]);

        alert()->success('آدرس مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('home.addreses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAddress $address)
    {
       
        $address->delete();
        
        alert()->success('آدرس مورد نظر حذف شد', 'باتشکر');
        return redirect()->back();
        
    }

    public function getProvinceCitiesList(Request $request)
    {
        $cities = City::where('province_id', $request->province_id)->get();
        return $cities;
    }
}