<?php if (is_front_page()) : ?>

    <?php get_template_part('index'); ?>

<?php elseif (is_page(222)) : ?>

    <?php get_template_part('page-id-tags'); ?>

<?php elseif (is_page(82)) : ?>

    <?php get_template_part('page-id-articles'); ?>

<?php elseif (is_page(84)) : ?>

    <?php get_template_part('page-id-lists'); ?>

<?php elseif (is_page(129)) : ?>

    <?php get_template_part('page-id-news'); ?>

<?php else : ?>

<div class="outer-col">

<div class="col-75">
<div id="content" class="content-page">
<div class="marg-large">
<p class="breadcrumb x-small text2"><a href="<?php echo home_url(); ?>">Hem</a> > <?php the_title(); ?></p>
</div>

        <div id="content-img" class="marg-small" style="background-image:url(<?php echo get_the_post_thumbnail_url($post, 'full'); ?>)">
        </div>
<div id="content-area" class="bg1">
        <h1 class="text1 marg-medium"><?php the_title(); ?></h1>   

        <h3 class="text1 marg-large"><?php echo strip_tags(get_the_excerpt()); ?></h3>

        <div id="content-post" class="text1 marg-large">
            <?php the_content(); ?>
        </div>

        <hr>
        <p class="small">Senast uppdaterad: <?php echo get_the_modified_time('j F Y'); ?></p>
</div>
    </div>
</div>

<div class="col-25">
<?php include('templates/template_sidebar_page.php'); ?>
</div>

<div class="col-10">
<?php include ('templates/sidebar/sidebar_ad.php'); ?>
</div>

</div>

<?php endif; ?>


