var otForm = document.getElementById("OT_FORM");
var otSwitch = document.getElementById("OT_SWITCH");

otSwitch.addEventListener("change", function () {
  // Update the label text and color based on the switch state
  var label = document.querySelector(".form-check-label");
  label.innerText = this.checked ? "Activated" : "Deactivated";
  label.style.color = this.checked ? "green" : "gray";

  // Set a hidden input field to send the checkbox state to the server
  var hiddenInput = document.createElement("input");
  hiddenInput.type = "hidden";
  hiddenInput.name = "SWITCH";
  hiddenInput.value = this.checked ? "on" : "";
  otForm.appendChild(hiddenInput);

  // Submit the form
  otForm.submit();
});
