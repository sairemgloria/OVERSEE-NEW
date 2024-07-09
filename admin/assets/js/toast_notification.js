// Hide error message after 5 seconds
setTimeout(function () {
  document.getElementById("toastError").textContent = "";
  document.getElementById("toastError").style.display = "none";
}, 5000); // 5000 milliseconds = 5 seconds

// Hide success message after 5 seconds
setTimeout(function () {
  document.getElementById("toastSuccess").textContent = "";
  document.getElementById("toastSuccess").style.display = "none";
}, 5000); // 5000 milliseconds = 5 seconds
