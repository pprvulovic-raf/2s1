<?php

require_once "Skill.class.php";

$skill = new Skill([ 'id'=>$_GET['id'] ]);

echo json_encode($skill);

