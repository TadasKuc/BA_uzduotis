<?php


namespace App\Repositories;


use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ContactRepository
{

    public function store($request)
    {

        $contact              = new Contact();
        $contact->name        = $request->get('name');
        $contact->surname     = $request->get('surname');
        $contact->phone       = $request->get('phone');
        $contact->description = $request->get('description');
        $contact->user_id     = Auth::user()->id;
        $contact->active      = $this->setContactStatus($request);

        $contact->save();

    }

    public function update(Request $request, Contact $contact)
    {

        $contact->update($request->toArray());

    }

    public function destroy(Contact $contact)
    {

        $contact->delete();

    }

    public function getContactsWithStatus(string $status): Collection
    {

        return Contact::query()
            ->where('active', '=', $status)
            ->where('user_id', '!=', Auth::user()->id)
            ->get();

    }

    public function getSharedContacts(): Collection
    {

        return DB::table('shared_contacts')
            ->where('user_to_id', '=', Auth::user()->id)
            ->rightJoin('contacts', 'shared_contacts.contact_id', '=', 'contacts.id')
            ->get();

    }

    public function getContactsYouShared(): Collection
    {

        return DB::table('shared_contacts as sc')
            ->where('user_from_id', '=', Auth::user()->id)
            ->rightJoin('contacts as c', 'c.id', '=', 'sc.contact_id')
            ->rightJoin('users as u', 'u.id', '=', 'sc.user_to_id')
            ->get(['u.Name', 'c.*']);

    }

    private function setContactStatus($request)
    {

        if (User::query()->where('phone', $request->get('phone'))->get()->isEmpty()) {
            return Contact::STATUS_INACTIVE;
        } else {
            return Contact::STATUS_ACTIVE;
        }

    }
}
