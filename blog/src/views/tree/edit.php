<form method="post" action="<?= $url ?>tree/update/<?= $tree->id ?>">
    <label>Tree count:<br>
        <input type="text" name="name" value="<?= $tree->name ?>" required>
    </label>
    <button type="submit">Update Tree</button>
</form>