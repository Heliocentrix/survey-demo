<?php

use Illuminate\Database\Migrations\Migration;

class AddAdminLogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('admins')->insert(
            [
                'name'     => 'admin',
                'email'    => 'admin@test.com',
                'role'     => 'admin',
                'password' => Hash::make('admintest'),
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
