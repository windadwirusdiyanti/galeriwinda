<?php 
if($this->session->flashdata('error') !='')
{
	echo '<div class="alert alert-danger" role="alert">';
	echo $this->session->flashdata('error');
	echo '</div>';
}
?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    min-height: 100vh;
    width: 100%;
    background: #e74a3b;
}

.container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 430px;
    width: 100%;
    background: #fff;
    border-radius: 7px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
}

.container .registration {
    display: none;
}

#check:checked~.registration {
    display: block;
}

#check:checked~.login {
    display: none;
}

#check {
    display: none;
}

.container .form {
    padding: 2rem;
}

.form header {
    font-size: 2rem;
    font-weight: 500;
    text-align: center;
    margin-bottom: 1.5rem;
}

.form input {
    height: 60px;
    width: 100%;
    padding: 0 15px;
    font-size: 17px;
    margin-bottom: 1.3rem;
    border: 1px solid #ddd;
    border-radius: 6px;
    outline: none;
}

.form input:focus {
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
}

.form a {
    font-size: 16px;
    color: #B784B7;
    text-decoration: none;
}

.form a:hover {
    text-decoration: underline;
}

.form input.button {
    color: #fff;
    background: #e74a3b;
    font-size: 1.2rem;
    font-weight: 500;
    letter-spacing: 1px;
    margin-top: 1.7rem;
    cursor: pointer;
    transition: 0.4s;
}

.form input.button:hover {
    background: #e74a3b;
}

.signup {
    font-size: 17px;
    text-align: center;
}

.signup label {
    color: #009579;
    cursor: pointer;
}

.signup label:hover {
    text-decoration: underline;
}
</style>
<!------ Include the above in your HEAD tag ---------->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login & Register Form</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <input type="checkbox" id="check">
        <div class="register form">
            <header>Register</header>
            <form action="<?= site_url('Register/proses') ?>" method="post">
                <input type="text" name="username" placeholder="Enter your username">
                <input type="text" name="Password" placeholder="Enter your Password">
                <input type="text" name="Email" placeholder="Enter your Email">
                <input type="text" name="nama_lengkap" placeholder="Enter your Nama Lengkap">
                <input type="text" name="Alamat" placeholder="Enter your Alamat">
                <input type="submit" class="button" value="Register">
            </form>
            <div class="signup">
            </div>
        </div>
        <!-- <div class="registration form">
            <header>registration</header>
            <form action="#">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="Password" class="form-control" name="Password" id="Password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" class="form-control" name="Email" id="Email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                        placeholder="nama_lengkap">
                </div>
                <div class="form-group">
                    <label for="Alamat">Alamat</label>
                    <input type="text" class="form-control" name="Alamat" id="Alamat" placeholder="Alamat">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div> -->
    </div>
    </div>
</body>

</html>