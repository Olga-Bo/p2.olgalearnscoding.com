<?php if(isset($user)): ?>
	<h1>Welcome <?=$user->first_name;?> </h1>

	<form action="UploadContent.php" method="POST" enctype="multipart/form-data">
File:
<input type="file" name="image"> <input type="submit" value="Upload">
</form>
<?php else: ?>
    <h1>No user specified</h1>
<?php endif; ?>

