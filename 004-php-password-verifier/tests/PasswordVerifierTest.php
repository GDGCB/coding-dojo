<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;



class PasswordVerifierTest extends TestCase
{

	public function testFail()
	{
		$passwordVerifier = new PasswordVerifier();

		$this->assertEquals(TRUE, $passwordVerifier->verify());
	}
}
