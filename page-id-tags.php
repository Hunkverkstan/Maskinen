<div class="outer-col">

<div class="col-75">
<div id="pages-archive">
        <div class="marg-large">
<p class="breadcrumb x-small text2"><a href="<?php echo home_url(); ?>">Hem</a> > <a href="<?php echo home_url(); ?>/recensioner">Recensioner</a> > Ämnen</p>
        </div>   
    <div class="marg-up-small marg-large">

    </div>

    <div class="block-archive secondary-bg marg-medium">
        <h1 class="pages-title text3 marg-medium">Ämnen</h1>
        <p class="small text3"><?php echo strip_tags( get_the_excerpt() ); ?></p>
    </div>

<div class="block">
<div class="row">
<?php
function get_total_tag_count() {
    // Hämta alla taggar
    $tags = get_tags();

    // Räkna antalet taggar
    $tag_count = count($tags);

    // Returnera antalet taggar
    return $tag_count;
}
?>

<div class="segment-block bg1 text1 marg-medium">Alla ämnen (<?php echo get_total_tag_count(); ?> st)</div>

</div>

<div class="block-info-alt bg1 marg-medium">

<?php echo do_shortcode('[list_all_tags]'); ?>     

</div>


</div>

</div>


</div>

<div class="col-25">    
<?php include('templates/template_sidebar_review.php'); ?>
</div>

<div class="col-10">
<?php include ('templates/sidebar/sidebar_ad.php'); ?>
</div>

</div>