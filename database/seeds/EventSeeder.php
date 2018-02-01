<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      if($ex = Event::where('title', 'Test')->first()) {$ex->delete();}
      $event = new Event;
      $event->title = 'Test';
      $event->description = 'This is my test description.';
      $event->date = '2018-05-06';
      $event->time = '14:00';
      $event->organizer = 'Administrator';
      $event->count = 10;
      $event->attendees = [1, 5, 6, 7, 8, 9];
      $event->comments = [
        ['body'=> "this is a test", "user"=> 1, 'name'=> 'Admin', 'datetime'=> '2018-05-04 16:34']
      ];
      $event->todo = 1;
      $event->save();
    }
}
