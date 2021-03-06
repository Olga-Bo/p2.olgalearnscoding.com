<?php 

class posts_controller extends base_controller {



        public function add() {
        if(!$this->user){ 
        Router::redirect('/users/login');
         }
        else {
                $this->template->content = View::instance("v_posts_add");
                echo $this->template;
        }

        }

        public function p_add() {

                $_POST['user_id'] = $this->user->user_id;
                $_POST['created'] = Time::now();
                $_POST['modified'] = Time::now();

                DB::instance(DB_NAME)->insert('posts',$_POST);
                
        Router::redirect('/posts/');
                
        }

        public function index() {

         
            # Set up view
            #$this->template->content->addPost = View::instance('v_posts_add');
            $this->template->content = View::instance('v_posts_index');
            
            # Set up query
            $q = 'SELECT 
                    posts.content,
                    posts.created,
                    posts.user_id AS post_user_id,
                    users_users.user_id AS follower_id,
                    users.first_name,
                    users.last_name
                FROM posts
                INNER JOIN users_users 
                    ON posts.user_id = users_users.user_id_followed
                INNER JOIN users 
                    ON posts.user_id = users.user_id
                WHERE users_users.user_id = '.$this->user->user_id;
            # Run query        
            $posts = DB::instance(DB_NAME)->select_rows($q);
            
            # Pass $posts array to the view
            $this->template->content->posts = $posts;
            
            # Render view
            echo $this->template;


                
        }
        public function users() {
                # Set up view
        $this->template->content = View::instance("v_posts_users");
        
        # Set up query to get all users
        $q = 'SELECT *
                FROM users';
                
        # Run query
        $users = DB::instance(DB_NAME)->select_rows($q);
        
        # Set up query to get all connections from users_users table
       $q = 'SELECT *
                FROM users_users
                WHERE user_id = '.$this->user->user_id;
                
        # Run query
        $connections = DB::instance(DB_NAME)->select_array($q,'user_id_followed');
       
        # Pass data to the view
        $this->template->content->users= $users;
        $this->template->content->connections = $connections;
        
        # Render view
        echo $this->template;

        }

        public function follow($user_id_followed) {
        
        # Prepare the data array to be inserted
        $data = Array(
            "created"          => Time::now(),
            "user_id"          => $this->user->user_id,
            "user_id_followed" => $user_id_followed
            );
    
        # Do the insert
        DB::instance(DB_NAME)->insert('users_users', $data);
    
        # Send them back
        Router::redirect("/posts/users");
        
     }

     public function unfollow($user_id_followed) {
        
         # Set up the where condition
            $where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
            
            # Run the delete
            DB::instance(DB_NAME)->delete('users_users', $where_condition);
        
            # Send them back
            Router::redirect("/posts/users");
    
    }
        
     public function delete($post_created, $post_user_id) {
        $q= 'SELECT
        *
        FROM posts
        WHERE created = '.$post_created.' AND user_id ='.$post_user_id;

        $post = DB::instance(DB_NAME)->select_row($q);



        $post_id = $post['post_id'];


        DB::instance(DB_NAME)->delete('posts','WHERE post_id ='.$post_id);


        Router::redirect('/posts');
        }     
}

?>