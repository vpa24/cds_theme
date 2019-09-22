<?php
if (($node->nid == 3 && $user->uid > 0) || $node->nid != 3) {
  ?>
  <div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) {
                                                            print ' sticky';
                                                          } ?><?php if (!$status) {
                                                                  print ' node-unpublished';
                                                                } ?>">

    <?php print $picture ?>

    <?php if ($page == 0) : ?>
      <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
    <?php endif; ?>

    <?php if ($submitted) : ?>
      <span class="submitted"><?php print $submitted; ?></span>
    <?php endif; ?>

    <div class="content clear-block">
      <?php
        if ($is_front) {
          $nid = $node->nid;
          $propernode = node_load($node->nid);
          if ($nid == 3) {
            $content = $propernode->teaser . ' ...<div class="font-italic show-more"><a class="text-body" href="' . $node_url . '">show more »</a></div>';
          } else {
            $content = $propernode->body;
          }
        }
        echo $content;
        ?>
    </div>

    <div class="clear-block">
      <div class="meta">
        <?php if ($taxonomy) : ?>
          <div class="terms"><?php print $terms ?></div>
        <?php endif; ?>
      </div>

      <?php if ($links && !$is_front) : ?>
        <div class="links"><?php print $links; ?></div>
      <?php endif; ?>
    </div>

  </div>
<?php } ?>