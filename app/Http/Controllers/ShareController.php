<?php

namespace App\Http\Controllers;

use App\Managers\ShareContactManager;
use App\Models\SharedContact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShareController extends Controller
{
    /**
     * ShareController constructor.
     */
    public function __construct(private ShareContactManager $manager)
    {
    }

     public function store(Request $request)
    {

        $this->manager->store($request);

        return redirect(route('contacts.index'));

    }


    public function destroy($id)
    {

        $this->manager->destroy($id);

        return redirect(route('contacts.index'));

    }
}
