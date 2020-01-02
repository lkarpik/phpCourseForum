<?php include 'includes/header.php'; ?>
    <ul class="topics list-group">
    <li class="topic list-group-item bg-transparent">
    <div class="row">
        <div class="col-2 p-0">
            <img class="avatar float-left" src="<?= BASE_URI ?>templates/img/<?= $topic->avatar ?>" />
            <div class="label"> <a href="<?= BASE_URI ?>topics.php?user_id=<?= $topic->user_id ?>"><?= $topic->username ?></a><br><small>posts: <?= userPostCount($topic->user_id) ?></small> 
            </div>

        </div>
        <div class="col-10">
            <div class="topic-content float-left">
            <?= $topic->body ?>
            </div>    
        </div>
        </div>
    </li><hr>
    <?php foreach ($replies as $row) : ?>
    <li class="topic list-group-item">
        <div class="row">
            <div class="col-2 p-0">
            <img class="avatar float-left" src="<?= BASE_URI ?>templates/img/<?= $row->avatar ?>" /><div class="label"> <a href="<?= BASE_URI ?>topics.php?user_id=<?= $row->user_id ?>"><?= $row->username ?></a><br><small>posts: <?= userPostCount($row->user_id) ?></small></div>
            </div>
            <div class="col-10">
                <div class="topic-content float-left">
                    <?= $row->body ?>
                </div>    
                </div>
        </div>
    </li><hr>
    <?php endforeach; ?>
    </ul>
    <h3>Replay to topic</h3>
    <?php if(isLoggedIn()) : ?>
    <form role="form" method="POST" action="topic.php?id=<?= $topic->id ?>">
    <div class="form-group">
        <textarea name="body" id="reply" cols="30" rows="50" class="form-control"></textarea>
        <script>
            ClassicEditor
                .create( document.querySelector( '#reply' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
         
        <button name="do_reply" type="submit" class="btn btn-dark">Reply</button>
    <?php else : ?>
        <p> Login to reply </p>
    <?php endif; ?>
    
    </form>
    
<?php include 'includes/footer.php'; ?>