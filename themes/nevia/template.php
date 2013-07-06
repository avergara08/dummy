<?php

function nevia_menu_local_task($variables) {
  $link = $variables['element']['#link'];
  $link_text = $link['title'];
  
  $link['localized_options']['attributes']['class'][] = 'button';
  
  //$link['localized_options']['attributes']['class'][] = 'medium';
  //if(!empty($variables['element']['#active']))
  //  $link['localized_options']['attributes']['class'][] = 'color';
  //else
  //  $link['localized_options']['attributes']['class'][] = 'light';
    
  if (!empty($variables['element']['#active'])) {
    $link['localized_options']['attributes']['class'][] = 'color';
    
    // Add text to indicate active tab for non-visual users.
    $active = '<span class="element-invisible">' . t('(active tab)') . '</span>';

    // If the link does not contain HTML already, check_plain() it now.
    // After we set 'html'=TRUE the link will not be sanitized by l().
    if (empty($link['localized_options']['html'])) {
      $link['title'] = check_plain($link['title']);
    }
    $link['localized_options']['html'] = TRUE;
    $link_text = t('!local-task-title!active', array('!local-task-title' => $link['title'], '!active' => $active));
  }else{
    $link['localized_options']['attributes']['class'][] = 'light';
  }

  //return '<li' . (!empty($variables['element']['#active']) ? ' class="active"' : '') . '>' . l($link_text, $link['href'], $link['localized_options']) . "</li>\n";
  return l($link_text, $link['href'], $link['localized_options']);
}

function nevia_menu_local_tasks(&$variables) {
  $output = '';
  
  if (!empty($variables['primary'])) {
    //foreach($variables['primary'] as $menu_item_key => $menu_attributes) {
    //  $variables['primary'][$menu_item_key]['#link']['localized_options'] = array(
    //    'attributes' => array('class' => array('medium')),
    //  );
    //}
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $output .= '<i class="icon-chevron-right" style="margin: 0 5px;"></i>' . drupal_render($variables['secondary']);
  }

  return $output;
}

function nevia_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    $breadcrumb[] = drupal_get_title();
    $output = '<nav id="breadcrumbs"><ul>';
    // filler
    $output .= '<li></li>';
    $output .= '<li>';
    $output .= implode('</li><li>', $breadcrumb);
    
    $output .= '</li>';
    $output .= '</ul></nav>';
    return $output;
  }
}

function nevia_item_list($variables) {
  $items = $variables['items'];
  $title = $variables['title'];
  $type = $variables['type'];
  $attributes = $variables['attributes'];

  // Only output the list container and title, if there are any list items.
  // Check to see whether the block title exists before adding a header.
  // Empty headers are not semantic and present accessibility challenges.
  $output = '';
  //$output = '<div class="item-list">';
  if (isset($title) && $title !== '') {
    $output .= '<h3>' . $title . '</h3>';
  }

  if (!empty($items)) {
    $output .= "<$type" . drupal_attributes($attributes) . '>';
    $num_items = count($items);
    $i = 0;
    foreach ($items as $item) {
      $attributes = array();
      $children = array();
      $data = '';
      $i++;
      if (is_array($item)) {
        foreach ($item as $key => $value) {
          if ($key == 'data') {
            $data = $value;
          }
          elseif ($key == 'children') {
            $children = $value;
          }
          else {
            $attributes[$key] = $value;
          }
        }
      }
      else {
        $data = $item;
      }
      if (count($children) > 0) {
        // Render nested list.
        $data .= theme('item_list', array('items' => $children, 'title' => NULL, 'type' => $type, 'attributes' => $attributes));
      }
      if ($i == 1) {
        $attributes['class'][] = 'first';
      }
      if ($i == $num_items) {
        $attributes['class'][] = 'last';
      }
      $output .= '<li' . drupal_attributes($attributes) . '>' . $data . "</li>\n";
    }
    $output .= "</$type>";
  }
  //$output .= '</div>';
  return $output;
}

