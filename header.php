<!DOCTYPE html>
<html lang="sv">
<head>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5RNX5JMS');</script>
<!-- End Google Tag Manager -->

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2805302728892407"
     crossorigin="anonymous"></script>
    
<!-- Meta -->
<meta charset="utf-8">
<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:card" content="summary" />
<meta name="author" content="Hunkverkstan">

<?php if (is_front_page()) : ?>
<!-- Meta tags för startsidan -->
<meta property="og:title" content="<?php echo get_bloginfo('name'); ?>">
<meta name="description" content="<?php the_field('website_description', 'option'); ?>">
<meta name="og:description" content="<?php the_field('website_description', 'option'); ?>">
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/malmomaskinen_og.jpg" />
<meta name="twitter:title" content="<?php echo get_bloginfo('name'); ?>" />
<meta name="keywords" content="malmömaskinen, malmö recensioner, malmö tips, malmö omdömen, upplevelser malmö, sevärdheter malmö, turistmål malmö, roliga saker malmö, utflykter malmö, utforska malmö">

<?php elseif (is_singular('post') || is_singular('page') || is_singular('artiklar') || is_singular('listor') || is_singular('nyheter')) : ?>
<!-- Meta tags för enskilda inlägg och sidor -->
<meta property="og:title" content="<?php the_title(); ?><?php if (is_singular('post')) { echo ' • Recension'; } ?>">
<meta name="description" content="<?php echo strip_tags(get_the_excerpt()); ?>">
<meta name="og:description" content="<?php echo strip_tags(get_the_excerpt()); ?>">
<?php if (has_post_thumbnail()) : ?>
<meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>" />
<?php else : ?>
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/malmomaskinen_og.jpg" />
<?php endif; ?>
<meta name="twitter:title" content="<?php the_title(); ?>" />
<?php if (is_singular('post')) : ?>
<meta name="keywords" content="<?php the_title(); ?> malmö, <?php the_title(); ?> malmö recension, <?php the_title(); ?> malmö omdöme, <?php the_title(); ?> malmö betyg">
<?php elseif (is_singular('page')) : ?>
<meta name="keywords" content="<?php the_title(); ?>, malmömaskinen information">
<?php elseif (is_singular('artiklar')) : ?>
<meta name="keywords" content="<?php the_title(); ?>">
<?php elseif (is_singular('listor')) : ?>
<meta name="keywords" content="<?php the_title(); ?>, malmö lista, malmö topplista">
<?php elseif (is_singular('nyheter')) : ?>
<meta name="keywords" content="<?php the_title(); ?>, malmömaskinen uppdatering, malmömaskinen nyhet">
<?php endif; ?>

<?php elseif (is_category()) : ?>

<meta property="og:title" content="<?php single_cat_title(); ?> • Malmömaskinen">
<meta name="description" content="<?php echo strip_tags(category_description()); ?>">
<meta name="og:description" content="<?php echo strip_tags(category_description()); ?>">
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/malmomaskinen_og.jpg" />
<meta name="twitter:title" content="Kategori • <?php single_cat_title(); ?>" />
<meta name="keywords" content="<?php single_cat_title(); ?> i malmö, recensioner <?php single_cat_title(); ?> malmö, <?php single_cat_title(); ?> upplevelser, utflykter <?php single_cat_title(); ?>, bäst i <?php single_cat_title(); ?>">

<?php elseif (is_tag()) : ?>

<meta property="og:title" content="<?php single_tag_title(); ?> • Malmömaskinen">
<meta name="description" content="Här hittar du alla recensioner från Malmömaskinen med aktuell tagg.">
<meta name="og:description" content="Här hittar du alla recensioner från Malmömaskinen med aktuell tagg.">
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/malmomaskinen_og.jpg" />
<meta name="twitter:title" content="Tagg • <?php single_tag_title(); ?>" />
<meta name="keywords" content="<?php single_tag_title(); ?> recensioner malmö, <?php single_tag_title(); ?> tips malmö, <?php single_tag_title(); ?> malmö, bästa <?php single_tag_title(); ?> malmö">

