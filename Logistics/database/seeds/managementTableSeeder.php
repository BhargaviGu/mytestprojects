<?php

use Illuminate\Database\Seeder;

class managementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('management_kpis')->insert([
        	[
	            'kpi_name' => 'OTD PERFORMANCE',
	            'kpi_type' => 'Range',
	            'kpi_call_name' => 'otd',
	            'status' => 'A',
	            'rank'=> '1',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'kpi_name' => 'OTD_AVG',
	            'kpi_type' => 'Range',
	            'kpi_call_name' => 'otd_avg',
	            'status' => 'A',
	            'rank'=> '0',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'kpi_name' => 'COMMITMENT %',
	            'kpi_type' => 'Range',
	            'kpi_call_name' => 'commitment_perc',
	            'status' => 'A',
	            'rank'=> '3',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'kpi_name' => 'PROGRESS UPDATE',
	            'kpi_type' => 'Range',
	            'kpi_call_name' => 'progress_update',
	            'status' => 'A',
	            'rank'=> '4',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'kpi_name' => 'ITEMS AT RISK',
	            'kpi_type' => 'Quantity',
	            'kpi_call_name' => 'items_at_risk',
	            'status' => 'A',
	            'rank'=> '0',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'kpi_name' => 'Prediction - Items At Risk',
	            'kpi_type' => 'Quantity',
	            'kpi_call_name' => 'prediction_items_at_risk',
	            'status' => 'A',
	            'rank'=> '0',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'kpi_name' => 'Prediction - Commitment',
	            'kpi_type' => 'Range',
	            'kpi_call_name' => 'prediction_commitment_perc',
	            'status' => 'A',
	            'rank'=> '0',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
	        [
	            'kpi_name' => 'Prediction - Progress Update',
	            'kpi_type' => 'Range',
	            'kpi_call_name' => 'prediction_progress_update',
	            'status' => 'A',
	            'rank'=> '0',
	            'created_ts' => date('Y-m-d H:i:s'),
	            'modified_ts' => date('Y-m-d H:i:s'),
	        ],
            [
                'kpi_name' => 'OTD PREDICTION',
                'kpi_type' => 'Range',
                'kpi_call_name' => 'otd_prediction',
                'status' => 'A',
                'rank'=> '6',
                'created_ts' => date('Y-m-d H:i:s'),
                'modified_ts' => date('Y-m-d H:i:s'),
            ],
            [
                'kpi_name' => 'OFR RATING',
                'kpi_type' => 'Range',
                'kpi_call_name' => 'ofr_rating',
                'status' => 'A',
                'rank'=> '2',
                'created_ts' => date('Y-m-d H:i:s'),
                'modified_ts' => date('Y-m-d H:i:s'),
            ],
            [
                'kpi_name' => 'DELAYS',
                'kpi_type' => 'Quantity',
                'kpi_call_name' => 'delays',
                'status' => 'A',
                'rank'=> '5',
                'created_ts' => date('Y-m-d H:i:s'),
                'modified_ts' => date('Y-m-d H:i:s'),
            ],
            [
                'kpi_name' => 'DELAYS - With Delayed Stage Completion',
                'kpi_type' => 'Quantity',
                'kpi_call_name' => 'delays_with_delayed_stage_completion',
                'status' => 'A',
                'rank'=> '0',
                'created_ts' => date('Y-m-d H:i:s'),
                'modified_ts' => date('Y-m-d H:i:s'),
            ],
            [
                'kpi_name' => 'DELAYS - With Timely Stage Completion',
                'kpi_type' => 'Quantity',
                'kpi_call_name' => 'delays_with_timely_stage_completion',
                'status' => 'A',
                'rank'=> '0',
                'created_ts' => date('Y-m-d H:i:s'),
                'modified_ts' => date('Y-m-d H:i:s'),
            ],
            [
                'kpi_name' => 'DELAYS - Without Stage Completion',
                'kpi_type' => 'Quantity',
                'kpi_call_name' => 'delays_without_stage_completion',
                'status' => 'A',
                'rank'=> '0',
                'created_ts' => date('Y-m-d H:i:s'),
                'modified_ts' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
