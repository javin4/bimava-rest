<?php

namespace App\Importer;

use XMLReader;
use SimpleXMLElement;
use App\Models\ON\ON_Position;

class OnPosImporter{

    private $path;

    public function __construct($path){
        $this->path = $path;
    }
    
    public function import(){
        $out = $this->importOnlb($this->path);
        return $out;
    }

    function innerNodeToString($node){
        $string = substr($node->asXML() , strlen($node->getName())+2,  -(strlen($node->getName())+3)) ;
        return (strlen($string) < 1 ? null : $string);
    }

    function StringToDate($object){
        return date_create_from_format('Y-m-d\TG:i:s\Z', $object->__toString());
    }

    function xml_attribute($object, $attribute){
        if(isset($object[$attribute]))
            return (string) $object[$attribute];
    }

    function get_upos($node_pos,$parent_id ){
        if ($node_pos->{'ungeteilteposition'}){
            $data_pos['id'] = $parent_id . $this->xml_attribute($node_pos, 'nr');
            $data_pos['parent_id'] =  $parent_id;

            $node_upos_eigenschaften = $node_pos->{'ungeteilteposition'}->{'pos-eigenschaften'};
            $data_pos['postyp'] =  'upos';
            $data_pos['title'] = $node_upos_eigenschaften->{'stichwort'};
            $data_pos['text'] = $this->innerNodeToString($node_upos_eigenschaften->{'langtext'});
            $data_pos['eh'] = (strlen($node_upos_eigenschaften->{'einheit'}) < 1 ? null : $node_upos_eigenschaften->{'einheit'});
         
            $onpos = ON_Position::firstOrNew($data_pos,[  	]);
            $onpos->save();
        }
    }

    function get_gpos($node_pos, $parent_id){
        if ($node_pos->{'grundtext'}) { 
            $data_pos['id'] = $parent_id . $this->xml_attribute($node_pos, 'nr');
            $data_pos['parent_id'] =  $parent_id;

            $data_pos['postyp'] =  'gpos';
            $data_pos['text'] = $this->innerNodeToString($node_pos->{'grundtext'}->{'langtext'});
          
            $onpos = ON_Position::firstOrNew($data_pos,[  	]);
            $onpos->save();

        }
    }

    function get_fpos($node_pos,$parent_id){
        if ($node_pos->{'grundtext'}) {   
            foreach ($node_pos->children() as $node_fpos){
                if ($node_fpos->getName() ==='folgeposition'){

                    $node_fpos_eigenschaften = $node_fpos->{'pos-eigenschaften'};

                    $data_fpos['id'] = $parent_id . $this->xml_attribute($node_pos, 'nr') .$this->xml_attribute($node_fpos, 'ftnr');
                    $data_fpos['parent_id'] =  $parent_id;
                    $data_fpos['title'] =  $node_fpos_eigenschaften->{'stichwort'};
                    $data_fpos['text'] = $this->innerNodeToString( $node_fpos_eigenschaften->{'langtext'});
                    $data_fpos['eh'] = (strlen( $node_fpos_eigenschaften->{'einheit'}) < 1 ? null : $node_fpos_eigenschaften->{'einheit'});
                    $data_fpos['postyp'] =  'fpos';

                    $on_fpos = ON_Position::firstOrNew($data_fpos,[  	]);
                    $on_fpos->save();
                }
            }
        }    
    }

    function importOnlb($path){
        ON_Position::firstOrCreate([
            'id' => '_root',
            'postyp' => '_',
        ]);

        $xml = new XMLReader();
        $xml->open($path, NULL, LIBXML_PARSEHUGE);
        while ($xml->read()) {
            if ($xml->nodeType === \XmlReader::ELEMENT && $xml->name=== "lg-liste") {
                $xmlnode_lgListe = new SimpleXMLElement($xml->readOuterXML());
                foreach ($xmlnode_lgListe->children() as $node_lg){
                    if ($node_lg->getName() === "lg") {             

                        $data_lg['id'] = $this->xml_attribute($node_lg, "nr");
                        $data_lg['title'] =  $node_lg->{'lg-eigenschaften'}->{'ueberschrift'};
                        $data_lg['text'] =  $node_lg->{'lg-eigenschaften'}->{'vorbemerkung'};
        
                        $onpos = ON_Position::firstOrNew($data_lg,[  	]);
                        $onpos->postyp = 'lg';
                        $onpos->parent_id = "_root";
                        $onpos->save();

                        //iteratiung trough ulg list.

                        foreach ($node_lg->{'ulg-liste'}->children() as $node_ulg){
                            $data_ulg['id'] =  $data_lg["id"] . $this->xml_attribute($node_ulg, 'nr');
                            $data_ulg['title'] = $node_ulg->{'ulg-eigenschaften'}->{'ueberschrift'}->__toString();
                            $data_ulg['postyp'] =  'ulg';
                            $data_ulg['parent_id'] =  $data_lg["id"];
                            $data_ulg['text'] = $this->innerNodeToString($node_ulg->{'ulg-eigenschaften'}->{'vorbemerkung'});

                            $onpos = ON_Position::firstOrCreate($data_ulg,[  	]);

                            foreach ($node_ulg->{'positionen'}->children() as $node_pos){

                                $this->get_upos($node_pos, $data_ulg['id']);
                                $this->get_gpos($node_pos, $data_ulg['id']);
                                $this->get_fpos($node_pos, $data_ulg['id']);

                            }// foreach $node_pos
                        }// foreach $node_ulg
                    }// if lg
                }//foreach $node_lg
            }//if lg-liste
        }//end while
        $xml->close();
    }
}