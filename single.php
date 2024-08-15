<?php get_header(); ?>

<!-- Content -->

<?php 
if ( have_posts() ) : 
    while ( have_posts() ) : the_post();

        $post_type = get_post_type();

        if ( $post_type == 'artiklar' ) {
            get_template_part( 'content', 'articles' );
        } elseif ( $post_type == 'listor' ) {
            get_template_part( 'content', 'lists' );
        } elseif ( $post_type == 'nyheter' ) {
            get_template_part( 'content', 'news' );
        } else {
            get_template_part( 'content', get_post_format() );
        }

        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; 
endif; 
?>

<?php get_footer(); ?>
