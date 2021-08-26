<?php


namespace App\Managers;


use App\Repositories\ShareContactRepository;
use Illuminate\Http\Request;

class ShareContactManager
{

    /**
     * ShareContactManager constructor.
     */
    public function __construct(private ShareContactRepository $repository,
                                private ValidateRequestManager $validator)
    {
    }

    public function store(Request $request)
    {

        $this->validator->validateSharedContactRequest($request);

        $this->repository->store($request);

    }

    public function destroy(int $id)
    {

        $this->repository->destroy($id);

    }
}
