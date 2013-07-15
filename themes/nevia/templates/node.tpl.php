<?php
unset($content['links']['#attributes']['class']);
unset($content['links']['node']['#links']['node-readmore']);
unset($content['links']['comment']['#links']['comment-new-comments']);
//dsm($content['links']);
if(isset($content['links']['blog'])){
  $content['links']['blog']['#links']['blog_usernames_blog']['attributes']['class'] = 'button color';
  $content['links']['blog']['#links']['blog_usernames_blog']['title'] = 'Back to ' . strip_tags($name) . ' \'s blog';
}
foreach($content['links']['comment']['#links'] as $k => $link){
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
      <span><i class="halflings tag"></i><a href="#">ENGL05</a><!--, <a href="#">Recreation</a>--></span>
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