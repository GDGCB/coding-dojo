<?php
declare(strict_types = 1);



class PasswordVerifier
{

	const SPECIAL_CHARACTERS = ["#", "$", "*"];



	public function verify($password, $sleep = FALSE)
	{

		$validations = [
			\Validations\MinLengthValidator::class => null,
		];

		$validate = function(&$result, $class) use ($password) {
			/** @var \Validations\IValidator $validator */
			$validator = new $class;
			$result = $validator->isValid($password);
		};

		array_walk($validations, $validate);

		$failingValidations = array_filter($validations, function($result) {
			return $result === false;
		});

		$errorMap = [
			\Validations\MinLengthValidator::class => LessThanMinimalLengthException::class
		];

		array_walk($failingValidations, function ($false, $class) use($errorMap){
			throw new $errorMap[$class];
		});


		if ($sleep) {
			sleep(1);
		}

		if (strlen($password) < 10) {
			throw new LessThanMinimalLengthException;
		}
		if (strlen($password) > 100) {
			throw new MoreThanMaximumLengthException;
		}
		if (strtoupper($password) === $password) {
			throw new PasswordDoesntContainLowerCaseCharacter;
		}
		if (strtolower($password) === $password) {
			throw new PasswordDoesntContainUpperCaseCharacter;
		}

		# intersection of password as array and special characters is empty
		$splitted = str_split($password);
		if (!array_intersect(PasswordVerifier::SPECIAL_CHARACTERS, $splitted)) {
			throw new PasswordDoesntContainSpecialCharacter;
		}

		if (in_array($splitted[0], self::SPECIAL_CHARACTERS)) {
			throw new PasswordStartsWithSpecialCharacter;
		}

		if (preg_match("/([0-9])$/", $password)) {
			throw new PasswordEndsWithNumberException;
		}

		return TRUE;
	}
}
