<?php
class users_controller extends base_controller {


    public function __construct() {
        parent::__construct();
        
    } 


    public function index() {
        # Set up the view
        $this->template->content = View::instance('v_index_index');
        # Render the view
        echo $this ->template;
    }



    public function signup($error_code = NULL, $email = NULL) {
        $this->template->content = View::instance('v_users_signup');
        $this->template->title = "Sign Up | ".APP_NAME;


        if ($error_code == ERROR_ALREADYREGISTERED) {
            $this->template->content->error = "Email ".$email." already registered.";
            $this->template->content->loginOption = true;
        }
        elseif ($error_code == ERROR_SIGNUP_MANDATORYFIELDS) {
            $this->template->content->error = "All fields are required. Please try again.";
        }


        echo $this->template;
    }


    public function p_signup($error=NULL) {
        // Make sure all fields are field out
        $_POST['first_name'] = trim($_POST['first_name']);
        $_POST['last_name'] = trim($_POST['last_name']);
        $_POST['email'] = trim($_POST['email']);
        if (!$_POST['first_name'] or !$_POST['last_name'] or !$_POST['email'] or !$_POST['password']) {
            Router::redirect('/users/signup/'.ERROR_SIGNUP_MANDATORYFIELDS);
        }



        // Check if user exist
        $q = 'SELECT * FROM users WHERE email="'.$_POST['email'].'"';
        $user = DB::instance(DB_NAME)->select_row($q);


        if (isset($user)) {
            ///// Existing user ////


            Router::redirect('/users/signup/'.ERROR_ALREADYREGISTERED.'/'.$_POST['email']);
        }
        else {
            ///// new user


            // Encrypt password
            $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
            // Generate token
            $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());


            // Add timestamps
            $_POST['created'] = Time::now();
            $_POST['modified'] = Time::now();
            $_POST['timezone'] = TIMEZONE;


            // Insert new user data to DB
            DB::instance(DB_NAME)->insert_row('users', $_POST);


            // send email confirmation
            $this->email_signup_confimation($_POST);


            Router::redirect('/users/login/noerror/'.INFO_SIGNUP_SUCCESS);
        }
    }


    private function email_signup_confimation($user_info) {
        if ($user_info) {
            $to[] = Array(
                "name" => $user_info['first_name']." ".$user_info['last_name'],
                "email" => $user_info['email']
            );
            $from = Array("name" => APP_NAME, "email" => APP_EMAIL);
            $subject = "Welcome to ".APP_NAME."!";
            $body = "Hi ".$user_info['first_name'].", this is a message to confirm your registration at ".APP_NAME.
                ". Visit http://p4.cbapro.biz to login.";
            $cc  = APP_EMAIL;
            $bcc = "";
            $email = Email::send($to, $from, $subject, $body, true, $cc, $bcc);
        }
    }


                  
      
    public function p_login() {


        if (!$_POST) {
            echo $this->template;
            return;
        } else {


            # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
            $_POST = DB::instance(DB_NAME)->sanitize($_POST);


            # Escape HTML chars (xss attack)
            $_POST['email'] = stripslashes(htmlspecialchars($_POST['email']));


            # Hash submitted password so we can compare it against one in the db
            $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);


            # Search the db for this email and password
            # Retrieve the token if it's available
            $q = "SELECT token 
                FROM users 
                WHERE email = '".$_POST['email']."' 
                AND password = '".$_POST['password']."'";


            $token = DB::instance(DB_NAME)->select_field($q);


            # Search the db for this email 
            # Retrieve the id if it's available
            $n = "SELECT user_id 
                    FROM  users 
                    WHERE email =  '".$_POST['email']."'";


            $user_id = DB::instance(DB_NAME)->select_field($n);


       




            # If we didn't find a matching token in the database, it means login failed
            if(!$token) {


                
                
                    # If we didn't find a matching id in the database
                if(!$user_id) {


                    # Send them back to the login page and tell them that email is not correct.
                    Router::redirect("/users/login/error1");


                    # If we did find a matching id in the database
                } else {
                    # Send them back to the login page and tell them that account is not correct.
                    Router::redirect("/users/login/error2");
                }
                               


            # But if we did, login succeeded! 
            } else {


                /* 
                Store this token in a cookie using setcookie()
                Important Note: *Nothing* else can echo to the page before setcookie is called
                Not even one single white space.
                param 1 = name of the cookie
                param 2 = the value of the cookie
                param 3 = when to expire
                param 4 = the path of the cooke (a single forward slash sets it for the entire domain)
                */
                setcookie("token", $token, strtotime('+1 year'), '/');


                # Send them to the main page - or whever you want them to go
                Router::redirect("/");


            }
        }
    }


    public function login($error = NULL) {


        # Set up the view
        $this->template->content = View::instance("v_users_login");
        $this->template->title = "Log in";


        # Pass data to the view
       
        $this->template->content->error = $error;


        # Render the view
        echo $this->template;


    }








    public function logout() {
        # Generate and save a new token for next login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());


        # Create the data array we'll use with the update method
        # In this case, we're only updating one field, so our array only has one entry
        $data = Array("token" => $new_token);


        # Do the update
        DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");


        # Delete their token cookie by setting it to a date in the past - effectively logging them out
        setcookie("token", "", strtotime('-1 year'), '/');


        # Send them back to the main index.
        Router::redirect("/");
    }


    public function profile($error = NULL) {


        # if user is blank, then they're not logged in - redirect to login
        if (!$this->user) {
            router::redirect('/users/login');
        }


        # pass the profile view to the 'content' area of the master template
        $this->template->content = View::instance('v_users_profile');
    
        # title for this page 
        $this->template->title = $this->user->first_name . " " . $this->user->last_name;


        # pass errors, if any
        $this->template->content->error = $error;


        //render the view 
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

