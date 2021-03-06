<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();

    } 

    public function index() {
        echo "This is the index page";
    }

    public function signup() {

        # Setup view
        $this->template->content = View::instance('v_users_signup');
        $this->template->title   = "Sign Up";

        # Render template
        echo $this->template;

    }

    public function p_signup() {


        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        //Query the DB for a email / password and set it as a variable.
        $q = "SELECT * FROM users WHERE email = '".$_POST['email']."'";

        //Execute query against DB
        $exsitingUsers = DB::instance(DB_NAME)->select_field($q);


         if($exsitingUsers > 0){
                
            //Redirect to the singup page
            $error = "User already exists, please login";
            Router::redirect('/users/signup/$error');

        }else{

        $_POST['created'] = Time::now();
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

        $user_id = DB::instance(DB_NAME)->insert_row('users', $_POST);

        Router::redirect('/users/login');
    }

    }

    public function login($error =NULL) {

        if($this->user){
            Router::redirect('/users/profile');
        }

        else{
            #setup the view
            $this->template->content = View::instance('v_users_login');
            $this->template->title = "Login";

            # pass error to the view
            $this->template->content->error = $error; 

            echo $this->template;
        }
        
    }

    public function p_login(){


        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);


        $q = 
            'SELECT token 
            FROM users
            WHERE email = "'.$_POST['email'].'"
            AND password = "'.$_POST['password'].'"';

        $token = DB::instance(DB_NAME)->select_field($q);

        #fail
        if(!$token){
            $error = 'Invalid password';
             Router::redirect("/users/login/"); 
        }
        
        else {
           setcookie('token',$token, strtotime('+1 year'), '/');
            Router::redirect('/users/profile');
        }

    }

    public function logout() {
        
       # Generate a new token they'll use next time they login
       $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
       
       # Update their row in the DB with the new token
       $data = Array(
               'token' => $new_token
       );
       DB::instance(DB_NAME)->update('users',$data, 'WHERE user_id ='. $this->user->user_id);
       
       # Delete their old token cookie by expiring it
       setcookie('token', '', strtotime('-1 year'), '/');
       
       # Send them back to the homepage
       Router::redirect('/');
    }

    public function profile($user_name = NULL) {

        # Only logged in users are allowed...
        if(!$this->user) {
                die('Members only. <a href="/users/login">Login</a>');
        }
        
        # Set up the View
        $this->template->content = View::instance('v_users_profile');
        $this->template->title   = "Profile";
                        
        # Pass the data to the View
        $this->template->content->user_name = $user_name;
        
        # Display the view
        echo $this->template;
                                

    }

    public function profile_update() {
        # if user specified a new image file, upload it
        if ($_FILES['avatar']['error'] == 0)
        {
            # upload an image
            $image = Upload::upload($_FILES, "/uploads/avatars/", array("JPG", "JPEG", "jpg", "jpeg", "gif", "GIF", "png", "PNG"), $this->user->user_id);

            if($image == 'Invalid file type.') {
                # return an error
                Router::redirect("/users/profile/error"); 
            }
            else {
                # process the upload
                $data = Array("image" => $image);
                DB::instance(DB_NAME)->update("users", $data, "WHERE user_id = ".$this->user->user_id);

                # resize the image
                $imgObj = new Image($_SERVER["DOCUMENT_ROOT"] . '/uploads/avatars/' . $image);
                $imgObj->resize(50,50);
                $imgObj->save_image($_SERVER["DOCUMENT_ROOT"] . '/uploads/avatars' . $image);

            }
        }
        else
        {
            # return an error
            Router::redirect("/users/profile/error");  
        }

        # Redirect back to the profile page
        router::redirect('/users/profile'); 
    }  

} # end of the class