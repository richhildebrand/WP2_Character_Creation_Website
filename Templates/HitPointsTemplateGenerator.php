<?php
include_once("../Models/HitPoints.php");

class HitPointsTemplateGenerator
{

//Unindented because EOF cannot have preceding whitespace
public function ListCharacterHitPoints($hitPoints)
{
	$max = $hitPoints->GetMaxHitPoints();
	$current = $hitPoints->GetCurrentHitPoints();

return <<<EOF
<div>
	<span> Max Hit Points: </span>
	<span> $max </span>
	<span> Current Hit Points: </span>
	<span> $current </span>
<div>
EOF;
}

}