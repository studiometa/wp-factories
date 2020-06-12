<?php
namespace Studiometa\WP\Factories;

class Post_Type {
	/**
	 * Generate labels
	 *
	 * @param  string $singular           Singular name.
	 * @param  string $plural             Plural name.
	 * @param  string $translation_domain Translation domain name.
	 * @return array                      Labels
	 */
	public static function generate_labels( string $singular, string $plural, string $translation_domain ) {
		$singular_lowercase = strtolower( $singular );
		$plural_lowercase   = strtolower( $plural );

		// phpcs:disable WordPress.WP.I18n
		$labels = [
			'name'                  => __( $plural, $translation_domain ),
			'singular_name'         => __( $singular, $translation_domain ),
			'menu_name'             => __( $plural, $translation_domain ),
			'name_admin_bar'        => __( $singular, $translation_domain ),
			'all_items'             => __( 'All ' . $plural_lowercase, $translation_domain ),
			'add_new_item'          => __( 'Add a ' . $singular_lowercase, $translation_domain ),
			'edit_item'             => __( 'Edit ' . $singular_lowercase, $translation_domain ),
			'new_item'              => __( 'New ' . $singular_lowercase, $translation_domain ),
			'view_item'             => __( 'See ' . $singular_lowercase, $translation_domain ),
			'view_items'            => __( 'See ' . $plural_lowercase, $translation_domain ),
			'archives'              => __( $plural_lowercase . ' archives', $translation_domain ),
			'attributes'            => __( $plural_lowercase . ' attributs', $translation_domain ),
			'filter_items_list'     => __( 'Filter ' . $plural_lowercase . ' list', $translation_domain ),
			'items_list'            => __( $plural_lowercase . ' list', $translation_domain ),
			'items_list_navigation' => __( $plural_lowercase . ' list navigation', $translation_domain ),
			'search_items'          => __( 'Search ' . $plural_lowercase, $translation_domain ),
			'not_found'             => __( 'No ' . $singular_lowercase, $translation_domain ),
			'not_found_in_trash'    => __( 'No ' . $singular_lowercase . ' in trash', $translation_domain ),
		];
		// phpcs:enable

		return $labels;
	}

	/**
	 * Create a custom post type
	 *
	 * @param  string       $slug               Slug.
	 * @param  string       $singular           Singular name.
	 * @param  string       $plural             Plural name.
	 * @param  string|null  $translation_domain Translation domain name.
	 * @param  array        $args               Custom arguments.
	 * @param  bool|boolean $publicly_queryable Is post type public?.
	 * @param  array        $supports           Supported features.
	 * @return array                            Custom post type
	 */
	public static function create( string $slug, string $singular, string $plural, string $translation_domain = null, array $args = array(), bool $publicly_queryable = true, array $supports = array() ) {
		$labels = self::generate_labels( $singular, $plural, $translation_domain );

		// phpcs:disable WordPress.WP.I18n
		$default_args = array(
			'label'              => __( $singular, $translation_domain ),
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => $publicly_queryable,
			'capability_type'    => 'post',
			'supports'           => array(
				'title',
				'custom-fields',
			),
			'has_archive'        => false,
			'menu_icon'          => 'dashicons-format-aside',
		);
		// phpcs:enable

		$args = array_merge( $default_args, $args );

		$post_type = register_post_type( $slug, $args );

		if ( count( $supports ) > 0 ) {
			add_post_type_support( $slug, $supports );
		}

		return $post_type;
	}
}
