<?php
include_once '_include/head.php';
?>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['full-name'];
    $email_address = $_POST['email-address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];



    $name_error = false;
    $name_msg = "";
    $email_error = false;
    $email_msg = "";
    $password_error = false;
    $password_msg = "";
    $confirm_password_error = false;
    $confirm_email_msg = "";

    if (!isset($name)) {
        $name_error = true;
    } else if (strlen(trim($name)) < 1) {
        $name_error = true;
        $name_msg = "Name cannot be empty";
    }

    if (!isset($email_address)) {
        $email_error = true;
    } else if (strlen(trim($email_address)) < 5) {
        $email_error = true;
        $email_msg = "Invalid Email";
    } else if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
        $email_msg = "Invalid email format";
        $email_error = true;
    }


    if (!isset($password)) {
        $password_error = true;
    } else if (strlen(trim($password)) < 6) {
        $password_error = true;
        $password_msg = "Invalid Password";
    }


    if (!isset($confirm_password)) {
        $password_error = true;
    } else if (strlen(trim($confirm_password)) < 6) {
        $password_error = true;
        $password_msg = "Invalid Confirm Password";
    }


    if ($confirm_password != $password) {
        $password_error = true;
        $password_msg = "Password Not matching";
    }

    if ($name_error || $email_error || $password_error || $confirm_password_error) {
        echo "$name_msg $email_msg $password_msg $confirm_email_msg ";
    } else {
        $url = "http://localhost/abdul-qadirdeveloper-NFTP_Batch2_php-master/index.php?token=\"SomeRandomKey\"";
        header("Location: $url");
    }
}

?>



<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 20px;">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form name="my-form" action="register.php" method="POST">
                            <div class="form-group row">
                                <label for="full_name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="full_name" class="form-control" name="full-name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" id="email_address" class="form-control" name="email-address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="confirm-password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="confirm-password" name="confirm-password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                            <div class="row justify-content-center" style="margin-top: 32px;">
                                <a href="login.php" class="link-info">Already have account? Login here</a>
                            </div>

                    </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    </div>

</main>

<?php
include_once '_include/foot.php';
?>