function nevia_generate_nested_list_array($rows, $already_deep = false){
  global $user, $language_url;
	$list_array = array();
  
  // define link icons
  $icon_classes = array(
    '206' => 'home', // home
    '247' => 'user', // my profile
    '317' => 'off', // logout
    '336' => 'envelope', // contact
    '208' => 'pencil', // blog
  );
  
  foreach($rows as $k => $row){
    if(!$row['link']['access'])
      continue;
    
    $link = $row['link'];
    
    // alter /user link on main menu
    if($link['link_path'] == 'user' && $user->uid){
      $link['link_title'] = 'My profile';
      $link['link_path'] = 'user/' . $user->uid;
    }
    
    $link_options = array();
    
    // add icon
    $icon_class = isset($icon_classes[$link['mlid']]) ? $icon_classes[$link['mlid']] : null;
    if(!empty($icon_class)){
      $link_icon = '<i class="halflings white '.$icon_class.'"></i>';
      $link['link_title'] = $link_icon . $link['link_title'];
      $link_options['html'] = TRUE;
    }
    
    
    if (!$already_deep && isset($link['link_path']) && ($link['link_path'] == $_GET['q'] || ($link['link_path'] == '<front>' && drupal_is_front_page()))
        && (empty($link['language']) || $link['language']->language == $language_url->language)) {
      //$class[] = 'active';
      $link_options['attributes']['id'][] = 'current';
    }
    $list_array[$k] = array(
      'data' => l($link['link_title'], $link['link_path'], $link_options),
    );
    
    if($row['below'])
      $list_array[$k]['children'] = nevia_generate_nested_list_array($row['below'], true);
  }
  
	return $list_array;
}

function nevia_links__system_main_menu($variables){
  $output = '';
  $main_menu_name = variable_get('menu_main_links_source', 'main-menu');
  $main_menu = menu_tree_all_data($main_menu_name);
  $list_array = nevia_generate_nested_list_array($main_menu);
  $menu_item_list = array('items' => $list_array, 'attributes' => array('class' => 'menu', 'id' => 'responsive'));
  $output = theme('item_list', $menu_item_list);
  
  return $output;
}

function nevia_status_messages($variables) {
  $display = $variables['display'];
  $output = '';

  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
  );
  
  foreach (drupal_get_messages($display) as $type => $messages) {
    switch($type){
      case 'status':
        $class = 'success';
        break;
      default:
        $class = $type;
        break;
    }
    $output .= "<div class=\"notification closeable $class\" style=\"margin: 40px 0 0px 0;\">\n";
    if (!empty($status_heading[$type])) {
      $output .= '<h2 class="element-invisible">' . $status_heading[$type] . "</h2>\n";
    }
    if (count($messages) > 1) {
      $output .= " <ul>\n";
      foreach ($messages as $message) {
        $output .= '  <li>' . $message . "</li>\n";
      }
      $output .= " </ul>\n";
    }
    else {
      $output .= $messages[0];
    }
    $output .= "</div>\n";
  }
  return $output;
}

function nevia_links__comment($variables){
  $links = $variables['links'];
  
  $attributes = $variables['attributes'];
  $heading = $variables['heading'];
  global $language_url;
  $output = '';

  if (count($links) > 0) {
    $output = '';

    // Treat the heading first if it is present to prepend it to the
    // list of links.
    if (!empty($heading)) {
      if (is_string($heading)) {
        // Prepare the array that will be used when the passed heading
        // is a string.
        $heading = array(
          'text' => $heading,
          
          // Set the default level of the heading.
          'level' => 'h2',
        );
      }
      $output .= '<' . $heading['level'];
      if (!empty($heading['class'])) {
        $output .= drupal_attributes(array('class' => $heading['class']));
      }
      $output .= '>' . check_plain($heading['text']) . '</' . $heading['level'] . '>';
    }

    $output .= '<ul' . drupal_attributes($attributes) . '>';

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = array($key);

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class[] = 'first';
      }
      if ($i == $num_links) {
        $class[] = 'last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page())) && (empty($link['language']) || $link['language']->language == $language_url->language)) {
        $class[] = 'active';
      }
      $output .= '<li' . drupal_attributes(array('class' => $class)) . '>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= l($link['title'], $link['href'], $link);
      }
      elseif (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
      }

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return '<span style="color:#ccc">/ </span>' . $output;
}

