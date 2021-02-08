<?php

namespace Database\Seeders\Seeds;

use App\Models\PPhase;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PPhaseSeeder extends Seeder{
   
    public function run(){

        $array = [

        ];

        $arr = array(
// Projektphase
            ['f57076a7-4b94-482c-a6d9-e816ac76e060','','_root_pph','_root_pph'],
            ['566509c5-9fa2-4715-862e-285660f6f188','f57076a7-4b94-482c-a6d9-e816ac76e060','PPH 1','Projektvorbereitung'],
            ['1e123069-3d02-4658-b7c7-9f30c8b100a0','566509c5-9fa2-4715-862e-285660f6f188','PPH 1.A','Bedarfsplanung'],
            ['f4e9d6d2-265b-40f1-ae07-774fde44a99f','566509c5-9fa2-4715-862e-285660f6f188','PPH 1.B','Planungsgrundlagen'],
            ['f358d6a4-a184-42b7-8593-d0a16d19b6ec','566509c5-9fa2-4715-862e-285660f6f188','PPH 1.C','Machbarkeitsstudie'],
            ['3f015621-9747-4d8a-a965-5976b00b244e','566509c5-9fa2-4715-862e-285660f6f188','PPH 1.D','Verfahrensvorbereitung Planer - Vergaben'],
            ['931b1ac3-b869-4c1e-a8b4-59d7abdb6f84','566509c5-9fa2-4715-862e-285660f6f188','PPH 1.E','Planerauswahl, Wettbewerb, VHV'],
            ['b749fd93-f5e7-4d75-9620-8bbb138a9110','f57076a7-4b94-482c-a6d9-e816ac76e060','PPH 2','Planung'],
            ['2d206589-a029-4dee-a7d5-741f9f71213f','b749fd93-f5e7-4d75-9620-8bbb138a9110','PPH 2.A','Grundlagenanalyse'],
            ['5e1f9117-1116-426c-bc7d-304ba229aa3f','b749fd93-f5e7-4d75-9620-8bbb138a9110','PPH 2.B','Vorentwurf'],
            ['91889d30-f394-49b9-840f-d95c756725c6','b749fd93-f5e7-4d75-9620-8bbb138a9110','PPH 2.C','Entwurfsplanung'],
            ['35067724-46f8-4137-ab59-7a4b2105323c','b749fd93-f5e7-4d75-9620-8bbb138a9110','PPH 2.D','Einreichplanung'],
            ['0776a639-159f-4127-b8c0-73580a4c3cd9','f57076a7-4b94-482c-a6d9-e816ac76e060','PPH 3','Ausführungsvorbereitung'],            
            ['446effa5-afa6-45a3-8ffc-a8dab799318e','0776a639-159f-4127-b8c0-73580a4c3cd9','PPH 3.A','Ausführungsplanung'],
            ['ea35266b-1416-4636-ab8f-8555cbd9ecd6','0776a639-159f-4127-b8c0-73580a4c3cd9','PPH 3.B','Ausschreibung (LVs)'],
            ['b29a3f0f-e9a9-4118-a316-fb9a00f67c09','0776a639-159f-4127-b8c0-73580a4c3cd9','PPH 3.C','Mitwirkung bei der Vergabe'],
            ['29d6369c-929e-4d6c-ac4a-1981989c01c6','f57076a7-4b94-482c-a6d9-e816ac76e060','PPH 4','Ausführung'],
            ['0595a189-4906-4882-be8f-20ce8c1da9c6','29d6369c-929e-4d6c-ac4a-1981989c01c6','PPH 4','Begleitung der Bauausführung'],
            ['1a7f87f7-4d34-4ce4-b3c6-c1f5cff5afbe','29d6369c-929e-4d6c-ac4a-1981989c01c6','PPH 4','örtliche Bauaufsicht und Dokumentation'],
            ['644f6ce6-0879-4f23-9b73-e35578f08b27','f57076a7-4b94-482c-a6d9-e816ac76e060','PPH 5','Objektbetreuung'],
           
// Leistungsphase Objektplanung

            ['7140c1f0-3f7e-4011-be89-de295a795201','','_root_lph','_root_lph'],
            ['357eca0f-2c19-4393-9a15-906a381b1a21','7140c1f0-3f7e-4011-be89-de295a795201','LPH 1','Grundlagenanalyse'],
            ['f2127dd3-ddb3-4d91-ae50-dfc1580feddf','7140c1f0-3f7e-4011-be89-de295a795201','LPH 2','Vorentwurf'],
            ['fad96b85-b572-44b5-8d28-3234f46d9505','7140c1f0-3f7e-4011-be89-de295a795201','LPH 3','Entwurfsplanung'],
            ['d309bf03-2120-44d1-b061-b16e1be3f899','7140c1f0-3f7e-4011-be89-de295a795201','LPH 4','Einreichplanung'],
            ['3f4bf96e-7055-4890-9c6b-b3fdc7c6bb76','7140c1f0-3f7e-4011-be89-de295a795201','LPH 5','Ausführungsplanung'],
            ['1025cb1b-0afe-4a8f-991b-21537c297189','7140c1f0-3f7e-4011-be89-de295a795201','LPH 6.1','Ausschreibung'],
            ['67d7ace7-5a4f-4364-8131-38b050097d37','7140c1f0-3f7e-4011-be89-de295a795201','LPH 6.2','Mitwirkung bei der Vergabe'],
            ['5750f4ea-2865-4ece-99e6-5216f4ad1f1d','7140c1f0-3f7e-4011-be89-de295a795201','LPH 7','Begleitung der Bauausführung'],
            ['7ea94e15-1d31-41cf-add0-3312e5a632c5','7140c1f0-3f7e-4011-be89-de295a795201','LPH 8','örtliche Bauaufsicht und Dokumentation'],
            ['92886416-1a69-4d64-bbbd-e336d505ff90','7140c1f0-3f7e-4011-be89-de295a795201','LPH 9','Objektbetreuung'],
        );

        //create objects
            foreach ($arr as &$row) {
                DB::table('pphases')->insert(
                [            
                    'id' =>  $row[0],
                    'kennung' => $row[2],
                    'name' => $row[3],
                ]
                );
            }
            unset($row); // break the reference with the last element

        //relation Parent->child
            foreach ($arr as &$row) {
                if ($row[1]==!Null) {
                    $parent=PPhase::find($row[1]);
                    $child=PPhase::find($row[0]);
                    $parent->children()->save($child);
                }
            }
            unset($row); // break the reference with the last element

        /*

        $root = PPhase::find('f57076a7-4b94-482c-a6d9-e816ac76e060');
        $pph1 = PPhase::find('566509c5-9fa2-4715-862e-285660f6f188');
        $pph1A = PPhase::find('1e123069-3d02-4658-b7c7-9f30c8b100a0');
        $pph1B = PPhase::find('f4e9d6d2-265b-40f1-ae07-774fde44a99f');

        $root->children()->save($pph1);
        $pph1->children()->save($pph1A);
        $pph1A->children()->save($pph1B);
        
        */

        /*
        for ($i = 1; $i <= 10; $i++) {
            $e = new PPhase;
            $e->name = "Tischler".$i;
            $e->kennung = "Tischler".$i;
            $e->save();
        }
        
        $e = new PPhase;
        $e->name = "Tischler";
        $e->kennung = "TI";
        $e->save();
        */




        
    }
}
