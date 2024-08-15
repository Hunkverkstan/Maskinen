<div class="block">

<div class="row">
<div class="segment-block bg1 text1 marg-medium"><span class="third">•</span> Senaste artiklarna</div><h4 class="third" id="reviews-archive-link"><a class="no" href="<?php echo home_url(); ?>/artiklar">Till arkivet <i data-feather="arrow-right" class="third marg-left"></i></a></h4>
</div>

<div class="flex-adjustable-small">   


 
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

// Initialize the counter
$count = 0;

// Check if there are posts
if ($query->have_posts()) :
    // Loop through the posts
    while ($query->have_posts()) : $query->the_post(); 
        // Get the post ID
        $post_id = get_the_ID(); 
        // Get the thumbnail URL
        $thumbnail_url = get_the_post_thumbnail_url($post_id, 'full') ?: '';
        // Increment the counter
        $count++;

        // If it's the first post
        if ($count == 1) : ?>
    <div class="flex-adjustable-50-small">
                    <div class="article-block-alt first-article" style="background-image:url('<?php echo esc_url($thumbnail_url); ?>')">
                        <div class="article-block-overlay"></div>
                        <div class="article-block-meta third third-bg-tone"><?php the_field('article_tag'); ?></div>
                        <div class="article-block-info-alt">
                            <h1 class="text3 marg-small"><?php the_title(); ?></h1>
                            <div class="button-grp">
                                <button class="third-bg" onclick="location.href='<?php the_permalink(); ?>'">Läs artikel</button>
                            </div>
                        </div>
                    </div>
</div>
        <?php 
        // If it's the second post, start the wrapper div
        elseif ($count == 2) : ?>
<div class="block-info bg1 flex-adjustable-50-small">
<div class="article-block-small">
<div class="article-block-small-img" style="background-image:url('<?php echo get_the_post_thumbnail_url($post, 'full'); ?>')"></div>
<div class="article-block-small-info">
<div class="article-block-small-meta third-bg-tone third"><?php the_field('article_tag'); ?></div>
<h2 class="text1"><a class="no" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<div class="flex-custom">
<div class="review-block-small-meta text2"><?php the_time('j F Y'); ?></div>
</div>
</div>
</div>
        <?php 
        // If it's the third or fourth post, just add the post
        elseif ($count == 3) : ?>
<div class="article-block-small">
<div class="article-block-small-img" style="background-image:url('<?php echo get_the_post_thumbnail_url($post, 'full'); ?>')"></div>
<div class="article-block-small-info">
<div class="article-block-small-meta third-bg-tone third"><?php the_field('article_tag'); ?></div>
<h2 class="text1"><a class="no" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<div class="flex-custom">
<div class="review-block-small-meta text2"><?php the_time('j F Y'); ?></div>
</div>
</div>
</div>

        <?php 
        // If it's the fourth post, close the wrapper div
        elseif ($count == 4) : ?>
<div class="article-block-small">
<div class="article-block-small-img" style="background-image:url('<?php echo get_the_post_thumbnail_url($post, 'full'); ?>')"></div>
<div class="article-block-small-info">
<div class="article-block-small-meta third-bg-tone third"><?php the_field('article_tag'); ?></div>
<h2 class="text1"><a class="no" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<div class="flex-custom">
<div class="review-block-small-meta text2"><?php the_time('j F Y'); ?></div>
</div>
</div>
</div>
</div>
        <?php endif;
    endwhile; 
else : 
    echo 'Inga inlägg hittades.';
endif;

// Reset post data
wp_reset_postdata();
?>

</div>
</div>