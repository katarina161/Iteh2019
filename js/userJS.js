$(document).ready(function() {
    $('#loginModal, #signupModal, #userProfile, #deleteModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
});

$(document).ready(function() {
  $("#login").click(function() {
    var username = $("#username").val();
    var password = $("#password").val();
    var empty = false;

    $("#username").click(function() {
      $("#usernameErr").text("");
    });
    $("#password").click(function() {
      $("#passwordErr").text("");
    });
    if (username == "") {
      $("#usernameErr").text("Please insert a username!");
      empty = true;
    }
    if (password == "") {
      $("#passwordErr").text("Please insert a password!");
      empty = true;
    }

    if (!empty) {
      $.ajax({
        url: "login.php",
        method: "POST",
        data: {
          login: 1,
          username: username,
          password: password
        },
        success: function(response) {
          console.log(response);
          $("#response").html(response);
        },
        dataType: "text"
      });
    }
  });
});

$(document).ready(function() {
    $("#drop").click(function() {
        $.ajax({
            url: 'headerChange.php',
            method: "GET",
            data: {
                id: 1
            },
            success: function(response) {
                $("#dropItems").html(response);
            }
        });
    });
});

// update
$(document).ready(function() {
  $("#btnSave").click(function() {
    var firstName = $("#firstName").val();
    var lastName = $("#lastName").val();
    var username = $("#usernameChange").val();
    var email = $("#email").val();
    var oldP = $("#oldPassword").val();
    var newP = $("#newPassword").val();
    var confirmP = $("#confirmPassword").val();
    var empty = false;

    $("#firstName").click(function() {
      $("#firstNameErr").text("");
    });
    $("#lastName").click(function() {
      $("#lastNameErr").text("");
    });
    $("#usernameChange").click(function() {
      $("#usernameChangeErr").text("");
    });
    $("#email").click(function() {
      $("#emailErr").text("");
    });
    $("#oldPassword").click(function() {
      $("#oldPErr").text("");
    });

    if(firstName == "") {
      $("#firstNameErr").text("Please insert your First Name!");
      empty = true;
    }
    if(lastName == "") {
      $("#lastNameErr").text("Please insert your Last Name!");
      empty = true;
    }
    if(username == "") {
      $("#usernameChangeErr").text("Please insert your Username!");
      empty = true;
    }
    if(email == "") {
      $("#emailErr").text("Please insert your Email Address!");
      empty = true;
    }
    if(oldP == "") {
      $("#oldPErr").text("Please insert your Password!");
      empty = true;
    }
    if(!empty) {
      $.ajax({
        url: "processUserProfile.php",
        method: "POST",
        data: {
          update: 1,
          firstName: firstName,
          lastName: lastName,
          username: username,
          email: email,
          oldP: oldP,
          newP: newP,
          confirmP: confirmP
        },
        dataType: "JSON",
        success: function(data) {
          $("#firstNameErr").text(data.firstErr);
          $("#lastNameErr").text(data.lastErr);
          $("#usernameChangeErr").text(data.usernameErr);
          $("#emailErr").text(data.emailErr);
          $("#passwordsErr").text(data.passwordsErr);
          $("#updateSuccess").html(data.success);
        }
      });
    }
  });
});

// signup
$(document).ready(function() {
  $("#btnSignup").click(function() {
    var firstName = $("#sufirstName").val();
    var lastName = $("#sulastName").val();
    var username = $("#suusername").val();
    var email = $("#suemail").val();
    var password = $("#supassword").val();
    var conPassword = $("#suconfirmPassword").val();
    var empty = false;

    $("#sufirstName").click(function() {
      $("#sufirstNameErr").text("");
    });
    $("#sulastName").click(function() {
      $("#sulastNameErr").text("");
    });
    $("#suusername").click(function() {
      $("#suusernameErr").text("");
    });
    $("#suemail").click(function() {
      $("#suemailErr").text("");
    });
    $("#supassword, #suconfirmPassword").click(function() {
      $("#suPasswordsErr").text("");
    });

    if(firstName == "") {
      $("#sufirstNameErr").text("Please insert your First Name!");
      empty = true;
    }
    if(lastName == "") {
      $("#sulastNameErr").text("Please insert your Last Name!");
      empty = true;
    }
    if(username == "") {
      $("#suusernameErr").text("Please insert your Username!");
      empty = true;
    }
    if(email == "") {
      $("#suemailErr").text("Please insert your Email Address!");
      empty = true;
    }
    if(password == "" || conPassword == "") {
      $("#suPasswordsErr").text("Please insert your Password!");
      empty = true;
    }
    if(document.getElementById('checkTerm').checked != true) {
      $("#termsErr").text("Please indicate that you accept the Terms of Use & Privacy Policy!");
      empty = true;
    }
    if(!empty) {
      $.ajax({
        url: "processUserProfile.php",
        method: "POST",
        data: {
          signup: 1,
          firstName: firstName,
          lastName: lastName,
          username: username,
          email: email,
          password: password,
          conPassword: conPassword
        },
        dataType: "JSON",
        success: function(data) {
          $("#sufirstNameErr").text(data.sufirstErr);
          $("#sulastNameErr").text(data.sulastErr);
          $("#suusernameErr").text(data.suusernameErr);
          $("#suemailErr").text(data.suemailErr);
          $("#suPasswordsErr").text(data.supasswordsErr);
          $("#signupSuccess").html(data.susuccess);
        }
      });
    }
  });
});

$(document).ready(function() {
  $("#btnDeleteCon").click(function() {
    var password = $("#passwordDelete").val();
    var conPassword = $("#conPasswordDelete").val();
    var empty = false;

    $("#passwordDelete, #conPasswordDelete").click(function() {
      $("#responseDelete").text("");
    });
    if(password == "" || conPassword == "") {
      $("#responseDelete").text("Please insert your Password!");
      empty = true;
    }
    if(!empty) {
      $.ajax({
        url: "deleteAccount.php",
        method: "POST",
        data: {
          delete: 1,
          password: password,
          conPassword: conPassword
        },
        dataType: "text",
        success: function(data) {
          $("#responseDelete").html(data);
        }
      });
    }
    
  });
});