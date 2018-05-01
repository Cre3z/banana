<?php

use Illuminate\Database\Seeder;
use App\Guest;

class GuestsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if($ex = Guest::all()) {
            foreach($ex as $x)
                $x->delete();
        }
        // $admin = new Guest();
        // $admin->name = "Jane";
        // $admin->surname = "Doe";
        // $admin->cell = "0821234567";
        // $admin->email = "admin@example.com";
        // $admin->invited = false;
        // $admin->plus_one = "no";
        // $admin->plus_one_id = "";
        // $admin->rsvp = "no";
        // $admin->accommodation = "no";
        // $admin->dietary = "vegan";
        // $admin->token = "";
        // $admin->save();
        
        // $admin = new Guest();
        // $admin->name = "John";
        // $admin->surname = "Doe";
        // $admin->cell = "0821234567";
        // $admin->email = "admin@example.com";
        // $admin->invited = true;
        // $admin->plus_one = "no";
        // $admin->plus_one_id = "";
        // $admin->rsvp = "no";
        // $admin->accommodation = "no";
        // $admin->dietary = "";
        // $admin->token = "1234";
        // $admin->save();
    }
}
