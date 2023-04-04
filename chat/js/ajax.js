$(document).ready(function () {
  setInterval(function () {
    $.ajax({
      url: "ajax_tampil.php",
      success: function (data) {
        $(".flex.flex-col.space-y-2").html(data);
      },
    });
  }, 2000);

  $("#chat").submit(function (event) {
    event.preventDefault();
    var user_id = $("#user_id_input").val();
    var nama_user = $("#nama_user_input").val();
    var chat = $("#chat_input").val();

    $.ajax({
      url: "send_message.php",
      type: "POST",
      data: {
        user_id: user_id,
        nama_user: nama_user,
        chat: chat,
      },
      success: function (data) {
        $("#chat_input").val("");
      },
    });
  });
});
