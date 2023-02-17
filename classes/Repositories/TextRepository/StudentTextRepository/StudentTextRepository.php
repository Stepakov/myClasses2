<?php

namespace classes\Repositories\TextRepository\StudentTextRepository;

use classes\Date\Date;
use classes\Name\Name;
use classes\Repositories\TextRepository\TextRepository\TextRepository;
use classes\Student\Student;

class StudentTextRepository extends TextRepository
{
    protected function generateData( array &$lines ) : array
    {
        $students = [];

        foreach( $lines as $line )
        {
            $lineData = explode( $this->delimiter, $line );

            $dt = explode( '-', $lineData[ 2 ] );

            $students[] = new Student(
                new Name( $lineData[ 0 ], $lineData[ 1 ] ),
                new Date( $dt[ 0 ], $dt[ 1 ], $dt[ 2 ], '-', date( 'Y' )  )
            );
        }

        return $students;
    }
}