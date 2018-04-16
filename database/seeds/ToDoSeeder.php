<?php

use Illuminate\Database\Seeder;
use App\Todo;

class ToDoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if($ex = Todo::all()) {
            foreach($ex as $x)
                $x->delete();
        }
        $admin = new Todo();
        $admin->name = "List One";
        $admin->subtext = "Things I have to do";
        $admin->entries = [
            ['body'=> "this is one thing", 'checked'=> false, 'timestamp'=> '12:00'],
            ['body'=> "this is one thing", 'checked'=> true, 'timestamp'=> '12:00'],
        ];
        $admin->public = false;
        $admin->user = 'admin@example.com';
        $admin->event = 1;
        $admin->save();
    }
}
