<div class="block">
<div class="segment-block bg1 text1 marg-medium"><span class="secondary">•</span> Utforska övriga stadsdelar</div>

<div class="block-info secondary-bg-tone">
    <?php
    $current_category = get_queried_object();
    $current_category_id = $current_category->term_id;

    // Get all categories
    $categories = get_categories(array(
        'exclude' => $current_category_id, // Exclude the current category
        'orderby' => 'name', // Order by name
        'order' => 'ASC' // In ascending order
    ));

    // Loop through the categories and create links
    foreach ($categories as $category) {
        $category_link = esc_url(get_category_link($category->term_id));
        $category_name = esc_html($category->name);

        // Get the post count for the category
        $post_count = $category->count;

        // Format the post count label based on singular or plural
        $post_count_label = sprintf('%d %s', $post_count, ($post_count === 1 ? 'st' : 'st'));

        // Output the category name with link and post count
        echo '<h5 class="text1 row block-link"><a class="no" href="' . $category_link . '">' . $category_name . '</a> <span class="block-link-meta text3">' . $post_count_label . '</span></h5>';
    }
    ?>
</div>
</div>