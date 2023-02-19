<?php

namespace classes\PureClasses\Date;

use DateTime;

class Date
{
    private int $day;
    private int $month;
    private int $year;
    private DateTime $currentDateTime;
    private string $delimiter;

    /**
     * @param int $day
     * @param int $month
     * @param int $year
     * @param DateTime $currentDateTime
     * @param string $delimiter
     * @throws \Exception
     */
    public function __construct(int $day, int $month, int $year, DateTime $currentDateTime, string $delimiter = '-' )
    {
        $this->currentDateTime = $currentDateTime;
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
        $this->delimiter = $delimiter;

        $this->correctDayMonthYear();
    }

    public function getDate() : string
    {
        return $this->day . $this->delimiter . $this->month . $this->delimiter . $this->year;
    }

    private function correctDayMonthYear() : void
    {
        if( $this->day < 1 || $this->day > 31 ) throw new \Exception( 'Day is not correct' );
        if( $this->month < 1 || $this->month > 12 ) throw new \Exception( 'Month is not correct' );
        if( $this->currentDateTime->format( 'Y' ) < $this->year ) throw new \Exception( 'Year is not correct' );

        if( $this->currentDateTime < new DateTime( $this->day . '-' . $this->month . '-' . $this->year ) )
            throw new \Exception( 'Date is not correct' );

    }

    public function __toString(): string
    {
        return $this->getDate();
    }

    public function __invoke()
    {
        return $this->getDate();
    }

    public function __set(string $name, $value): void
    {
        throw new \Exception( 'You cant change date in this way' );
    }

    public function __get(string $name)
    {
        throw new \Exception( 'You cant get date in this way' );
    }
}