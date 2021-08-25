<?php


namespace App\Repositories;


use App\Models\Contact;
use App\Models\SharedContact;
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
        if (!$this->contactIsShared($contact->id)) {
            $contact->delete();
        }

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

        return SharedContact::query()
            ->where('user_to_id', '=', Auth::user()->id)
            ->rightJoin('contacts', 'shared_contacts.contact_id', '=', 'contacts.id')
            ->rightJoin('users as u', 'u.id', '=', 'shared_contacts.user_from_id')
            ->get(['u.Name', 'contacts.*', 'shared_contacts.Id', 'shared_contacts.user_from_id', 'shared_contacts.user_to_id', 'shared_contacts.contact_id']);

    }

    public function getContactsYouShared(): Collection
    {

        return DB::table('shared_contacts as sc')
            ->where('user_from_id', '=', Auth::user()->id)
            ->rightJoin('contacts as c', 'c.id', '=', 'sc.contact_id')
            ->rightJoin('users as u', 'u.id', '=', 'sc.user_to_id')
            ->get(['u.Name', 'c.*', 'sc.Id', 'sc.user_from_id', 'sc.user_to_id', 'sc.contact_id']);

    }

    private function setContactStatus($request)
    {

        if (User::query()->where('phone', $request->get('phone'))->get()->isEmpty()) {
            return Contact::STATUS_INACTIVE;
        } else {
            return Contact::STATUS_ACTIVE;
        }

    }

    public function contactIsShared($id)
    {
        return SharedContact::query()->where('contact_id', '=', $id)->exists();

    }
}
