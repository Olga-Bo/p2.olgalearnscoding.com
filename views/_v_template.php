<!DOCTYPE html>
<html>
<head>
        <title><?php if(isset($title)) echo $title; ?></title>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />        
                                        
        <!-- JS/CSS File we want on every page -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
         <script type="text/javascript" src="/js/jquery.validate.min.js"></script>
         <script type="text/javascript" src="/js/script.js"></script>     

        <!-- Controller Specific JS/CSS -->
        <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="/css/amelia-theme.css" type="text/css">
        <link rel="stylesheet" href="/css/styles.css" type="text/css">
        <?php if(isset($client_files_head)) echo $client_files_head; ?>

</head>

<body>        

        
        <div class='navbar navbar-default navbar' id='navbar-main'>
                <div class='container'>
                
                        <li><a href='/'>Home</a></li>
                        
                <?php if($user): ?>
                        <li><a href='/posts/add'>Add Post</a></li>
                        <li><a href='/posts/'>View Posts</a></li>
                        <li><a href='/posts/users'>Follow Users</a></li>
                        <li><a href='/users/logout'>Logout</a></li>
                        <?php if($user): ?>
                                 <h4 class='pull-right'>You are logged in as <strong><?=$user->first_name?></strong></h4>
                                <?php endif; ?>

                <?php else: ?>
                        <li><a href='/users/signup'>Sign Up</a></li>
                        <li><a href='/users/login'>Log In</a></li>
                <?php endif; ?>
                

                </div>
        </div>

        <div class='container'>

        


        <?php if(isset($content)) echo $content; ?>

        <?php if(isset($client_files_body)) echo $client_files_body; ?>

        </div> <!--end of container-->
</body>
</html>