<?php

?>

<div class="large-notice">
  <?php
    if(!empty($user_profile['user_picture']['#markup'])){
      print $user_profile['user_picture']['#markup'];
      unset($user_profile['user_picture']);
    }
    //unset($user_profile['summary']);
  ?>
  <?php print $blog_link ? '<h2>'. $blog_link .'</h2>' : ''; ?>
  <div class="profile"<?php print $attributes; ?>>
    <?php print $full_name; ?>
    <?php print render($user_profile); ?>
    
  </div>
  <!--<p>This is example of style component for calling extra attention to featured content or information.</p>-->
  <!--<a class="button medium color" href="#">Read More</a>-->
  <div class="clearfix"></div>
</div>

