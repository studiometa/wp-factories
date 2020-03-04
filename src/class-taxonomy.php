<?php
namespace Studiometa\WP\Factories;

class Taxonomy {
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
		$labels = array(
			'name'                  => __( $plural, $translation_domain ),
			'singular_name'         => __( $singular, $translation_domain ),
			'menu_name'             => __( $plural, $translation_domain ),
			'all_items'             => __( 'All ' . $plural_lowercase, $translation_domain ),
			'parent_item'           => __( $singular . ' parent', $translation_domain ),
			'parent_item_colon'     => __( $singular . ' parent:', $translation_domain ),
			'new_item_name'         => __( 'New ' . $singular_lowercase, $translation_domain ),
			'add_new_item'          => __( 'Add a ' . $singular_lowercase, $translation_domain ),
			'edit_item'             => __( 'Edit the ' . $singular_lowercase, $translation_domain ),
			'update_item'           => __( 'Update the ' . $singular_lowercase, $translation_domain ),
			'view_item'             => __( 'See the ' . $singular_lowercase, $translation_domain ),
			'add_or_remove_items'   => __( 'Add or remove ' . $plural_lowercase, $translation_domain ),
			'choose_from_most_used' => __( 'Most used', $translation_domain ),
			'popular_items'         => __( 'Popular' . $singular, $translation_domain ),
			'search_items'          => __( 'Search ' . $singular_lowercase, $translation_domain ),
			'no_terms'              => __( 'No ' . $singular_lowercase, $translation_domain ),
			'items_list'            => __( $plural_lowercase . ' list', $translation_domain ),
			'items_list_navigation' => __( 'Navigate in ' . $plural_lowercase . ' list', $translation_domain ),
		);
		// phpcs:enable

		return $labels;
	}

	/**
	 * Create a taxonomy
	 *
	 * @param  string $key                Taxonomy key.
	 * @param  string $singular           Singular name.
	 * @param  string $plural             Plural name.
	 * @param  array  $post_types         Post types to attached to.
	 * @param  string $translation_domain Translation domain.
	 * @param  array  $args               Custom arguments.
	 * @param  bool   $public             Is taxonomy public?.
	 * @return array                      Taxonomy object.
	 */
	public static function create( string $key, string $singular, string $plural, array $post_types, string $translation_domain, array $args = array(), bool $public = true ) {
		$labels = self::generate_labels( $singular, $plural, $translation_domain );

		$default_args = array(
			'labels'            => $labels,
			'hierarchical'      => false,
			'public'            => $public,
			'query_var'         => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
		);

		$args = array_merge( $default_args, $args );

		return register_taxonomy( $key, $post_types, $args );
	}
}
