<div class="outer-col">

<div class="col-75">
<div id="pages-archive">
    <div class="marg-large">
        <p class="breadcrumb x-small text2">
            <a href="<?php echo home_url(); ?>">Hem</a> > Listor
        </p>
    </div>

    <div class="block-archive fourth-bg marg-medium">
        <h1 class="pages-title text3 marg-medium">Listor</h1>
        <p class="small text3"><?php echo strip_tags( get_the_excerpt() ); ?></p>
    </div>

    <div class="block">
        <div class="row">
            <div class="segment-block bg1 text1 marg-medium">
                Alla listor (<?php
$category = get_queried_object();
$query = new WP_Query(array(
    'posts_per_page' => -1,
    'post_type' => 'listor',
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

<div class="block-info-alt bg1 marg-medium">
            <?php
            $category = get_queried_object();
            $category_slug = $category->slug;
            echo do_shortcode('[ajax_load_more container_type="div" id="reviews" preloaded="true" preloaded_amount="8" post_type="listor" posts_per_page="5" filters_analytics="false" button_label="Ladda fler artiklar" button_loading_label="Laddar artiklar ..." button_done_label="Slut på listor"]');
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