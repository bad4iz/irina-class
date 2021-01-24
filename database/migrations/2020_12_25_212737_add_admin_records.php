<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            'name' => 'SuperAdmin',
            'email' => 'superadmin@bad4iz.ru',
            'password' => bcrypt('secret2vs'),
//            'status' => 1,
        ]);

        $sa_role_id = DB::table('roles')->insertGetId([
            'name' => 'СуперАдминистратор',
            'slug' => 'superadmin',
        ]);

        DB::table('role_user')->insertGetId([
            'role_id' => $sa_role_id,
            'user_id' => $sa_user_id,
        ]);
//        dddddddddddddddddddd


        $a_user_id = DB::table('users')->insertGetId([
            'name' => 'admin',
            'email' => 'admin@bad4iz.ru',
            'password' => bcrypt('secret2v'),
//            'status' => 1,
        ]);

        $a_role_id = DB::table('roles')->insertGetId([
            'name' => 'Администратор',
            'slug' => 'admin',
        ]);

        DB::table('role_user')->insertGetId([
            'role_id' => $a_role_id,
            'user_id' => $a_user_id,
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
