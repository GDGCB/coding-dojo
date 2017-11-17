<?php

namespace CodingDojo;

class CustomTest extends \PHPUnit\Framework\TestCase
{
    /** @var Custom */
    private $custom;

    public function setUp()
    {
        parent::setUp();
        $this->custom = new Custom();
    }

    public function testSample()
    {
        $this->assertEquals(1, $this->custom->sample(1));
    }
}
