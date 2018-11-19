              </div> <!-- /.jumbotron -->
            </div>
          </div> <!-- /.col-md-8 -->
          <div class="col-md-4">
            <div class="sidebar">
              <div class="jumbotron">
                <h3>Login form</h3>
                <form role="form" method="post" action="login.php">
                    <div class="form-group">
                      <label>Username</label>
                      <input name="username" type="text" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input name="password" type="password" class="form-control" placeholder="Enter Password">
                    </div>			
                    <button name="do_login" type="submit" class="btn btn-dark">Login</button> 
                    <a class="btn btn-secondary" href="register.php"> Create Account</a>
                  </form>
              </div>
              <div class="jumbotron">
                  <h3>Categories</h3>
                  <div class="list-group active">
                    <a href="topics.php" class="list-group-item list-group-item-action <?= is_active(null) ?>">All Topics <span class="badge-pill float-right"><?= $topicsCount ?></span></a> 
                    <?php foreach (getCategories() as $category) :?>
                      <a href="topics.php?category_id=<?= $category->id ?>" class="list-group-item list-group-item-action <?= is_active($category->id) ?>"><?= $category->name ?><span class="badge-pill float-right"><?= countByCategory($category->id) ?></span></a>
                    <?php endforeach; ?>
                    
                  </div>
            </div>
            
          </div> <!-- /.col-md-4 -->
      </div> <!-- /.row -->
    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="<?=BASE_URI?>templates/js/bootstrap.min.js"></script>
    <script src="<?=BASE_URI?>templates/js/custom.js"></script>
  </body>
</html>