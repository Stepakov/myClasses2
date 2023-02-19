<?php

namespace classes\Repositories\MysqlRepository\MysqlRepository;

use classes\Entities\Student\Student;
use classes\others\Db\Db;
use classes\PureClasses\Date\Date;
use classes\PureClasses\Name\Name;
use classes\Repositories\BaseRepository\BaseRepository;
use DateTime;

class MysqlRepository extends BaseRepository
{
    private Db $db;

    /**
     * @param Db $db
     */
    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function getData(): array
    {
        $lines = $this->db->getQuery();

        $data = $this->generateData( $lines );

        return $data;
    }

    protected function generateData( array &$lines ) : array
    {
        $data = [];

        foreach( $lines as $line )
        {
            list( $day, $month, $year ) = array_reverse( explode( '-', $line[ 'birthday' ] ) );
            $data[] = new Student( new Name( $line[ 'firstName' ], $line[ 'lastName' ] ), new Date( $day, $month, $year, new DateTime ) );
        }

        return $data;
    }
}