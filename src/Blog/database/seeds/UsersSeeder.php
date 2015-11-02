<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 02.11.15
 * Time: 21:04
 */

namespace Blog\database\seeds;


use Blog\Entity\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();

        $admin = new User();
        $admin->login = 'admin';
        $admin->password = Hash::make('123456');
        $admin->save();

        $author = new User();
        $author->login = 'author';
        $author->password = Hash::make('123456');
        $author->save();
    }

}