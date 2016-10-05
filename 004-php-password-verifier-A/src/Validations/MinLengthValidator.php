<?php
declare(strict_types = 1);


namespace Validations;


class MinLengthValidator implements IValidator
{

	public function isValid($password)
	{
		return strlen((string)$password) >= 10;
	}
}