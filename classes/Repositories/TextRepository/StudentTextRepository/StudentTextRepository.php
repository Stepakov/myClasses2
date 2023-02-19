<?php

namespace classes\Repositories\TextRepository\StudentTextRepository;

use classes\Entities\Student\Student;
use classes\PureClasses\Date\Date;
use classes\PureClasses\Name\Name;
use classes\Repositories\TextRepository\TextRepository\TextRepository;

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