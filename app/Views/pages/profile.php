<article>
    <div class="row">
        <div class="col-lg-6">
            <p><?= $user_name; ?>'s profile.</p>
            <?= \Config\Services::validation()->listErrors() ?>
            <form action="/profile/edit" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="InputForName" class="form-label">User Name:</label>
                    <input type="input" name="InputForName" class="form-control" id="InputForEmail" value="<?= $user_name; ?>">
                </div>
                <div class="mb-3">
                    <label for="InputForEmail" class="form-label">Email address:</label>
                    <input type="email" name="InputForEmail" class="form-control" id="InputForEmail" value="<?= $user_email; ?>">
                </div>
                <input type="submit" name="submit" value="Update your information" />
            </form>
        </div>
        <div class="col-lg-6">
            <p>Reset your password.</p>
            <form action="/profile/changePassword" method="post">
                <div class="mb-3">
                    <label for="InputForPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="InputForPassword">
                </div>
                <div class="mb-3">
                    <label for="InputForConfPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="confpassword" class="form-control" id="InputForConfPassword">
                </div>
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        </div>
    </div>
</article>
