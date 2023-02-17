<?php

namespace classes\StudentMysqlRepository;

use classes\Date\Date;
use classes\Name\Name;
use classes\Student\Student;
use classes\TextRepository\TextRepository;

class StudentMysqlRepository extends TextRepository
{
    public function getData(): array
    {
        $lines = $this->query();

        $data = $this->generateData( $lines );

        return $data;
    }

    protected function generateData( \SimpleXMLElement|array &$lines ) : array
    {
        $data = [];

        foreach( $lines as $line )
        {
                $date = array_reverse( explode( '-', $line[ 'birthday' ] ) );
                $data[] = new Student( new Name( $line[ 'firstName' ], $line[ 'lastName' ] ), new Date( $date[ 0 ], $date[ 1 ], $date[ 2 ], '-', date( 'Y' ) ) );
        }

        return $data;
    }

    protected function query() : array
    {
        $database = 'students';
        $host = 'localhost';
        $user = 'root';
        $password = '';

        $db = new \PDO( "mysql:dbname=$database;host=$host", $username=$user, $password=$password );

        $query = "SELECT firstName, lastName, birthday FROM students";

        $students = $db->query( $query, \PDO::FETCH_ASSOC );

        $students = $students->fetchAll();

        return $students;
    }
}