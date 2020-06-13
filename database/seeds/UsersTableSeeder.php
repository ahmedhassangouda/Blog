<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $user = DB::table('users')->where('email' , 'Godza@Godza.com')->first();
        if(!$user)
        {
            User::create([
                'name'      =>  'Godza',
                'email'     =>  'Godza@Godza.com',
                'password'  =>  Hash::make('godza7222'),
                'role'      =>  "Admin"
            ]);
        }
    }
}
