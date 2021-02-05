<?php

namespace App\Http\Controllers;

use App\Models\LV;
use PHPUnit\Framework\Exception;
use Illuminate\Http\Request;
use App\Http\Resources\LVResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $output = DB::table('lvs')
                ->select('id', 'name', 'kennung', 'project_id')
                ->orderBy('kennung', 'asc')
                ->get();
 
        if ($output->isEmpty()) {
            return response()->json($output, 404);
            }

        if ($output->isNotEmpty()) {
            return response()->json($output, 200);
            }
    }

     public function allByProjectID(Request $req){
        $output = DB::table('lvs')
                ->where('project_id', '=', $req->project_id)
                ->select('id', 'name', 'kennung', 'project_id')
                ->orderBy('kennung', 'asc')
                ->get();
        if ($output->isEmpty()) {
            return response()->json($output, 204);
            }

        if ($output->isNotEmpty()) {
            return response()->json($output, 200);
            }
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
     * @param  \App\Models\LV  $lV
     * @return \Illuminate\Http\Response
     */
    public function show(LV $lV){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LV  $lV
     * @return \Illuminate\Http\Response
     */
    public function edit(LV $lV)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LV  $lV
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LV $lV)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LV  $lV
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $lv = LV::findorfail($id);
        DB::beginTransaction();  
        try {  
            $lv->delete();  
            // for softdelete;
            // $company->active = false;  
            // $company->save();  
            DB::commit();  
        } catch (Exception $ex) {  
            Log::info($ex->getMessage());  
            DB::rollBack();  
            return response()->json($ex->getMessage(), 409);  
        }  
    
        return response()->json('LV has been deleted', 204);  
    }
}
