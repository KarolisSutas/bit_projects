<ul>
    <?php foreach ($trees as $tree): ?>
        <li>
            <strong><?= $tree['name'] ?></strong>
            <a href="<?= $url ?>tree/edit/<?= $tree['id'] ?>">Edit</a>
            <form action="<?= $url ?>tree/delete/<?= $tree['id'] ?>" method="post" style="display:inline;">
                <button type="submit">Delete</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>