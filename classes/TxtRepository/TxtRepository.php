<?php

namespace classes\TxtRepository;

use interfaces\RepositoryInterface\RepositoryInterface;

class TxtRepository implements RepositoryInterface
{
    protected static string $filename;
    protected array $fileParams;
    protected string $delimiter;

    public function __construct( $delimiter = '-', ...$paramsInLine )
    {
        $this->delimiter = $delimiter;
        $this->fileParams = $paramsInLine ?? [];

        $this->requireParamsInLine();
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
//                var_dump( $value );
                $dt[ $value ]  = $lineData[ $key ];
            }
            $data[] = $dt;
        }

        return $data;
    }

    protected function filenameIsSetCorrect() : void
    {
        if( !isset( self::$filename ) ) throw new \Exception( 'File is not set' );
        if( !file_exists( self::$filename ) ) throw new \Exception( 'File does not exists' );
    }

    protected function correctNumberOfParamsInLine(int $lineData) : void
    {
        if( $lineData !== count( $this->fileParams ) )
            throw new \Exception( 'Not correct number of params in line in file' );
    }

    protected function fileIsNotEmpty(int $count) : void
    {
        if( $count <= 0 ) throw new \Exception( "File is empty" );
    }

    private function requireParamsInLine() : void
    {
        if( count( $this->fileParams ) === 0 ) throw new \Exception( 'Require to set params in line' );
    }


}