<?php

namespace App\Http\Controllers;

use App\Managers\ContactManager;
use App\Models\Contact;
use App\Models\SharedContact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Null_;

class ContactController extends Controller
{
    /**
     * ContactController constructor.
     */
    public function __construct(private ContactManager $contactManager)
    {
    }


    public function index()
    {
        $contacts = Contact::query()
            ->where('user_id', '=', Auth::user()->id)
            ->get();

        $activeContacts = $this->contactManager->getActiveContacts();

        $sharedContacts = $this->contactManager->getSharedContacts();

        $contactsYouShared = $this->contactManager->getContactsYouShared();

        return view('contacts', [
            'contacts'          => $contacts,
            'activeContacts'    => $activeContacts,
            'sharedContacts'    => $sharedContacts,
            'contactsYouShared' => $contactsYouShared
        ]);

    }


    public function create()
    {

        return view('contacts.contact-create');

    }


    public function store(Request $request)
    {

        $this->contactManager->store($request);

        return redirect(route('contacts.index'));

    }


    public function show(Contact $contact, Request $request)
    {

        $contactType = 'userContacts';

        if ($request->get('youShared') === '0'){
            $contact = $this->contactManager->getSharedContacts()->where('id', '=' , $contact->id)->first();
            $contactType = 'userGetContacts';
        } elseif ($request->get('youShared') === '1'){
            $contact = $this->contactManager->getContactsYouShared()->where('id', '=' , $contact->id)->first();
            $contactType = 'userSendContacts';
        }

        if (is_null($request->get('youShared')) && $contact->user_id != Auth::user()->id){
            return;
        }

        return view('contacts.contact-show', [
            'contact' => $contact,
            'activeContacts' => $this->contactManager->getActiveContacts(),
            'contactType' => $contactType
        ]);

    }


    public function edit(Contact $contact)
    {

        return view('contacts.contact-edit', $contact);

    }


    public function update(Request $request, Contact $contact)
    {

        $this->contactManager->update($request, $contact);

        return redirect(route('contacts.index'));

    }


    public function destroy(Contact $contact)
    {
        $this->contactManager->destroy($contact);

        return redirect(route('contacts.index'));

    }

}
