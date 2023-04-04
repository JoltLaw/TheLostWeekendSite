// Switch from login form to register form
$("#registerFormBtn").click(function () {
  $("#loginForm").hide();
  $("#registerForm").show();
});

// Switch from register form to log in form
$("#loginFormBtn").click(function () {
  $("#registerForm").hide();
  $("#loginForm").show();
});
