<div class="kantoniak-demo demo">
  <div class="content">
    <?php echo $data['content']; ?>
  </div>
  <div class="buttons">
  <?php
    if (!empty($data['url'])) {
      echo '<a href="'. $data['url'] .'">See demo</a>';
    }

    if (!empty($data['list_url'])) {
      echo '<a href="'. $data['list_url'] .'">See all demos</a>';
    }
  ?>
  </div>
</div>