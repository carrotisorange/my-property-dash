<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Auth;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $no_of_bills = (int) $request->no_of_bills; 

         $active_tenants = DB::table('tenants')
        ->join('units', 'unit_id', 'unit_tenant_id')
        ->where('unit_property', Auth::user()->property)
        ->where('tenant_status', 'active')
        ->count();

        $current_bill_no = DB::table('units')
        ->join('tenants', 'unit_id', 'unit_tenant_id')
        ->join('billings', 'tenant_id', 'billing_tenant_id')
        ->where('unit_property', Auth::user()->property)
        ->max('billing_no') + 1;
        
        if($request->action === 'add_move_in_charges'){
            for($i = 1; $i<$no_of_bills; $i++){
                DB::table('billings')->insert(
                    [
                        'billing_tenant_id' => $request->tenant_id,
                        'billing_no' => $current_bill_no++,
                        'billing_date' => $request->billing_date,
                        'billing_start' =>  $request->input('billing_start'.$i),
                        'billing_end' =>  $request->input('billing_end'.$i),
                        'billing_desc' =>  $request->input('billing_desc'.$i),
                        'billing_amt' =>  $request->input('billing_amt'.$i)
                    ]);
            }
            return back()->with('success', ($i-1).' bills have been posted!');
        }else{
          $no_of_billed = 1;
            for($i = 1; $i<=$active_tenants; $i++){
               if($request->input('billing_amt'.$i) > 0){
                $no_of_billed++;
                DB::table('billings')->insert(
                    [
                        'billing_no' => $current_bill_no++,
                        'billing_tenant_id' => $request->input('billing_tenant_id'.$i),
                        'billing_date' => $request->billing_date,
                        'billing_start' => $request->input('billing_start'.$i),
                        'billing_end' => $request->input('billing_end'.$i),
                        'billing_desc' => $request->input('billing_desc'.$i),
                        'billing_amt' =>  $request->input('billing_amt'.$i)
                    ]);

                    if($request->billing_desc1 === 'Water'){
                        DB::table('tenants')
                        ->where('tenant_id', $request->input('billing_tenant_id'.$i))
                        ->where('tenant_status', 'active')
                       
                        ->update(
                                    [
                                        
                                        'previous_water_reading' => $request->input('current_reading'.$i),
                                    ]
                                );
                    }elseif($request->billing_desc1 === 'Electricity'){
                        DB::table('tenants')
                        ->where('tenant_id', $request->input('billing_tenant_id'.$i))
                        ->where('tenant_status', 'active')
                        
                        ->update(
                                    [
                                        
                                        'previous_electric_reading' => $request->input('current_reading'.$i),
                                    ]
                                );
                    }

                    DB::table('tenants')
                    ->where('tenant_id', $request->input('billing_tenant_id'.$i))
                    ->where('tenant_status', 'active')
                    ->where('tenants_note', 'new')
                    ->update(
                                [
                                    'tenants_note' => ''
                                ]
                            );
                    
        
               
               }
            }
            return redirect('/bills')->with('success', ($no_of_billed-1).' '.$request->billing_desc1.' bills have been posted!');
        }
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
    public function destroy($tenant_id, $billing_id)
    {


        //  DB::table("billings")
        //  ->join('tenants', 'billing_tenant_id', 'tenant_id')
        //  ->join('units', 'unit_tenant_id', 'unit_id')
        // ->where('unit_property', Auth::user()->property)
        // // ->whereIn('billing_desc', ['Water', 'Electricity'])
        // ->where('billing_desc', 'Rent')
        // ->delete();

        DB::table('billings')->where('billing_id', $billing_id)->delete();
        return back()->with('success', 'bill has been deleted!');
    }
}