<?php

namespace classes\TextRepository;

use interfaces\RepositoryInterface\RepositoryInterface;

class TextRepository implements RepositoryInterface
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

        $lines = file( self::$filename );

        $this->fileIsNotEmpty( count( $lines ) );

        $this->correctNumberOfParamsInLine( $lines[0] );

        $data = $this->generateData( $lines );

        return $data;
    }

    protected function filenameIsSetCorrect() : void
    {
        if( !isset( self::$filename ) ) throw new \Exception( 'File is not set' );
        if( !file_exists( self::$filename ) ) throw new \Exception( 'File does not exists' );
    }

    protected function correctNumberOfParamsInLine( string $lineData) : void
    {
        $lineData = explode( $this->delimiter, $lineData );
        $lineData = count( $lineData );

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

    protected function generateData( \SimpleXMLElement|array &$lines ) : array
    {
        $data = [];
        foreach( $lines as $line )
        {
            $dt = [];
            $lineData = explode( $this->delimiter, $line );

            foreach( $this->fileParams as $key => $value )
            {
                $dt[ $value ]  = $lineData[ $key ];
            }
            $data[] = $dt;
        }

        return $data;
    }
}