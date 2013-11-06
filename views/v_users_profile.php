<?php if(isset($user)): ?>
	<h1>Welcome <?=$user->first_name;?> </h1>


  <form role="form" method='POST' enctype="multipart/form-data" action='/users/profile_update/'>
                <img class="profile-pic" id="avatar" src="/uploads/avatars/<?= $user->image ?>" alt="<?=$user->first_name . ' ' . $user->last_name ?>">                 
                <div>
                        <label for="avata">Do you want to make some change?</label> 
                        <input type="file" name="avata" id="avata"> 
                        <?php if(isset($error)): ?>                   
                                <div class="messge error">Upload failed.<br> 
                                Image file must be a jpg, gif, or png.
                                </div>                
                        <?php endif; ?>
                        <button type="submit" class="button">Update Image</button>
                </div>
 </form>
<?php else: ?>
    <h1>No user specified</h1>
<?php endif; ?>

