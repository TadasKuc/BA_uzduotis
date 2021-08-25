<?php

namespace App\Http\Controllers;

use App\Models\SharedContact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShareController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sharedContact = new SharedContact();
        $sharedContact->user_from_id = Auth::user()->id;
        $sharedContact->contact_id = $request->get('contact');
        $phone = $request->get('user_to_phone');
        $toUser = User::query()->where('phone', '=', $phone)->pluck('id')->first();
        $sharedContact->user_to_id = $toUser;
        $sharedContact->save();

        return redirect(route('contacts.index'));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shared_contact = SharedContact::query()->find($id);

        $shared_contact->delete();

    }
}
