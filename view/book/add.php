<?php
if (isset($message)) {
    echo "<p class='alert-info'>$message</p>";
}
?>

<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Create new book</h1>
        </div>
        <div class="col-12">
            <form method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Input name" required>
                </div>
                <div class="form-group">
                    <label>Author:</label>
                    <input type="text" class="form-control" name="author" placeholder="Input author" required>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select class="custom-select form-control" name="category" id="category">
                        <option selected>Select Category</option>
                        <?php foreach ($categories as $key => $category): ?>
                            <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </form>
        </div>
    </div>
</div>