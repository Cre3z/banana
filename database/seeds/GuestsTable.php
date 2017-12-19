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
        if($ex = Guest::where('email', 'admin@example.com')->get()) {
            foreach($ex as $x)
                $x->delete();
        }
        $admin = new Guest();
        $admin->name = "Jane";
        $admin->surname = "Doe";
        $admin->cell = "0821234567";
        $admin->email = "admin@example.com";
        $admin->invited = "1";
        $admin->plus_one = "yes";
        $admin->plus_one_id = "";
        $admin->rsvp = "yes";
        $admin->accommodation = "no";
        $admin->dietary = "vegan";
        $admin->save();
        
        $admin = new Guest();
        $admin->name = "John";
        $admin->surname = "Doe";
        $admin->cell = "0821234567";
        $admin->email = "admin@example.com";
        $admin->invited = "0";
        $admin->plus_one = "yes";
        $admin->plus_one_id = "";
        $admin->rsvp = "no";
        $admin->accommodation = "no";
        $admin->dietary = "";
        $admin->save();
    }
}
