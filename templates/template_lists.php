<div class="block">

<div class="row">
<div class="segment-block bg1 text1 marg-medium"><span class="fourth">•</span> Senast uppdaterade listor</div><h4 class="fourth" id="reviews-archive-link"><a class="no" href="<?php echo home_url(); ?>/listor">Till arkivet <i data-feather="arrow-right" class="fourth marg-left"></i></a></h4>
</div>

<div class="flex">    
<?php
// Define the query arguments
$args = array(
    'post_type' => 'listor',  // Post type 'artiklar'
    'posts_per_page' => 4,      // Number of posts to retrieve
    'post_status' => 'publish', // Only show published posts
    'orderby' => 'modified',        // Order by date
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

<div class="article-block-alt list-archive" style="background-image:url('<?php echo esc_url($thumbnail_url); ?>')">
<?php  if( get_field('list_tag') == 'yes' ) { ?><div class="article-block-meta fourth bg4"><i data-feather="refresh-cw" class="fourth marg-right"></i>Levande lista</div><?php } ?><div class="article-block-info-alt">
<h1 class="text1 marg-small"><?php the_title(); ?></h1>
<div class="button-grp"><button class="fourth-bg" onclick="location.href='<?php the_permalink(); ?>'">Till listan</button>
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