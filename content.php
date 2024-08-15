<?php $current_post_id = get_the_ID(); ?>

<div class="outer-col">

<div class="col-75">
<div id="content">
<div class="marg-large">
<p class="breadcrumb x-small text2"><a href="<?php echo home_url(); ?>">Hem</a> > <a href="<?php echo home_url(); ?>/recensioner">Recensioner</a> > <?php if ( ! empty( $categories = get_the_category() ) ) echo implode( ', ', array_map( fn($category) => '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>', $categories ) ); ?>
 > <?php the_title(); ?></p>
</div>
<div id="content-img" class="marg-large" style="background-image:url(<?php echo get_the_post_thumbnail_url( $post, 'full' ); ?>)">
<div id="content-location" class="bg4 text3"><i data-feather="map-pin" class="marg-right text3"></i><?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); } ?>
</div>
<div id="content-rating"><div class="button-grp"><div class="button-stars bg2 review-star-big"><?php $review_rating = get_field('review_rating'); echo ($review_rating >= 1 && $review_rating <= 5) ? '<img src="https://www.malmomaskinen.se/wp-content/themes/Maskinen/img/mm_stars_' . $review_rating . '.svg" alt="' . $review_rating . ' star' . ($review_rating > 1 ? 's' : '') . '">' : 'Saknas'; ?>
</div></div></div>
</div>

<div id="content-area" class="bg1">
<h1 class="text1 marg-medium"><?php the_title(); ?>2</h1>   

<h3 class="text1 marg-large"><?php echo strip_tags( get_the_excerpt() ); ?></h3>
    
<div class="button-grp"> 
<button class="content-link" data-url="<?php the_permalink(); ?>"><span class="button-text text1">Kopiera länken</span><i data-feather="link" class="marg-left text1"></i></button> 
<button id="content-messenger" class="messenger-bg-tone messenger" onclick="messengerShare()">Dela på Messenger<i data-feather="message-circle" class="marg-left messenger"></i></button>
</div> 

<div id="content-post" class="text1 marg-large marg-up-large">
<?php the_content(); ?>
</div>

<div class="flex-adjustable-large">
<div class="block-info bg3 flex-adjustable-50-large content-facts">
<h5 class="text1 marg-small"><i data-feather="clipboard" class="marg-right-medium secondary"></i>Straight facts</h5>
<hr class="marg-medium">     
<h5 class="text2"><i data-feather="folder" class="marg-right-medium text2"></i>Utforska kategorin</h5>
<div class="content-meta marg-medium">
<?php if ( ! empty( $categories = get_the_category() ) ) echo implode( ', ', array_map( fn($category) => '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">Fler recensioner i ' . esc_html( $category->name ) . '</a>', $categories ) ); ?>
</div>
  
<h5 class="text2"><i data-feather="tag" class="marg-right-medium text2"></i>Utforska ämnen</h5>
<div class="content-meta text1">
<?php if ( ! empty( $tags = get_the_tags() ) ) echo implode( '', array_map( fn($tag) => '<a class="button no bg2 tag-link" href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a>', $tags ) ); ?>
</div>     
</div>

<div class="block-info bg3 flex-adjustable-50-large content-facts">
<h5 class="text1 marg-small"><i data-feather="map" class="marg-right-medium secondary"></i>Hitta hit</h5>
<hr class="marg-medium"> 
<h5 class="text2"><i data-feather="map-pin" class="marg-right-medium text2"></i>Adress</h5>
<div class="content-meta marg-medium text1"><?php 
$location = get_field('review_map');
if( $location ) {

    // Initialize address parts array.
    $address_parts = array();

    // Loop over segments and construct HTML.
    foreach( array('street_name', 'street_number', 'post_code', 'city') as $i => $k ) {
        if( isset( $location[ $k ] ) ) {
            $address_parts[$k] = $location[ $k ]; // Add the part to the array
        }
    }

    // Combine address parts with comma only between street number and post code.
    $address = '';
    if (!empty($address_parts)) {
        $address .= '<span class="segment-street_name">' . $address_parts['street_name'] . '</span>'; // street_name
        if (isset($address_parts['street_number'])) {
            $address .= ' <span class="segment-street_number">' . $address_parts['street_number'] . '</span>'; // street_number
        }
        if (isset($address_parts['post_code'])) {
            $address .= ', <span class="segment-post_code">' . $address_parts['post_code'] . '</span>'; // post_code
        }
        if (isset($address_parts['city'])) {
            $address .= ' <span class="segment-city">' . $address_parts['city'] . '</span>'; // city
        }
    }

    // Construct plain text address for Google Maps
    $plain_address = $address_parts['street_name'];
    if (isset($address_parts['street_number'])) {
        $plain_address .= ' ' . $address_parts['street_number'];
    }
    if (isset($address_parts['post_code'])) {
        $plain_address .= ', ' . $address_parts['post_code'];
    }
    if (isset($address_parts['city'])) {
        $plain_address .= ' ' . $address_parts['city'];
    }

    // Encode address for URL
    $encoded_address = urlencode($plain_address);

    // Construct Google Maps and Apple Maps URL
    $google_maps_url = "https://www.google.com/maps/search/?api=1&query=" . $encoded_address;
    $apple_maps_url = "http://maps.apple.com/?address=" . $encoded_address;

    // Display HTML address
    echo $address;
}
?>
</div>   
<div class="button-grp">
<button class="bg1 text1" onclick="window.open('<?php echo $google_maps_url; ?>', '_blank');">Google Maps<i data-feather="arrow-right" class="marg-left-medium secondary"></i></button>
<button class="bg1 text1" onclick="window.open('<?php echo $apple_maps_url; ?>', '_blank');">Apple Maps<i data-feather="arrow-right" class="marg-left-medium secondary"></i></button>
</div>
</div>
</div>
<hr class="marg-up-large">
<p class="small">Publicerad: <?php the_time('j F Y'); ?></p>
<p class="small">Senast uppdaterad: <?php echo get_the_modified_time('j F Y'); ?></p>

</div>

</div>

<?php include ('templates/template_related.php'); ?>

<?php include ('templates/template_latest.php'); ?>
</div>

<div class="col-25">
<?php include ('templates/template_sidebar_review.php'); ?>
</div>

<div class="col-10">
<?php include ('templates/sidebar/sidebar_ad.php'); ?>
</div>


</div>
