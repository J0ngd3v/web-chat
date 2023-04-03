<?php
    require "auth_db.php";
    require "layout_header.php";
    if(isset($_POST['reg_chat'])){
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $email = htmlspecialchars($_POST['email']);
        $query = "INSERT INTO `user`(`id_user`,`username`,`password`,`email`,`bio`) VALUE (NULL,'$username',md5('$password'),'$email', NULL)";
        $sql = mysqli_query($auth_conn , $query);
        if($sql > 0){
            header("location: auth_login.php?auth=register");
        }
    }

?>

<div class="bg-white w-full sm:w-96 max-w-md rounded-lg shadow-lg p-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-8">Register  account</h1>
    <form action="" method="POST" class="flex flex-col space-y-4">
      <div class="flex flex-col space-y-1">
        <label for="username" class="text-sm font-medium text-gray-700">Username</label>
        <input type="text" id="username" placeholder="Contoh : Rysnanto" name="username" class="border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 rounded-md shadow-sm px-4 py-2">
      </div>
      <div class="flex flex-col space-y-1">
        <label for="password" class="text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" placeholder="Contoh : 12345678" name="password" class="border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 rounded-md shadow-sm px-4 py-2">
      </div>
      <div class="flex flex-col space-y-1">
        <label for="email" class="text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" placeholder="Contoh : admin@rysnanto.eu.org" name="email" class="border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 rounded-md shadow-sm px-4 py-2">
      </div>
      <button type="submit" name="reg_chat" class="bg-indigo-500 text-white rounded-md py-2 font-medium transition duration-300 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Register</button>
    </form>
  </div>
  <a style="font-size:18px;" href="auth_login.php">Sudah punya akun? Login</a>

<?php require "layout_footer.php" ?>