<?php
?>
<div id="block-<?php print $block->module . '-' . $block->delta; ?>" class="clear-block block block-<?php print $block->module ?> 
<?php if ($block->bid == 52) print 'col-md-7 text-center' ?>">

  <?php if (!empty($block->subject)) : ?>
    <h5 class="text-center"><?php print $block->subject ?></h5>
  <?php endif; ?>

  <div class="content"><?php print $block->content ?></div>
</div>