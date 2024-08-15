<?php
$post_id = get_the_ID(); // Hämta aktuellt post-ID
?>

<div class="outer-col">

<div class="col-75">
<div id="content" class="content-news">
<div class="marg-large">
<p class="breadcrumb x-small text2"><a href="<?php echo home_url(); ?>">Hem</a> > <a href="<?php echo home_url(); ?>/nyhetsarkiv">Nyhetsarkiv</a> > <?php the_title(); ?></p>
</div>

<div id="content-area" class="bg1">
<div id="news-info" class="marg-large"><?php $value = get_field("news_category"); if ($value) { if ($value == 'news') { echo '<div class="news-info-inner news">Nyhet</div>'; } elseif ($value == 'update') { echo '<div class="news-info-inner update">Uppdatering</div>'; } } ?>
<div class="news-info-inner date"><?php the_time('j F Y'); ?></div></div>
<div id="content-img" class="marg-medium" style="background-image:url(<?php echo get_the_post_thumbnail_url( $post, 'full' ); ?>)">
</div>
<h1 class="text1 marg-medium"><?php the_title(); ?></h1>   
<h3 class="text1 marg-large"><?php echo strip_tags( get_the_excerpt() ); ?></h3>
    
<div class="button-grp"> 
<button class="content-link" data-url="<?php the_permalink(); ?>"><span class="button-text text1">Kopiera länken</span><i data-feather="link" class="marg-left text1"></i></button>
<button id="content-messenger" class="messenger-bg-tone messenger">Dela på Messenger<i data-feather="message-circle" class="marg-left messenger"></i></button>
</div> 

<div id="content-post" class="text1 marg-small marg-up-large">
<?php the_content(); ?>
</div>
</div>
</div>

</div>

<div class="col-25">
<?php include ('templates/template_sidebar_page.php'); ?>
</div>

<div class="col-10">
<?php include ('templates/sidebar/sidebar_ad.php'); ?>
</div>

</div>
