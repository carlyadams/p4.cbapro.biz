<?php
    class posts_controller extends base_controller {


        public function __construct() {
            parent::__construct();


            # Make sure user is logged in if they want to use anything in this controller
            if(!$this->user) {
                die("Members only. <a href='/users/login'>Login</a>");
            }
        }


        public function add() {


            # Setup view
            $this->template->content = View::instance('v_posts_add');
            $this->template->title   = "New Trip Journal Entry";


            # Render template
            echo $this->template;


        }


        public function p_add() {


            # blank post is not allowed.
            if (!$_POST['content']) {
                
                echo "Please post your trip details here. <br><a href='/posts/add'>Go back</a>";
                
            } else {




            # Associate this post with this user
            $_POST['user_id']  = $this->user->user_id;


            # Unix timestamp of when this post was created / modified
            $_POST['created']  = Time::now();
            $_POST['modified'] = Time::now();


            # Insert
            # Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
            DB::instance(DB_NAME)->insert('posts', $_POST);


            # Quick and dirty feedback
            echo "Your entry has been added. <br><a href='/posts/add'>Do you have more details to share?</a> <br> <a href='/'>Back to main page</a>";
        }


        }

		
		
         public function index() {
            # Set up the View
            $this->template->content = View::instance('v_posts_index');
            $this->template->title   = "Entries";
        $this->template->content->page_after_add = 'mine';
        $this->template->content->page_after_delete = 'mine';

            # Build the query
            $q = 'SELECT 
                    posts.content,
                    posts.created,
					posts.location,
					posts.travelers,
					posts.fuel,
                    posts.user_id AS post_user_id,
                    users_users.user_id AS follower_id,
                    users.first_name,
                    users.last_name,
                    users.image

                FROM posts
                INNER JOIN users_users 
                    ON posts.user_id = users_users.user_id_followed
                INNER JOIN users 
                    ON posts.user_id = users.user_id
                WHERE users_users.user_id = '.$this->user->user_id .'
                ORDER BY posts.created DESC';




            # Run the query
            $posts = DB::instance(DB_NAME)->select_rows($q);


            # Pass data to the View
            $this->template->content->posts = $posts;


            # Render the View
            echo $this->template;


            }




        
        
        public function users() {


            # Set up the View
            $this->template->content = View::instance("v_posts_users");
            $this->template->title   = "Users";


            # Build the query to get all the users
            $q = "SELECT *
                FROM users
                WHERE user_id != ".$this->user->user_id;


            # Execute the query to get all the users. 
            # Store the result array in the variable $users
            $users = DB::instance(DB_NAME)->select_rows($q);


            # Build the query to figure out what connections does this user already have? 
            # I.e. who are they following
            $q = "SELECT * 
                FROM users_users
                WHERE user_id = ".$this->user->user_id;


            # Execute this query with the select_array method
            # select_array will return our results in an array and use the "users_id_followed" field as the index.
            # This will come in handy when we get to the view
            # Store our results (an array) in the variable $connections
            $connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');


            # Pass data (users and connections) to the view
            $this->template->content->users       = $users;
            $this->template->content->connections = $connections;


            # Render the view
            echo $this->template;
            }    




        public function follow($user_id_followed) {


            # Prepare the data array to be inserted
            $data = Array(
            "created" => Time::now(),
            "user_id" => $this->user->user_id,
            "user_id_followed" => $user_id_followed
            );


            # Do the insert
            DB::instance(DB_NAME)->insert('users_users', $data);


            # Send them back
            Router::redirect("/posts/users");


        }


        public function unfollow($user_id_followed) {


            # Delete this connection
            $where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
            DB::instance(DB_NAME)->delete('users_users', $where_condition);


            # Send them back
            Router::redirect("/posts/users");


        }

    public function p_delete($post_id, $next_page = NULL)
    {
        if ($post_id) {
            // Delete the post if it belongs to the user
            $where = "WHERE post_id = ".$post_id." AND user_id = ".$this->user->user_id;


            DB::instance(DB_NAME)->delete('posts',$where);
        }


        Router::redirect('/posts/'.$next_page);
    }

    public function following() {
        $this->template->content = View::instance('v_posts_index');
        $this->template->title = "Trips| ".APP_NAME;
        $this->template->content->page_after_delete = 'following';
        $this->template->content->page_after_add = 'following';


        // Retrieve posts from followed users and the users own posts
        $q = "(SELECT posts.post_id AS post_id, posts.content AS content, posts.created AS created, posts.user_id AS user_id, users.first_name AS first_name,
                users.last_name AS last_name FROM posts
                INNER JOIN users_followers ON users_followers.user_id=posts.user_id
                INNER JOIN users ON posts.user_id = users.user_id
                WHERE follower_user_id=".$this->user->user_id.
            ") UNION (".
                "SELECT post_id, content, created, user_id, '".$this->user->first_name."' AS first_name, '".
                    $this->user->last_name."' AS last_name
                    FROM posts WHERE user_id = ".$this->user->user_id.
            ") ORDER BY created DESC";


        $posts = DB::instance(DB_NAME)->select_rows($q);


        // Display posts
        $this->template->content->posts = $posts;
        echo $this->template;
    }

    public function all() {
        $this->template->content = View::instance('v_posts_index');
        $this->template->content->page_after_delete = 'all';
        $this->template->content->page_after_add = 'all';


        // Retrieve posts from DB
        $q = "SELECT posts.content, posts.post_id, posts.created, posts.user_id, users.first_name, users.last_name FROM posts
                INNER JOIN users ON posts.user_id = users.user_id
                ORDER BY posts.created DESC";
        $posts = DB::instance(DB_NAME)->select_rows($q);


        // Display posts
        $this->template->content->posts = $posts;
        echo $this->template;
    }


public function mine() {
        $this->template->content = View::instance('v_posts_index');
        $this->template->title = "My Trips | ".APP_NAME;


        $this->template->content->page_after_add = 'mine';
        $this->template->content->page_after_delete = 'mine';


        // Retrieve posts from DB
        $q = "SELECT posts.content, posts.post_id, posts.created, posts.user_id, posts.user_id, '".
            $this->user->first_name."' AS first_name, '".
            $this->user->last_name."' AS last_name FROM posts
                WHERE user_id=".$this->user->user_id.
                " ORDER BY posts.created DESC";
        $posts = DB::instance(DB_NAME)->select_rows($q);


        // Display posts
        $this->template->content->posts = $posts;
        echo $this->template;
    }


    }