<?php elseif (is_404()) : ?>
<!-- Meta tags för 404-sidor -->
<title>Sidan hittades inte • Malmömaskinen</title>
<meta property="og:title" content="Sidan kunde inte hittas!>">
<meta name="description" content="Tyvärr, sidan du letar efter hos Malmömaskinen finns inte.">
<meta name="og:description" content="Tyvärr, sidan du letar efter hos Malmömaskinen finns inte.">
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/404_og.jpg" />
<meta name="twitter:title" content="Sidan kunde inte hittas!" />

<?php else : ?>
<!-- Meta tags för övriga sidor -->
<meta property="og:title" content="<?php echo get_bloginfo('name'); ?>">
<meta name="description" content="<?php echo strip_tags(get_the_excerpt()); ?>">
<meta name="og:description" content="<<?php echo strip_tags(get_the_excerpt()); ?>">
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/malmomaskinen_og.jpg" />
<meta name="twitter:title" content="<?php the_title(); ?>" />
<meta name="keywords" content="malmömaskinen, malmö recensioner, malmö tips, malmö omdömen, upplevelser malmö, sevärdheter malmö, turistmål malmö, roliga saker malmö, utflykter malmö, utforska malmö">

<?php endif; ?>

<!-- Mobile -->
<link rel="canonical" href="<?php the_permalink(); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favicons//apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicons//favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicons//favicon-16x16.png">
<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/favicons//site.webmanifest">
<meta name="msapplication-TileColor" content="#5c50e2">
<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/favicons//mstile-144x144.png">
<meta name="theme-color" content="#5c50e2">

<!-- Header & Nav-->
<?php wp_head();?>
    
<div id="body-inner">

<svg id="svg1" data-name="svg1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 136.66 146.49"><defs></defs><path class="svg1" d="M144.2,54.3c15.2,16.6,31.1,31.2,33.9,48.5s-7.4,37.5-22.6,49.1-35.3,14.5-53.3,12.3-33.7-9.5-44.3-21.1-16-27.3-16-43.1,5.3-31.7,15.8-48.3,26.5-34,41.6-33.3S129.1,37.7,144.2,54.3Z" transform="translate(-41.9 -18.38)"/></svg>

<svg id="svg2" data-name="svg1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 136.66 146.49"><defs></defs><path class="svg2" d="M144.2,54.3c15.2,16.6,31.1,31.2,33.9,48.5s-7.4,37.5-22.6,49.1-35.3,14.5-53.3,12.3-33.7-9.5-44.3-21.1-16-27.3-16-43.1,5.3-31.7,15.8-48.3,26.5-34,41.6-33.3S129.1,37.7,144.2,54.3Z" transform="translate(-41.9 -18.38)"/></svg>

<?php if (is_404()): ?>
<?php else: ?>

<?php
if (is_front_page()) {
?>

<div id="intro-outer">

<!-- Dynamiskt content -->
<?php
$current_time = current_time('timestamp');
$twenty_four_hours_ago = strtotime('-48 hours', $current_time);

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'date_query' => array(
        'after' => date('Y-m-d H:i:s', $twenty_four_hours_ago),
        'inclusive' => true,
    ),
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
?>
<div class="container-top">    
<div id="dynamic-box">  
<div class="dynamic-single dynamic-banner text1"><span class="accent1 marg-right">Nyrecenserat: </span><span class="breadcrumb"><?php the_title(); ?> (<?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); } ?>)</span><button onclick="location.href='<?php the_permalink(); ?>'" class="no dynamic-single-link secondary-bg text3">Läs mer</button></div>
</div>      
</div>

<?php
    endwhile;
endif;

// Återställer postdata
wp_reset_postdata();
?>

<div id="hero-container">
<div id="flex-outer-intro">
<div class="flex">

<div id="intro-img">
<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script><dotlottie-player class="lottie-ani fade-in" background="transparent" speed="1" style="width: auto; border:none;" direction="1" playMode="normal" loop autoplay></dotlottie-player>
</div>

