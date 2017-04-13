<div class="kantoniak-demo demo">
  <div class="content">
    <?php echo $data['content']; ?>
  </div>
  <?php
    if (!empty($data['url']) || !empty($data['list_url'])):
    echo '<div class="buttons">';

    if (!empty($data['url'])) {
      echo '<a href="'. $data['url'] .'">See demo</a>';
    }

    if (!empty($data['list_url'])) {
      echo '<a href="'. $data['list_url'] .'">See all demos</a>';
    }

    echo '</div>';
    endif;
  ?>
</div>