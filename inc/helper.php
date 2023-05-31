<?php 
function bt_themes_taxonomy() {
    register_taxonomy(
        'photos_category',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'photos',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Photos Categories', // display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'photos_categories',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'bt_themes_taxonomy');