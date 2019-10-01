<?php
$default_class = 'clear-block block block-';
?>
<div id="block-<?php print $block->module . '-' . $block->delta; ?>" class="<?php
                                                                            print $default_class . $block->module ?> 
<?php
if ($block->bid == 47 || $block->bid == 48 || $block->bid == 50) { // about us,news, resourse menu
  print 'col-lg-3 col-md-3 col-md-6 col-6 mt-4';
} elseif ($block->bid == 52) { //footer Copyright
  print 'col-12';
} ?>">

  <?php if (!empty($block->subject)) : ?>
    <h5 class="text-center"><?php print $block->subject ?></h5>
  <?php endif; ?>
  <div class="content"><?php print $block->content ?></div>
</div>