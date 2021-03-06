<?php

// Enum: type de resolution
abstract class Type_de_Resolution
{
	const	addition_simple = 0;
	const	addition_a_trou = 1;
	const	substraction_simple = 2;
	const	substraction_a_trou = 3;
	const	operation_mentale = 4;
	const	operation_a_trou = 5;
	const	simple_operation = 6;
	const	substraction_inverse = 7;
	const	uninterpretable = 8;

	private function	_construct(){}
}

function	print_tdr($type_de_resolution)
{
	switch($type_de_resolution)
	{
		case Type_de_Resolution::addition_simple :
			echo "addition simple";
			break;
		case Type_de_Resolution::addition_a_trou :
			echo "addition a trou";
			break;
		case Type_de_Resolution::substraction_simple :
			echo "soustraction simple";
			break;
		case Type_de_Resolution::substraction_a_trou :
			echo "soustraction a trou";
			break;
		case Type_de_Resolution::simple_operation :
			echo "operation simple";
			break;
		case Type_de_Resolution::operation_a_trou :
			echo "operation a trou";
			break;
		case Type_de_Resolution::substraction_inverse :
			echo "soustraction inverse";
			break;
		case Type_de_Resolution::uninterpretable :
			echo "ininterpretable";
			break;
		default :
			echo "(type de resolution non reconnu)";
	}
}

?>
