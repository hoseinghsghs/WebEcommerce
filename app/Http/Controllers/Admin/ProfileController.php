<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth::user();
        return view('admin.page.profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToastrFactory $flasher)
    {
        $user = auth::user();
        $data = $request->validate([
            'name' => 'nullable|string',
            'email' => 'required_without:cellphone|nullable|email|unique:users,email,' . $user->id,
            'cellphone' => 'required_without:email|nullable|numeric|unique:users,cellphone,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png|max:1024'
        ]);

        if (isset($request->avatar)) {
            if (Storage::exists('profile/' . $user->avatar)) {
                Storage::delete('profile/' . $user->avatar);
            }

            $ImageController = new ImageController();
            $image_name = $ImageController->UploadeImage($request->avatar, "profile", 100, 100);
            $data['avatar']=$image_name;
        }

        $user->update($data);
        $flasher->addSuccess('پروفایل با موفقیت بروزرسانی شد');

        return back();
    }
}
