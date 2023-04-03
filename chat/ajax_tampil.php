
<?php
require_once "session_start.php";
$db = mysqli_connect('localhost', 'root', '', 'jongchat');

$query = "SELECT * FROM chat"; 
$result = mysqli_query($db, $query);

?>

<?php foreach ($result as $datas) { ?>
								
    <?php if($datas['user_id'] == $_SESSION['user_id']){  ?>   
            <!-- chat saya -->
              <div class="bg-white rounded-lg shadow p-4 max-w-xs self-end flex items-start " >
                <div>
                  <p class="text-gray-600 text-sm"><?= $datas['chat']?></p>
                  <p class="text-gray-400 text-xs"><?= $datas['waktu']?></p>
                </div>
              </div>
              <!-- end chat saya -->
    <?php }else{ ?>
        <!-- chat lawan -->
        <div class="bg-white rounded-lg shadow p-4 max-w-xs self-start flex items-start " >
                <?php if($datas['user_id'] == 110305){ ?>
                  <img class="h-8 w-8 rounded-full mr-2" src="../img/rys.jpg" alt="Profile Picture">
                  <?php }else{?>
                    <img class="h-8 w-8 rounded-full mr-2" src="https://via.placeholder.com/50" alt="Profile Picture">
                  <?php }?>
                <div>
                  <?php if($datas['user_id'] == 110305){ ?>
                    <h1 style="display: inline-block; vertical-align: middle;"><?= $datas['nama_user']?></h1><img src="https://img.icons8.com/color/12/null/verified-account--v1.png" style="display: inline-block; vertical-align: middle;"/>
                  <?php }else{?>
                    <h1><?= $datas['nama_user']?></h1>
                  <?php }?>
                  <p class="text-gray-600 text-sm"><?= $datas['chat']?></p>
                  <p class="text-gray-400 text-xs"><?= $datas['waktu']?></p>
                </div>
              </div>
              <!-- end chat lawan -->  
    <?php } ?>                     
<?php } ?>

