<div class="container">

		<?php if($user): ?>
			Hello <?=$user->first_name;?>
		<?php else: ?>
			<div class='jumbotron'>
				<div>
					<h2>Welcome to my first micro-blog. Please log in if you already have registered. If not, create a new account.</h2>
				</div>
				<li><a class='btn btn-primary btn-lg' href='/users/signup'>Sign Up</a></li>
			    <li><a class='btn btn-primary btn-lg' href='/users/login'>Log In</a></li>
			</div>
			<div>
			    <p>+1 Features: Upload a profile photo, delete massage</p>
			</div>
		<?php endif; ?>

</div>