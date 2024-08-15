<?php

// Add stylesheets and scripts
    function main_scripts() {

        $css_version = '1.8';
        $js_version = '1.5';

    	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', array(), $css_version );
        wp_enqueue_script( 'feather-icons', 'https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js', array(), '4.0.0', true );
        wp_enqueue_script( 'index', get_template_directory_uri() . '/js/index.js', array( 'jquery' ), $js_version, true );
    }

    add_action( 'wp_enqueue_scripts', 'main_scripts' );

// Add Google Fonts
function wpb_add_google_fonts() {
  
wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap', false ); 
}
  
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

// Disable Gutenberg
add_filter('use_block_editor_for_post', '__return_false');

add_filter( 'alm_before_button', function(){
	return '<div class="alm-results-text"></div>';
});

// Default: Viewing {post_count} of {total_posts} results.
add_filter('alm_display_results', function(){
	return 'Visar {post_count} av totalt {total_posts} stycken.';
});

// Default: No results found.
add_filter('alm_no_results_text', function(){
	return 'Hittade inget!';
});

// Default: Change separator.
function my_custom_title_separator( $sep ) {
    return '•'; // Ändra till en bullet point
}
add_filter( 'document_title_separator', 'my_custom_title_separator' );

/* Custom post type - Artiklar */
function custom_post_type_artiklar() {
    $labels = array(
        'name'                => _x( 'Artiklar', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Artikel', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Artiklar', 'twentythirteen' ),
        'all_items'           => __( 'Alla artiklar', 'twentythirteen' ),
        'view_item'           => __( 'Visa artikel', 'twentythirteen' ),
        'add_new_item'        => __( 'Skapa ny artikel', 'twentythirteen' ),
        'add_new'             => __( 'Lägg till', 'twentythirteen' ),
        'edit_item'           => __( 'Redigera artikel', 'twentythirteen' ),
        'update_item'         => __( 'Uppdatera artikel', 'twentythirteen' ),
        'search_items'        => __( 'Sök artikel', 'twentythirteen' ),
        'not_found'           => __( 'Hittade ingenting', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Hittade ingenting i papperskorgen', 'twentythirteen' ),
    );

    $args = array(
        'label'               => __( 'artiklar', 'twentythirteen' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields' ),
        'taxonomies'          => array( 'post_tag' ), // Lägg till detta för att stödja taggar
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'rewrite' => array(
            'slug' => '/artiklar',
            'with_front' => false
        )
    );

    register_post_type( 'artiklar', $args );
}

add_action( 'init', 'custom_post_type_artiklar', 0 );

/* Custom post type - Listor */
function custom_post_type_listor() {
    $labels = array(
        'name'                => _x( 'Listor', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Lista', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Listor', 'twentythirteen' ),
        'all_items'           => __( 'Alla listor', 'twentythirteen' ),
        'view_item'           => __( 'Visa lista', 'twentythirteen' ),
        'add_new_item'        => __( 'Skapa ny lista', 'twentythirteen' ),
        'add_new'             => __( 'Lägg till', 'twentythirteen' ),
        'edit_item'           => __( 'Redigera lista', 'twentythirteen' ),
        'update_item'         => __( 'Uppdatera lista', 'twentythirteen' ),
        'search_items'        => __( 'Sök lista', 'twentythirteen' ),
        'not_found'           => __( 'Hittade ingenting', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Hittade ingenting i papperskorgen', 'twentythirteen' ),
    );

    $args = array(
        'label'               => __( 'listor', 'twentythirteen' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields' ),
        'taxonomies'          => array( 'post_tag' ), // Lägg till detta för att stödja taggar
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'rewrite' => array(
            'slug' => '/listor',
            'with_front' => false
        )
    );

    register_post_type( 'listor', $args );
}

add_action( 'init', 'custom_post_type_listor', 0 );


/* Custom post type - Nyheter */
function custom_post_type_nyheter() {
    $labels = array(
        'name'                  => _x( 'Nyheter', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'         => _x( 'Nyhet', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'             => __( 'Nyheter', 'twentythirteen' ),
        'all_items'             => __( 'Alla nyheter', 'twentythirteen' ),
        'view_item'             => __( 'Visa nyhet', 'twentythirteen' ),
        'add_new_item'          => __( 'Skapa ny nyhet', 'twentythirteen' ),
        'add_new'               => __( 'Lägg till', 'twentythirteen' ),
        'edit_item'             => __( 'Redigera nyhet', 'twentythirteen' ),
        'update_item'           => __( 'Uppdatera nyhet', 'twentythirteen' ),
        'search_items'          => __( 'Sök nyhet', 'twentythirteen' ),
        'not_found'             => __( 'Hittade ingenting', 'twentythirteen' ),
        'not_found_in_trash'    => __( 'Hittade ingenting i papperskorgen', 'twentythirteen' ),
    );
     
    $args = array(
        'label'                 => __( 'nyheter', 'twentythirteen' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'rewrite'               => array(
            'slug'                => 'nyhetsarkiv', // Använd slug utan "/"
            'with_front'          => false
        )
    );
     
    register_post_type( 'nyheter', $args );
}

add_action( 'init', 'custom_post_type_nyheter' );

 
/* Remove category base */
function remove_category($string, $type) {
    if ($type != 'single' && $type == 'category' && strpos($string, 'category') !== false) {
        $url_without_category = str_replace("/category/", "/", $string);
        return trailingslashit($url_without_category);
    }
    return $string;
}
add_filter('user_trailingslashit', 'remove_category', 100, 2);


/* Remove slash */
function remove_trailing_slash($string, $type) {
    return untrailingslashit($string);
}
add_filter('user_trailingslashit', 'remove_trailing_slash', 10, 2);

/* Redirect manual tag link */
function custom_redirect_amne_to_recensioner_amnen() {
    // Hämta den aktuella URL-sökvägen
    $current_url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // Kontrollera om URL:en exakt matchar "/Malmomaskinen/amne"
    if ($current_url_path === '/Malmomaskinen/amne') {
        // Bygg den nya URL:en
        $new_url = home_url('/Malmomaskinen/recensioner/amnen');
        // Utför omdirigeringen
        wp_redirect($new_url, 301);
        exit();
    }
}
add_action('template_redirect', 'custom_redirect_amne_to_recensioner_amnen');

/* List tags */
function list_all_tags() {
    // Hämta alla taggar
    $tags = get_tags(array(
        'hide_empty' => false
    ));

    // Starta output buffering
    ob_start();

    // Kolla om det finns taggar
    if ($tags) {
        echo '<div class="flex text1">';
        foreach ($tags as $tag) {
            // Lista taggarnas namn och antal inlägg
            echo '<a class="silent tag-block secondary-bg-tone text1" href="' . get_tag_link($tag->term_id) . '"><i data-feather="tag" class="marg-right-medium secondary"></i>';
            echo $tag->name;
            echo '</a>';
        }
        echo '</div>';
    } else {
        echo '<p>Inga taggar hittades.</p>';
    }

    // Returnera den fångade outputen
    return ob_get_clean();
}

function list_all_tags_shortcode() {
    return list_all_tags();
}
add_shortcode('list_all_tags', 'list_all_tags_shortcode');

/* Redirect to SiteKit */
function custom_login_redirect($redirect_to, $request, $user) {
    // Kontrollera att $user-objektet existerar och användaren är inloggad
    if (isset($user->roles) && is_array($user->roles)) {
        // Omdirigera alla användare till Google Site Kit-dashboarden
        return admin_url('admin.php?page=googlesitekit-dashboard');
    }
    // Om något går fel, använd standardomdirigeringen
    return $redirect_to;
}

add_filter('login_redirect', 'custom_login_redirect', 10, 3);










