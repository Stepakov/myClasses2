<?php

namespace classes\StudentTextRepository;

use classes\Entities\Student\Student;
use classes\PureClasses\Date\Date;
use classes\PureClasses\Name\Name;
use classes\TextRepository\TextRepository;


class StudentTextRepository extends TextRepository
{
    protected function generateData( \SimpleXMLElement|array &$lines ) : array
    {
        $data = [];
        foreach( $lines as $line )
        {
            $lineData = explode( $this->delimiter, $line );

            $date = explode( '-', $lineData[ 2 ] );
            $data[] = new Student( new Name( $lineData[ 0 ], $lineData[ 1 ] ), new Date( $date[ 0 ], $date[ 1 ], $date[ 2 ], '-', date( 'Y' ) ) );
        }

        return $data;
    }
}