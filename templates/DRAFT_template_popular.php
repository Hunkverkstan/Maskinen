<div class="bg-block-full bg2">
<div class="segment-block-alt bg1 text1 marg-medium">Populärt just nu<i data-feather="trending-up" class="marg-left-medium primary"></i></div>

<div class="slider-block">
<?php
if ( class_exists('WordPressPopularPosts\Query') ) {
    $popular_posts = new WordPressPopularPosts\Query([
          'range' => 'custom',
          'time_quantity' => 48,
         'time_unit' => 'hour',
        'order_by' => 'views',
        'limit' => 4,
        'post_type' => 'post,artiklar,listor',
    ]);

    $posts = $popular_posts->get_posts();

    if ($posts): ?>
        <?php foreach ($posts as $post): ?>
            <?php
                $post_id = $post->id;
                $post_title = esc_html($post->title);
                $post_url = get_permalink($post_id);
                $thumbnail_url = get_the_post_thumbnail_url($post_id, 'full') ?: '';
                $categories = get_the_category($post_id);
                $category_name = !empty($categories) ? esc_html($categories[0]->name) : '';
                $review_rating = get_field('review_rating', $post_id);
                $stars_svg_url = get_template_directory_uri() . '/img/mm_stars_' . $review_rating . '.svg';
                $article_tag = get_field('article_tag', $post_id);

                // Hämta posttypen
                $post_type = get_post_type($post_id);

                // Kontrollera vilken typ av post det är
                if ($post_type === 'post') {
                    // HTML-struktur för standard inläggstyp 'post'
                    ?>
                    <div class="review-block-alt bg1">
                        <div class="review-block-img" style="background-image:url('<?php echo esc_url($thumbnail_url); ?>')">
                            <div class="review-block-meta text3 bg4"><i data-feather="map-pin" class="marg-right text3"></i><?php echo $category_name; ?></div>
                        </div>
                        <div class="review-block-info bg1">
                            <div class="review-block-content">
                                <div class="review-block-title marg-small"><h2 class="bg1 text1"><?php echo $post_title; ?></h2></div>
                                <div class="review-block-cta button-grp">
                                    <div class="button-stars bg2 review-star"><img src="<?php echo esc_url($stars_svg_url); ?>" alt="<?php echo esc_attr($review_rating); ?> star<?php echo ($review_rating > 1 ? 's' : ''); ?>"></div>
                                    <button class="secondary-bg" onclick="location.href='<?php echo esc_url($post_url); ?>'">Läs recension</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } elseif ($post_type === 'artiklar') {
                    // HTML-struktur för custom post type 'artiklar'
                    ?>
                    <div class="article-block" style="background-image:url('<?php echo esc_url($thumbnail_url); ?>')">
                        <div class="article-block-overlay"></div>
                        <div class="article-block-meta third third-bg-tone"><?php echo $article_tag; ?></div>
                        <div class="article-block-info">
                            <h1 class="text3 marg-small"><?php echo $post_title; ?></h1>
                            <div class="button-grp">
                                <button class="third-bg" onclick="location.href='<?php echo esc_url($post_url); ?>'">Läs artikel</button>
                            </div>
                        </div>
                    </div>
                    <?php
                } elseif ($post_type === 'listor') {
                    // HTML-struktur för custom post type 'listor'
                    ?>
                    <div class="article-block" style="background-image:url('<?php echo esc_url($thumbnail_url); ?>')">
                        <div class="article-block-overlay"></div>
                        <div class="article-block-meta fourth fourth-bg-tone"><?php echo $article_tag; ?></div>
                        <div class="article-block-info">
                            <h1 class="text3 marg-small"><?php echo $post_title; ?></h1>
                            <div class="button-grp">
                                <button class="fourth-bg" onclick="location.href='<?php echo esc_url($post_url); ?>'">Till listan</button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            ?>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Hittade inget innehåll!</p>
    <?php endif;
}
?>


</div>

</div>
