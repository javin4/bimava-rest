<?php

namespace App\Importer;

use XMLReader;
use SimpleXMLElement;
use App\Models\On\Onlb;
use App\Models\On\Onlg;
use App\Models\On\Onulg;
use App\Models\On\Comment;

class OnlbImporter{

    private $path;
    public $onlb;

    public function __construct($path){
        $this->path = $path;
    }

    public function import(){
        $this->metadaten = $this->readXMLGroup($this->path,'metadaten');
        $this->kenndaten = $this->readXMLGroup($this->path,'lbkenndaten');
        $this->onlb = Onlb::firstOrNew($this->metadaten,$this->kenndaten, [  	]);
        $svb = $this->readXMLGroup($this->path,'svb');
        
        $this->onlb->svb_vorbemerkung = $svb['vorbemerkung'];
        $this->onlb->svb_kommentar = $svb['kommentar'];
        $this->onlb->save();
        
        //$this->readLG($this->path);
        return  $this->onlb;


        //$test = $this->readLG($this->path);
        //return $test;
    }


    function readXMLGroup($path,$elementName){
        $xml = new XMLReader();
        $xml->open($path, NULL, LIBXML_PARSEHUGE);
        while ($xml->read()) {
          if ($xml->nodeType === \XmlReader::ELEMENT && $xml->name===$elementName) {
            $metadatenXML = new SimpleXMLElement($xml->readOuterXML());
            foreach ($metadatenXML->children() as $meta){
                $data[$meta->getName()] = $this->ONdataFormater($meta);
            }
          }
        }
        $xml->close();
        return  $data;
    }

    function StringToDate($object){
        return date_create_from_format('Y-m-d\TG:i:s\Z', $object->__toString());
    }

    function ONdataFormater($object){
        switch ($object->getName()){
        case "herausgeber":
            $data = "TODO";//$this->readFirm($meta);
            break;
        case "erstelltam":
            $data = $this->StringToDate($object); 
            break;
        case "vorbemerkung":
            $data = $this->innerNodeToString($object);  
            break;
        case "aenderungsbeschreibung":
            $data = $this->innerNodeToString($object);  
            break;
        case "kommentar":
            $data = $this->innerNodeToString($object);
            break;
        default:
            $data = $object->__toString();
            break;
        }
        return $data;
    }

    function innerNodeToString($node){
        return substr($node->asXML() , strlen($node->getName())+2,  -(strlen($node->getName())+3)) ;
    }

    function readFirm($FirmNode){
        //$firm = new SimpleXMLElement($xmlNode->readOuterXML());
        return $FirmNode;
    }

    function xml_attribute($object, $attribute){
        if(isset($object[$attribute]))
            return (string) $object[$attribute];
    }

    function aenderungskennzeichnungen($Xml){
        foreach ($Xml->children() as $node){
            switch ($node->getName()){
                    case 'lbversion':
                        $commentData['lbversion'] = $this->ONdataFormater($node);
                        break;
                    case 'aenderungsumfang':
                        $commentData['aenderungsumfang'] = $this->ONdataFormater($node);
                        break;
                    case 'aenderungsbeschreibung':
                        $commentData['aenderungsbeschreibung'] = $this->ONdataFormater($node);
                        break;
                    default:
                        break;
            }
        }
        return $commentData;
    }

    function readLG($path){
        $xml = new XMLReader();
        $xml->open($path, NULL, LIBXML_PARSEHUGE);
        while ($xml->read()) {
            if ($xml->nodeType === \XmlReader::ELEMENT && $xml->name=== "lg-liste") {
                $node_lgListe = new SimpleXMLElement($xml->readOuterXML());
                foreach ($node_lgListe->children() as $lg){
                    if ($lg->getName() === "lg") {             
                    
                        $data_lg["lg_nr"] = $this->xml_attribute($lg, "nr");
                                        
                        $node_lgEigenschaften = $lg->{'lg-eigenschaften'};
                        $commentData = array();
                        foreach ($node_lgEigenschaften->children() as $Eigenschaft) {
                            switch ($Eigenschaft->getName()){
                            case  'ueberschrift': 
                                    $data_lg['bezeichnung'] =  $this->ONdataFormater($Eigenschaft);
                                    break;

                            case  'aenderungskennzeichnungen':      
                                    $commentData = array_merge( $commentData,$this->aenderungskennzeichnungen($Eigenschaft) );
                                    break;

                            case 'kommentar':      
                                    $commentData['kommentar'] = $this->ONdataFormater($Eigenschaft);
                                    break;   
                        
                            default:
                                    $data_lg[$Eigenschaft->getName()] = $this->ONdataFormater($Eigenschaft);
                                    break;
                            }
                        }
                        //$comment->save();
                        // ------------------------------------
                        // - build onlg------------------------    
                        
                        $onlg = Onlg::firstOrNew($data_lg,[  	]);
                        $onlg->onlb()->associate($this->onlb);
                        $onlg->save();
                        /*
                        if (!empty($commentData)){
                            // dd($commentData);
                            //$data=$commentData;
                            
                            $comment = new Comment($commentData);
                            //::firstOrNew($commentData,[  	]);
                            //dd($comment);
                            $onlg->comments()->save($comment);
                        }
                        */



                        //iteratiung trough ulg list.
                        
                        $node_ulgListe = $lg->{'ulg-liste'};
                        $data_ulg = array();
                        foreach ($node_ulgListe->children() as $ulg){
                            $data_ulg['ulg_nr'] =  $data_lg["lg_nr"] . $this->xml_attribute($ulg, 'nr');
                            $data_ulg['ulg_part_nr'] = $this->xml_attribute($ulg, 'nr');
                            $data_ulg['bezeichnung'] = $ulg->{'ulg-eigenschaften'}->{'ueberschrift'}->__toString();

                            $on_ulg = Onulg::firstOrNew($data_ulg,[  	]); 
                            $on_ulg->onlg()->associate($onlg); 
                            $on_ulg->save();

                        }

                    }
                }
            }
          
            
        }//end while
        $xml->close();
        //return $data_ulg;
    }
}//end of class