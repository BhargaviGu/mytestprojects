<?php

use Illuminate\Database\Seeder;

class sidebar_config_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_sidebar_config')->insert([
        	[
	            'name' => 'home',
	            'default_name' => 'Home',
	            'modified_name' => '',
	            'user_role' => 'supplier',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'leaderboard',
	            'default_name' => 'Leaderboard',
	            'modified_name' => '',
	            'user_role' => 'supplier',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'logout',
	            'default_name' => 'Logout',
	            'modified_name' => '',
	            'user_role' => 'supplier',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'mis',
	            'default_name' => 'MIS Graphs',
	            'modified_name' => '',
	            'user_role' => 'supplier',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'order_status',
	            'default_name' => 'Order Status Screen',
	            'modified_name' => '',
	            'user_role' => 'supplier',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'pending_payment',
	            'default_name' => 'Pending Payment',
	            'modified_name' => '',
	            'user_role' => 'supplier',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'performance',
	            'default_name' => 'Performance',
	            'modified_name' => '',
	            'user_role' => 'supplier',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'prediction',
	            'default_name' => 'Prediction',
	            'modified_name' => '',
	            'user_role' => 'supplier',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'process',
	            'default_name' => 'Process',
	            'modified_name' => '',
	            'user_role' => 'supplier',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'profile',
	            'default_name' => 'Profile',
	            'modified_name' => '',
	            'user_role' => 'supplier',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'rewards',
	            'default_name' => 'My Rewards',
	            'modified_name' => '',
	            'user_role' => 'supplier',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'home',
	            'default_name' => 'Home',
	            'modified_name' => '',
	            'user_role' => 'buyer',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'leaderboard',
	            'default_name' => 'Leaderboard',
	            'modified_name' => '',
	            'user_role' => 'buyer',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'logout',
	            'default_name' => 'Logout',
	            'modified_name' => '',
	            'user_role' => 'buyer',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'mis',
	            'default_name' => 'MIS Graphs',
	            'modified_name' => '',
	            'user_role' => 'buyer',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'order_status',
	            'default_name' => 'Order Status Screen',
	            'modified_name' => '',
	            'user_role' => 'buyer',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'pending_payment',
	            'default_name' => 'Pending Payment',
	            'modified_name' => '',
	            'user_role' => 'buyer',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'performance',
	            'default_name' => 'Performance',
	            'modified_name' => '',
	            'user_role' => 'buyer',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'prediction',
	            'default_name' => 'Prediction',
	            'modified_name' => '',
	            'user_role' => 'buyer',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'process',
	            'default_name' => 'Process',
	            'modified_name' => '',
	            'user_role' => 'buyer',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'profile',
	            'default_name' => 'Profile',
	            'modified_name' => '',
	            'user_role' => 'buyer',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'rewards',
	            'default_name' => 'My Rewards',
	            'modified_name' => '',
	            'user_role' => 'buyer',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],

	    ]);
    }
}
