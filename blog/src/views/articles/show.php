<!--
$article[content, title, author, id]
-->
<style>
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        background: #f9f9f9;
        margin: 0;
        padding: 40px;
    }
    .article-container {
        background: #fff;
        max-width: 700px;
        margin: 40px auto;
        padding: 32px 40px;
        border-radius: 12px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.07);
    }
    h1 {
        color: #2c3e50;
        margin-bottom: 18px;
    }
    .content {
        color: #444;
        font-size: 1.15em;
        line-height: 1.7;
        margin-bottom: 28px;
    }
    .author {
        color: #888;
        font-size: 0.98em;
        text-align: right;
    }
</style>
<div class="article-container">
    <h1><?= htmlspecialchars($article['title']) ?></h1>
    <div class="content"><?= nl2br(htmlspecialchars($article['content'])) ?></div>
    <div class="author">Autorius: <?= htmlspecialchars($article['author']) ?></div>
</div>

