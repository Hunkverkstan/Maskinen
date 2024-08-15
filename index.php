<?php get_header(); ?>

<!-- Content -->

<div class="outer-col">

<div class="col-75">

<?php if( have_rows('content') ): ?>

<?php while ( have_rows('content') ) : the_row();

if( get_row_layout() == 'content_intro' ): ?>
    
<!-- Introhero -->       
<?php include ('templates/template_intro.php'); ?>

<?php elseif( get_row_layout() == 'content_reviews' ): ?>

<!-- Recensionsarkiv -->          
<?php include ('templates/template_reviews.php'); ?>

<?php elseif( get_row_layout() == 'content_articles' ): ?>

<!-- Artikelarkiv -->          
<?php include ('templates/template_articles.php'); ?>

<?php elseif( get_row_layout() == 'content_lists' ): ?>

<!-- Artikelarkiv -->          
<?php include ('templates/template_lists.php'); ?>

<?php elseif( get_row_layout() == 'content_ad' ): ?>

<!-- Annonsblock -->          
<?php include ('templates/template_ad.php'); ?>

<?php endif; endwhile; endif; ?>

</div>

<div class="col-25">
<?php include ('templates/template_sidebar_start.php'); ?>
</div> 

<div class="col-10">
<?php include ('templates/sidebar/sidebar_ad.php'); ?>
</div> 

</div>
    
<?php get_footer(); ?>

</div>