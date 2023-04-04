<?php
    class Covek{
        private $ime;
        private $starost;

        public function __construct( $params = null ){
            if($params==null){
                $this->ime = '';
                $this->starost = 1;
            }
            else{
                if(isset($params['ime'])){
                    $this->ime = $params['ime'];
                }
                if(isset($params['starost'])){
                    $this->starost = $params['starost'];
                }
            }
        }

        public function getIme(){
            return $this->ime;
        }
        public function setIme($novoIme){
            if($novoIme=='djole'){
                echo "a ne mogu se zovem djole...<br>";
                return false;
            } else{
                $this->ime = $novoIme;
            }
        }
        public function rodjendan(){
            $this->starost++;
            echo "uraaa ~<:) <br>";
        }
        public function pozdrav(){
            return "Zdravo ja sam " . $this->ime . " i imam " . $this->starost . " godina.";
        }
    }

    $pera = new Covek([
        'ime'=>"Pera",
        'starost'=>20
    ]);
    echo $pera->getIme();
    $pera->setIme("djole");
    $pera->rodjendan();
    echo $pera->pozdrav() . '<br>';
?>