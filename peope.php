<?php 

abstract class Person
{
	abstract public function create();
}

class English extends Person
{
	public function create()
	{
		return 'Hello!';
	}
}

class German extends Person
{
	public function create()
	{
		return 'Hallo!';
	}
}

class French extends Person
{
	public function create()
	{
		return 'Bonjour!';
	}
}

function greeting($people)
{
	foreach ($people as $person) {
		echo $person->create() . '<br>';
	}
}

$type = "English";

$people = [
	new $type(),
	new German(),
	new French()
];

greeting($people);
?>