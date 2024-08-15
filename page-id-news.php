<div class="outer-col">

<div class="col-75">
<div id="content" class="content-news">
    <div class="marg-large">
    <p class="breadcrumb x-small text2"><a href="<?php echo home_url(); ?>">Hem</a> > <?php the_title(); ?></p>
    </div>
    
    <div class="block-archive bg2 marg-medium">
        <h1 class="pages-title text1 marg-medium">Nyhetsarkiv</h1>
        <p class="small text1"><?php echo strip_tags( get_the_excerpt() ); ?></p>
    </div>


<?php include ('templates/template_latest_news.php'); ?>
</div>
</div>

<div class="col-25">    
<?php include('templates/template_sidebar_page.php'); ?>
</div>

<div class="col-10">
<?php include ('templates/sidebar/sidebar_ad.php'); ?>
</div>


</div>