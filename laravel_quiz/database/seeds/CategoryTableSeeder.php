<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('categories')->truncate();

		DB::table('categories')->insert(
			[
				[
					'name' => 'ハロプロ全般',
					'created_at' => now(),
					'updated_at' => now()
				],
				[
					'name' => 'モーニング娘。',
					'created_at' => now(),
					'updated_at' => now()
				],
				[
					'name' => 'アンジュルム',
					'created_at' => now(),
					'updated_at' => now()
				],
				[
					'name' => 'Juic=Juice',
					'created_at' => now(),
					'updated_at' => now()
				],
				[
					'name' => 'つばきファクトリー',
					'created_at' => now(),
					'updated_at' => now()
				],
				[
					'name' => 'BEYOOOOONDS',
					'created_at' => now(),
					'updated_at' => now()
				],
			]
		);
	}
}
