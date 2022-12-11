<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Artesaos\SEOTools\Facades\SEOMeta;


class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = UserAddress::where('user_id', auth()->id())->latest()->paginate(5);
        $provinces = Province::all();
        SEOMeta::setRobots('noindex, nofollow');

        return view('home.page.users_profile.address', compact('provinces', 'addresses'));
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
        SEOMeta::setRobots('noindex, nofollow');

        return view('home.page.users_profile.create_address', compact('provinces', 'addresses'));
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
            'name' => 'required|persian_alpha_num',
            'title' => ['required', 'persian_alpha_num', Rule::unique('user_addresses')->where(function ($query) {
                $query->where('user_id', auth()->id());
            })],
            'cellphone' => 'required|ir_mobile:zero',
            'cellphone2' => 'required|ir_phone_with_code',
            'province_id' => 'required',
            'unit' => 'nullable|string',
            'city_id' => 'required|integer',
            'address' => 'required|string',
            'lastaddress' => 'nullable|string',
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
            'lastaddress' => $request->lastaddress,
            'postal_code' => $request->postal_code
        ]);

        alert()->success('آدرس مورد نظر ایجاد شد')->showConfirmButton('تایید');
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
        SEOMeta::setRobots('noindex, nofollow');
        $provinces = Province::all();
        return view('home.page.users_profile.edit_address', compact('address', 'provinces'));
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
            'name' => 'required|persian_alpha_num',
            'title' => ['required', 'persian_alpha_num', Rule::unique('user_addresses')->where(function ($query) {
                $query->where('user_id', auth()->id());
            })->ignore($address)],
            'cellphone' => 'required|ir_mobile:zero',
            'cellphone2' => 'required|ir_phone_with_code',
            'province_id' => 'required|integer',
            'unit' => 'nullable|string',
            'city_id' => 'required|integer',
            'address' => 'required|string',
            'lastaddress' => 'nullable|string',
            'postal_code' => 'required|ir_postal_code:without_seprate'
        ]);
        $address->update([
            'name' => $request->name,
            'cellphone2' => $request->cellphone2,
            'lastaddress' => $request->lastaddress,
            'unit' => $request->unit,
            'title' => $request->title,
            'cellphone' => $request->cellphone,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'postal_code' => $request->postal_code
        ]);
        alert()->success('آدرس مورد نظر ویرایش شد')->showConfirmButton('تایید');
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
        alert()->success('آدرس مورد نظر حذف شد')->showConfirmButton('تایید');
        return redirect()->back();
    }

    public function getProvinceCitiesList(Request $request)
    {
        return City::where('province_id', $request->province_id)->get();
    }
}
