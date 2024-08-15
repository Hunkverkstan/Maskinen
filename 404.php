<?php get_header(); ?>

<!-- Content -->
<div id="error" class="bg4 vertical-center" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/404.png);">

<div id="error-nav-logo"></div>

<div id="error-inner" class="center">    
<h1 class="marg-small text3">Oops!</h1>
<h2 class="text2">Ledsen. Men sidan som du söker efter här på <?php echo get_bloginfo('name'); ?> finns tyvärr inte. Men ingen fara på taket! Du kan enkelt gå till startsidan genom att <a href="<?php echo home_url(); ?>">klicka här.</a></h2>
</div>
</div>
    
<?php get_footer(); ?>

