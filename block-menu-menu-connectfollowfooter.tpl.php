<div id="block-<?php print $block->module . '-' . $block->delta; ?>" class="block-menu col-lg-3 col-md-3 col-md-6 col-6 mt-4">
    <h5 class=" text-center"><?php print $block->subject ?></h5>
    <?php print $block->content ?>
    <div class="footer-social">
        <?php
        //social media
        $block_social_media =  module_invoke('menu', 'block', 'view', 'menu-social-media');
        $block_social_media['content'] = str_replace('menu', 'menu social-media', $block_social_media['content']);
        $block_social_media['content'] = str_replace('mail</a>', '<i class="fa fa-envelope-o"></i></a>', $block_social_media['content']);
        $block_social_media['content'] = str_replace('facebook</a>', '<i class="fab fa-facebook-f"></i></a>', $block_social_media['content']);
        $block_social_media['content'] = str_replace('twitter</a>', '<i class="fab fa-twitter" aria-hidden="true"></i></a>', $block_social_media['content']);
        print $block_social_media['content'];
        //social media 2
        $block_social_media =  module_invoke('menu', 'block', 'view', 'menu-social-media-2');
        $block_social_media['content'] = str_replace('menu', 'menu social-media', $block_social_media['content']);
        $block_social_media['content'] = str_replace('linkedin</a>', '<i class="fab fa-linkedin-in"></i></a>', $block_social_media['content']);
        $block_social_media['content'] = str_replace('instagram</a>', '<i class="fab fa-instagram"></i></a>', $block_social_media['content']);
        $block_social_media['content'] = str_replace('youtube</a>', '<i class="fab fa-youtube"></i></a>', $block_social_media['content']);
        print $block_social_media['content'];
        ?>
    </div>
</div>