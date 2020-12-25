<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sa_user_id = DB::table('users')->insertGetId([
            'id' => 1,
            'name' => 'SuperAdmin',
            'email' => 'superadmin@bad4iz.ru',
            'password' => bcrypt('secret2vs'),
//            'status' => 1,
        ]);

        $sa_group_id = DB::table('roles')->insertGetId([
            'id' => 1,
            'name' => 'СуперАдминистратор',
            'slug' => 'superadmin',
        ]);

        DB::table('role_user')->insertGetId([
            'id' => 1,
            'role_id' => 1,
            'user_id' => 1,
        ]);
//        dddddddddddddddddddd


        $sa_user_id = DB::table('users')->insertGetId([
            'id' => 2,
            'name' => 'admin',
            'email' => 'admin@bad4iz.ru',
            'password' => bcrypt('secret2v'),
//            'status' => 1,
        ]);

        $sa_group_id = DB::table('roles')->insertGetId([
            'id' => 2,
            'name' => 'Администратор',
            'slug' => 'admin',
        ]);

        DB::table('role_user')->insertGetId([
            'id' => 2,
            'role_id' => 2,
            'user_id' => 2,
        ]);

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->where('id', 1)->delete();
        DB::table('users')->where('id', 2)->delete();
        DB::table('roles')->where('id', 1)->delete();
        DB::table('roles')->where('id', 2)->delete();
    }
}
