<div class="col-7 ml-5 mr-4 d-inline-block custom-block-user-login blue-border-top pt-4 bg-white" id="block-user">
    <div class="user-login d-inline-block col-6">
        <?php if (!empty($block->subject)) : ?>
            <h5 class="text-center font-weight-bold mb-4"><?php print $block->subject ?></h5>
        <?php endif; ?>
        <?php print drupal_get_form('user_login_block'); ?>
    </div>
    <div class="user-register d-inline-block col-6 text-center">
        <h5 class="text-center font-weight-bold mb-4">Join Us</h5>
        <?php print drupal_get_form('user_register'); ?>
    </div>
</div>