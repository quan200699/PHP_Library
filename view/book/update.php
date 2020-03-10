<h2>Update book information</h2>
<form method="post" action="./book-management.php?page=edit">
    <input type="hidden" name="id" value="<?php echo $book->id; ?>"/>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $book->name; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Author</label>
        <textarea name="author" class="form-control"><?php echo $book->author; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary"/>
        <a href="./category-management.php" class="btn btn-default">Cancel</a>
    </div>
</form>