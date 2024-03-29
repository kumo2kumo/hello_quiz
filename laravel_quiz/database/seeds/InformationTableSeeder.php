<?php

use Illuminate\Database\Seeder;

class InformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('informations')->truncate();

        DB::table('informations')->insert([
            'information' => '最新のお知らせ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
