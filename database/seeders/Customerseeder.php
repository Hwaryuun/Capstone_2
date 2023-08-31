<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Customerseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers') ->insert([
            [
                'firstname' => 'Joseph', 
                'lastname' => 'Joseph', 
                'email' => 'markjosephmanalo1110@gmail.com',
                'address' => 'markjosephmanalo1110@gmail.com',
                'contactnumber' => 'markjosephmanalo1110@gmail.com',
                'birthdate' => 'markjosephmanalo1110@gmail.com',
                'password' => bcrypt('markmark12'), 
                
            ]
        ]);
    }
}
