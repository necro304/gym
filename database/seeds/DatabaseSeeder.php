<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */


    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');


        User::flushEventListeners();


        $cantidadUsuarios = 100;

        factory(User::class, $cantidadUsuarios)->create();

    }
}
