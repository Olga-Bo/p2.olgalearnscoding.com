<div class='well'>
	<h2>Choose users you would like to follow</h2>
	<div>
	<?php foreach($users as $user): ?>

		<h3><?=$user['first_name']?> <?=$user['last_name']?></h3>
		<img id="thumbnail" src='/uploads/avatars/<?=$user['image']?>'>
		<?php if(isset($connections[$user['user_id']])): ?>
				<a href='/posts/unfollow/<?=$user['user_id']?>'><button type="button" class="btn btn-warning">Unfollow</button></a>
		<? else: ?>
				<a href='/posts/follow/<?=$user['user_id']?>'><button type="button" class="btn btn-success">Follow</button></a>
		<?php endif; ?>

	<?php endforeach ?>
		<div>
</div>