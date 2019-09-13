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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

  <div id="wrapper">

    <div id="header" class="header-v3 enterprise">
      <div class="header-main gv-sticky-menu front-page stuck">
        <div class="bb-container">
          <div class="header-main-inner p-relative">
            <nav class="navbar navbar-expand-md navbar-light bg-white primary">
              <?php
              if ($logo || $site_title) {
                if ($logo) {
                  global $base_url;
                  print '<a href="' . $base_url . '" class="p-3 pl-4"><img src="' . check_url($logo) . '" alt="' . $site_title . '" id="logo" width="128px" /></a>';
                }
              }
              ?>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <?php if (isset($primary_links)) : ?>
                  <ul class="navbar-nav ml-auto">
                    <?php foreach ($primary_links as $link) : ?>
                      <li class="nav-item"><?php
                                                $href = $link['href'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($link['href']);
                                                print "<a class='nav-link text-dark' href='" . $href . "'>" . $link['title'] . "</a>";
                                                ?></li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
                <?php if (isset($secondary_links)) : ?>
                  <?php print theme('links', $secondary_links, array('class' => 'links secondary-links')) ?>
                <?php endif; ?>
              </div>

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
          <div id="sidebar-left" class="sidebar col-5 col-sm-3 col-md-3 col-lg-2 ml-3">
            <?php if ($search_box) : ?><div class="block block-theme"><?php print $search_box ?></div><?php endif; ?>
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
  </div>

  <div class="row py-5 d-flex justify-content-center" id="footer">
    <?php print $footer_message . $footer ?>
  </div>
</body>

</html>