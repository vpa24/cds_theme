<?php
$default_class = 'clear-block block block-';
if ($block->bid != 126) {
  ?>
  <div id="block-<?php print $block->module . '-' . $block->delta; ?>" class="<?php if ($block->bid == 42) { // banner block
                                                                                  print 'banner';
                                                                                } else {
                                                                                  print $default_class . $block->module ?> 
<?php if ($block->bid == 52) { //foodter Copyright
      print 'col-md-7 text-center';
    } elseif ($block->bid == 74) { //banner menu
      print 'px-5';
    }
  } ?>">

    <?php if (!empty($block->subject)) : ?>
      <h5 class="text-center"><?php print $block->subject ?></h5>
    <?php endif; ?>

    <div class="content"><?php print $block->content ?></div>
  </div>
<?php } ?>