<?php

use Illuminate\Database\Seeder;

class SettingsSeederOne extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([[
		'meta_name' 	=> 'user_role_name0',
		'meta_value'	=>	'admin'
		],
		[
		'meta_name' 	=> 'user_role_name1',
		'meta_value'	=>	'District'
		],
		[
		'meta_name' 	=> 'user_role_name2',
		'meta_value'	=>	'School'
		],
		[
		'meta_name' 	=> 'user_status_name0',
		'meta_value'	=>	'Deny'
		],
		[
		'meta_name' 	=> 'user_status_name1',
		'meta_value'	=>	'Approved'
		],
		[
		'meta_name' 	=> 'user_status_name2',
		'meta_value'	=>	'Pending'
		]]);
    }
}
