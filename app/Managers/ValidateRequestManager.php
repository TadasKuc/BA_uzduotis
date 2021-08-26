<?php


namespace App\Managers;


class validateRequestManager
{

    public function validateContactRequest()
    {

        return request()->validate([
            'name' => ['required', 'min:2', 'max:30'],
            'user_id' => ['exist:users,id'],
            'surname' => ['required', 'min:2', 'max:30'],
            'phone' => ['required', 'min:9', 'max:9'],
            'description' => ['required', 'min:2', 'max:55']
        ]);

    }

    public function validateSharedContactRequest()
    {

        return request()->validate([
            'user_from_id' => ['exist:users,id'],
            'user_to_id' => ['exist:users,id'],
            'contact_id' => ['exist:contacts,id'],
        ]);

    }


}
