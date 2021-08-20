<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\SharedContact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::query()->where('user_id', '=', Auth::user()->id)->get();
        $activeContacts = Contact::query()->where('active', '=', 'active')->get();
        $sharedContacts = DB::table('shared_contacts')
            ->where('user_to_id', '=', Auth::user()->id)
            ->rightJoin('contacts', 'shared_contacts.contact_id', '=', 'contacts.id')
            ->get();


        return view('contacts.contact-index', [
            'contacts'       => $contacts,
            'activeContacts' => $activeContacts,
            'test' => $sharedContacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.contact-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->get('name');
        $contact->surname = $request->get('surname');
        $contact->phone = $request->get('phone');
        $contact->description = $request->get('description');
        $contact->user_id = Auth::user()->id;

        if (User::query()->where('phone', $request->get('phone'))->get()->isEmpty()) {
            $contact->active =  Contact::STATUS_INACTIVE;
        } else {
            $contact->active =  Contact::STATUS_ACTIVE;
        }


        $contact->save();

        return redirect(route('contacts.index'));

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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
