<style type="text/css">
body {
	background-color: rgba(51,249,12,1);
}
</style>
<section class="content follow">
    <h3> Follow other GURUS and their trips</h3>
        
    <?php foreach($users as $user): ?>
        <article>

            <!-- Print this user's name -->
            <?=$user['first_name']?> <?=$user['last_name']?>


            <!-- If there exists a connection with this user, show a unfollow link -->
            
                <?php if(isset($connections[$user['user_id']])): ?>
                    <a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>


                <!-- Otherwise, show the follow link -->
                <?php else: ?>
                    <a href='/posts/follow/<?=$user['user_id']?>'>Follow</a>
                <?php endif; ?>
            </h4>
        </article>
    <?php endforeach; ?>
</section>

