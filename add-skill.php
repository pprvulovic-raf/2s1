<?php

require_once "Skill.class.php";

$s = new Skill( $_POST );
$s->save();
echo json_encode($s);