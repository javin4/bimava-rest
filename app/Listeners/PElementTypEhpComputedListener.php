<?php

namespace App\Listeners;

use App\Models\Element\PElementTyp;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PElementTypEhpComputedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {   
        
        //$a = PElementTyp::FindOrFail($event->PComponent->id);

        $id =$event->PComponent->id;
        $PElementTyps = PElementTyp::whereHas('PComponents', function ($query) use ($id) {
            $query->whereIn('p_component_id', [$id]);
        })->get();

        foreach ($PElementTyps as $PElementTyp) {
            $PElementTyp->ehp_result();
        }
     
        //return $output;
        //$a->ehp_result = 100;
    }
}
