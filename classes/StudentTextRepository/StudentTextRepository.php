<?php

namespace classes\StudentTextRepository;

use classes\Date\Date;
use classes\Name\Name;
use classes\Student\Student;
use classes\TextRepository\TextRepository;

class StudentTextRepository extends TextRepository
{
    public function getData(): array
    {
        $this->filenameIsSetCorrect();

        $data = [];

        $lines = file( self::$filename );

        $this->fileIsNotEmpty( count( $lines ) );

        foreach( $lines as $line )
        {
            $dt = [];
            $lineData = explode( $this->delimiter, $line );
//            var_dump( $lineData );
//            exit;

            $this->correctNumberOfParamsInLine( count( $lineData ) );

//            foreach( $this->fileParams as $key => $value )
//            {
////                var_dump( $value );
//                $dt[ $value ]  = $lineData[ $key ];
//            }

//            $data[] = $dt;
            $date = explode( '-', $lineData[ 2 ] );
            $data[] = new Student( new Name( $lineData[ 0 ], $lineData[ 1 ] ), new Date( $date[ 0 ], $date[ 1 ], $date[ 2 ] ) );
        }

        return $data;
    }
}