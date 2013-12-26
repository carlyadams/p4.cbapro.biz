<style type="text/css">
body {
	background-color: rgba(51,249,12,1);
}
</style>
<section class="content profile"> 

        <h1> Hello, <?=$user->first_name?>! </h1>
        <h3> Profile Details</h3>
        <p> You have been with us since <?= date('F j, Y', $user->created) ?>.
                Thank you for your GREEN support and sharing your trip details!
        </p>
        <li>First Name: <?=$user->first_name?></li>
        <li>Last Name: <?=$user->last_name?></li>
        <li>Email: <?=$user->email?></li>
             
</section>

