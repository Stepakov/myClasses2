<?php

namespace classes\Name;

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
        $this->notEmptyAndLess30Chars( $firstName );
        $this->notEmptyAndLess30Chars( $lastName );
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    private function notEmptyAndLess30Chars(string $name)
    {
        if( empty( $name ) ) throw new \Exception( 'name is empty' );
        if( strlen( $name ) > 30 ) throw new \Exception( 'Name is more 30 characters' );
    }


}