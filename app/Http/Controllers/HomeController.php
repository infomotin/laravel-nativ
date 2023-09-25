<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * HomeController class for user management operations.
     *
     * @return void
     */
    public function index()
    {
        $user = User::where('email', 'admin@admin.com')->first();
        // if(!$user){
        //     User::create([
        //         'name' => 'admin',
        //         'email' => 'admin@admin.com',
        //         'password' => bcrypt('123456')
        //     ]);
        // }
        $user = User::firstOrCreate(
            ['email' => 'motin@admin.com'],
            [
                'name' => 'motin',
                'password' => bcrypt('123456')
            ]
        );
        echo $user->id . '-' . $user->name;
        //updateOrCreate
        $user = User::updateOrCreate(
            ['email' => 'motin@admin.com'],
            [
                'name' => 'motin Update',
                'password' => bcrypt('654321')
            ]
        );
        
        echo $user->id . '-' . $user->name;
        //user upsert
        User::upsert(
            [
                ['email' => 'motin1@admin.com', 'name' => 'motin Update', 'password' => bcrypt('654321')],
                ['email' => 'admin1@admin.com', 'name' => 'admin', 'password' => bcrypt('123456')],
            ],
            [
                'name','password','email'
            ]
        );
        foreach(User::all() as $user){
            echo $user->id . '<br>' .  $user->name . '<br>' . $user->email;
        }
    }
}
