<?php

$tags = isset($node->field_blog_tags['und']) ? $node->field_blog_tags['und'] : array();
$tags_arr = array();
foreach($tags as $tag){
  if(!isset($tag['taxonomy_term']))
    $tag['taxonomy_term'] = taxonomy_term_load($tag['tid']);
  $tags_arr[] = '<a href="#">'.$tag['taxonomy_term']->name.'</a>';
}
$tags_html = implode(', ', $tags_arr);

$image_url = isset($node->field_blog_related_image['und'][0]['uri']) ? file_create_url($node->field_blog_related_image['und'][0]['uri']) : '';
$image_thumb_url = isset($node->field_blog_related_image['und'][0]['uri']) ? image_style_url('nevia_large', $node->field_blog_related_image['und'][0]['uri']) : '';

unset($content['field_blog_tags']);
unset($content['field_blog_related_image']);
unset($content['links']['#attributes']['class']);
unset($content['links']['node']['#links']['node-readmore']);
unset($content['links']['comment']['#links']['comment-new-comments']);

if(isset($content['links']['blog'])){
  $content['links']['blog']['#links']['blog_usernames_blog']['attributes']['class'] = 'button color';
  $content['links']['blog']['#links']['blog_usernames_blog']['title'] = 'Back to ' . strip_tags($name) . ' \'s blog';
}
foreach($content['links']['comment']['#links'] as $k => $link){
  if($k == 'comment_forbidden')
    continue;
  $content['links']['comment']['#links'][$k]['attributes']['class'] = 'button color';
}

$comment_label = '';
if($comment_count)
  $comment_label = 'With ' . $comment_count . ' comment' . ($comment_count > 1 ? 's' : '');
else
  $comment_label = 'No comments yet';

$comment_link = l($comment_label, 'node/' . $node->nid, array('fragment' => 'comments'));
?>

<article class="post">
  <?php if($image_url): ?>
    <figure class="post-img picture">
      <a href="<?php print $image_url; ?>" rel="fancybox" title="<?php print strip_tags($title); ?>"><img class="blog-large-image" src="<?php print $image_thumb_url; ?>" alt="" /></a>
    </figure>
  <?php endif; ?>

  <?php if($display_submitted): ?>
    <section class="date">
      <span class="day"><?php print $day_posted; ?></span>
      <span class="month"><?php print $month_posted; ?></span>
    </section>
  <?php endif; ?>
  
  <section class="post-content">
    <header class="meta">
      <h2><?php print $title; ?></h2>
      <?php if($display_submitted): ?>
        <span><i class="halflings user"></i>By <?php print $name; ?></span>
      <?php endif; ?>
      
      <?php if($tags_html): ?>
      <span><i class="halflings tag"></i><?php print $tags_html; ?></span>
      <?php endif; ?>
      
      <?php if($comment_link): ?>
        <span><i class="halflings comments"></i><?php print $comment_link; ?></span>
      <?php endif; ?>
    </header>
    
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
    
     <?php
      // Remove the "Add new comment" link on the teaser page or if the comment
      // form is being displayed on the same page.
      if ($teaser || !empty($content['comments']['comment_form'])) {
        unset($content['links']['comment']['#links']['comment-add']);
      }
      // Only display the wrapper div if there are links.
      $links = render($content['links']);
      if ($links):
    ?>
      <div class="link-wrapper">
        <?php print $links; ?>
      </div>
    <?php endif; ?>
  
  </section>
</article>

<?php print render($content['comments']); ?>

<div class="clearfix"></div>

<!--<div class="line"></div>-->