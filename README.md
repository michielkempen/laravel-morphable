# Laravel Morphable

A trait to morph Eloquent models to a child class based on a type field.

## Installation

Add the package to the dependencies of your application

```
composer require michielkempen/laravel-morphable
```

## Usage

Add the `Morphable` trait to your model, and add a `factory` and `typeField` property. The `typeField` property is optional and defaults to `type`. The `factory` property is mandatory and needs to contain the path to a class which inherits the `MorphableModelFactory` interface.

```php
<?php

use Illuminate\Database\Eloquent\Model;
use MichielKempen\LaravelMorphable\Morphable;
use App\UserModelFactory;

class User extends Model
{
    use Morphable;
    
    public $factory = UserModelFactory::class;
    
    public $typeField = 'role';
}
```

```php
<?php

use Illuminate\Database\Eloquent\Model;
use \MichielKempen\LaravelMorphable\MorphableModelFactory;

class UserModelFactory implements MorphableModelFactory
{
    public static function create(string $type): Model
    {
        if($type == 'admin') {
            return app(Manager::class);
        }   
    
        return app(Customer::class);
    }
}
```

```php
<?php

class Manager extends User
{
    // manager specific methods
}
```

```php
<?php

class Customer extends User
{
    // customer specific methods
}
```

## Security

If you discover any security related issues, please email kempenmichiel@gmail.com instead of using the issue tracker.

## Credits

- [Michiel Kempen](https://github.com/michielkempen)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
