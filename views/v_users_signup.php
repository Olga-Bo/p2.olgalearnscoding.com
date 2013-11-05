

<div class='well'>
	<h2>Sign up</h2>

<form class="cmxform" id="signupForm" method="POST" action='/users/p_signup' role='form'>
	<fieldset>
		<div>
			<label for="first_name">Firstname</label>
			<input id="first_name" name="first_name" type="text" class='form-control'/>
		</div>
		<div>
			<label for="last_name">Lastname</label>
			<input id="last_name" name="last_name" type="text" class='form-control'/>
		</div>
		<div>
			<label for="password">Password</label>
			<input id="password" name="password" type="password" class='form-control'/>
		</div>
		<!--<p>
			<label for="confirm_password">Confirm password</label>
			<input id="confirm_password" type="password" />
		</p>-->
		<div>
			<label for="email">Email</label>
			<input id="email" name="email" type="email" class='form-control'/>
		</div>
		<br>
		<button type='Submit' class="btn btn-default">Sign up</button>
	</fieldset>
</form>
</div>

				