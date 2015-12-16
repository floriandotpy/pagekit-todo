<h1>ToDo items</h1>

<ul>
    <?php foreach($entries as $entry): ?>

    <?php if(!$entry['done']): ?>
        <li><?= $entry['message'] ?></li>
    <?php endif ?>

    <?php endforeach; ?>
</ul>