<div id="intro-text"><h1 class="marg-small">Välkommen till Malmömaskinen!</h1>
<h4 class="text1 marg-medium"><?php echo esc_html(strip_tags(get_the_excerpt(get_post(9)))); ?></h4>
<h5 class="text2 marg-medium"><i data-feather="info" class="marg-right secondary"></i>Just nu finns <span class="secondary"><?php $post_count = wp_count_posts()->publish; echo $post_count; ?> saker</span> recenserade.</h5>
<div class="button-grp"> 
<button onclick="location.href='<?php echo home_url(); ?>/recensioner'" class="secondary-bg text3">Till recensioner</button> 
<button onclick="location.href='<?php echo home_url(); ?>/skicka-in-ditt-tips'" id="tips" class="secondary">Tipsa om saker<i data-feather="send" class="marg-left-medium secondary"></i></button>
</div>    
</div>

</div>
</div>
</div>
</div>

<?php
}
?>

<div id="outer-container">

<div id="nav-header">

<div id="nav-logo" alt="Malmömaskinen logotyp" onclick="location.href='<?php echo home_url(); ?>';"></div>

  <label class="switch">
    <input type="checkbox" onclick="darkLight()" id="checkBox" >
    <span class="slider"></span>
  </label>    
    
<div id="nav-menu" class="text1"><span class="icon-right">Meny</span><i data-feather="menu" class="marg-left secondary"></i></div>    

<div id="nav-items">
<div id="nav-items-close"><i data-feather="x" id="nav-items-close" class="text1"></i></div>  
<div class="nav-item text1 <?php if (is_front_page()) echo 'current'; ?>">
    <a class="no" href="<?php echo home_url(); ?>"><i data-feather="home" class="marg-right primary"></i> Hem</a>
</div>
<div class="nav-item text1 <?php if (is_home() || is_page('amnen') || is_singular('post') || is_category() || is_tag()) echo 'current'; ?>">
    <a class="no" href="<?php echo home_url(); ?>/recensioner"><i data-feather="star" class="marg-right secondary"></i> Recensioner</a>
</div>
<div class="nav-item text1 <?php if (is_page('artiklar') || is_singular('artiklar')) echo 'current'; ?>">
    <a class="no" href="<?php echo home_url(); ?>/artiklar"><i data-feather="file" class="marg-right third"></i> Artiklar</a>
</div>
<div class="nav-item text1 <?php if (is_page('listor') || is_singular('listor')) echo 'current'; ?>">
    <a class="no" href="<?php echo home_url(); ?>/listor"><i data-feather="crosshair" class="marg-right fourth"></i> Listor</a>
</div>

<div id="nav-item-content-head-1" class="marg-large">
<div id="nav-item-content-inner-head-1" class="nav-item-header text2">Mer innehåll</div>
<div id="nav-item-content-1">

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
            <div class="nav-item-small text1"><a class="no" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
    <?php endwhile;
    // Återställ postdata
    wp_reset_postdata();
else :
    echo 'Inga sidor hittades.';
endif;
?>
</div>
</div>  

<div id="nav-item-content-2" class="marg-large">
<div class="button-grp"> 
<button class="fb-bg-tone fb" onclick="window.open('https://www.facebook.com/malmomaskinen', '_blank');">Följ på Facebook</button> 
<button class="ig-bg-tone ig" onclick="window.open('https://www.instagram.com/malmomaskin', '_blank');">Följ på Instagram</button> 
<button class="tt-bg-tone tt" onclick="window.open('https://www.tiktok.com/@malmomaskinen', '_blank');">Följ på TikTok</button>     
</div> 
</div> 

<svg id="svg3" data-name="svg3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 136.66 146.49"><defs></defs><path class="svg3" d="M144.2,54.3c15.2,16.6,31.1,31.2,33.9,48.5s-7.4,37.5-22.6,49.1-35.3,14.5-53.3,12.3-33.7-9.5-44.3-21.1-16-27.3-16-43.1,5.3-31.7,15.8-48.3,26.5-34,41.6-33.3S129.1,37.7,144.2,54.3Z" transform="translate(-41.9 -18.38)"/></svg>

</div>    
</div>

<?php
if (is_front_page()) {
    echo '<div class="container-alt">';
} else {
    echo '<div class="container">';
}
?>
<?php endif; ?>

</head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5J33PWS70Q"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5J33PWS70Q');
</script>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5RNX5JMS"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->