function nevia_filter_tips($variables) {
  $tips = $variables['tips'];
  $long = $variables['long'];
  $output = '';

  $multiple = count($tips) > 1;
  if ($multiple) {
    $output = '<h2>' . t('Text Formats') . '</h2>';
  }

  if (count($tips)) {
    if ($multiple) {
      $output .= '<div class="compose-tips">';
    }
    foreach ($tips as $name => $tiplist) {
      if ($multiple) {
        $output .= '<div class="filter-type filter-' . drupal_html_class($name) . '">';
        $output .= '<h3>' . $name . '</h3>';
      }

      if (count($tiplist) > 0) {
        $output .= '<ul class="check-list">';
        foreach ($tiplist as $tip) {
          $output .= '<li' . ($long ? ' id="filter-' . str_replace("/", "-", $tip['id']) . '">' : '>') . $tip['tip'] . '</li>';
        }
        $output .= '</ul>';
      }

      if ($multiple) {
        $output .= '</div>';
      }
    }
    if ($multiple) {
      $output .= '</div>';
    }
  }

  return $output;
}

function nevia_menu_tree($variables) {
  return '<ul class="categories">' . $variables['tree'] . '</ul>';
}

function nevia_preprocess_node(&$vars){
  $node = $vars['node'];
  $timestamp  = $node->created;
  $vars['day_posted'] = date('d', $timestamp);
  $vars['month_posted'] = date('M', $timestamp);
  
  $vars['title'] = l($vars['title'], 'node/' . $node->nid);
  
  // alter $name, and create variables for author details
  //nevia_author_name($vars);
}

function nevia_author_name(&$variables) {
  $node = $variables['node'];
  $author = user_load($node->uid);
 
  $first_name = isset($author->field_first_name['und'][0]['safe']) ? $author->field_first_name['und'][0]['safe'] : '';
  $last_name = isset($author->field_last_name['und'][0]['safe']) ? $author->field_last_name['und'][0]['safe'] : '';
  $name = $author->name;
  
  if($first_name)
    $name = $first_name . ($last_name ? ' ' . $last_name : '');
  
  if (isset($variables['link_path']))
    $variables['name'] = l($name, $variables['link_path'], $variables['link_options']);
  else
    $variables['name'] = $name;
  
  
}

function nevia_username($variables) {
  //dsm($variables);
  $user = user_load($variables['uid']);
  $first_name = isset($user->field_first_name['und'][0]['safe_value']) ? $user->field_first_name['und'][0]['safe_value'] : '';
  $last_name = isset($user->field_last_name['und'][0]['safe_value']) ? $user->field_last_name['und'][0]['safe_value'] : '';
  $name = $user->name;
  if($first_name)
    $name = $first_name . ($last_name ? ' ' . $last_name : '');
    
  if (isset($variables['link_path'])) {
    // We have a link path, so we should generate a link using l().
    // Additional classes may be added as array elements like
    // $variables['link_options']['attributes']['class'][] = 'myclass';
    $output = l($name . $variables['extra'], $variables['link_path'], $variables['link_options']);
  }
  else {
    // Modules may have added important attributes so they must be included
    // in the output. Additional classes may be added as array elements like
    // $variables['attributes_array']['class'][] = 'myclass';
    $output = $name . $variables['extra'];
  }
  return $output;
}