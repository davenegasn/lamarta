<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	[
        		'name' 			=> 'Sopaipillas',
        		'description' 	=> 'Masas de Sopaipillas',
        		'display_order' => 1
        	],
        	[
        		'name' 			=> 'Empanadas',
        		'description' 	=> 'Bandejas de empanadas',
        		'display_order' => 2
        	],
        	[
        		'name' 			=> 'Pizzetas',
        		'description' 	=> 'Bandejas de pizzetas listas para hornear',
        		'display_order' => 3
        	],
        	[
        		'name' 			=> 'Prepizza',
        		'description' 	=> 'Masas para pizza',
        		'display_order' => 4
        	]
        ]);
    }
}
