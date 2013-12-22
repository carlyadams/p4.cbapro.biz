<section class="content login">
    <h3>Log in to view your trips and others</h3>


    <form method='POST' action='/users/p_login'>


        <input type='text' name='email' placeholder="Add Email.">
        <input type='password' name='password' placeholder="Add Password.">


        <div class='message error'>
            <?php if($error=='error1'): ?>
                Login failed. Email is incorect. 
            <?php endif; ?>


            <?php if($error == 'error2'): ?>
               Login failed. Password is incorect. 
            <?php endif; ?>
        </div>
        
        <div class= 'button'><input type='submit' value='Log in'></div>






    </form>
</section>

