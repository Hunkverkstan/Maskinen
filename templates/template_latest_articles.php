<div class="block">

<div class="row">
<div class="segment-block bg1 text1 marg-medium"><span class="third">•</span> Senaste artiklarna</div><h4 class="third" id="reviews-archive-link"><a class="no" href="<?php echo home_url(); ?>/artiklar">Till arkivet <i data-feather="arrow-right" class="third marg-left"></i></a></h4>
</div>

<div class="block-info-alt bg2 marg-medium">

<div class="flex">    
<?php
// Define the query arguments
$args = array(
    'post_type' => 'artiklar',  // Post type 'artiklar'
    'posts_per_page' => 4,      // Number of posts to retrieve
    'post_status' => 'publish', // Only show published posts
    'post__not_in' => array($current_post_id), // Exclude the current post
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

<div class="article-block-alt article-archive" style="background-image:url('<?php echo esc_url($thumbnail_url); ?>')">
<div class="article-block-overlay"></div>
<div class="article-block-meta third third-bg-tone"><?php the_field('article_tag'); ?></div>
<div class="article-block-info-alt">
<h1 class="text3 marg-small"><?php the_title(); ?></h1>
<div class="button-grp"><button class="third-bg" onclick="location.href='<?php the_permalink(); ?>'">Läs artikel</button>
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
</div> 