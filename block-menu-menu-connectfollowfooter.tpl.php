<div id="block-<?php print $block->module . '-' . $block->delta; ?>" class="block-menu">
    <h5 class=" text-center"><?php print $block->subject ?></h5>

    <div class="content"><?php print $block->content ?></div>
    <?php
    global $base_url;
    $img_url = "$base_url/sites/default/files/img";
    $fa_img = "<img class='icon' src='$img_url/facebook_circle-512.png'/>";
    $mail_img = "<img class='icon' src='$img_url/cprd-consulting-services-pty-ltd-psychometric-and-79790.png'/>";
    $twitter_img = "<img class='icon' src='$img_url/twitter-icon-basic-round-social-iconset-s-icons-0.png'/>";
    $linkedin_img = "<img class='icon' src='$img_url/linkedin_circle-512.png'/>";
    $google_img = "<img class='icon' src='$img_url/sign-in-with-google-icon-16.jpg'/>";
    $youtube_img = "<img class='icon' src='$img_url/youtube-circle-icon-png-20.jpg'/>";

    //social media
    $block_social_media =  module_invoke('menu', 'block', 'view', 'menu-social-media');
    $block_social_media['content'] = str_replace('menu', 'social-media', $block_social_media['content']);
    $block_social_media['content'] = str_replace('facebook</a>', "$fa_img</a>", $block_social_media['content']);
    $block_social_media['content'] = str_replace('mail</a>', "$mail_img</a>", $block_social_media['content']);
    $block_social_media['content'] = str_replace('twitter</a>', "$twitter_img</a>", $block_social_media['content']);
    print $block_social_media['content'];
    //social media 2
    $block_social_media =  module_invoke('menu', 'block', 'view', 'menu-social-media-2');
    $block_social_media['content'] = str_replace('menu', 'social-media', $block_social_media['content']);
    $block_social_media['content'] = str_replace('linkedin</a>', "$linkedin_img</a>", $block_social_media['content']);
    $block_social_media['content'] = str_replace('google</a>', "$google_img</a>", $block_social_media['content']);
    $block_social_media['content'] = str_replace('youtube</a>', "$youtube_img</a>", $block_social_media['content']);
    print $block_social_media['content'];
    ?>
</div>