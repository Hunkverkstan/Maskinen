<div class="bg-block-full bg2">
<div class="row">
<div class="segment-block-alt bg1 text1 marg-medium"><i data-feather="eye" class="marg-right-medium secondary"></i>Spana även in detta</div><div class="bg3" id="reviews-archive-link"><img src="<?php echo get_template_directory_uri(); ?>/img/mm_swipe.svg"></div>
</div>

<?php
// Hämta det aktuella inlägget
global $post;
$current_post_id = $post->ID;

// Hämta taggar för det aktuella inlägget
$tags = wp_get_post_tags($current_post_id);
$tag_ids = array();
if ($tags) {
    foreach ($tags as $tag) {
        $tag_ids[] = $tag->term_id;
    }
}

// Om inga taggar, avbryt
if (empty($tag_ids)) {
    return;
}

// Första WP_Query: Hämta inlägg med matchande taggar och rangordna dem
$args = array(
    'post_type' => array('post', 'artiklar', 'listor'), // Inkludera anpassade posttyper
    'posts_per_page' => -1,
    'post__not_in' => array($current_post_id), // Exkludera det aktuella inlägget
    'tax_query' => array(
        array(
            'taxonomy' => 'post_tag',
            'field'    => 'term_id',
            'terms'    => $tag_ids,
            'operator' => 'IN'
        )
    ),
    'orderby' => 'post_date',
    'order'   => 'DESC'
);

$query = new WP_Query($args);
$related_posts = $query->posts;

// Sortera inläggen efter antalet matchande taggar
usort($related_posts, function($a, $b) use ($tag_ids) {
    $tags_a = wp_get_post_tags($a->ID);
    $tags_b = wp_get_post_tags($b->ID);

    $count_a = count(array_intersect(array_column($tags_a, 'term_id'), $tag_ids));
    $count_b = count(array_intersect(array_column($tags_b, 'term_id'), $tag_ids));

    return $count_b - $count_a; // Rangordna i fallande ordning
});

// Spåra visade inläggs-ID:n
$shown_post_ids = array_map(function($post) {
    return $post->ID;
}, $related_posts);

// Om det finns färre än 4 inlägg, fyll på med fler från samma kategori, exkludera redan visade inlägg
if (count($related_posts) < 4) {
    $category_ids = wp_get_post_categories($current_post_id);
    $args_additional = array(
        'post_type' => array('post', 'artiklar', 'listor'), // Inkludera anpassade posttyper
        'posts_per_page' => 4 - count($related_posts),
        'post__not_in' => array_merge(array($current_post_id), $shown_post_ids), // Exkludera redan visade inlägg och det aktuella inlägget
        'category__in' => $category_ids,
        'orderby' => 'rand' // Slumpar för att få andra inlägg
    );

    $additional_query = new WP_Query($args_additional);
    $related_posts = array_merge($related_posts, $additional_query->posts);

    // Uppdatera spårningen av visade inläggs-ID:n
    $shown_post_ids = array_merge($shown_post_ids, array_map(function($post) {
        return $post->ID;
    }, $additional_query->posts));
}

// Om det fortfarande finns färre än 4 inlägg, fyll på med de senaste inläggen
if (count($related_posts) < 4) {
    $args_latest = array(
        'post_type' => array('post', 'artiklar', 'listor'), // Inkludera anpassade posttyper
        'posts_per_page' => 4 - count($related_posts),
        'post__not_in' => array_merge($shown_post_ids, array($current_post_id)), // Exkludera redan visade inlägg och det aktuella inlägget
        'orderby' => 'date',
        'order'   => 'DESC'
    );

    $latest_query = new WP_Query($args_latest);
    $related_posts = array_merge($related_posts, $latest_query->posts);

    // Uppdatera spårningen av visade inläggs-ID:n
    $shown_post_ids = array_merge($shown_post_ids, array_map(function($post) {
        return $post->ID;
    }, $latest_query->posts));
}

// Återställ global postdata
wp_reset_postdata();

// Listan med visade inläggs-ID:n
$shown_post_ids = array_merge($shown_post_ids, array($current_post_id));

// Visa de relaterade inläggen
if (!empty($related_posts)) {
    echo '<div class="slider-block">';
    foreach ($related_posts as $post) {
        setup_postdata($post);

        // Kontrollera posttypen och visa olika HTML-strukturer
        $post_type = get_post_type($post->ID);
        
        if ($post_type == 'post') {
            // HTML-struktur för vanliga inlägg
            ?>
            <div class="review-block-alt-2 post">
                <div class="review-block-alt-img" style="background-image:url('<?php echo get_the_post_thumbnail_url($post, 'full'); ?>')">
                    <div class="review-block-meta text3 bg4"><i data-feather="map-pin" class="marg-right text3"></i><?php 
                        $categories = get_the_category(); 
                        if (!empty($categories)) { 
                            echo esc_html($categories[0]->name); 
                        } 
                    ?></div>
                </div>
                <div class="review-block-info">
                    <div class="review-block-content">
                        <div class="review-block-title marg-small"><h2 class="bg1 text1"><?php the_title(); ?></h2></div>
                        <div class="review-block-cta button-grp">
                            <div class="button-stars bg2 review-star <?php $review_rating = get_field('review_rating'); echo ($review_rating == 5) ? 'highest' : ''; ?>"><?php 
                                echo ($review_rating >= 1 && $review_rating <= 5) ? '<img src="' . get_template_directory_uri() . '/img/mm_stars_' . $review_rating . '.svg" alt="' . $review_rating . ' star' . ($review_rating > 1 ? 's' : '') . '">' : 'Saknas'; 
                            ?></div>
                            <button class="secondary-bg" onclick="location.href='<?php the_permalink(); ?>'">Läs recension</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } elseif ($post_type == 'artiklar') {
            // HTML-struktur för artiklar
            ?>

<div class="article-block-related" style="background-image:url('<?php echo get_the_post_thumbnail_url($post, 'full'); ?>')">
<div class="article-block-overlay"></div>
<div class="article-block-meta third third-bg-tone"><?php the_field('article_tag'); ?></div>
<div class="article-block-info-alt">
<h1 class="text3 marg-small"><?php the_title(); ?></h1>
<div class="button-grp"><button class="third-bg" onclick="location.href='<?php the_permalink(); ?>'">Läs artikel</button>
                            </div>
                        </div>
                    </div>
            <?php
        } elseif ($post_type == 'listor') {
            // HTML-struktur för listor
            ?>
<div class="article-block-related" style="background-image:url('<?php echo get_the_post_thumbnail_url($post, 'full'); ?>')">
<div class="article-block-overlay"></div>
<?php  if( get_field('list_tag') == 'yes' ) { ?><div class="article-block-meta fourth bg4"><i data-feather="refresh-cw" class="fourth marg-right"></i>Levande lista</div><?php } ?><div class="article-block-info-alt">
<h1 class="text3 marg-small"><?php the_title(); ?></h1>
<div class="button-grp"><button class="fourth-bg" onclick="location.href='<?php the_permalink(); ?>'">Till listan</button>
                            </div>
                        </div>
                    </div>
            <?php
        }
    }
    echo '</div>';
    wp_reset_postdata(); // Återställ global postdata
}
?>



</div>
