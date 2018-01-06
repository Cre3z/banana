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
        $email = new \App\Email();
        $email->name = 'test name';
        $email->subject = 'test subject';
        $email->date = 'test date';
        $email->time = 'test time';
        $email->timetosend = strtotime('now +1min');
        $email->body = "HELLO WORLD";
        $email->save();
    }
}
