<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 02.11.15
 * Time: 22:35
 */

namespace Blog\database\seeds;


use Blog\Entity\Permission;
use Blog\Entity\Role;
use Blog\Entity\User;
use Illuminate\Database\Seeder;

class RBACSeeder extends Seeder
{

    public function run()
    {

        $Admin = new Role();
        $Admin->name = 'Admin';
        $Admin->save();

        $Author = new Role();
        $Author->name = 'Author';
        $Author->save();

        $User = User::where('login', '=', 'admin')->first();
        $User->roles()->attach($Admin->id);

        $User = User::where('login', '=', 'author')->first();
        $User->roles()->attach($Author->id);

        $managePosts = new Permission();
        $managePosts->name = 'manage_posts';
        $managePosts->save();

        $manageUsers = new Permission();
        $manageUsers->name = 'manage_users';
        $manageUsers->save();

        $Admin
            ->permissions()
            ->sync([
                $managePosts->id,
                $manageUsers->id,
            ])
        ;

        $Author
            ->permissions()
            ->sync([
                $managePosts->id,
            ])
        ;
    }

}