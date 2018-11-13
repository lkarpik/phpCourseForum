<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forum</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= BASE_URI ?>templates/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= BASE_URI ?>templates/css/custom.css" rel="stylesheet">
    
    <!-- Text editor (ckeditor5) script  -->
    <script src="<?= BASE_URI ?>templates/js/ckeditor5-build-classic/ckeditor.js"></script>
    <?php 
    // check if title is set
    if(!isset($title)) {
      $title = SITE_TITLE;
    }
    
    ?>
  </head>

  <body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php">Forum</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Create an account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="create.php">Create Topic</a>
          </li>
          
        </ul>
        
      </div>
    </nav>

    <main role="main" class="container">    
      <div class="row">
          <div class="col-md-8 ">
            <div class="main-col">
                <div class="jumbotron">
                    <h1 class="float-left"><?= $title ?></h1>
                    <h4 class="float-right">A simple forum in PHP</h4>
                    <div class="clearfix"></div>
                    <hr>