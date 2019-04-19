<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Uploadstatus;
use Auth;
use App\Clients;
use App\User;
use App\Objective;
use App\Objectiveprogress;
use App\ObjMapping;
use App\Setting;
use App\ConfigTable;
use App\KpiList;
use DB;
use Response;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use File;
use App\PageHeadingConfig;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('prevent-back-history');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function getKPIData(Request $request){
        $inputs         = $request->all();
        $suppliers_dict = $buyers_dict = array();
        $objective_data = Objectiveprogress::getobjectivedata();
        $user           = User::find(Session::get('userId'));
        $client_data    = Clients::find(Session::get('clientId'));
        $home_kpis      = KpiList::getActiveKpiList();

        $config_data    = ConfigTable::whereIn('name', ['buyer_delays_config', 'buyer_schedule_config', 'itemsatrisk_kpi_color_config', 'itemstostart_kpi_color_config', 'pending_for_grn_kpi_color_config', 'pending_payment_kpi_color_config', 'commitment_approval_kpi_color_config', 'pending_grn_color', 'items_at_risk_color', 'buyer_commitment_approval_config','supplier_delays_config','supplier_schedule_config','supplier_item_to_start_config'])->get();

        $suppliers_data = KpiList::select('kpi_name', 'kpi_original_name')->where('user_type','=', 'supplier')->get();

        foreach ($suppliers_data as $key => $value) {
            $suppliers_dict[$value['kpi_name']] = $value['kpi_original_name'];
        }  

        $buyers_data = KpiList::select('kpi_name', 'kpi_original_name')->where('user_type','=', 'buyer')->get();

        foreach ($buyers_data as $key => $value) {
            $buyers_dict[$value['kpi_name']] = $value['kpi_original_name'];
        }
            
        foreach ($config_data as $key => $value) {
            switch ($value['name']) {
                case 'buyer_delays_config':
                    $buyer_delay_data  = $value['value'];
                    break;
                
                case 'buyer_schedule_config':
                    $buyer_schedule_data = $value['value'];
                    break;

                case 'itemsatrisk_kpi_color_config':
                    $items_at_risk = $value['value'];
                    break;

                case 'itemstostart_kpi_color_config':
                    $items_to_start = $value['value'];
                    break;

                case 'pending_payment_kpi_color_config':
                    $pending_payment = $value['value'];
                    break;

                case 'pending_for_grn_kpi_color_config':
                    $pending_grn = $value['value'];
                    break;  

                case 'commitment_approval_kpi_color_config':
                    $commitment_approval = $value['value'];
                    break;     

                case 'pending_grn_color':
                    $pending_grn_color = $value['value'];
                    break;

                case 'items_at_risk_color':
                    $items_at_risk_color = $value['value'];
                    break;   

                case 'buyer_commitment_approval_config':
                    $buyer_commitment_approval = $value['value'];
                    break;

                case 'supplier_delays_config':
                    $supplier_delays_data = $value['value'];
                    break;

                case 'supplier_schedule_config':
                    $supplier_schedule_data = $value['value'];
                    break;

                case 'supplier_item_to_start_config':
                    $supplier_item_to_start_data = $value['value'];
                    break;
            }
        }


        return Response::json(array('status'=>'success',
                    'obj_data'=>$objective_data,
                    'user_data'=>$user,
                    'client_data'=>$client_data,
                    'buyer_delay_data' =>$buyer_delay_data,
                    'supplier_schedule_data' =>$supplier_schedule_data,
                    'supplier_delays_data'=>$supplier_delays_data,
                    'supplier_item_to_start_data'=>$supplier_item_to_start_data,
                    'buyer_schedule_data'=>$buyer_schedule_data,
                    'items_to_start'=>$items_to_start,
                    'items_at_risk' => $items_at_risk,
                    'pending_payment' => $pending_payment,
                    'pending_grn' => $pending_grn,
                    'commitment_approval' => $commitment_approval,
                    'pending_grn_color' => $pending_grn_color,
                    'items_at_risk_color' => $items_at_risk_color,
                    'supplier_dict' => $suppliers_dict,
                    'buyer_dict' => $buyers_dict,
                    'buyer_commitment_approval' => $buyer_commitment_approval,
                    'user_role' => Session::get('userType'),
                    'home_kpis' => $home_kpis));
    }
    
    public function getprofiledata(){
        $userdata=User::find(Session::get('userId'));
        $user=$userdata;
        $badges_data= Badges::where('mobile_no','=',Session::get('mobileNumber'))
                              ->where('client_id','=',Session::get('clientId'))
                              ->where('status','=','A')
                              ->get();
        $client_last_updated=  Uploadstatus::where('client_id','=',Session::get('clientId'))
                                            ->orderBy('id','desc')
                                            ->select('created_at')
                                            ->first();
         $client_data=Clients::find(Session::get('clientId'));
        
         return Response::json(array('status'=>'success','user_data'=>$userdata,
                                    'badges_data'=>$badges_data,'client_last_updated'=>date('d-m-Y',strtotime($client_last_updated['created_at'])),
                                    'client_data'=>$client_data));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
