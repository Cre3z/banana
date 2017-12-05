<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if($ex = User::where('email', 'admin@example.com')->first()) {
            $ex->delete();
        }
        $admin = new User();
        $admin->name = "Administrator";
        $admin->type = "admin";
        $admin->password = bcrypt("password");
        $admin->email = "admin@example.com";
        $admin->save();
    }
}
