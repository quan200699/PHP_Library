<h2>List Book</h2>
<form class="form-inline" method="get">
    <input hidden name="page" value="search"/>
    <div class="form-group mx-sm-3 mb-2">
        <input type="text" name="nameSearch" class="form-control" placeholder="input name">
    </div>
    <button class="btn btn-primary mb-2" type="submit" value="search">Search
    </button>
</form>
<a href="./book-management.php?page=add">Create Book</a>
<table class="table">
    <thead>
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Author</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($books as $key => $book): ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $book->name ?></td>
            <td><?php echo $book->author ?>
            <td><a href="./book-management.php?page=edit&id=<?php echo $book->id; ?>" class="btn btn-sm">Update</a></td>
            <td><a href="./book-management.php?page=delete&id=<?php echo $book->id; ?>" class="btn btn-warning btn-sm">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>