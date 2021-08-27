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
    public function __construct(private ContactRepository $repository,
                                private ValidateRequestManager $validator)
    {
    }

    public function store($request)
    {
        $this->validator->validateContactRequest();

        $this->repository->store($request);
    }

    public function update(Request $request, Contact $contact)
    {
        $this->validator->validateContactRequest();

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

}
