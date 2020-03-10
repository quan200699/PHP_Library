<h2>Categories</h2>
<a href="./index.php?page=add">Create category</a>
<table class="table">
    <thead>
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $key => $category): ?>
    <tr>
        <td><?php echo ++$key ?></td>
        <td><?php echo $category->name ?></td>
        <td> <a href="./index.php?page=edit&id=<?php echo $category->id; ?>" class="btn btn-sm">Update</a></td>
        <td> <a href="./index.php?page=delete&id=<?php echo $category->id; ?>" class="btn btn-warning btn-sm">Delete</a></td>
        <?php endforeach; ?>
    </tbody>
</table>