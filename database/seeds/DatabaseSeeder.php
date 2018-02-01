<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GuestsTable::class);
        $this->call(EmailSeeder::class);
        $this->call(ToDoSeeder::class);
        $this->call(EventSeeder::class);
    }
}
