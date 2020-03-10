<h2>Update category information</h2>
<form method="post" action="./category-management.php?page=edit">
    <input type="hidden" name="id" value="<?php echo $category->id; ?>"/>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $category->name; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary"/>
        <a href="./category-manament.php" class="btn btn-default">Cancel</a>
    </div>
</form>