
<?php foreach ($posts as $post): ?>
<div class='well'>
	<h4><?=$post['first_name']?> </h4>
	<div id='post'>
		<?=$post['content']?>
	</div>
	
	<div class="post-footer">
		<p class="pull-right">posted on <?=Time::display($post['created'])?></p>
	</div>
        
    <?php if($user->user_id == $post['post_user_id']): ?> 
    <a href=/posts/delete/<?=$post['created']?>/<?=$post['post_user_id']?>>Delete</a> 
    <?php endif; ?>    
    
</div>
<?php endforeach; ?>
