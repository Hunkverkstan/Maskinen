<?php get_header(); ?>

<!-- Content -->
    
<?php 
if (is_tag()) {
    include ('content-tag.php');
} elseif (is_category()) {
    include ('content-archive.php');
} else {
    // Fallback om det är en annan typ av arkiv
    include ('content-archive.php');
}
?>

<?php get_footer(); ?>

</div>
