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
</head>

<body>
  <div id="wrapper">

    <header id="header" class="header-v3 enterprise">
      <div class="header-main gv-sticky-menu front-page stuck">
        <div class="bb-container">
          <div class="header-main-inner p-relative row">
            <?php
            if ($logo || $site_title) {
              if ($logo) {
                global $base_url;
                print '<div class="col-2 mt-2"><a href="' . $base_url . '"><img src="' . check_url($logo) . '" alt="' . $site_title . '" id="logo" width="128px" /></a></div>';
              }
            }
            ?>
            <div class="col">
              <div class="main-menu">
                <div class="navigation area-main-menu">
                  <div class="gva-search-region search-region"><?php print $search_box ?></div>
                  <nav id="cssmenu" class="pr-4">
                    <div id="head-mobile"></div>
                    <div class="button"></div>
                    <?php
                    print $menu_header;
                    ?>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <?php if ($header) : ?> <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <?php
            print $header; ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    <?php
    endif; ?>
    <div id="menu-banner-links" class="px-5">
      <?php print $menu_banner ?>
    </div>

    <div id="container" class="container-fluid">
      <div id="body" class="pt-5">
        <?php if ($left) : ?>
          <div id="sidebar-left" class="sidebar col-4 col-sm-3 col-md-3 col-lg-2 ml-3">
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
          <?php print $content ?>
        </div>

        <?php if ($right) : ?>
          <div id="sidebar-right" class="col-12 col-md-3 col-lg-2 mr-3">
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