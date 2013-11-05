
	<div class="well">
			<h2>Log in</h2>
		<form action='/users/p_login' method="POST" id="login" class='bs-example form-horizontal' role='form' >
		<fieldset>
				<div class="form-group">
					<label for="email"><span class="required">Email address</span></label>
					<input id="email" name="email" class="text required email form-control" type="text" />
					<label for="email" class="error">This must be a valid email address</label>
				</div>
				
				<div class="form-group">
					<label for="password"><span class="required">Password</span></label>
					<input name="password" type="password" class="text required form-control" id="password" minlength="4" maxlength="20" />
				</li>

				<li>
					<label class="centered info"><a id="forgotpassword" href="#">Email my password...</a></label>
				</li>
		</fieldset>
		
		<fieldset class="submit">
			<button type='Submit' class="btn btn-default">Log in</button>
		</fieldset>
		
		<div class="clear"></div>
	</form>
			
	</div>
