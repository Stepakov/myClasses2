<?php

namespace classes\experiments2\Cart;

class Cart
{
    private array $items;

    public function __construct()
    {
        $this->items = isset( $_SESSION[ 'cart' ] ) ? unserialize( $_SESSION[ 'cart' ] ) : [];
    }

    public function getItems() : array
    {
        return $this->items;
    }

    public function addItem( int $id, int $count ) : void
    {
//        var_dump( 'sup' );
//        var_dump( 'id ' . $id );
        $currentCount = $this->items[ $id ] ?? 0;
//        var_dump( $currentCount );
        $this->items[ $id ] = $currentCount + $count;
        $_SESSION[ 'cart' ] = serialize( $this->items );
    }

    public function remove( int $id ) : void
    {
        if( isset( $this->items[ $id ] ) )
        {
            unset( $this->items[ $id ] );
            $_SESSION[ 'cart' ] = serialize( $this->items );
        }
    }

    public function clear() : void
    {
        $this->items = [];

        $_SESSION[ 'cart' ] = serialize( $this->items );
    }
}