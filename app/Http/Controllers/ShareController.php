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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->manager->store($request);

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

        $this->manager->destroy($id);

        return redirect(route('contacts.index'));

    }
}
