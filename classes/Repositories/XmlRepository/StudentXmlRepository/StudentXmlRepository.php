<?php

namespace classes\Repositories\XmlRepository\StudentXmlRepository;

use classes\Entities\Student\Student;
use classes\PureClasses\Date\Date;
use classes\PureClasses\Name\Name;
use classes\Repositories\BaseRepository\BaseRepository;
use DateTime;
use SimpleXMLElement;

class StudentXmlRepository extends BaseRepository
{
    protected static string $filename;
    public function __construct()
    {
    }

    public static function setFilename( string $filename ) : void
    {
        self::$filename = $filename;
    }

    public function getData(): array
    {
        $this->filenameIsSetCorrect();

        $lines = simplexml_load_file( self::$filename );

        $data = $this->generateData( $lines );

        return $data;
    }

    protected function filenameIsSetCorrect() : void
    {
        if( !isset( self::$filename ) ) throw new \Exception( 'File is not set' );
        if( !file_exists( self::$filename ) ) throw new \Exception( 'File does not exists' );
    }

    protected function generateData( SimpleXMLElement &$lines ) : array
    {
        $data = [];

        foreach( $lines->student as $line )
        {
            list( $day, $month, $year ) = explode( '-', $line->birthday );
            $data[] = new Student( new Name( $line->firstName, $line->lastName ), new Date( $day, $month, $year, new DateTime ) );
        }

        return $data;
    }
}