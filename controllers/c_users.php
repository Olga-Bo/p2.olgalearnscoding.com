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

        $_POST['created'] = Time::now();
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

        $user_id = DB::instance(DB_NAME)->insert_row('users', $_POST);

        Router::redirect('/users/login');

    }

    public function login() {
    
        $this->template->content = View::instance('v_users_login');
        echo $this->template;

    }

    public function p_login(){

        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);


        $q = 
            'SELECT token 
            FROM users
            WHERE email = "'.$_POST['email'].'"
            AND password = "'.$_POST['password'].'"';

        $token = DB::instance(DB_NAME)->select_field($q);

        #success
        if($token){
            setcookie('token',$token, strtotime('+1 year'), '/');
             Router::redirect('/index/index');

        }
        #Fail
        else {
            echo "Login failed";
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

} # end of the class