<?php

namespace classes\others\Db;

class Db
{
    private string $host;
    private string $database;
    private string $username;
    private string $password;

    private \PDO $db;

    private string $query;

    /**
     * @param string $host
     * @param string $database
     * @param string $username
     * @param string $password
     */
    public function __construct(string $host, string $database, string $username, string $password)
    {
        $this->host = $host;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;

        $this->db = new \PDO( "mysql:host=$this->host;dbname=$this->database", $this->username, $this->password );
    }

    public function selectQuery( string $query ) : void
    {
        $this->query = $query;
    }

    public function getQuery() : array
    {
        $results = $this->db->query( $this->query );

        return $results->fetchAll( \PDO::FETCH_ASSOC );
    }
}