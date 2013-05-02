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
	<div id="outline"style="width:250px;height:20px;border:1px solid #000;background:#990000">
		<div id="fillin" class="hpbarfill" style="width:$barwidthpx;height:20px;">
			<center>
				<div id="innertext"style="width:250px;height:20px;">
					<font style="color:white">$current / $max</font>
				</div>
			</center>
		</div>
	</div>
</div>
<br/>
EOF;
}

}