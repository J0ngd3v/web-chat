const emojiButton = document.getElementById("emoji-button");
const emojiContainer = document.getElementById("emoji-container");
const messageInput = document.getElementById("chat_input");
let isPickerVisible = false;

emojiButton.addEventListener("click", () => {
  if (!isPickerVisible) {
    emojiContainer.innerHTML = "<emoji-picker></emoji-picker>";
    isPickerVisible = true;
  } else {
    emojiContainer.innerHTML = "";
    isPickerVisible = false;
  }
});

emojiContainer.addEventListener("emoji-click", (event) => {
  messageInput.value += event.detail.unicode;
});
