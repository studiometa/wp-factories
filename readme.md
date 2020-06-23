# WP Factories

> Helper to easily create Wordpress taxonomy/custom post type.

[![Packagist Version](https://img.shields.io/packagist/v/studiometa/wp-factories?style=flat-square)](https://packagist.org/packages/studiometa/wp-factories)

## Usage

```
composer require studiometa/wp-factories
```

In your wordpress theme:

functions.php
```php
use Studiometa\WP\Factories\Post_Type;

/**
 * Register post types
 *
 * @return void
 */
function register_post_types() {
  Post_Type::create(
    'beautifull-car',
    'Car',
    'Cars',
    'i18n_domain',
    array(
      'has_archive' => true,
      'supports' => array(
        'title',
        'custom-fields',
        'thumbnail',
      ),
    ),
    true
  );
}

add_action( 'init', 'register_post_types' );
```

## Contributing

This project's branches are managed with [Git Flow](https://github.com/petervanderdoes/gitflow-avh), every feature branch must be merged into develop via a pull request.
