<?php

use PHPUnit\Framework\TestCase;

class TransliterationTest extends TestCase
{
    public function testTransliterating( )
    {
        $transliterator = new \Lukaswhite\Transliterator\Transliterator( );

        $this->assertEquals(
            'Liberte',
            $transliterator->run( 'Liberté' )
        );

        $this->assertEquals(
            'naloeye',
            $transliterator->run( 'nåløye' )
        );

        $this->assertEquals(
            'hello',
            $transliterator->run( 'hello' )
        );
    }

    public function testModifyingTable( )
    {
        $transliterator = new \Lukaswhite\Transliterator\Transliterator( );
        $table = $transliterator->getTable( );
        $this->assertTrue( is_array( $table ) );
        $this->assertArrayHasKey( 'é', $table );
        $this->assertEquals( 'e', $table[ 'é' ] );

        $transliterator->addToTable( 'a', 'b' );
        $table = $transliterator->getTable( );
        $this->assertArrayHasKey( 'a', $table );
        $this->assertEquals( 'b', $table[ 'a' ] );

        $this->assertEquals( 'bbc', $transliterator->run( 'abc' ) );

        $transliterator->removeFromTable( 'a' );
        $table = $transliterator->getTable( );
        $this->assertArrayNotHasKey( 'a', $table );

        $transliterator->setTable(
            [
                'á' => 'a',
                'é' => 'e',
                'è' => 'e',
            ] );

        $this->assertEquals( 3, count( $transliterator->getTable( ) ) );

    }
}