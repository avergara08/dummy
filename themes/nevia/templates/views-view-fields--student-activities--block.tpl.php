<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */

$timestamp = isset($fields['created']->raw) ? $fields['created']->raw : null;
$author_uid = isset($fields['uid']->raw) ? $fields['uid']->raw : null;

$day_posted = date('d', $timestamp);
$month_posted = date('M', $timestamp);
$title = isset($fields['title']->content) ? $fields['title']->content : '';
$name = theme('username', array('account' => user_load($author_uid)));
$content = isset($fields['body']->content) ? $fields['body']->content : '';
?>

<article class="post">
  <section class="date">
    <span class="day"><?php print $day_posted; ?></span>
    <span class="month"><?php print $month_posted; ?></span>
  </section>
  
  <section class="post-content">
    <header class="meta">
      <h2><?php print $title; ?></h2>
      <span><i class="halflings user"></i>By <?php print $name; ?></span>
      <span><i class="halflings tag"></i><a href="#">Boating</a>, <a href="#">Recreation</a></span>
      <span><i class="halflings comments"></i>With <a href="#">12 Comments</a></span>
    </header>
    
    <?php print $content; ?>
  </section>
</article>

<div class="line"></div>