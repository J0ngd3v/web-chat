<?php 
require_once "session_start.php";

if(!isset($_SESSION['log_success'])){
    header("Location: ../auth_login.php");
    exit;
}


?>

<?php require "layout_header.php"; ?>
  <div class="bg-gray-100 min-h-screen flex flex-col justify-end">
    <div class="bg-gray-100 h-screen flex flex-col">
        <div style="margin-top: 60px; margin-bottom: 58px" class="flex-1 py-4 px-6 flex flex-col-reverse sm:flex-row sm:justify-center overflow-y-auto">
            <div class="sm:w-1/2">
                <?php if (isset($_GET['auth']) && $_GET['auth'] == "succes") { ?>
                    <div class="bg-blue-100 border border-blue-400 text-white-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Failed!</strong>
                        <span class="block sm:inline"><?= $_GET['pesan'] ?></span>
                    </div>
                    <br>
                <?php } ?>
                <div class="flex flex-col space-y-2">
                    <?php require "ajax_tampil.php"; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="emoji  px-4 py-2 sm:px-6 fixed bottom-0 " style="z-index:999; margin-bottom:50px;">
        <div id="emoji-container"></div>
    </div>
    <form id="chat" class="bg-white px-4 py-2 sm:px-6 fixed bottom-0 w-full">
    <div class="flex justify-between">
      <input id="user_id_input" type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
      <input id="nama_user_input" type="hidden" name="nama_user" value="<?= $_SESSION['username'] ?>">
      <input  id="chat_input" class="border-2 border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" name="chat" type="text" placeholder="Write your message" autocomplete="off" required />
      <button type="button" id="emoji-button" style="font-size:25px">👋</button>
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg ml-2 focus:outline-none focus:shadow-outline">Send</button>
   </div>
    </form>
  </div>
<?php require "layout_footer.php";?>

