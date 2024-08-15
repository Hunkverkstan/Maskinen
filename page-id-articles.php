<div class="outer-col">

<div class="col-75">
<div id="pages-archive">
    <div class="marg-large">
        <p class="breadcrumb x-small text2">
            <a href="<?php echo home_url(); ?>">Hem</a> > Artiklar
        </p>
    </div>

    <div class="block-archive third-bg marg-medium">
        <h1 class="pages-title text3 marg-medium">Artiklar</h1>
        <p class="small text3"><?php echo strip_tags( get_the_excerpt() ); ?></p>
    </div>

    <div class="block">
        <div class="row"><div class="segment-block bg1 text1 marg-medium">Senaste artikeln</div>
        </div>
        
<div class="flex">    
<?php
// Hämta det senaste inlägget från posttypen 'artiklar'
$latest_article_query = new WP_Query(array(
    'post_type' => 'artiklar',
    'posts_per_page' => 1,
    'post_status' => 'publish'
));

if ($latest_article_query->have_posts()) :
    while ($latest_article_query->have_posts()) : $latest_article_query->the_post();
        $post_id = get_the_ID();
        $post_title = get_the_title();
        $post_url = get_permalink();
        $thumbnail_url = get_the_post_thumbnail_url($post_id, 'full') ?: '';
        $article_tag = get_field('article_tag', $post_id);
        $review_sub = get_field('review_sub', $post_id);
        ?>

            <a href="<?php echo esc_url($post_url); ?>" class="silent first-article-single bg1 float">
                <div class="review-block-img" style="background-image:url('<?php echo esc_url($thumbnail_url); ?>')">
                <div class="review-block-meta third third-bg-tone"><?php the_field('article_tag'); ?></div>
                </div>
                <div class="review-block-info bg1">
                    <div class="review-block-content">  
                        <div class="review-block-container">
                        <div class="review-block-title marg-small"><h2 class="text1"><?php the_title(); ?></h2></div>
                        <h3 class="text2"><?php echo $review_sub; ?></h3>
                        </div>
                        <div class="review-block-cta button-grp">
                            <div class="button-time bg3 text2"><?php the_time('j M Y'); ?></div>
                        </div>
                    </div>
                </div>
            </a>


        <?php
    endwhile;
    wp_reset_postdata();
else :
    echo '<p>Inga artiklar hittades.</p>';
endif;
?>
</div>

        <div class="row">
            <div class="segment-block bg1 text1 marg-medium">
                Alla tidigare artiklar (<?php
$category = get_queried_object();
$query = new WP_Query(array(
    'posts_per_page' => -1,
    'post_type' => 'artiklar',
    'post_status' => 'publish',
));
$post_count = $query->post_count;
wp_reset_postdata();

// Subtrahera 1 från det totala antalet inlägg
$adjusted_post_count = $post_count - 1;

// Skriv ut det justerade antalet inlägg
echo $adjusted_post_count;
?> st)
            </div>
        </div>

<div class="block-info-alt bg2 marg-medium">
            <?php
            $category = get_queried_object();
            $category_slug = $category->slug;
            echo do_shortcode('[ajax_load_more container_type="div" id="reviews" preloaded="true" preloaded_amount="8" post_type="artiklar" posts_per_page="5" filters_analytics="false" button_label="Ladda fler artiklar" button_loading_label="Laddar artiklar ..." button_done_label="Slut på artiklar" exclude="' . $post_id . '"]');
            ?>
 </div>
    </div>
</div>
</div>

<div class="col-25">
<?php include ('templates/template_sidebar_article.php'); ?>
</div>

<div class="col-10">
<?php include ('templates/sidebar/sidebar_ad.php'); ?>
</div>


</div>    