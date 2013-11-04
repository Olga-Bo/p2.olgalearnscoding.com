<?php if(isset($_GET['login-error'])): ?>
<div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong><i class="icon-warning-sign"></i> I am unable to log you in.</strong>  Please try again!
</div>
<?php endif; ?>


<div class='well'>
	<?php if(isset($_GET['login-error'])): ?>
<div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong><i class="icon-warning-sign"></i> I am unable to log you in.</strong>  Please try again!
</div>
<?php endif; ?>
<h2>Log in</h2>
<form class='bs-example form-horizontal' method='POST' action='/users/p_login' role='form'>
	<div class="form-group">
		<label>Email:</label><input type='email' class="form-control" name='email' placeholder="Enter email">
	</div>

	<div class="form-group">
		<label>Password:</label><input type='password' class="form-control" name='password' placeholder="Password">
	</div>
<button type='Submit' class="btn btn-default">Log in</button>
</form>
</div>


