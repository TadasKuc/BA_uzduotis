<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_users_can_create_contact()
    {
       $this->actingAs(User::factory()->create());

       $contact = [
           'user_id' => Auth::user()->id,
           'name' => 'Ilona',
           'surname' => 'Iloniene',
           'phone' => 862751283,
           'description' => 'Trumpas aprasymas'
       ];

        $response = $this->post(route('contacts.store'), $contact);

        $response->assertRedirect(route('contacts.index'));

        $this->assertCount(1,Contact::all());
    }

}
