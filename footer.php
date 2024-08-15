<!-- Content -->

<?php if (is_404()): ?>
<?php else: ?>

</div>
</div>
<div id="footer-container">
<div id="footer" class="bg4">
<div id="footer-inner">
<img class="marg-small" alt="Malmömaskinen logotyp" src="<?php echo get_template_directory_uri(); ?>/img/malmomaskinen_logo_white.png">
<div id="footer-info" class="text2"><?php the_field('website_description', 'option'); ?></div>

<div class="flex-adjustable-large">

<div class="flex-adjustable-50-large">
<div class="nav-item-header text2">Innehåll</div>
<div class="nav-item-small text3"><a class="no" href="<?php echo home_url(); ?>/recensioner">Recensioner</a></div>
<div class="nav-item-small text3"><a class="no" href="<?php echo home_url(); ?>/artiklar">Artiklar</a></div>
<div class="nav-item-small text3"><a class="no" href="<?php echo home_url(); ?>/listor">Listor</a></div>
</div>

<div class="flex-adjustable-50-large">
<div class="nav-item-header text2">Övriga sidor</div>


<?php
// Skapa en ny WP_Query
$query = new WP_Query(array(
    'post_type' => 'page',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post__not_in' => array(9, 82, 84, 80, 222), // Exkludera sidor med dessa ID:n
));

// Kontrollera om queryn har några resultat
if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post(); ?>
            <div class="nav-item-small text3"><a class="no" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
    <?php endwhile;
    // Återställ postdata
    wp_reset_postdata();
else :
    echo 'Inga sidor hittades.';
endif;
?>  

</div>

</div>

<?php if( have_rows('website_links', 'options') ): ?>
<div class="marg-up-large marg-large">
<div class="button-grp">
<?php while( have_rows('website_links', 'options') ): the_row(); ?>
<a class="silent button bg4 text3" href="<?php the_sub_field('website_links_LINK'); ?>" target="_blank"><?php the_sub_field('website_links_TITLE'); ?></a>    
<?php endwhile; ?>
</div>
</div>
<?php endif; ?>  

<div id="version" class="marg-small"><i data-feather="zap" class="marg-right primary"></i> Version <?php the_field('website_version', 'option'); ?></div>
<div class="footer-end text2 marg-no">Skapades av <a href="https://www.hunkverkstan.com" target="_blank">Hunkverkstan</a></div>    
<div class="footer-end text2">Alla rättigheter reserverade • <?php
$year = date('Y');
echo $year;
?>

</div>
</div>
</div>
</div>

<?php endif; ?>

<!-- Sidebar edit bar -->
<?php if( current_user_can('editor') || current_user_can('administrator') ) {  ?> 
<div id="sidebar-edit" class="float">
<a class="no" href="<?php echo get_home_url(); ?>/wp-admin/admin.php?page=googlesitekit-dashboard"><p class="sidebar-edit-text">Till redigerarläget</p></a>
</div>
<?php } ?>
        
<!-- Footer & Scripts -->
<?php wp_footer(); ?>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0&appId=1566000737283984&autoLogAppEvents=1" nonce="ywRETNx8"></script>

</body>
</html>