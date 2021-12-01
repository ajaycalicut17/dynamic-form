<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields')->insert([
            [
                'name' => 'Text',
            ],
            [
                'name' => 'Number',
            ],
            [
                'name' => 'Select',
            ],
        ]);
    }
}
