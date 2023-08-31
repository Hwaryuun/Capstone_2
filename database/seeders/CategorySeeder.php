<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryTypeModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categorytype')->insert([
            [
                'typename' => 'Digital',
                'status' => 'Active',
                'created_at' => carbon::now(),
                'updated_at' => carbon::now()
            ],[
                'typename' => 'Offset',
                'status' => 'Active',
                'created_at' => carbon::now(),
                'updated_at' => carbon::now()
            ]
        ]);
        

       // CategoryTypeModel::factory()->times(100)->create();
    
    }
}
