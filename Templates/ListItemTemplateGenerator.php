<?php
class ListItemTemplateGenerator
{




//unindented because EOF cannot of proceeding whitespace... lolphp
public function RadioTemplate($catagory, $value, $description, $checked)
{
   return <<<EOF
	   <input name="$catagory" value="$value" type="radio" $checked/>
	   <span> $description </span>
EOF;
}





}