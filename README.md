# Transliterator

Transliterate strings with PHP  (7+); e.g. remove accented characters.

So "Liberté" becomes "Liberte", "nåløye" becomes "naloeye", and so on.

## Installation

```
composer install lukaswhite\transliterator
```

## Usage

```php
use Lukaswhite\Transliterator\Transliterator;

$transliterator = new Transliterator( );

print $transliterator->run( 'Liberté' );
// outputs Liberte

print $transliterator->run( 'nåløye' );
// outputs naloeye
```

### Advanced Usage

Internally, the class maintains a table of character mappings. To get it, for example to inspect it:

```php
var_dump( $transliterator->getTable( ) );
```

To add a substitution:

```php
$transliterator->addToTable( 'a', 'b' );
```

To remove a substitution:

```php
$transliterator->removeFromTable( 'a' );
```

To replace the whole table:

```php
$transliterator->setTable(
	[
		'á' => 'a',
		'é' => 'e',
		'è' => 'e',
	]
);
```

## Credits

This package is based on [this answer on Stackoverflow](https://stackoverflow.com/questions/6837148/change-foreign-characters-to-their-normal-equivalent#answer-6837302).