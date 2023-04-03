<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
 setTimeout(() => {
      document.getElementById('loading').remove();
}, 1000);

const emojiButton = document.getElementById('emoji-button');
const emojiContainer = document.getElementById('emoji-container');
const messageInput = document.getElementById('chat_input');
let isPickerVisible = false;

emojiButton.addEventListener('click', () => {
  if (!isPickerVisible) {
    emojiContainer.innerHTML = '<emoji-picker></emoji-picker>';
    isPickerVisible = true;
  } else {
    emojiContainer.innerHTML = '';
    isPickerVisible = false;
  }
});

emojiContainer.addEventListener('emoji-click', event => {
  messageInput.value += event.detail.unicode;
});


      $(document).ready(function() {
        setInterval(function() {
            $.ajax({
                url: "ajax_tampil.php",
                success: function(data) {
                    $(".flex.flex-col.space-y-2").html(data);
                }
            });
        }, 2000);

        $('#chat').submit(function(event) {
      event.preventDefault();
      var user_id = $('#user_id_input').val();
      var nama_user = $('#nama_user_input').val();
      var chat = $('#chat_input').val();

      $.ajax({
        url: "send_message.php",
        type: "POST",
        data: {
          user_id: user_id,
          nama_user: nama_user,
          chat: chat
        },
        success: function(data) {
          $('#chat_input').val('');
        }
      });
    });
  });
  setTimeout(function(){
    document.getElementById("content").classList.remove("hidden");
    document.querySelector(".fixed").classList.add("hidden");
  }, 2000);
</script>
<script defer src="menu.js"></script>
  </body>
</html>
