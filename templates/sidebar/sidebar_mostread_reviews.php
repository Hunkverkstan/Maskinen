<div class="block">
<div class="segment-block-small bg1 text1 marg-medium"><span class="secondary">•</span> Populära recensioner</div>

<div class="flex sidebar">

<?php
if ( class_exists('WordPressPopularPosts\Query') ) {
    $popular_posts = new WordPressPopularPosts\Query([
        'range' => 'last7days',
        'order_by' => 'views',
        'limit' => 4,
        'post_type' => 'post',
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
                        // Get the review rating
        $review_rating = get_field('review_rating', $post_id);
        // Construct the star SVG URL
        $stars_svg_url = get_template_directory_uri() . '/img/mm_stars_' . $review_rating . '.svg';
                $post_date = get_the_time('j F Y', $post_id);
            ?>
<a href="<?php echo $post_url; ?>" class="silent review-block-small bg1">
<div class="trending-post primary-bg-tone"><i data-feather="trending-up" class="marg-right-medium primary"></i></div>
<div class="review-block-small-img" style="background-image:url('<?php echo esc_url($thumbnail_url); ?>')"></div>
<div class="review-block-small-info">
<h2 class="bg1 text1"><?php echo $post_title; ?></h2>
<div class="review-block-small-meta text2"><?php echo $category_name; ?></div>
<div class="button-grp">
<div class="button-stars bg3 review-star-alt <?php echo ($review_rating == 5) ? 'highest' : ''; ?>"><img src="<?php echo esc_url($stars_svg_url); ?>" alt="<?php echo esc_attr($review_rating); ?> star<?php echo ($review_rating > 1 ? 's' : ''); ?>"></div>
</div>
</div>
</a>

        <?php endforeach; ?>
    <?php else: ?>
        <p>Hittade inget innehåll!</p>
    <?php endif;
}
?>

</div> 
</div>