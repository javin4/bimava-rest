<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\Framework\Exception;
use App\Models\Element\PComponent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Events\PComponentUpdatedEvent;
use Illuminate\Support\Facades\Validator;
use App\Http\Transformers\PComponentTransformer;
use App\Models\Element\PElementTyp;

class PComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PComponent::all();
    }

    public function indexPElementtyps(PComponent $PComponent){
      
        $id =$PComponent->id;
        $output = PElementTyp::whereHas('PComponents', function ($query) use ($id) {
            $query->whereIn('p_component_id', [$id]);
        })->get();
        return response()->json($output, 200);
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
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
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
            $project = PComponentTransformer::toInstance($validator->validate());
            $project->save();
            DB::commit();
            //-> TODO:event New Component
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            DB::rollBack();
            return response()->json($ex->getMessage(), 409);
        }
            return response()->json($project, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Element\PComponent  $PComponent
     * @return \Illuminate\Http\Response
     */
    public function show(PComponent $PComponent)
    {
        //return $PComponent;
        return response()->json($PComponent, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Element\PComponent  $pComponent
     * @return \Illuminate\Http\Response
     */
    public function edit(PComponent $pComponent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Element\PComponent  $pComponent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PComponent $PComponent){
   
        $validator = Validator::make($request->all(), [  
            'name' => 'sometimes|required|string',  
            'kennung' => 'sometimes|required|string',  
            'ehp_result' => 'sometimes|numeric', 
            'ehp_override' => 'sometimes|numeric', 
            'ehp_override_flag' => 'sometimes|boolean',
            //'ehp_computed' => 'sometimes|numeric',  
        ]);  

        if ($validator->fails()) {  
            return response()->json($validator->errors()->toArray(), 422);  
        }  

        DB::beginTransaction();  
        try {  
            $updated = PComponentTransformer::toInstance($validator->validate(), $PComponent);  
            $updated->save();  
            DB::commit();  


        } catch (Exception $ex) {  
            Log::info($ex->getMessage());  
            DB::rollBack();  
            return response()->json($ex->getMessage(), 409);  
        }  

        //-> TODO:event Update Component
        event(new PComponentUpdatedEvent($updated));
        return response()->json($updated, 200);
        /*
        return (new ProjectResource($updated_project))  
            ->additional([  
                'meta' => [  
                    'success' => true,  
                    'message' => "Project updated"  
                ]  
            ]); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Element\PComponent  $pComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy(PComponent $PComponent){
        DB::beginTransaction();  
        try {  
            $PComponent->delete();  
            DB::commit();  
        } catch (Exception $ex) {  
            Log::info($ex->getMessage());  
            DB::rollBack();  
            return response()->json($ex->getMessage(), 409);  
        }  
    
        return response()->json('PComponent has been deleted', 204);  
    }
}
