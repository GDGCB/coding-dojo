<?php


class RomanianConverterTest extends \PHPUnit\Framework\TestCase
{

	/** @var  RomanianConverter */
	private $ts;

	public function setUp()
	{
		$this->ts = new RomanianConverter;
	}

	public function testSimple()
	{
		static::assertEquals('I', $this->ts->convertArabicToRoman(1));
		static::assertEquals('L', $this->ts->convertArabicToRoman(50));
		static::assertEquals('C', $this->ts->convertArabicToRoman(100));
		static::assertEquals('D', $this->ts->convertArabicToRoman(500));
		static::assertEquals('M', $this->ts->convertArabicToRoman(1000));
	}

	public function testRepetition()
	{
		static::assertEquals('III', $this->ts->convertArabicToRoman(3));
		static::assertEquals('XXXV', $this->ts->convertArabicToRoman(35));
		static::assertEquals('LXXV', $this->ts->convertArabicToRoman(75));
	}

	public function testSubtraction()
	{
		static::assertEquals('IV', $this->ts->convertArabicToRoman(4));
		static::assertEquals('IX', $this->ts->convertArabicToRoman(9));
		static::assertEquals('IL', $this->ts->convertArabicToRoman(49));
	}
}
