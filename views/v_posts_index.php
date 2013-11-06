
<?php foreach ($posts as $post): ?>
<div class='well'>
	<h4><?=$post['first_name']?> </h4>
	<div id='post'>
		<?=$post['content']?>
	</div>
	
	<div class="post-footer">
		<p class="pull-right">posted on <?=Time::display($post['created'])?></p>
	</div>
        
    #delete post 
    <?=$post['content']?><br>
                        <a href="/posts/delete/<?=$post['post_id']?>">DELETE</a>     
    
</div>
<?php endforeach; ?>
