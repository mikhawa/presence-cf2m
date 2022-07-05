<?php

include_once 'DbConfig.class.php';

class Conge {
    protected $dbConn;

    public function __construct($sessionID) {
        $this->dbConn = new DbConfig();

        echo "Congés associés à la session id=".$sessionID;

        $result = $this->dbConn->select("SELECT ladate,letype FROM leconge WHERE lasession_idlasession=".$sessionID);
        
        foreach($result as $cle=>$valeur){
            switch($valeur['letype']){
                case 1: $type="matin"; break;
                case 2: $type="après-midi"; break;
                case 3: $type="toute la journée"; break;
                default: $type="autre";
            }
            echo "<p>Congé du ".$valeur['ladate']." : ".$type."</p>";
            //print_r($valeur);
        }
    }

}
?>