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
        echo '<br>';
        echo $user->wasRecentlyCreated?'Created':'Found';

        $user->name = 'motin Update';
        echo $user->isDirty() ? 'Dirty' : 'Clean';
        echo '<br>';
        echo $user->isDirty('name') ? 'name' : 'Not Editable';
        echo '<br>';
        // $user->email = 'motin@gmail.com';
        echo $user->isDirty('email') ? 'email' : 'Not Editable';


        //updateOrCreate
        // $user = User::updateOrCreate(
        //     ['email' => 'motin@admin.com'],
        //     [
        //         'name' => 'motin Update',
        //         'password' => bcrypt('654321')
        //     ]
        // );
        
        // echo $user->id . '-' . $user->name;
        //user upsert
        // User::upsert(
        //     [
        //         ['email' => 'motin1@admin.com', 'name' => 'motin Update', 'password' => bcrypt('654321')],
        //         ['email' => 'admin1@admin.com', 'name' => 'admin', 'password' => bcrypt('123456')],
        //     ],
        //     ['email'],['name','password']
        // );
        // foreach(User::all() as $user){
        //     // echo $user->id . '<br>' .  $user->name . '<br>' . $user->email;
        // }
        $user->save();
        echo $user->wasChanged() ? 'Changed' : 'Not Changed';
        echo '<br>';
        echo $user->isDirty() ? 'Dirty' : 'Clean';
        echo '<br>';
        echo $user->wasChanged('name') ? 'name' : 'Not Changed';
        
    }
}
