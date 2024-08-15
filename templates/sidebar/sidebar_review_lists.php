<div class="block">
<div class="flex-adjustable">
<div class="flex-adjustable-50">
<div class="segment-block-small bg1 text1 marg-medium"><span class="primary">•</span> Topplistan</div>

<div class="block-info bg3">
<ol class="top marg-small">

<?php if( have_rows('website_top', 'option') ): ?>

<?php while ( have_rows('website_top', 'option') ) : the_row();

if( get_row_layout() == 'website_top_1' ): ?>
    
<?php
$featured_post = get_sub_field('website_top_post');
if( $featured_post ): ?>
<li class="text1"><a class="no" href="<?php echo get_permalink( $featured_post->ID ); ?>"><?php echo esc_html( $featured_post->post_title ); ?></a></li>
<?php endif; ?>

<?php endif; endwhile; endif; ?>
</ol>

<span class="list-meta text2">Uppdaterad: <?php the_field('website_lists_date', 'option'); ?></span>    

</div>
</div>

<div class="flex-adjustable-50">
<div class="segment-block-small bg1 text1 marg-medium"><span class="accent1">•</span> Bottenlistan</div>

<div class="block-info bg3">
<ol class="bottom marg-small">

<?php if( have_rows('website_bottom', 'option') ): ?>

<?php while ( have_rows('website_bottom', 'option') ) : the_row();

if( get_row_layout() == 'website_bottom_1' ): ?>
    
<?php
$featured_post = get_sub_field('website_bottom_post');
if( $featured_post ): ?>
<li class="text1"><a class="no" href="<?php echo get_permalink( $featured_post->ID ); ?>"><?php echo esc_html( $featured_post->post_title ); ?></a></li>
<?php endif; ?>

<?php endif; endwhile; endif; ?>

</ol>
<span class="list-meta text2">Uppdaterad: <?php the_field('website_lists_date', 'option'); ?></span>    
</div>
</div>
</div>

</div>