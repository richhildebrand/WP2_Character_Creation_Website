<?php

class ListTemplates
{
	public function ListClasses()
	{
		//GetAllClasses
		//for each class, print or echo?
		echo $this->RadioTemplate('classes', 1, 'Paladin', 'checked');
	}

//unindented because EOF cannot of proceeding whitespace... lolphp
public function RadioTemplate($catagory, $id, $description, $checked)
{
   return <<<EOF
	   <input name="$catagory" value="$id" type="radio" $checked/>
	   <span> $description </span>
EOF;
}

}