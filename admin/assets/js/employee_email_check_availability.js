function userChecked() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "assets/includes/employee_email_check_availability.php",
    data: "email=" + $("#email").val(),
    type: "POST",
    success: function (data) {
      $("#available").html(data);
      $("#loaderIcon").hide();
    },
    error: function () {},
  });
}
