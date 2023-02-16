<?php

namespace classes\Date;

class Date
{
    private int $day;
    private int $month;
    private int $year;

    private string $delimiter;

    /**
     * @param int $day
     * @param int $month
     * @param int $year
     */
    public function __construct(int $day, int $month, int $year, $delimiter = '-' )
    {
        $this->correctDayMonthYear( $day, $month, $year );

        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
        $this->delimiter = $delimiter;
    }

    public function getDate() : string
    {
        return $this->day . $this->delimiter . $this->month . $this->delimiter . $this->year;
    }

    private function correctDayMonthYear(int $day, int $month, int $year) : void
    {
        if( $day < 1 || $day > 31 ) throw new \Exception( 'Day is not correct' );
        if( $month < 1 || $month > 12 ) throw new \Exception( 'Month is not correct' );
        if( $year > date( 'Y' ) ) throw new \Exception( 'Year is not correct' );
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