<?php
include_once("../Models/HitPoints.php");

class HitPointsTemplateGenerator
{

//Unindented because EOF cannot have preceding whitespace
public function ListCharacterHitPoints($hitPoints)
{
	$max = $hitPoints->GetMaxHitPoints();
	$current = $hitPoints->GetCurrentHitPoints();
	$barwidth = 250*($current/$max);
	$barwidthpx = strval($barwidth)	. "px";
	
return <<<EOF
<div>
	<span> Hit Points: </span>
	<span> $current </span>
	<span> out of </span>
	<span> $max </span>
<div>
<br/>
<div id="hpBar">
	<div id="fillin" style="width:$barwidthpx;height:20px; background:red;border:1px solid #000;">
		<center>
			<div id="outline" style="width:250px;height:20px;border:1px solid #000;">
				$current / $max
			</div>
		</center>
	</div>
</div>
<br/>
EOF;
}

}