<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){
        $user = User::where('email','admin@admin.com')->first();
        // if(!$user){
        //     User::create([
        //         'name' => 'admin',
        //         'email' => 'admin@admin.com',
        //         'password' => bcrypt('123456')
        //     ]);
        // }
        $user = User::firstOrCreate(
            ['email' => 'motin@admin.com'],
            ['name' => 'motin', 
            'password' => bcrypt('123456')]
    );
    echo $user->id;
    }
}
