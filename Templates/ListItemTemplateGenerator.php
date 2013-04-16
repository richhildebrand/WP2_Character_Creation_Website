<?php
class ListItemTemplateGenerator
{




//unindented because EOF cannot of proceeding whitespace... lolphp
public function RadioTemplate($catagory, $value, $description, $url, $checked)
{
   return <<<EOF
	   <input name="$catagory" value="$value" type="radio" $checked/>
	   <a href="$url" target="_blank"> $description </a>
EOF;
}





}