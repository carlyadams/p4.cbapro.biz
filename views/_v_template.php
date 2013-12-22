<!DOCTYPE html>
<html>
<head>
        <title><?php if(isset($title)) echo $title; ?>CBA Trip Calculator and Journal</title>


        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
                                        
        <!-- Controller Specific JS/CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet"/>
    <link href="/css/profile.css" rel="stylesheet"/>


        <?php if(isset($client_files_head)) echo $client_files_head; ?>
        
</head><body>        


        <nav>
                <ul>
                        <li><a href="/">Welcome</a></li>
                        <?php if($user): ?>
                            <li><a href='/users/profile'>Update profile</a></li>
                            <li><a href='/posts/add'>Add entry</a></li>
                            <li><a href='/posts/'>View entry</a></li>
                            <li><a href='/posts/users'>Follow others</a></li>
                            <li><a href='/users/logout'>Log out</a></li>
                        <?php else: ?>
                            <li><a href='/users/signup'>Sign up</a></li>
                            <li><a href='/users/login'>Log in</a></li>
                        <?php endif; ?>
                </ul>
        </nav>
<h2> Welcome to CBA Trip Calculator and Journal! </h2>




        <?php if(isset($content)) echo $content; ?>


        <?php if(isset($client_files_body)) echo $client_files_body; ?>




        <footer>
                <div>
                <p class="right pull-right">CBA Trip Calculator and Fuel Cost<br>
                Carly Adams<br>
                <a href="mailto:carlyadams@harvard.edu">carlyadams@harvard.edu</a>
                </p>
        </div>


        </footer>
</body>
</html>