	<script type="text/javascript">
		
	$(function() {
		// highlight 
		var elements = $("input[type!='submit'], textarea, select");
		elements.focus(function(){
			$(this).parents('li').addClass('highlight');
		});
		elements.blur(function(){
			$(this).parents('li').removeClass('highlight');
		});
		
		$("#forgotpassword").click(function() {
			$("#password").removeClass("required");
			$("#login").submit();
			$("#password").addClass("required");
			return false;
		});
		
		$("#login").validate()
	});
	</script>
		


<div class='well'>
	<h2>Sign up</h2>

	<form method='POST' action='/users/p_signup' role='form' class='cmxForm' id='login'>
		<label for="cname">First Name</label><input type='text' name='first_name' class="form-control" id='cname' minlength='2' required />
		<label>Last Name</label><input type='text' name='last_name' class="form-control">
		<label for='cmail'>Email</label><input type='text' name='email' class="form-control" id='cmail' required>
		<label>Password</label><input type='password' name='password' class="form-control">
	</form>
	<br>
	<button type='Submit' class="btn btn-default">Sign up</button>

	<div>
				<form action="" method="post" id="login">
				<fieldset>
					<legend>User details</legend>
					<ul>
						<li>
							<label for="email"><span class="required">Email address</span></label>
							<input id="email" name="email" class="text required email" type="text" />
							<label for="email" class="error">This must be a valid email address</label>
						</li>
						
						<li>
							<label for="password"><span class="required">Password</span></label>
							<input name="password" type="password" class="text required" id="password" minlength="4" maxlength="20" />
						</li>

						<li>
							<label class="centered info"><a id="forgotpassword" href="#">Email my password...</a></label>
						</li>
					</ul>
				</fieldset>
				
				<fieldset class="submit">
					<input type="submit" class="button" value="Login..." />
				</fieldset>
				
				<div class="clear"></div>
			</form>
			
	</div>
</div>


				