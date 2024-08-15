<?php if (is_tag()) { ?>

<?php include('sidebar/sidebar_all_categories.php'); ?>

<?php } ?>

<?php if (is_category()) { ?>

<?php include('sidebar/sidebar_excl_categories.php'); ?>

<?php } ?>

<?php include('sidebar/sidebar_latest_reviews.php'); ?>
     
<?php include('sidebar/sidebar_tips.php'); ?>