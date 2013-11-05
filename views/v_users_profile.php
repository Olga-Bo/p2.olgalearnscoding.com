<?php if(isset($user_name)): ?>
	<h1>This is the profile for <?=$user_name?></h1>
<?php else: ?>
    <h1>No user specified</h1>
<?php endif; ?>

<form action="UploadContent.php" method="POST" enctype="multipart/form-data">
File:
<input type="file" name="image"> <input type="submit" value="Upload">
</form>