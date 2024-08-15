<div class="block">
    <div class="row">
        <div class="segment-block-small bg2 text2 marg-medium">
            <span class="text2">•</span> Annons
        </div>
    </div>
    <?php 
    $ad_content = get_field('content_ad_block');
    if ($ad_content) {
        // Om det finns ett värde i $ad_content
        echo '<div class="ad-block">' . esc_html($ad_content) . '</div>';
    } else {
        // Om det inte finns något värde i $ad_content
        ?>
        <div class="ad-block in-active bg2">
            <h1 class="text1 marg-small">Don't hide. Show yourself!</h1>
            <h4 class="text1 marg-small">Vill du visa upp dig för Malmö? Här kan du synas med din annons.</h2>
            <div class="button-grp"><button class="primary-bg text1" onclick="location.href='<?php echo home_url(); ?>/annonsering';">Ja, jag vill synas!</button></div>
        </div>
        <?php
    }
    ?>
</div>
