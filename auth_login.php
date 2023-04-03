<?php
require "auth_db.php";
require "layout_header.php";

// Check if the form is submitted
if(isset($_POST['log_chat'])) {
    
    // Validate the captcha
    if($_POST['captcha'] == $_SESSION['captcha']) {
        
        // Captcha is valid, do the login validation
        $username = htmlspecialchars($_POST['username']);
        $password = md5($_POST['password']);
        
        // Your login validation code goes here
            $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
            $sql = mysqli_query($auth_conn,$query);
            $data = mysqli_fetch_assoc($sql);
            $cek = mysqli_num_rows($sql);

            if($cek > 0){
                $_SESSION['log_success'] = true;
                $_SESSION['user_id'] = $data['id_user'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['bio'] = $data['bio'];
                header("location: chat/?url=home");
            }else{
                $_SESSION['log_failed'];
                $message = "Password atau Username Salah";
                header("location: ".$_SERVER['PHP_SELF']."?auth=failed&pesan=".$message);
            }
    } else {
        // Captcha is not valid, show an error message
        $message = "Captcha Salah!";
        header("location: ".$_SERVER['PHP_SELF']."?auth=failed&pesan=".$message);
    }
}

// Generate a random captcha and store it in session
$num1 = rand(1, 10);
$num2 = rand(1, 10);
$bot = $num1 + $num2;
$_SESSION['captcha'] = $bot;



?>

<div class="min-h-screen flex items-center justify-center">
        <div class="bg-white w-full sm:w-96 max-w-md rounded-lg shadow-lg p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-8">Login to your account</h1>

            <?php if (isset($_GET['auth']) && $_GET['auth'] == "failed"){ ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Failed!</strong>
                    <span class="block sm:inline"><?= $_GET['pesan'] ?></span>
                </div>
                <br>
            <?php }else if(isset($_GET['auth']) && $_GET['auth'] == "logout"){?>
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Berhasil Logout!</strong>
                    <span class="block sm:inline">Selamat Jalan....</span>
                </div>
                <br>
            <?php }else if(isset($_GET['auth']) && $_GET['auth'] == "register"){ ?>
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Behasil Mendaftar ,</strong>
                    <span class="block sm:inline">Login untuk chat</span>
                </div>
                <br>
            <?php }?>
            <form action="" method="POST" class="flex flex-col space-y-4">
                <div class="flex flex-col space-y-1">
                    <label for="username" class="text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" class="border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 rounded-md shadow-sm px-4 py-2">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 rounded-md shadow-sm px-4 py-2">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="captcha" class="text-sm font-medium text-gray-700">Berapa hasil <?= $num1 . '+' . $num2 ?></label>
                    <input type="text" id="captcha" name="captcha" class="border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 rounded-md shadow-sm px-4 py-2">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" name="log_chat" class="bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 text-white font-semibold rounded-lg shadow-md py-2 px-4">
                        Log in
                    </button>
                    <a href="auth_register.php" class="text-sm text-indigo-600 hover:text-indigo-700 font-medium">Belum Punya Akun? Daftar</a>
                </div>
            </form>
        </div>
    </div>


<?php require "layout_footer.php" ?>

