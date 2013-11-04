<?php foreach ($posts as $post): ?>

	<strong><?=$post['first_name']?> </strong>posted on <?=Time::display($post['created'])?><br>
        <?=$post['content']?><br><br>

<?php endforeach; ?>