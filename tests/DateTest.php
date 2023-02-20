<?php

namespace tests;

use classes\PureClasses\Date\Date;
use DateTime;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    public function testCorrectDate()
    {
        $dateTime = new Date( 19, 2, 2023, new DateTime( '19-2-2023' ), '-' );

        $this->assertEquals( '19-2-2023', $dateTime->getDate() );
    }
    public function testDateException()
    {
        $this->expectException( \Exception::class );

        $dateTime = new Date( 19, 2, 2024, new DateTime( '19-2-2023' ), '-' );
    }
    public function testDateExceptionMessage()
    {
        $this->expectExceptionMessage( 'Year is not correct' );

        $dateTime = new Date( 19, 2, 2024, new DateTime( '19-2-2023' ), '-' );
    }
}