<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nombre' => 'Yeselys Hoyos',
            'email' => 'yh@gamil.com',
            'numero' => '154541521'
        ]);
        DB::table('clientes')->insert([
            'nombre' => 'Luis Felipe',
            'email' => 'lf@gamil.com',
            'numero' => '154541521'
        ]);
    }
}
