<div class="container">
	<?php if($user): ?>
		Hello <?=$user->first_name;?>
	<?php else: ?>
		Welcome to my first micro-blog. Please log in if you already have registered. If not, create a new account.
		<li><a href='/users/signup'>Sign Up</a></li>
	    <li><a href='/users/login'>Log In</a></li>
	<?php endif; ?>
</div>