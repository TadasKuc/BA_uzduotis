<?php

namespace Tests\Unit;


use App\Http\Controllers\Web\HomeController;
use App\Models\Contact;
use App\Models\User;
use Tests\TestCase;

class ContactTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_only_logged_users_can_see_all_contacts_list()
    {

        $this->get('/contacts')->assertRedirect('/login');
    }

    public function test_authenticaded_users_can_see_the_contacts_list()
    {

        $this->actingAs(User::factory()->create());

        $this->get('/contacts')->assertOk();

    }

    public function test_create_new_contact()
    {

        Contact::factory()->count(1)->create([
            'name' => 'test_name'
        ]);

        $this->assertDatabaseHas('contacts', ['name' => 'test_name']);

    }

}
