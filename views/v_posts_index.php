
<?php foreach ($posts as $post): ?>
<div class='well'>
	<strong><?=$post['first_name']?> </strong>posted on <?=Time::display($post['created'])?><br>
        <?=$post['content']?><br><br>
</div>
<?php endforeach; ?>
