<?php $current_post_id = get_the_ID(); ?>

<div class="outer-col">

<div class="col-75">
<div id="content">
<div class="marg-large">
<p class="breadcrumb x-small marg-large text2"><a href="<?php echo home_url(); ?>">Hem</a> > <a href="<?php echo home_url(); ?>/listor">Listor</a> > <?php the_title(); ?></p>
</div>
<div id="content-img" class="marg-medium" style="background-image:url(<?php echo get_the_post_thumbnail_url( $post, 'full' ); ?>)">
<?php  if( get_field('list_tag') == 'yes' ) { ?><div id="content-location" class="bg4 fourth"><i data-feather="refresh-cw" class="fourth marg-right"></i>Levande lista</div><?php } ?>
</div>
<div id="content-area" class="bg1">
<h1 class="text1 marg-medium"><?php the_title(); ?></h1>   

<h3 class="text1 marg-large"><?php echo strip_tags( get_the_excerpt() ); ?></h3>
    
<div class="button-grp"> 
<button class="content-link" data-url="<?php the_permalink(); ?>"><span class="button-text text1">Kopiera länken</span><i data-feather="link" class="marg-left text1"></i></button>
<button id="content-messenger" class="messenger-bg-tone messenger">Dela på Messenger<i data-feather="message-circle" class="marg-left messenger"></i></button>
</div> 

<div id="content-post" class="text1 marg-large marg-up-large">
<?php the_content(); ?>
</div>

<hr>
<p class="small">Publicerad: <?php the_time('j F Y'); ?></p>
<p class="small">Senast uppdaterad: <?php echo get_the_modified_time('j F Y'); ?></p>
</div>
</div>

<?php include ('templates/template_latest_lists.php'); ?>
</div>

<div class="col-25">
<?php include ('templates/template_sidebar_article.php'); ?>
</div>

<div class="col-10">
<?php include ('templates/sidebar/sidebar_ad.php'); ?>
</div>

</div>
