<div class="block">
<div class="segment-block bg1 text1 marg-medium"><span class="third">•</span> Senaste artiklarna</div>

<div class="block-info bg1">
    
<?php
// Define the query arguments
$args = array(
    'post_type' => 'artiklar',  // Post type 'artiklar'
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
        ?>
        <div class="article-block-small in-sidebar">
            <div class="article-block-small-img" style="background-image:url('<?php echo esc_url($thumbnail_url); ?>')"></div>
            <div class="article-block-small-info">
                <div class="article-block-small-meta third-bg-tone third"><?php the_field('article_tag'); ?></div>
                <h2 class="text1"><a class="no" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="flex-custom">
                    <div class="review-block-small-meta text2"><?php the_time('j F Y'); ?></div>
                </div>
            </div>
        </div>
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