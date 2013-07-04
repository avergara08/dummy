<?php
//var_dump($node);

$timestamp = $node->created;

?>

<article class="post" style = "margin-top: 0;">
  <?php if($display_submitted): ?>
    <section class="date">
      <span class="day"><?php print date('d', $timestamp); ?></span>
      <span class="month"><?php print date('M', $timestamp); ?></span>
    </section>
  <?php endif; ?>
  
  <section class="post-content">
    <header class="meta">
      <h2><?php print $title; ?></h2>
      <?php if($display_submitted): ?>
        <span><i class="halflings user"></i>By <?php print $name; ?></span>
      <?php endif; ?>
      <span><i class="halflings tag"></i><a href="#">Boating</a>, <a href="#">Recreation</a></span>
      <span><i class="halflings comments"></i>With <a href="#">12 Comments</a></span>
    </header>
    
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </section>
</article>


<div class="line"></div>
<?php print render($content['comments']); ?>

<div class="clearfix"></div>