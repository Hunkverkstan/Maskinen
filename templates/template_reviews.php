<div class="row">
<div class="segment-block bg1 text1 marg-medium"><i data-feather="star" class="marg-right-medium secondary"></i>Senaste recensionerna</div><h4 class="secondary" id="reviews-archive-link"><a class="no" href="<?php echo home_url(); ?>/recensioner">Till arkivet <i data-feather="arrow-right" class="secondary marg-left"></i></a></h4>
</div>

<div class="flex-outer">
<div class="flex">

<?php
// Define the query arguments
$args = array(
    'post_type' => 'post',      // Change to 'artiklar', 'listor', 'nyheter', etc. if needed
    'posts_per_page' => 7,      // Number of posts to retrieve
    'post_status' => 'publish', // Only show published posts
    'orderby' => 'date',        // Order by date
    'order' => 'DESC'           // Most recent first
);

// Perform the query
$query = new WP_Query($args);

// Initialize the post counter
$post_counter = 0;

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
        // Get the subheader
        $review_sub = get_field('review_sub', $post_id);
        // Get the review rating
        $review_rating = get_field('review_rating', $post_id);
        // Construct the star SVG URL
        $stars_svg_url = get_template_directory_uri() . '/img/mm_stars_' . $review_rating . '.svg';
        
        if ($post_counter == 0) {
            // Custom layout for the first post
            ?>

            <a href="<?php the_permalink(); ?>" class="silent review-block bg1 float first-post">
                <div class="review-block-img" style="background-image:url('<?php echo esc_url($thumbnail_url); ?>')">
                    <div class="review-block-meta text3 bg4"><i data-feather="map-pin" class="marg-right text3"></i><?php echo $category_name; ?></div>
                </div>
                <div class="review-block-info bg1">
<?php $published_date = get_the_date('U'); $current_date = current_time('U'); $time_diff = $current_date - $published_date;
// (2 dagar * 24 timmar * 60 minuter * 60 sekunder)
if ($time_diff <= 2 * 24 * 60 * 60) { echo '<div class="first-post-indicator secondary-bg text3">NYTT!</div>'; } ?>
                    <div class="review-block-content">  
                        <div class="review-block-container">
                        <div class="review-block-title marg-small"><h2 class="bg1 text1"><?php the_title(); ?></h2></div>
                        <h3 class="text2"><?php echo $review_sub; ?></h3>
                        </div>
                        <div class="review-block-cta button-grp">
                            <div class="button-time bg3 text2"><?php the_time('j M Y'); ?></div>
                            <div class="button-stars bg3 review-star <?php echo ($review_rating == 5) ? ' highest' : ''; ?>"><img src="<?php echo esc_url($stars_svg_url); ?>" alt="<?php echo esc_attr($review_rating); ?> star<?php echo ($review_rating > 1 ? 's' : ''); ?>"></div>
                        </div>
                    </div>
                </div>
            </a>
            <?php
        } else {
            // Default layout for the other posts
            ?>
            <a href="<?php the_permalink(); ?>" class="silent review-block-alt bg1 float">
                <div class="review-block-img" style="background-image:url('<?php echo esc_url($thumbnail_url); ?>')">
                    <div class="review-block-meta text3 bg4"><i data-feather="map-pin" class="marg-right text3"></i><?php echo $category_name; ?></div>
                </div>
                <div class="review-block-info bg1">
                    <div class="review-block-content">
                        <div class="review-block-title marg-small"><h2 class="bg1 text1"><?php the_title(); ?></h2></div>
                        <div class="review-block-cta button-grp">
                            <div class="button-time bg3 text2"><?php the_time('j M Y'); ?></div>
                            <div class="button-stars bg3 review-star <?php echo ($review_rating == 5) ? ' highest' : ''; ?>"><img src="<?php echo esc_url($stars_svg_url); ?>" alt="<?php echo esc_attr($review_rating); ?> star<?php echo ($review_rating > 1 ? 's' : ''); ?>"></div>
                        </div>
                    </div>
                </div>
            </a>
            <?php
        }
        
        // Increment the post counter
        $post_counter++;
    endwhile; 
else : 
    echo 'Inga inlägg hittades.';
endif;

// Reset post data
wp_reset_postdata();
?>



</div>
</div>

