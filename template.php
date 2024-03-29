<?php

/**
 * Sets the body-tag class attribute.
 *
 * Adds 'sidebar-left', 'sidebar-right' or 'sidebars' classes as needed.
 */
function phptemplate_body_class($left, $right)
{
  if ($left != '' && $right != '') {
    $class = 'sidebars';
  } else {
    if ($left != '') {
      $class = 'sidebar-left';
    }
    if ($right != '') {
      $class = 'sidebar-right';
    }
  }

  if (isset($class)) {
    print ' class="' . $class . '"';
  }
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function phptemplate_breadcrumb($breadcrumb)
{
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">' . implode(' › ', $breadcrumb) . '</div>';
  }
}

/**
 * Override or insert PHPTemplate variables into the templates.
 */
function phptemplate_preprocess_page(&$vars)
{
  $vars['tabs2'] = menu_secondary_local_tasks();

  // Hook into color.module
  if (module_exists('color')) {
    _color_page_alter($vars);
  }
}

/**
 * Add a "Comments" heading above comments except on forum pages.
 */
function garland_preprocess_comment_wrapper(&$vars)
{
  if ($vars['content'] && $vars['node']->type != 'forum') {
    $vars['content'] = '<h2 class="comments">' . t('Comments') . '</h2>' .  $vars['content'];
  }
}

/**
 * Returns the rendered local tasks. The default implementation renders
 * them as tabs. Overridden to split the secondary tasks.
 *
 * @ingroup themeable
 */
function phptemplate_menu_local_tasks()
{
  return menu_primary_local_tasks();
}

/**
 * Returns the themed submitted-by string for the comment.
 */
function phptemplate_comment_submitted($comment)
{
  return t(
    '!datetime — !username',
    array(
      '!username' => theme('username', $comment),
      '!datetime' => format_date($comment->timestamp)
    )
  );
}

/**
 * Returns the themed submitted-by string for the node.
 */
function phptemplate_node_submitted($node)
{
  return t(
    '!datetime — !username',
    array(
      '!username' => theme('username', $node),
      '!datetime' => format_date($node->created),
    )
  );
}

/**
 * Generates IE CSS links for LTR and RTL languages.
 */
function phptemplate_get_ie_styles()
{
  global $language;

  $iecss = '<link type="text/css" rel="stylesheet" media="all" href="' . base_path() . path_to_theme() . '/fix-ie.css" />';
  if ($language->direction == LANGUAGE_RTL) {
    $iecss .= '<style type="text/css" media="all">@import "' . base_path() . path_to_theme() . '/fix-ie-rtl.css";</style>';
  }

  return $iecss;
}

function cds_theme_theme()
{
  return array(
    'user_login_block' => array(
      'template' => 'user-login-block',
      'arguments' => array('form' => null),
    ),
    'search_theme_form' => array(
      'arguments' => array('form' => null),
    ),
  );
}

function cds_theme_preprocess_user_login_block(&$variables)
{
  global $base_url;
  $variables['form']['submit']['#attributes']['class'] = 'btn btn-sm btn-danger font-weight-bold';
  unset($variables['form']['name']['#title']);
  unset($variables['form']['pass']['#title']);
  $variables['form']['pass']['#attributes']['placeholder'] = 'Password';
  $variables['form']['name']['#attributes']['placeholder'] = 'Username';
  $variables['form']['pass']['#attributes']['class'] = 'form-control';
  $variables['form']['name']['#attributes']['class'] = 'form-control';
  $variables['form']['links']['#value'] = '<hr class="login-hr">
  <div class="text-left">
  <h6 class="font-weight-bold">Can' . "'" . 't login?</h6>
  </div>
  <div class="item-list">
  <ul class="login-order">
      <li class="first">
      <a href=' . "$base_url/user/password" . ' >Forgot password</a>
      </li>
      <li class="last">
      <a href=' . "$base_url/user/register" . ' title="Create a new user account.">Join us</a>
      </li>
      <li>
      <a href="#" >Contact us</a>
      </li>
      </ul>
      </div>';
  $variables['rendered'] = drupal_render($variables['form']);
}

function cds_theme_preprocess_page(&$vars)
{
  $vars['search_box'] = (theme_get_setting('toggle_search') ? '' : drupal_get_form('search_theme_form'));
  $main_menu_tree = menu_tree_all_data('primary-links');
  // header menu
  $vars['primary_links'] =  menu_tree_output($main_menu_tree);
  $vars['menu_header'] =  str_replace('Buy', '<i class="fas fa-shopping-cart"></i>', $vars['primary_links']);
  //banner menu
  $banner_menu_tree = menu_tree_all_data('menu-banner-links');
  $vars['menu_banner'] = menu_tree_output($banner_menu_tree);
}
function cds_theme_search_theme_form($form)
{
  unset($form['search_theme_form']['#title']);
  $form['search_theme_form']['#attributes']['class'] = 'form-control';
  $form['submit']['#attributes']['class'] = 'search-box';
  $form['submit']['#value'] = html_entity_decode('&#xf002;');
  $output .= drupal_render($form);
  return $output;
}

function cds_theme_menu_tree($tree)
{
  return '<ul class="menu">' . $tree . '</ul>';
}
function cds_theme_menu_item($link, $has_children, $menu = '', $in_active_trail = false, $extra_class = null)
{

  $class = ($menu ? 'expanded' : ($has_children ? 'collapsed' : 'leaf'));

  if (!empty($extra_class))
    $class .= ' ' . $extra_class;

  if ($in_active_trail)
    $class .= ' active-trail';

  $class .= ' ' . preg_replace('/[^a-zA-Z0-9]/', '', strtolower(strip_tags($link)));
  return '<li class="' . $class . '">' . $link . $menu . "</li>\n";
}
function cds_theme_menu_item_link($link)
{
  if (
    $link['menu_name'] == 'menu-aboutusfooter' ||
    $link['menu_name'] = 'menu-newsfooter' ||
    $link['menu_name'] = 'menu-resourcesfooter' ||
    $link['menu_name'] = 'menu-connectfollowfooter' ||
    $link['menu_name'] = 'menu-social-media' ||
    $link['menu_name'] = 'menu-social-media-2'
  ) {
    $link['localized_options']['attributes']['target'] = '_blank';
  }
  return l($link['title'], $link['href'], $link['localized_options']);
}
