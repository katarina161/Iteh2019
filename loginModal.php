<div id="loginModal" class="modal fade col-mb">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Member Login</h4>
				<button type="button" class="close modal-close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="login.php" method="post">
					<p id="usernameErr" class="err"></p>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fa fa-user"></i></div>
						</div>
						<input type="text" id="username" name="username" value="" class="form-control" placeholder="Username">
					</div>
					<p id="passwordErr" class="err"></p>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fa fa-lock"></i></div>
						</div>
						<input type="password" id="password" name="password" value="" class="form-control" placeholder="Password">
					</div>
					<div class="form-group">
						<input type="button" id="login" class="btn btn-primary btn-block btn-lg" value="Login">
					</div>
				</form>
				<p id="response"></p>
			</div>
			<div class="modal-footer">
				Don't have an account?
                <a href="#signupModal" data-toggle="modal" data-dismiss="modal">Sign Up</a>
			</div>
		</div>
	</div>
</div>