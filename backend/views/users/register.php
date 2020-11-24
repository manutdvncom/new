<?php
//views/users/register.php
?>
<div class="container">
    <h1>Form đăng ký</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control"
                   value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm password</label>
            <input type="password" id="confirm-password" name="confirm_password" class="form-control">
        </div>
        <input type="submit" name="submit" value="Register" class="btn btn-primary">
        <p>Đã có tài khoản, <a href="index.php?controller=user&action=login">Login</a></p>
    </form>
</div>