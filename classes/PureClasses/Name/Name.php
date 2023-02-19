<?php

namespace classes\PureClasses\Name;

class Name
{
    public string $firstName;
    public string $lastName;

    /**
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(string $firstName, string $lastName)
    {
        $this->checkIsValidFirstName( $firstName );
        $this->checkIsValidLastName( $lastName );
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getFullName() : string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->checkIsValidFirstName( $firstName );
        $this->firstName = $firstName;
    }


    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->checkIsValidLastName( $lastName );
        $this->lastName = $lastName;
    }

    /**
     * @param string $name
     * @return void
     * @throws \Exception
     */
    private function checkIsValidFirstName( string $firstName ) : void
    {
        if( empty( $firstName ) ) throw new \Exception( 'firstName is empty' );
        if( strlen( $firstName ) > 30 ) throw new \Exception( 'firstName is more than 30 characters' );
    }

    /**
     * @param string $lastName
     * @return void
     * @throws \Exception
     */
    private function checkIsValidLastName(string $lastName ) : void
    {
        if( empty( $lastName ) ) throw new \Exception( 'lastName is empty' );
        if( strlen( $lastName ) > 30 ) throw new \Exception( 'lastName is more than 30 characters' );
    }


    public function __toString() : string
    {
        return $this->getFullName();
    }

    public function __invoke() : string
    {
        return $this->getFullName();
    }

}