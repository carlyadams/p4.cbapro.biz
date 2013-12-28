<style type="text/css">
body {
	background-color: rgba(51,249,12,1);
}
</style>
<section class="content posts">
        <h3> View Entries </h3>
        <?php foreach($posts as $post): ?>


        <article>

            <!-- Print this user's name -->
            <div class="name"><?=$post['first_name']?> <?=$post['last_name']?> posted:</div>

            <p>Destination: <?=$post['location']?><br>
            Travelers: <?=$post['travelers']?><br>
            Details about trip: <?=$post['content']?><br>
            Estimated Fuel cost via vehicle: $<?=$post['fuel']?></p>

            <h4 class="time">Date Posted: <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
                <?=Time::display($post['created'])?>
            </time>
          </h4>


        </article>


        <?php endforeach; ?>
</section>

