<?php
require_once "db.php";

class Skill{
    public $id;
    public $naziv;
    public $opis;

    public function __construct($params){
        global $pdo;

        if(isset($params['id'])){
            $upit = $pdo->prepare("select * from skills where id=?");
            $upit->execute([$params['id']]);
            $skill = $upit->fetch();
            $this->id = $skill['id'];
            $this->naziv = $skill['naziv'];
            $this->opis = $skill['opis'];
        } else {
            $this->id = null;
            if(isset($params['naziv'])) $this->naziv = $params['naziv'];
            if(isset($params['opis'])) $this->opis = $params['opis'];
        }
    }

    public function save(){
        global $pdo;
        if($this->id==null){
            $upit = $pdo->prepare("insert into skills (naziv, opis) values (?,?) ");
            $upit->execute([ $this->naziv, $this->opis ]);
            $this->id = $pdo->lastInsertId();
        }
        else{
            $upit = $pdo->prepare("update skills set naziv=?, opis=? where id=? ");
            $upit->execute([ $this->naziv, $this->opis, $this->id ]);
        }
    }

    public static function getAllIDs(){
        global $pdo;
        $res = $pdo->query("select id from skills")->fetchAll();
        $ids = [];
        foreach($res as $red){
            $ids[] = $red['id'];
        }
        return $ids;
    }
}

/*
    $s = new Skill([ 
        'naziv'=>'python',
        'opis'=>'Lep jezik za sve'
    ]);
    $s->save();
    $s->naziv = 'promenjen';
    $s->save();
    print_r($s);

    $html = new Skill(['id'=>1]);
    $html->opis = "lep jezik za nista";
    $html->save();
    print_r($html);
*/
?>