<?php

namespace classes\Repositories\TextRepository\StudentTextRepository;

use classes\Entities\Student\Student;
use classes\PureClasses\Date\Date;
use classes\PureClasses\Name\Name;
use classes\Repositories\TextRepository\TextRepository\TextRepository;
use DateTime;

class StudentTextRepository extends TextRepository
{
    protected function generateData( array &$lines ) : array
    {
        $students = [];

        foreach( $lines as $line )
        {
            $lineData = explode( $this->delimiter, $line );

            list( $day, $month, $year )  = explode( '-', $lineData[ 2 ] );

            $students[] = new Student(
                new Name( $lineData[ 0 ], $lineData[ 1 ] ),
                new Date( $day, $month, $year, new DateTime(), '-' )
            );
        }

        return $students;
    }
}