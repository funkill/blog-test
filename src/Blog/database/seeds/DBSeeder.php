<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 02.11.15
 * Time: 23:17
 */

namespace Blog\database\seeds;


use Illuminate\Database\Seeder;

class DBSeeder extends Seeder
{

    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(RBACSeeder::class);
    }

}