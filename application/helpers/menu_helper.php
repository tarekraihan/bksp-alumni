<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('active_link')) {
    function activate_menu($type,$menu_link) {
      // Getting CI class instance.
      $CI = get_instance();
      $method = $CI->router->method;
    
      // Getting router class to active.
      $class = $CI->router->fetch_class();
      if($type == 'class'){
        return ($class == $menu_link) ? 'active' : '';
      }else{
        return ($method == $menu_link) ? 'active' : '';
      }
    }
  }?>