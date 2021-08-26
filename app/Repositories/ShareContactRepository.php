<?php


namespace App\Repositories;


use App\Models\SharedContact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ShareContactRepository
{

    public function store($request)
    {

        $sharedContact = new SharedContact();
        $sharedContact->user_from_id = Auth::user()->id;
        $sharedContact->contact_id = $request->get('contact');
        $phone = $request->get('user_to_phone');
        $toUser = User::query()->where('phone', '=', $phone)->pluck('id')->first();
        $sharedContact->user_to_id = $toUser;
        $sharedContact->save();

    }

    public function destroy(int $id)
    {

        $shared_contact = SharedContact::query()->find($id);

        $shared_contact->delete();

    }
}
