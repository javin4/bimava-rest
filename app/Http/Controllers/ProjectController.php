<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use PHPUnit\Framework\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ProjectResource;

class ProjectController extends Controller{

    public function index(){
        $output = DB::table('projects')
                // TODO: User hat Privileg auf bearbeitung        
                // ->where('user_id', '=', $req->user_id)
                ->select('id', 'name', 'kennung')
                ->orderBy('kennung', 'asc')
                ->get();
 
        if ($output->isEmpty()) {
            $output = ProjectResource::make($output);
            return $output->response()->setStatusCode(204);
            }

        if ($output->isNotEmpty()) {
            $output = ProjectResource::make($output);
            return $output->response()->setStatusCode(200);
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
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req){
        $output = DB::table('projects')
      
                ->where('id', '=', $req->id)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req){
        $project = Project::findorfail($req->id);
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
        /*return $project;*/
    }
}
