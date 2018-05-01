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
        if($ex = User::where('email', 'admin@example.com')->first()) {$ex->delete();}
        $admin = new User();
        $admin->name = "Administrator";
        $admin->type = "admin";
        $admin->role = "admin";
        $admin->password = bcrypt("password");
        $admin->email = "admin@example.com";
        $admin->color = "blue";
        $admin->save();

        $admin = new User();
        $admin->name = "Suzaan";
        $admin->type = "admin";
        $admin->role = "Bride";
        $admin->password = bcrypt("bride");
        $admin->email = "suzaanvzyl@gmail.com";
        $admin->color = "red";
        $admin->save();

        $admin = new User();
        $admin->name = "Jovan";
        $admin->type = "admin";
        $admin->role = "Groom";
        $admin->password = bcrypt("groom");
        $admin->email = "suzaanvzyl@gmail.com";
        $admin->color = "blue";
        $admin->save();
    }
}
