<div class="block">
<div class="segment-block bg1 text1 marg-medium"><i data-feather="star" class="marg-right-medium secondary"></i>Senaste recensionerna</div>

<div class="flex-outer">
<div class="flex sidebar">
<?php
// Define the query arguments
$args = array(
    'post_type' => 'post',      // Change to 'artiklar', 'listor', 'nyheter', etc. if needed
    'posts_per_page' => 4,      // Number of posts to retrieve
    'post_status' => 'publish', // Only show published posts
    'orderby' => 'date',        // Order by date
    'order' => 'DESC'           // Most recent first
);

// Perform the query
$query = new WP_Query($args);

// Check if there are posts
if ($query->have_posts()) : 
    // Loop through the posts
    while ($query->have_posts()) : $query->the_post(); 
        // Get the post ID
        $post_id = get_the_ID(); 
        // Get the thumbnail URL
        $thumbnail_url = get_the_post_thumbnail_url($post_id, 'full') ?: '';
        // Get the category name
        $categories = get_the_category($post_id);
        $category_name = !empty($categories) ? esc_html($categories[0]->name) : '';
        // Get the review rating
        $review_rating = get_field('review_rating', $post_id);
        // Construct the star SVG URL
        $stars_svg_url = get_template_directory_uri() . '/img/mm_stars_' . $review_rating . '.svg';
        ?>
        <a href="<?php the_permalink(); ?>" class="silent review-block-small bg1 in-sidebar">
            <div class="review-block-small-img" style="background-image:url(<?php echo esc_url($thumbnail_url); ?>)"></div>
            <div class="review-block-small-info">
                <h2 class="bg1 text1"><?php the_title(); ?></h2>
                <div class="review-block-small-meta text2">
                    <?php echo $category_name; ?>
                </div>
                    <div class="button-grp">
                        <div class="button-stars bg3 review-star-alt <?php echo ($review_rating == 5) ? 'highest' : ''; ?>">
                            <?php 
                            if ($review_rating >= 1 && $review_rating <= 5) {
                                echo '<img src="' . esc_url($stars_svg_url) . '" alt="' . esc_attr($review_rating) . ' star' . ($review_rating > 1 ? 's' : '') . '">';
                            } else {
                                echo 'Saknas';
                            }
                            ?>
                        </div>
                </div>
            </div>
        </a>
        <?php 
    endwhile; 
else : 
    echo 'Inga inlägg hittades.';
endif;

// Reset post data
wp_reset_postdata();
?>
</div>
</div> 
</div>