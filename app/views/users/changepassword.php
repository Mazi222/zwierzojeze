<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Change your password</h2>
            <p>Please fill out this form to change your password</p>
            <form action="<?php echo URLROOT; ?>/users/changepassword" method="post">
                <div class="form-group">
                    <label for="old_password">Old password: <sup>*</sup></label>
                    <input type="text" name="old_password" class="form-control form-control-lg <?php echo (!empty($data['old_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['old_password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['old_password_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">New Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm password: <sup>*</sup></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Change" class="btn btn-success btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

