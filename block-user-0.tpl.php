    <div class="col-12 col-md-9 col-12 text-center custom-block-user-login blue-border-top mt-5 bg-white mx-auto" id="block-user">
        <?php
        $mesgg = theme_status_messages();
        print $mesgg;
        ?>
        <div class="d-inline-block col-sm-5 col-12 mt-2">
            <?php if (!empty($block->subject)) : ?>
                <h1 class="text-center font-weight-bold mb-4"><?php print $block->subject ?></h1>
            <?php endif; ?>
            <?php print drupal_get_form('user_login_block'); ?>
        </div>
        <div class="d-inline-block col-sm-6 col-12" id="block-<?php print $block->module . '-' . $block->delta; ?>">
            <?php
            $block = module_invoke('block', 'block', 'view', '4');
            print $block['content'];
            ?>
        </div>
    </div>