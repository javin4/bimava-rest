<?php

namespace App\Http\Controllers;

use App\Models\LV;
use App\Models\Project;
use Illuminate\Http\Request;
use PHPUnit\Framework\Exception;
use App\Http\Resources\LVResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Transformers\LVTransformer;
use Illuminate\Support\Facades\Validator;

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

     public function allByProjectID(Request $req, $project_id){
        $output = DB::table('lvs')
                ->where('project_id', '=', $project_id)
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
    public function store(Request $req){
        $validator = Validator::make($req->all(), [
            'name' => 'required|string',
            'kennung' => 'required|string',
            'project_id' => 'required|string',
           // 'email' => 'required|email',
           // 'job_title' => 'required|string',
           // 'active' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 422);
        }

        $project = Project::findOrFail($req->project_id);

        DB::beginTransaction();
        try {
            $lv = LVTransformer::toInstance($validator->validate());
            $lv->save();
            $project->lvs()->save($lv);
            DB::commit();
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            DB::rollBack();
            return response()->json($ex->getMessage(), 409);
        }
            return response()->json($lv, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LV  $lV
     * @return \Illuminate\Http\Response
     */
    public function show(LV $lV){
        return "TODO";
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

    public function update(Request $request, $id){
        //return $id;
        $lv = LV::findorfail($id);
        $validator = Validator::make($request->all(), [  
            'name' => 'sometimes|required|string',  
            'kennung' => 'sometimes|required|string',  
        ]);  
    
        if ($validator->fails()) {  
            return response()->json($validator->errors()->toArray(), 422);  
        }  
    
        DB::beginTransaction();  
        try {  
            $updated_lv = LVTransformer::toInstance($validator->validate(), $lv);  
            $updated_lv->save();  
            DB::commit();  
        } catch (Exception $ex) {  
            Log::info($ex->getMessage());  
            DB::rollBack();  
            return response()->json($ex->getMessage(), 409);  
        }  
    
        return response()->json($updated_lv, 200);
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
