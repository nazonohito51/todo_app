<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\UserProfile;

class UserProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_profile = User::findOrFail($id)->user_profile;
        return view('user_profile.show', [
            'user_profile' => $user_profile,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_profile = User::findOrFail($id)->user_profile;
        return view('user_profile.edit', [
            'user_profile' => $user_profile,
        ]);
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
        $this->validate($request, [
            'introduction' => ['max:255'],
            'birthday' => ['date']
        ]);

        $user_profile = User::findOrFail($id)->user_profile;
        $this->authorize('update-user_profile', $user_profile);

        $user_profile->introduction = $request->input('introduction');
        $user_profile->birthday = $request->input('birthday');
        $user_profile->save();

        return redirect()->route('user_profile.show', $user_profile->user->id);
    }
}
