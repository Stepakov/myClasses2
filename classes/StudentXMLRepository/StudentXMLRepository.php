<?php

namespace classes\StudentXMLRepository;

use classes\Entities\Student\Student;
use classes\PureClasses\Date\Date;
use classes\PureClasses\Name\Name;
use classes\TextRepository\TextRepository;

class StudentXMLRepository extends TextRepository
{
    public function getData(): array
    {
        $this->filenameIsSetCorrect();

        $lines = simplexml_load_file( self::$filename );

        $this->fileIsNotEmpty( count( $lines ) );

        $data = $this->generateData( $lines );

        return $data;
    }

    protected function generateData( \SimpleXMLElement|array &$lines ) : array
    {
        $data = [];

        foreach( $lines->student as $line )
        {
            $date = explode( '-', $line->birthday );
            $data[] = new Student( new Name( $line->firstName, $line->lastName ), new Date( $date[ 0 ], $date[ 1 ], $date[ 2 ] ) );
        }

        return $data;
    }
}