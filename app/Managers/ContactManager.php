<?php


namespace App\Managers;

use App\Models\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactManager
{

    /**
     * ContactManager constructor.
     */
    public function __construct(private ContactRepository $repository)
    {
    }

    public function store($request)
    {
        $this->validateContactRequest($request);

        $this->repository->store($request);
    }

    public function update(Request $request, Contact $contact)
    {
        $this->validateContactRequest($request);

        $this->repository->update($request, $contact);
    }

    public function destroy(Contact $contact)
    {

        $this->repository->destroy($contact);

    }

    public function getActiveContacts()
    {
        return $this->repository->getContactsWithStatus(Contact::STATUS_ACTIVE);
    }

    public function getSharedContacts()
    {
        return $this->repository->getSharedContacts();
    }

    public function getContactsYouShared()
    {

        return $this->repository->getContactsYouShared();

    }

    public function validateContactRequest()
    {

        return request()->validate([
            'name' => ['required', 'min:2', 'max:30']
        ]);

    }
}
