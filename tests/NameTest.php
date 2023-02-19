<?php

namespace tests;

use classes\Name\Name;
use PHPUnit\Framework\TestCase;

class NameTest extends TestCase
{
    public function testCreate()
    {
        $name = new Name( 'Sa', 'Sb' );

        $this->assertEquals( 'Sa Sb', $name->getFullName() );
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

    public function testExceptionClassLastNameEmptyConstruct()
    {
        $this->expectException( \Exception::class );

        new Name( 'Sa', '' );
    }

    public function testExceptionMessageEmptyConstructLastName()
    {
        $this->expectExceptionMessage( 'lastName is empty' );

        new Name( 'Sa', '' );
    }
    public function testExceptionClassLastNameMore30Chars()
    {
        $this->expectException( \Exception::class );

        new Name( 'Sa', 'acsdfghjklacsdfghjklacsdfghjkld' );
    }

    public function testExceptionMessageMore30CharsConstructLastName()
    {
        $this->expectExceptionMessage( 'lastName is more than 30 characters' );

        new Name( 'Sa', 'acsdfghjklacsdfghjklacsdfghjkld' );
    }

    public function testExceptionSetEmptyFirstName()
    {
        $this->expectException( \Exception::class );

        $name = new Name( 'S', 'S' );

        $name->setFIrstName( '' );
    }

    public function testExceptionMessageSetEmptyFirstName()
    {
        $this->expectExceptionMessage( 'firstName is empty' );

        $name = new Name( 'S', 'S' );

        $name->setFIrstName( '' );
    }

    public function testExceptionSetEmptyLastName()
    {
        $this->expectException( \Exception::class );

        $name = new Name( 'S', 'S' );

        $name->setLastName( '' );
    }

    public function testExceptionMessageSetEmptyLastName()
    {
        $this->expectExceptionMessage( 'lastName is empty' );

        $name = new Name( 'S', 'S' );

        $name->setLastName( '' );
    }

    public function testExceptionSetMore30CharsFirstName()
    {
        $this->expectException( \Exception::class );

        $name = new Name( 'S', 'S' );

        $name->setFIrstName( 'acsdfghjklacsdfghjklacsdfghjkld' );
    }

    public function testExceptionMessageSetMore30CharsFirstName()
    {
        $this->expectExceptionMessage( 'firstName is more than 30 characters' );

        $name = new Name( 'S', 'S' );

        $name->setFIrstName( 'acsdfghjklacsdfghjklacsdfghjkld' );
    }

    public function testExceptionSetMore30CharsLastName()
    {
        $this->expectException( \Exception::class );

        $name = new Name( 'S', 'S' );

        $name->setLastName( 'acsdfghjklacsdfghjklacsdfghjkld' );
    }

    public function testExceptionMessageSetMore30CharsLastName()
    {
        $this->expectExceptionMessage( 'lastName is more than 30 characters' );

        $name = new Name( 'S', 'S' );

        $name->setLastName( 'acsdfghjklacsdfghjklacsdfghjkld' );
    }

    public function testInvoke()
    {
        $name = new Name( 'Sa', 'Sb' );

        $this->assertEquals( 'Sa Sb', $name() );
    }

    public function testToString()
    {
        $name = new Name( 'Sa', 'Sb' );

        $this->assertEquals( 'Sa Sb', $name );
    }

}