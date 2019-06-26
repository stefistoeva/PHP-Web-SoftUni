<h2>Register Form</h2>

<?php /** @var \App\Data\ErrorDTO $error */?>
<?php if ($error): ?>
    <p style="color: red"><?= $error->getMessage(); ?></p>
<?php endif; ?>

<form method="post">
    <label>
        Username: <input type="text" name="username" /> <br/>
    </label>
    <label>
        Password: <input type="text" name="password" /> <br/>
    </label>
    <label>
        Confirm Password: <input type="text" name="confirm_password" /> <br/>
    </label>
    <label>
        First Name: <input type="text" name="first_name" /> <br/>
    </label>
    <label>
        Last Name:<input type="text" name="last_name" /> <br/>
    </label>
    <label>
        Birthday: <input type="text" name="born_on" /> <br/>
    </label>
    <input type="submit" name="register" value="Register" /> <br/>
</form>

Back to <a href="index.php">index</a>