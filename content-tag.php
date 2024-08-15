<div class="outer-col">

<div class="col-75">
<div id="content-archive">
    <div class="marg-large">
        <p class="breadcrumb x-small text2">
            <a href="<?php echo home_url(); ?>">Hem</a> > 
            <a href="<?php echo home_url(); ?>/recensioner">Recensioner</a> >
            <a href="<?php echo home_url(); ?>/recensioner/amnen">Ämnen</a> >
            <?php
            if ( is_category() ) {
                single_cat_title();
            } elseif ( is_tag() ) {
                single_tag_title();
            } else {
                echo 'Arkiv';
            }
            ?>
        </p>
    </div>

    <div class="block-archive secondary-bg-tone marg-medium">
<?php
// Hämta den aktuella taggen eller kategorin
$tag = get_queried_object();
$tag_description = '';
if ( $tag instanceof WP_Term ) {
    $tag_description = $tag->description;
}

// Bestäm klassen baserat på om det finns en beskrivning för taggen
$header_class = is_tag() && !empty($tag_description) ? 'marg-medium' : '';
?>

<h1 class="secondary <?php echo esc_attr($header_class); ?>">
    <?php
    if ( is_category() ) {
        single_cat_title();
    } elseif ( is_tag() ) {
        single_tag_title();
    } else {
        echo 'Arkiv';
    }
    ?>
</h1>

<?php
if ( ! empty( $tag_description ) ) {
    ?>
    <p class="small text1"><?php echo esc_html($tag_description); ?></p>
    <?php
}
?>



    </div>

    <div class="block">
        <div class="row">
<div class="segment-block bg1 text1 marg-medium">
    Alla recensioner i ämnet (<?php
    if ( is_tag() ) {
        $tag = get_queried_object();
        $tag_id = $tag->term_id;
        $query = new WP_Query(array(
            'tag__in' => array($tag_id),
            'posts_per_page' => -1,
            'post_type' => 'post',
            'post_status' => 'publish',
        ));
        $post_count = $query->post_count;
        echo $post_count;
        wp_reset_postdata();
    }
    ?> st)
</div>

        </div>

            <?php
            $tag = get_queried_object();
            $tag_slug = $tag->slug;
            echo do_shortcode('[ajax_load_more container_type="div" tag="' . $tag_slug . '" id="reviews" preloaded="true" preloaded_amount="8" post_type="post" posts_per_page="5" filters_analytics="false" button_label="Ladda fler recensioner" button_loading_label="Laddar recensioner ..." button_done_label="Slut på recensioner"]');
            ?>
    </div>
</div>
</div>

<div class="col-25">
<?php include ('templates/template_sidebar_article.php'); ?>
</div>

</div>