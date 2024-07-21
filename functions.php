<?php
/*	-----------------------------------------------------------------------------------------------
	THEME SUPPORTS
--------------------------------------------------------------------------------------------------- */
function hmw_setup() {
	add_filter('should_load_remote_block_patterns', '__return_false');
	remove_theme_support('core-block-patterns');
	add_theme_support( 'post-formats', ['link'] );

	add_editor_style( get_stylesheet_directory_uri() . '/assets/css/main.min.css' );
}
add_action( 'after_setup_theme', 'hmw_setup' );

function hmw_enqueue_gutenberg_editor_assets() {
    // wp_enqueue_style('icomoon', get_stylesheet_directory_uri() . '/assets/fonts/icomoon/style.css');
}
add_action('enqueue_block_assets', 'hmw_enqueue_gutenberg_editor_assets');

/*	-----------------------------------------------------------------------------------------------
	ENQUEUE STYLESHEETS
--------------------------------------------------------------------------------------------------- */
function hmw_enqueue_styles() {
	//Theme styles
    wp_enqueue_style('additionnal-css', get_stylesheet_directory_uri() . '/assets/css/main.min.css', [], wp_get_theme( 'peashup' )->get( 'Version' ));
}
add_action('wp_enqueue_scripts', 'hmw_enqueue_styles');

/*	-----------------------------------------------------------------------------------------------
	ENQUEUE JAVASCRIPTS
--------------------------------------------------------------------------------------------------- */
function hmw_enqueue_scripts() {
    // wp_enqueue_script('creu-custom-redirect', get_stylesheet_directory_uri() . '/assets/js/custom.js', [], '', true);
}
add_action('wp_enqueue_scripts', 'hmw_enqueue_scripts');

/*	-----------------------------------------------------------------------------------------------
	THEME FUNCTIONS
--------------------------------------------------------------------------------------------------- */
// CF7 assets management
function hmw_load_wpcf7_scripts() {
	if (!is_home() && !is_front_page() && is_page('contact')) {
		if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
			wpcf7_enqueue_scripts();
		}
		if (function_exists('wpcf7_enqueue_styles')) {
			wpcf7_enqueue_styles();
			wp_enqueue_style('cf7_theme_additionnal_style', get_stylesheet_directory_uri() . '/assets/css/cf7-style.css', [], '1.0', false);
		}
	}
}
add_action('wp_enqueue_scripts', 'hmw_load_wpcf7_scripts');

function hmw_modify_permalink_external_link($url, $post) {
    // Vérifier si le format de publication est "Link"
    if (has_post_format('link', $post)) {
        // Obtenir le contenu de l'article
        $content = apply_filters('the_content', $post->post_content);

        // Rechercher le premier lien externe dans le contenu de l'article
        preg_match('/<a\s[^>]*?href=[\'"]([^\'"]*?)[\'"][^>]*?>/', $content, $matches);

        // Si un lien externe est trouvé, utiliser son URL comme permalien
        if (!empty($matches[1])) {
            $url = esc_url_raw($matches[1]);
        }
    }

    return $url;
}
add_filter('post_link', 'hmw_modify_permalink_external_link', 10, 2);
add_filter('page_link', 'hmw_modify_permalink_external_link', 10, 2);

// Ajouter une colonne personnalisée dans la liste des articles (posts)
function hmw_add_post_format_column($columns) {
    $screen = get_current_screen();
    if ($screen->post_type === 'post') {
        $columns['post_format'] = __('Format de publication', 'holdmywp');
    }
    return $columns;
}
add_filter('manage_posts_columns', 'hmw_add_post_format_column');

// Contenu de la colonne personnalisée
function hmw_display_post_format_column_content($column_name, $post_id) {
    if ($column_name === 'post_format') {
        // Vérifier si le format de publication est "Link"
        if (has_post_format('link', $post_id)) {
            echo __('Lien externe', 'holdmywp'); // Texte pour le format "Link"
        } else {
            echo __('Article standard', 'holdmywp'); // Texte pour les autres formats
        }
    }
}
add_action('manage_posts_custom_column', 'hmw_display_post_format_column_content', 10, 2);
