<h2>Level: <?= esc($level) ?></h2>
<form method="post" action="/gamification/submit">
<input type="hidden" name="level" value="<?= esc($level) ?>" />
<?php foreach ($questions as $q): ?>
    <div>
        <p><?= esc($q['question']) ?></p>
        <?php for ($i = 1; $i <= 4; $i++): ?>
            <label>
                <input type="radio" name="answer[<?= $q['id'] ?>]" value="<?= $i ?>"> 
                <?= esc($q['option'.$i]) ?>
            </label><br>
        <?php endfor; ?>
    </div>
<?php endforeach; ?>
<input type="submit" value="Submit" />
</form>