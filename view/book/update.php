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
        <label for="category">Category:</label>
        <select class="custom-select form-control" name="category" id="category">
            <?php foreach ($categories as $key => $category): ?>
                <option <?php
                if ($category->id == $book->category){
                    echo "selected";
                }
                ?> value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary"/>
        <a href="./book-management.php" class="btn btn-default">Cancel</a>
    </div>
</form>