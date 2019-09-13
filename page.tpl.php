<!DOCTYPE html>
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&amp;lang=en" />

<head>
  <?php print $head ?>
  <title><?php print $head_title ?></title>
  <?php print $styles ?>
  <?php print $scripts ?>
  <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->
</head>

<body>

  <div id="wrapper">
    <div id="container" class="container-fluid">
      <div id="header" class="header-v3 enterprise">
        <div class="header-main gv-sticky-menu front-page stuck">
          <div class="bb-container px-4">
            <div class="header-main-inner p-relative">
              <div class="row">
                <div class="col-md-2 col-xs-6 branding">
                  <?php
                  if ($logo || $site_title) {
                    if ($logo) {
                      global $base_url;
                      print '<a href="' . $base_url . '"><img src="' . check_url($logo) . '" alt="' . $site_title . '" id="logo" width="128px" /></a>';
                    }
                  }
                  ?>
                </div>

                <div class="col-md-10 col-xs-6 p-static" id="main-menu">
                  <div class="navigation area-main-menu">
                    <?php if (isset($primary_links)) : ?>
                      <?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
                    <?php endif; ?>
                    <?php if (isset($secondary_links)) : ?>
                      <?php print theme('links', $secondary_links, array('class' => 'links secondary-links')) ?>
                    <?php endif; ?>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div> <!-- /header -->
      <di class="container-fluid">
        <?php
        if ($header) {
          print $header;
        }
        ?>

        <div id="body" class="row">
          <?php if ($left) : ?>
            <div id="sidebar-left" class="sidebar col-2 col-md-2 m-4">
              <?php if ($search_box) : ?><div class="block block-theme"><?php print $search_box ?></div><?php endif; ?>
              <?php print $left ?>
            </div>
          <?php endif; ?>

          <div id="center" class="col">

            <?php //print $breadcrumb;
            ?>
            <?php if ($mission) : print '<div id="mission">' . $mission . '</div>';
            endif; ?>
            <?php if ($tabs) : print '<div id="tabs-wrapper" class="clear-block">';
            endif; ?>
            <?php if ($title) : print '<h2' . ($tabs ? ' class="with-tabs"' : '') . '>' . $title . '</h2>';
            endif; ?>
            <?php if ($tabs) : print '<ul class="tabs primary">' . $tabs . '</ul></div>';
            endif; ?>
            <?php if ($tabs2) : print '<ul class="tabs secondary">' . $tabs2 . '</ul>';
            endif; ?>
            <?php if ($show_messages && $messages) : print $messages;
            endif; ?>
            <?php print $help; ?>
            <div class=" clear-block">
              <?php print $content ?>
            </div>
          </div> <!-- /.left-corner, /.right-corner, /#squeeze, /#center -->

          <?php if ($right) : ?>
            <div id="sidebar-right" class="col-2 m-4">
              <?php if (!$left && $search_box) : ?><div class="block block-theme"><?php print $search_box ?></div><?php endif; ?>
              <?php print $right ?>
            </div>
          <?php endif; ?>

        </div> <!-- /container -->


    </div>
  </div>
  </div>

  <div class="row py-5 d-flex justify-content-center" id="footer">
    <?php print $footer_message . $footer ?>
  </div>
  <!-- /layout -->
</body>

</html>