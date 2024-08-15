<?php get_header(); ?>

<div class="outer-col">

<div class="col-75">
<div id="pages-archive">
        <div class="marg-large">
        <p class="breadcrumb x-small text2">
            <a href="<?php echo home_url(); ?>">Hem</a> > Recensioner
        </p>
        </div>       

    <div class="block-archive secondary-bg marg-medium">
        <h1 class="pages-title text3 marg-medium">Recensioner</h1>
<?php
$post_id = 80; // Inläggs-ID

// Hämta inlägget med ID 9
$post = get_post($post_id);

// Kontrollera om inlägget existerar
if ($post) {
    // Hämta och visa utdraget för inlägget med ID 9
    echo '<p class="small text3">' . strip_tags(get_the_excerpt($post)) . '</p>';
} else {
    // Visa ett felmeddelande om inlägget inte hittades
    echo '<p>Utdraget kunde inte hämtas eftersom inlägget inte hittades.</p>';
}
?>    </div>

<div id="map-block">

<div class="segment-block bg1 text1 marg-medium">Recensionskartan <i data-feather="map" class="marg-left-medium secondary"></i></div>

<?php echo do_shortcode('[wpgmza id="1"]'); ?>
    
</div> 

<div class="block">
<div class="row">
<div class="segment-block bg1 text1 marg-medium">Alla recensioner (<?php
                $category = get_queried_object();
                $query = new WP_Query(array(
                    'posts_per_page' => -1,
                    'post_type' => 'post',
                    'post_status' => 'publish',
                ));
                $post_count = $query->post_count;
                echo $post_count;
                wp_reset_postdata();
                ?> st)</div>
</div>

<div class="block-info bg2 marg-medium">
<div id="filtering-wrapper">
<h5 id="filter-button" class="text1"><span id="filter-text">Visa filtrering</span><i data-feather="chevron-down" id="filter-flip" class="marg-left text2"></i></h5>
<h5 class="secondary"><a id="map-link" class="no" href="#map-block"><i data-feather="map" class="secondary marg-right"></i>Gå till kartan<i data-feather="arrow-down" class="secondary marg-left"></i></a></h5> 
</div>

<div id="review-filtering">
 <?php echo do_shortcode('[ajax_load_more_filters id="filtering" target="reviews"]'); ?> 
</div>
</div>

<?php echo do_shortcode('[ajax_load_more container_type="div" id="reviews" target="filtering" filters="true" filters_url="false" filters_paging="false" preloaded="true" preloaded_amount="20" post_type="post" posts_per_page="8" filters_analytics="false" button_label="Ladda fler recensioner" button_loading_label="Laddar recensioner ..." button_done_label="Slut på recensioner"]'); ?> 

</div>

</div>


</div>

<div class="col-25">    
<?php include('templates/template_sidebar_review.php'); ?>
</div>

<div class="col-10">
<?php include ('templates/sidebar/sidebar_ad.php'); ?>
</div>

</div>

<?php get_footer(); ?>

</div>

