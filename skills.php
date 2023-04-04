<?php

require_once "Skill.class.php";

$ids = Skill::getAllIDs();

echo json_encode($ids);