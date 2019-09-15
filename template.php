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
      'arguments' => array('form' => NULL),
    ),
    'search_theme_form' => array(
      // Forms always take the form argument.
      'arguments' => array('form' => NULL),
    )
  );
}
function cds_theme_preprocess_user_login_block(&$variables)
{
  global $base_url;
  $variables['form']['submit']['#attributes']['class'] = 'btn btn-sm btn-danger';
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
      <a href=' . "$base_url/user/password" . ' title="Request new password via e-mail.">Forgot password</a>
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
  // Add the rendered output to the $main_menu_expanded variable
  $vars['main_menu_expanded'] =  menu_tree_output($main_menu_tree);
  $vars['main_menu_expanded'] =  str_replace('<ul class="menu">', '<ul>', $vars['main_menu_expanded']);
  $vars['main_menu_expanded'] =  str_replace('<li class="leaf first">', '<li>', $vars['main_menu_expanded']);
  $vars['main_menu_expanded'] =  str_replace('<li class="leaf first last">', '<li>', $vars['main_menu_expanded']);
  $vars['main_menu_expanded'] =  str_replace('expanded', '', $vars['main_menu_expanded']);
  $vars['main_menu_expanded'] =  str_replace('class="leaf"', '', $vars['main_menu_expanded']);
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
function cds_theme_menu_tree($tree, $menu_name = "")
{

  return '<ul class="nav">' . $tree . '</ul>';
}
