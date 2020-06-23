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
use Studiometa\WP\Factories\Taxonomy;

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

/**
 * Register taxonomies
 *
 * @return void
 */
function register_taxonomies() {
  Taxonomy::create( 'brand', 'Brand', 'Brands', array( 'car' ), 'i18n_domain', array(), false );
}

add_action( 'init', 'register_post_types' );
add_action( 'init', 'register_taxonomies' );
```

## Contributing

This project's branches are managed with [Git Flow](https://github.com/petervanderdoes/gitflow-avh), every feature branch must be merged into develop via a pull request.
