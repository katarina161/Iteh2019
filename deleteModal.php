<div id="deleteModal" class="modal fade col-mb">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Delete Account</h4>
				<button type="button" class="close modal-close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="deleteAccount.php" method="post">
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fa fa-lock"></i></div>
						</div>
						<input type="password" id="passwordDelete" name="password" value="" class="form-control" placeholder="Password">
                    </div>
                    <div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fa fa-lock"></i></div>
						</div>
						<input type="password" id="conPasswordDelete" name="conPassword" value="" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div id="responseDelete" class="err"></div>
					<div class="form-group">
						<input type="button" id="btnDeleteCon" class="btn btn-primary btn-block btn-lg" value="Delete">
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>