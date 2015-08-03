
<?php

class UserTableSeeder extends Seeder
{

    public function run()
    {
        /**
        *  $userModel = User::find(1);
        *  $userModel->detachRoles($userModel->roles);
        */

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::table('roles')->delete();
        DB::table('assigned_roles')->truncate();
        DB::table('assigned_roles')->delete();
        DB::table('users')->truncate();
        DB::table('users')->delete();

        User::create(array(
            'firstname' => 'Администратор',
            'email' => 'admin@treadtrack.net',
            'password' => Hash::make('123456'),
        ));

        User::create(array(
            'firstname' => 'Богдан',
            'email' => 'ukrtvsat@ukr.net',
            'password' => Hash::make('123456'),
        ));

        $role = new Role;
        $role->name = 'Customer';
        $role->save();

        $role = new Role;
        $role->name = 'Admin';
        $role->save();

        $admin = User::where('firstname','=','Администратор')->first();
        $admin->attachRole( $role );

        $user = User::where('firstname','=','Богдан')->first();
        $user->attachRole( $role );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }

}
