<?php

namespace tests;

use classes\Name\Name;
use PHPUnit\Framework\TestCase;

class NameTest extends TestCase
{
    public function testCreate()
    {
        $name = new Name( 'S', 'S' );

        $this->assertEquals( 'S S', $name->getFullName() );
    }
    public function testGetFirstName()
    {
        $name = new Name( 'Sa', 'Sb' );

        $this->assertEquals( 'Sa', $name->getFirstName() );
    }
    public function testGetLastName()
    {
        $name = new Name( 'Sa', 'Sb' );

        $this->assertEquals( 'Sb', $name->getLastName() );
    }

    public function testExceptionClassNameEmptyConstruct()
    {
        $this->expectException( \Exception::class );

        new Name( '', '' );
    }

    public function testExceptionMessageEmptyConstructFirstName()
    {
        $this->expectExceptionMessage( 'firstName is empty' );

        new Name( '', '' );
    }

    public function testExceptionClassNameMore30Chars()
    {
        $this->expectException( \Exception::class );

        new Name( 'acsdfghjklacsdfghjklacsdfghjkld', '' );
    }

    public function testExceptionMessageMore30CharsConstructFirstName()
    {
        $this->expectExceptionMessage( 'firstName is more than 30 characters' );

        new Name( 'acsdfghjklacsdfghjklacsdfghjkld', '' );
    }

    /*
     * 's' 's'
     * 's'
     * 's'
     * '' ''
     * '' ''
     * 'asdf' ''
     * 'asdf' ''
     *------------------
     * 'S' ''
     * 'S' 'asdf'
     * '' 'S'
     * 'asdf' 'S'
     *
     * ''
     * 'asdf'
     * 'S'
     * 'S'
     */
}