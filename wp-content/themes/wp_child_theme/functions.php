<?php 

register_nav_menus(

	 array('primary-menu' => 'top menu' )
);
add_theme_support('post-thumbnails');



// Custom post type 


function create_custom_post_type_movies() {
    $labels = array(
        'name'                  => _x('Movies', 'Post type general name', 'textdomain'),
        'singular_name'         => _x('Movie', 'Post type singular name', 'textdomain'),
        'menu_name'             => _x('Movies', 'Admin Menu text', 'textdomain'),
        'name_admin_bar'        => _x('Movie', 'Add New on Toolbar', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'add_new_item'          => __('Add New Movie', 'textdomain'),
        'new_item'              => __('New Movie', 'textdomain'),
        'edit_item'             => __('Edit Movie', 'textdomain'),
        'view_item'             => __('View Movie', 'textdomain'),
        'all_items'             => __('All Movies', 'textdomain'),
        'search_items'          => __('Search Movies', 'textdomain'),
        'parent_item_colon'     => __('Parent Movies:', 'textdomain'),
        'not_found'             => __('No movies found.', 'textdomain'),
        'not_found_in_trash'    => __('No movies found in Trash.', 'textdomain'),
        'featured_image'        => _x('Movie Cover Image', 'Overrides the “Featured Image” phrase', 'textdomain'),
        'set_featured_image'    => _x('Set movie cover image', 'Overrides the “Set featured image” phrase', 'textdomain'),
        'remove_featured_image' => _x('Remove movie cover image', 'Overrides the “Remove featured image” phrase', 'textdomain'),
        'use_featured_image'    => _x('Use as movie cover image', 'Overrides the “Use as featured image” phrase', 'textdomain'),
        'archives'              => _x('Movie archives', 'The post type archive label used in nav menus', 'textdomain'),
        'insert_into_item'      => _x('Insert into movie', 'Overrides the “Insert into post”/”Insert into page” phrase', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this movie', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase', 'textdomain'),
        'filter_items_list'     => _x('Filter movies list', 'Screen reader text for the filter links heading', 'textdomain'),
        'items_list_navigation' => _x('Movies list navigation', 'Screen reader text for the pagination heading', 'textdomain'),
        'items_list'            => _x('Movies list', 'Screen reader text for the items list heading', 'textdomain'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'movie'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('movie', $args);
}

add_action('init', 'create_custom_post_type_movies');


//filter 


function enqueue_category_filter_scripts() {
    // Enqueue jQuery (if not already enqueued)
    wp_enqueue_script('jquery');

    // Enqueue custom script
    wp_enqueue_script('custom-category-filter', get_template_directory_uri() . '/js/category-filter.js', array('jquery'), null, true);

    // Localize script to provide the AJAX URL
    wp_localize_script('custom-category-filter', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_category_filter_scripts');



function filter_posts_by_category() {
    // Check if category ID is set
    $cat_id = isset($_POST['category']) ? intval($_POST['category']) : '';

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1, // Change this to the number of posts you want to display
    );

    // If a category ID is selected, add to the query args
    if ($cat_id) {
        $args['cat'] = $cat_id;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <div class="post-item">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div><?php the_excerpt(); ?></div>
            </div>
            <?php
        }
    } else {
        echo '<p>No posts found.</p>';
    }

    wp_reset_postdata();

    // End the AJAX request
    wp_die();
}
add_action('wp_ajax_filter_posts_by_category', 'filter_posts_by_category');
add_action('wp_ajax_nopriv_filter_posts_by_category', 'filter_posts_by_category');

?>