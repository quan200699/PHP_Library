<h1>Do you want to delete this category</h1>
<h3><?php echo $category->name; ?></h3>
<form action="./category-management.php?page=delete" method="post">
    <input type="hidden" name="id" value="<?php echo $category->id; ?>"/>
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger"/>
        <a class="btn btn-default" href="./category-management.php">Cancel</a>
    </div>
</form>