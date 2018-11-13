<?php include 'includes/header.php'; ?>

  <ul class="topics list-group">
  <?php if ($topics) : ?>
  
    <?php foreach ($topics as $topic) : ?>
    <li class="topic list-group-item">
      <div class="row">
        <div class="col-sm-2 d-none d-sm-block p-0">
          <img class="avatar float-left" src="<?= BASE_URI ?>templates/img/<?= $topic->avatar ?>" />
          
        </div>
          <div class="col-sm-10">
            <div class="topic-content float-left">
              <h3><a href="<?= BASE_URI ?>topic.php?id=<?= urlencode($topic->id) ?>"><?= $topic->title ?></a></h3>
              <div class="topic-info">
                <a href="topics.php?category_id=<?= urlencode($topic->category_id) ?>"><?= $topic->name ?></a> >> <a href="topics.php?user_id=<?= urlencode($topic->user_id) ?>"><?= $topic->username ?></a> >> <?= formatDate($topic->create_date) ?> 
                <span class="badge badge-primary"><?= replyCount($topic->id) ?></span>
              </div>
            </div>
            
          </div>
          </div>
        </li><hr>  
<?php endforeach; ?>
  </ul>
  <?php else : ?>
    <p>No topics to display</p>
<?php endif; ?>      
  
  <h3>Forum Statistics</h3>
  <ul>
    <li>Total Number of Users: <strong><?= $usersCount ?></strong></li>
    <li>Total Number of Topics: <strong><?= $topicsCount ?></strong></li>
    <li>Total Number of Categories: <strong><?= $catCount ?></strong></li>
  </ul>
<?php include 'includes/footer.php'; ?>
