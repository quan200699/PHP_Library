<h2>List Book</h2>
<a href="./index.php?page=add">Create Book</a>
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
<!--        <td> <a href="./index.php?page=edit&id=--><?php //echo $book->id; ?><!--" class="btn btn-sm">Update</a></td>-->
<!--        <td> <a href="./index.php?page=delete&id=--><?php //echo $book->id; ?><!--" class="btn btn-warning btn-sm">Delete</a></td>-->
        <?php endforeach; ?>
    </tbody>
</table>