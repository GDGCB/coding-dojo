<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;



class PasswordVerifierTest extends TestCase
{

	const VALID_PASSWORD = "razdvaTr#ictyri";

	/**
	 * @var PasswordVerifier
	 */
	private $passwordVerifier;



	public function testMinLength()
	{
		$this->expectException(LessThanMinimalLengthException::class);
		$this->passwordVerifier->verify("abcdefghi");
	}



	public function testMaxLength()
	{
		$this->expectException(MoreThanMaximumLengthException::class);
		$this->passwordVerifier->verify(random_bytes(101));
	}



	public function testIsNotNull()
	{
		$this->expectException(EmptyPasswordException::class);
		$this->passwordVerifier->verify(NULL);
	}



	public function testPasswordDoesContainLowerCaseCharacter()
	{
		$this->expectException(PasswordDoesntContainLowerCaseCharacter::class);
		$this->passwordVerifier->verify("AHAAHAAHAAHA");
	}



	public function testPasswordDoesContainUpperCaseCharacter()
	{
		$this->expectException(PasswordDoesntContainUpperCaseCharacter::class);
		$this->passwordVerifier->verify("ahahahhahaa");
	}



	public function testPasswordDoesContainSpecialCharacter()
	{
		$this->expectException(PasswordDoesntContainSpecialCharacter::class);
		$this->passwordVerifier->verify("aAhahahhahaa");
	}



	public function testPasswordDoesStartWithSpecialCharacter()
	{
		$this->expectException(PasswordStartsWithSpecialCharacter::class);
		$this->passwordVerifier->verify("#aAhahahhahaa");
	}



	public function testPasswordEndsWithNumber()
	{
		$this->expectException("PasswordEndsWithNumberException");
		$this->passwordVerifier->verify("razdvaTr#ictyri5");
	}



	public function testReturnTrueWhenSuccess()
	{
		$this->assertEquals(TRUE, $this->passwordVerifier->verify(self::VALID_PASSWORD));
	}



	public function testRunsAtLeastOneSecond()
	{
		$timer = microtime(TRUE);
		$this->passwordVerifier->verify(self::VALID_PASSWORD, TRUE);
		$this->assertGreaterThan(1.0, microtime(TRUE) - $timer);

	}



	protected function setUp()
	{
		parent::setUp();

		$this->passwordVerifier = new PasswordVerifier();
	}

}
