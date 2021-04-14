# Laravel Api Pagination

- [Installation](#installation)
    - [Composer](#composer)
- [Usage](#usage)
    - [How To Use](#how-to-use)
    - [Result](#result)
- [License](#license)

## Installation

### Composer
```bash
composer require "lartie/api-pagination"
```

### ApiPaginationTrait

Include `ApiPaginationTrait` trait inside your model.

```php
class User extends Model
{
    use ApiPaginationTrait;
```

And that's it!

## Usage

### How To Use
```php
User::where('is_blocked', false)->apiPagination($limit, $offset);
```

### Result
```php
[
    'items' => [...],
    'hasNextPage' => true, //or false
]
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
