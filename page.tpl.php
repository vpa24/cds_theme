<!DOCTYPE html>

<head>
  <?php print $head ?>
  <title><?php print $head_title ?></title>
  <?php print $styles ?>
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&amp;lang=en" />
  <?php print $scripts ?>
  <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->
  <script src="https://kit.fontawesome.com/102128dbc9.js"></script>
</head>

<body>
  <div id="wrapper">

    <div id="header" class="header-v3 enterprise">
      <div class="header-main gv-sticky-menu front-page stuck">
        <div class="bb-container">
          <div class="header-main-inner p-relative">
            <nav id="cssmenu">
              <?php
              if ($logo || $site_title) {
                if ($logo) {
                  global $base_url;
                  print '<div class="logo col-md-2 col-xs-6 branding"><a href="' . $base_url . '"><img src="' . check_url($logo) . '" alt="' . $site_title . '" id="logo" width="128px" /></a></div>';
                }
              }
              ?>
              <div id="head-mobile"></div>
              <div class="button"></div>
              <?php
              print $main_menu_expanded;
              ?>
              <?php if (isset($secondary_links)) : ?>
                <?php print theme('links', $secondary_links, array('class' => 'links secondary-links')) ?>
              <?php endif; ?>

              <div><?php print $search_box ?></div>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <?php if ($header) : print $header;
    endif; ?>
    <div id="container" class="container-fluid">
      <div id="body" class="row">
        <?php if ($left) : ?>
          <div id="sidebar-left" class="sidebar col-4 col-sm-3 col-md-3 col-lg-2 ml-3">
            <?php print $left ?>
          </div>
        <?php endif; ?>

        <div id="center" class="col mx-4">
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
          <?php print $content ?>
        </div>

        <?php if ($right) : ?>
          <div id="sidebar-right" class="col-12 col-md-3 col-lg-2 mr-3">
            <?php if (!$left && $search_box) : ?><div class="block block-theme"><?php print $search_box ?></div><?php endif; ?>
            <?php print $right ?>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>

  <div class="row py-5 d-flex justify-content-center" id="footer">
    <?php print $footer_message . $footer ?>
  </div>
</body>