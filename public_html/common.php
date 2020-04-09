<?php
// Insert a slash between $prefix and $fpath so that $prefix.'/'.$fpath
// represents a concatentated path. If $prefix is empty, then treat the $fpath
// relative to the root directory...
function if_necessary_insert_slash($prefix, $fpath)
{
  $prefix_len = strlen($prefix);
  $fpath_len = strlen($fpath);
  if ($prefix_len != 0 && $fpath_len != 0)
  {
    $prefix_has_slash = (substr($prefix, strlen($prefix)-1, 1) == '/');
    $fpath_has_slash = (substr($fpath, 0, 1) == '/');

    if ($prefix_has_slash || $fpath_has_slash)
      $retval = $prefix.$fpath;
    else
      $retval = $prefix.'/'.$fpath;
  }
  else if ($prefix_len == 0 && $fpath_len != 0)
  {
    $fpath_has_slash = (substr($fpath, 0, 1) == '/');
    $retval = ($fpath_has_slash ? $fpath : '/'.$fpath);
  }
  else if ($prefix_len != 0 && $fpath_len == 0)
    $retval = $prefix;
  else
    $retval = '/';
  return $retval;
}

// Compute this site's local root path which is the directory this file
// is in...
function site_root_local_path($fpath='')
{
  return if_necessary_insert_slash(dirname(__FILE__), $fpath);
}

// Compute this site's private_html root path which is ../private_html
// relative to this site's local root path...
function site_root_private_path($fpath='')
{
  return if_necessary_insert_slash(
    dirname(dirname(__FILE__)).'/private',
    $fpath
  );
}

// Compute this site's classes/ path...
function site_classes_local_path($fpath='')
{
  return site_root_local_path(if_necessary_insert_slash('/classes',$fpath));
}

// Compute this site's lib/ path...
function site_lib_local_path($fpath='')
{
  return site_root_local_path(if_necessary_insert_slash('/lib',$fpath));
}

// Tell PHP to automatically load classes from classes/ ...
spl_autoload_register(function ($class_name)
{
  require_once(site_classes_local_path().'/'.$class_name.'.php');
});

// With the above definitions include site-local settings
// (e.g., DB passwords)...
require_once(site_root_local_path('config.php'));

// Start a session...
session_start();

// And add additional require_once definitions as is needed...
require_once(site_lib_local_path('login-tools.php'));
require_once(site_lib_local_path('html5-utils.php'));
?>
