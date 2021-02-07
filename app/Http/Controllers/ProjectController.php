<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use PHPUnit\Framework\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ProjectResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Transformers\ProjectTransformer;



class ProjectController extends Controller{

    public function index(){
        $output = Project::all();
        $output = DB::table('projects')
                ->select('id', 'name', 'kennung')
                ->orderBy('kennung', 'asc')
                ->get();   
        if ($output->isEmpty()) {
            return response()->json($output, 404);
            }

        if ($output->isNotEmpty()) {
            return response()->json($output, 200);
            }
    }

    
    public function index2(){
        $output = Project::with('lvs')->get(['id', 'kennung']);

        if ($output->isEmpty()) {
            return response()->json($output, 404);
            }

        if ($output->isNotEmpty()) {
            return response()->json($output, 200);
            }
    }


    public function store(Request $req){
        $validator = Validator::make($req->all(), [
            'name' => 'required|string',
            'kennung' => 'required|string',
           // 'email' => 'required|email',
           // 'job_title' => 'required|string',
           // 'active' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 422);
        }

        DB::beginTransaction();
        try {
            $project = ProjectTransformer::toInstance($validator->validate());
            $project->save();
            DB::commit();
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            DB::rollBack();
            return response()->json($ex->getMessage(), 409);
        }
            return response()->json($project, 200);
    }

    public function show($uid){
        $output = DB::table('projects')
                ->where('id', '=', $uid)
                ->select('id', 'name', 'kennung')
                ->orderBy('kennung', 'asc')
                ->get();
        if ($output->isEmpty()) {
            $output = ProjectResource::make($output);
            return $output->response()->setStatusCode(404);
            }

        if ($output->isNotEmpty()) {
            $output = ProjectResource::make($output);
            return $output->response()->setStatusCode(200);
            }

        return  $output;
    }

    public function update(Request $request, $id){
        //return $id;
        $project = Project::findorfail($id);
        $validator = Validator::make($request->all(), [  
            'name' => 'sometimes|required|string',  
            'kennung' => 'sometimes|required|string',  
        ]);  
    
        if ($validator->fails()) {  
            return response()->json($validator->errors()->toArray(), 422);  
        }  
    
        DB::beginTransaction();  
        try {  
            $updated_project = ProjectTransformer::toInstance($validator->validate(), $project);  
            $updated_project->save();  
            DB::commit();  
        } catch (Exception $ex) {  
            Log::info($ex->getMessage());  
            DB::rollBack();  
            return response()->json($ex->getMessage(), 409);  
        }  
    
        return response()->json($updated_project, 200);
        /*
        return (new ProjectResource($updated_project))  
            ->additional([  
                'meta' => [  
                    'success' => true,  
                    'message' => "Project updated"  
                ]  
            ]); */
    }

    public function destroy($id){
        $project = Project::findorfail($id);
        DB::beginTransaction();  
        try {  
            $project->delete();  
            // for softdelete;
            // $company->active = false;  
            // $company->save();  
            DB::commit();  
        } catch (Exception $ex) {  
            Log::info($ex->getMessage());  
            DB::rollBack();  
            return response()->json($ex->getMessage(), 409);  
        }  
    
        return response()->json('Project has been deleted', 204);  
    }
}
