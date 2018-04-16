<?php

use Illuminate\Database\Seeder;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if($ex = \App\Email::all()) {
            foreach($ex as $x)
                $x->delete();
        }
        $email = new \App\Email();
        $email->name = 'test name';
        $email->subject = 'test subject';
        $email->date = 'test date';
        $email->time = 'test time';
        $email->timetosend = strtotime('now +1min');
        $email->body = "HELLO WORLD";
        $email->sent = false;
        $email->save();
    }
}
