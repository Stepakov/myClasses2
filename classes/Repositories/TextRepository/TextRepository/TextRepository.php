<?php

namespace classes\Repositories\TextRepository\TextRepository;


use classes\Repositories\BaseRepository\BaseRepository;

class TextRepository extends BaseRepository
{
    protected static string $filename;
    protected string $delimiter;

    public function __construct( $delimiter = ';' )
    {
        $this->delimiter = $delimiter;
    }

    public static function setFilename( string $filename ) : void
    {
        self::$filename = $filename;
    }

    public function getData(): array
    {
        $this->filenameIsSetCorrect();

        $lines = file( self::$filename );

        $this->fileIsNotEmpty( count( $lines ) );

        $data = $this->generateData( $lines );

        return $data;
    }

    protected function filenameIsSetCorrect() : void
    {
        if( !isset( self::$filename ) ) throw new \Exception( 'File is not set' );
        if( !file_exists( self::$filename ) ) throw new \Exception( 'File does not exists' );
    }

    protected function fileIsNotEmpty(int $count) : void
    {
        if( $count <= 0 ) throw new \Exception( "File is empty" );
    }

    protected function generateData( array &$lines ) : array
    {
        $data = [];

        foreach( $lines as $line )
        {
            $lineData = explode( $this->delimiter, $line );

            $data[] = $lineData;
        }

        return $data;
    }
}