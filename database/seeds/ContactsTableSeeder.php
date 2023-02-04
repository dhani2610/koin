<?php

namespace Database\Seeders;

use App\Contact;
use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Contact::class, 10)->create();
        Contact::factory()->count(10)->create();

        // membuat 10 data,kemudian memanggilnya di DatabaseSeeder.php
    }
}
