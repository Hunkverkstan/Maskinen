<div class="outer-col">

<div class="col-75">
<div id="content-archive">
    <div class="marg-large">
        <p class="breadcrumb x-small text2">
            <a href="<?php echo home_url(); ?>">Hem</a> > 
            <a href="<?php echo home_url(); ?>/recensioner">Recensioner</a> > 
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

    <div class="block-archive secondary-bg marg-medium">
        <h1 class="text3 marg-medium">
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
        <p class="small text3">
            <?php
            $category = get_queried_object();
            if ( $category instanceof WP_Term ) {
                $category_description = $category->description;
                if ( ! empty( $category_description ) ) {
                    echo $category_description;
                }
            }
            ?>
        </p>
        <hr>
        <p class="x-small text3"><i data-feather="cpu" class="marg-right-medium text3"></i>Skrivet av ChatGPT. So blame it on hen!</p>
    </div>

    <div class="block">
        <div class="row">
            <div class="segment-block bg1 text1 marg-medium">
                Alla recensioner i <?php
                if ( is_category() ) {
                    single_cat_title();
                } elseif ( is_tag() ) {
                    single_tag_title();
                } else {
                    echo 'Arkiv';
                }
                ?> (<?php
                $category = get_queried_object();
                $category_id = $category->term_id;
                $query = new WP_Query(array(
                    'category__in' => array($category_id),
                    'posts_per_page' => -1,
                    'post_type' => 'post',
                    'post_status' => 'publish',
                ));
                $post_count = $query->post_count;
                echo $post_count;
                wp_reset_postdata();
                ?> st)
            </div>
        </div>

            <?php
            $category = get_queried_object();
            $category_slug = $category->slug;
            echo do_shortcode('[ajax_load_more container_type="div" category="' . $category_slug . '" id="reviews" preloaded="true" preloaded_amount="8" post_type="post" posts_per_page="5" filters_analytics="false" button_label="Ladda fler recensioner" button_loading_label="Laddar recensioner ..." button_done_label="Slut på recensioner"]');
            ?>
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