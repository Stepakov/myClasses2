<?php

namespace classes\TxtRepository;

use interfaces\RepositoryInterface\RepositoryInterface;

class TxtRepository implements RepositoryInterface
{
    private static string $filename;
    private array $fileParams;
    private string $delimiter;

    public function __construct( $delimiter = '-', ...$params )
    {
        $this->delimiter = $delimiter;
        $this->fileParams = $params ?? [];

//        foreach( $this->fileParams as $param )
//        {
//            var_dump( $param );
//        }
    }

    public static function setFilename( string $filename ) : void
    {
        self::$filename = $filename;
    }
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

            $this->correctNumberOfParamsInLine( count( $lineData ) );

            foreach( $this->fileParams as $key => $value )
            {
                var_dump( $value );
                $dt[ $value ]  = $lineData[ $key ];
            }
            $data[] = $dt;
        }

        return $data;
    }

    private function filenameIsSetCorrect() : void
    {
        if( !isset( self::$filename ) ) throw new \Exception( 'File is not set' );
        if( !file_exists( self::$filename ) ) throw new \Exception( 'File does not exists' );
    }

    private function correctNumberOfParamsInLine(int $lineData) : void
    {
        if( $lineData !== count( $this->fileParams ) )
            throw new \Exception( 'Not correct number of params in line in file' );
    }

    private function fileIsNotEmpty(int $count) : void
    {
        if( $count <= 0 ) throw new \Exception( "File is empty" );
    }


}