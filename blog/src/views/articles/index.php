<div class="container">
    <h1>Articles List</h1>
    <?php if (!empty($articles)): ?>
        <ul>
            <?php foreach ($articles as $index => $article): ?>
                <li>
                    <strong>#<?= $index + 1 ?></strong> -
                    <?= htmlspecialchars($article['title']) ?>
                    (by <?= htmlspecialchars($article['author']) ?>)
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No articles found.</p>
    <?php endif; ?>
</div>
 
<style>
.container {
    max-width: 700px;
    margin: 40px auto;
    padding: 24px;
    background: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
}
h1 {
    color: #333;
    margin-bottom: 24px;
}
ul {
    list-style: none;
    padding: 0;
}
li {
    padding: 10px 0;
    border-bottom: 1px solid #e0e0e0;
}
li:last-child {
    border-bottom: none;
}
strong {
    color: #007bff;
}
</style>
 
 