<?php

namespace classes\StudentTextRepository;

use classes\Date\Date;
use classes\Name\Name;
use classes\Student\Student;
use classes\TextRepository\TextRepository;


class StudentTextRepository extends TextRepository
{
    protected function generateData( array $lines ) : array
    {
        $data = [];
        foreach( $lines as $line )
        {
            $lineData = explode( $this->delimiter, $line );

            $date = explode( '-', $lineData[ 2 ] );
            $data[] = new Student( new Name( $lineData[ 0 ], $lineData[ 1 ] ), new Date( $date[ 0 ], $date[ 1 ], $date[ 2 ] ) );
        }

        return $data;
    }
}