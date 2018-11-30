<?php include 'includes/header.php'; ?>
<form role="form" action="create.php" method="POST">
    <div class="form-group">
        <label>Topic Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter Post Title">
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category" class="form-control">
        <?php foreach (getCategories() as $category) : ?>
            <option value="<?= $category->id ?>"><?= $category->name ?></option>
            
        <?php endforeach; ?>
        </select>
    </div>
        <div class="form-group">
            <label>Topic Body</label>
            <textarea id="body" class="form-control" name="body"></textarea>
            <script>
                ClassicEditor
                    .create( document.querySelector( '#body' ) )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>
        </div>
    <button type="submit" class="btn btn-dark" name="do_create" >Submit</button>
</form>
<?php include 'includes/footer.php'; ?>