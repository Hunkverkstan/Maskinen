<div class="block">
<div class="segment-block bg1 text1 marg-medium"><span class="text2">•</span> Övriga sidor</div>
<div class="block-info bg3">

<?php
// Skapa en ny WP_Query
$query = new WP_Query(array(
    'post_type' => 'page',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post__not_in' => array(9, 82, 84, 80, 222), // Exkludera sidor med dessa ID:n
));

// Få ID för den aktuella sidan
$current_page_id = get_queried_object_id();

// Få ID för sidan "Nyhetsarkiv"
$nyhetsarkiv_page_id = 129; // Ändra till det faktiska ID:t för sidan "Nyhetsarkiv"

// Kontrollera om vi är på en singelsida av custom post type 'nyheter'
$is_single_nyheter = is_singular('nyheter');

// Kontrollera om queryn har några resultat
if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post(); 
        // Få ID för den aktuella sidan i loopen
        $post_id = get_the_ID();
        // Bestäm klass baserat på om det är den aktuella sidan
        if ($post_id === $current_page_id || ($is_single_nyheter && $post_id === $nyhetsarkiv_page_id)) {
            $text_class = 'text2';
        } else {
            $text_class = 'text1';
        }
        ?>
        <h5 class="<?php echo $text_class; ?> block-link">
            <a class="no" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h5>
    <?php endwhile;
    // Återställ postdata
    wp_reset_postdata();
else :
    echo 'Inga sidor hittades.';
endif;
?>


</div>
</div>