<?php
//views/users/login.php
?>
<div class="container">
    <h1>Form đăng nhập</h1>
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
        <input type="submit" name="submit" value="Login" class="btn btn-primary">
        <p>Chưa có tài khoản, <a href="index.php?controller=user&action=register">Register</a></p>
    </form>
</div>
