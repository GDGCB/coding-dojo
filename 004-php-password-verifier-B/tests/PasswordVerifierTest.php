<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

class PasswordVerifierTest extends TestCase
{
    /** @var  PasswordVerifier */
    private $passwordVerifier;

    public function setUp() {
        $this->passwordVerifier = new PasswordVerifier();
    }

    public function testMinLengthBad() {
        $this->expectException(MinLengthException::class);
        $this->passwordVerifier->verify("9IgO6Gi1p");
    }

    public function testGood() {
        $this->assertEquals(true, $this->passwordVerifier->verify("12IgO#6Gi1pk"));
        $this->assertEquals(true, $this->passwordVerifier->verify("123#45678áÁ"));
    }

    public function testMaxLengthBad() {
        $this->expectException(MaxLengthException::class);
        $this->passwordVerifier->verify("101n2WTskDn6HAltaIBcqrM5zJ7b4El3xEiMAU1CSVguqbrZMfOfrz2aoSjox1vKYhyb4SDEK8OeqT0rKPW4wA4vdFE2TU54Hq5Lc");
    }

    public function testNotNullNorEmpty() {
        $this->expectException(NullException::class);
        $this->passwordVerifier->verify(null);
    }

    public function testAtLeastOneLowerCase() {
        $this->expectException(LowerCaseException::class);
        $this->passwordVerifier->verify("A234567890");
    }

    public function testAtLeastOneUpperCase() {
        $this->expectException(UpperCaseException::class);
        $this->passwordVerifier->verify("aa34567890");
    }

    public function testSpecialChars() {
        $this->expectException(SpecialCharException::class);
        $this->passwordVerifier->verify("aA34567890a");
    }

    public function testFirstCharsIsNotSpecial() {
        $this->expectException(FirstSpecialCharException::class);
        $this->passwordVerifier->verify("#A345a67890");
    }

    public function testLastCharIsNotNumber() {
        $this->expectException(LastCharIsNotNumberException::class);
        $this->passwordVerifier->verify("asdasdasAS#dasd9");
    }

    public function testMinDuration() {
        $time_start = microtime(true);
        $this->passwordVerifier->verify("asdasdasAS#dasd");
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $this->assertGreaterThan(1, $time);
    }
}
