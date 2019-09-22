<div class="row">
    <div class="col-9 text-center d-inline-block custom-block-user-login blue-border-top mt-5 bg-white mx-auto" id="block-user">
        <div class="d-inline-block col-5">
            <?php if (!empty($block->subject)) : ?>
                <h1 class="text-center font-weight-bold mb-4"><?php print $block->subject ?></h1>
            <?php endif; ?>
            <?php print drupal_get_form('user_login_block'); ?>
        </div>
        <div class="d-inline-block col-6" id="block-<?php print $block->module . '-' . $block->delta; ?>">
            <?php
            $block = module_invoke('block', 'block', 'view', '4');
            print $block['content'];
            ?>
        </div>
    </div>
</div>