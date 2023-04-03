<?php 

require  "../auth_db.php";

if(!isset($_SESSION['log_success'])){
    header("Location: ../auth_login.php");
}else if(isset($_GET['url']) && $_GET['url'] = "Setting"){
     
}else{
    header("location: setting_user.php?url=Setting");
}

$id = $_SESSION['user_id'];
$terbaru = "SELECT * FROM user WHERE id_user=$id";
$sqli = mysqli_query($auth_conn , $terbaru);
$user_profile = mysqli_fetch_assoc($sqli);



if(isset($_POST['update_profile'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    
    $query = "UPDATE `user` SET `username`='$username',`email`='$email',`bio`='$bio' WHERE `id_user`=".$_SESSION['user_id'];
    $sql = mysqli_query($auth_conn , $query);
    
    if($sql){
        header("Location: setting_user.php?url=Setting&send=true");
        
    } else {
        echo "<script>alert('Failed to update profile.');</script>";
    }
}
$bio_placeholder = is_array(isset($user_profile)) ? $user_profile : 'Tuliskan bio mu disini';
$email_placeholder = is_array(isset($user_profile)) ? $user_profile : 'Masukkan Email';
require "layout_header.php";
?>
  
  <div class="min-h-screen bg-white bg-opacity-75 flex items-center justify-center">
  <div class="w-11/12 md:w-8/12 lg:w-6/12 bg-white bg-opacity-90 rounded-lg shadow-lg overflow-hidden">
    <div class="w-full px-6 py-4">
      <h2 class="text-2xl font-semibold text-gray-800 mb-2">Edit Profile</h2>
      <?php if (isset($_GET['send']) && $_GET['send'] == "true"){ ?>
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Berhasil!</strong>
                    <span class="block sm:inline">Berhasil Update Profile. Refresh untuk melihat profile baru</span>
                </div>
                <br>
       <?php }?>
      <form method="POST" action="">
        <div class="grid grid-cols-2 gap-6">
          <div>
            <label class="block text-gray-700 font-bold mb-2" for="username">Username</label>
            <input name="username" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="username" type="text" value="<?= $user_profile['username'] ?>">
          </div>
          <div>
            <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
            <input name="email" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="email" type="email" value="<?= $user_profile['email'] ?>">
          </div>
        </div>
        <div class="mt-6">
          <label class="block text-gray-700 font-bold mb-2" for="bio">Bio</label>
          <textarea name="bio" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="bio" rows="3" placeholder='<?= $bio_placeholder ?>'></textarea>
        </div>
        <div class="mt-6">
          <button name="update_profile" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Save Changes
          </button>
        </div>
      </form>
    </div>
  </div>
</div>


   
<?php
    require "layout_footer.php";
?>
