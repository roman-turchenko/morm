<div class="container">

	<form action="/admin/?controller=auth" class="form-signin" role="form" method="post">
		<h2 class="form-signin-heading">Please sign in</h2>
		<input name="login" type="login" class="form-control" placeholder="Login" required="" autofocus="" value="<?=$params['user_data']['login']?>">
		<input name="password" type="password" class="form-control" placeholder="Password" required=""><br />
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>
</div>
