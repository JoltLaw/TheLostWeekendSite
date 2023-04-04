var pdColor;
var pdSize;

$("#modal").click(function (e) {
  if (e.target == this) {
    $("#modal").hide();
  }
});

function orderSent() {
  changePage("/");
  $("#modal").show();
  $("#modal").append("<p class='confirmationBanner'>Order Sent!</p>");
  setTimeout(() => {
    $("#modal").hide();
  }, 1000);
}

//Change email rejistered to a users account in the database
function changeEmail(emailClass, id) {
  var emailValue = $("." + emailClass).val();

  $.post("includes/handlers/ajax/updateEmail.php", {
    email: emailValue,
    id: id,
  }).done(function (response) {
    $("." + emailClass)
      .nextAll(".message")
      .text(response);
  });
}

// Update the name saved to a users account in the database
function updateName(nameClass, emailValue) {
  var nameValue = $("." + nameClass).val();

  $.post("includes/handlers/ajax/updateName.php", {
    email: emailValue,
    name: nameValue,
  }).done(function (response) {
    $("." + nameClass)
      .nextAll(".message")
      .text(response);
  });
}

// Change the password saved to a users account in the database
function changePassword(
  oldPasswordClass,
  newPasswordClass1,
  newPasswordClass2,
  email
) {
  var oldPassword = $("." + oldPasswordClass).val();
  var newPassword1 = $("." + newPasswordClass1).val();
  var newPassword2 = $("." + newPasswordClass2).val();

  $.post("includes/handlers/ajax/updatePassword.php", {
    oldPassword: oldPassword,
    newPassword1: newPassword1,
    newPassword2: newPassword2,
    email: email,
  }).done(function (response) {
    $("." + oldPasswordClass)
      .nextAll(".message")
      .text(response);
  });
}

function deleteAccount(id) {
  var del = confirm("Delete Account");

  if (del) {
    $.post("includes/handlers/ajax/deleteAccount.php", {
      accountId: id,
    });
    logout();
  }
}

function placeOrder(name, items, id) {
  var items = JSON.stringify(items);
  var res = $.post("includes/handlers/ajax/placeOrder.php", {
    name: name,
    items: items,
    userId: id,
  }).done(function () {
    $("#bagCount").text(0);
    orderSent();
  });
}

// Change pages using an Ajax request
function changePage(url) {
  if (url.indexOf("?") == -1) {
    url = url + "?";
  }
  encodedUrl = encodeURI(url);
  $("#mainContent").load(encodedUrl);
  history.pushState(null, null, url);
  $("body").scrollTop(0);
}

// Open account Info in the account page
$("#accountInfoSpan").click(function () {
  if ($("#accountInfoSpan").text() == "Acount Information") {
    $("#accountInfoSpan").text("Close");
    $(".accountInfo").show();
  } else {
    $(".accountInfo").hide();
    $("#accountInfoSpan").text("Acount Information");
  }
});

$(".colorObject").click(function () {
  $(".colorObject").removeClass("selectedColor");
  $(this).addClass("selectedColor");
  pdColor = $(this).css("background-color");
});

$(".sizeList li").click(function () {
  $(".sizeList li").removeClass("selectedSize");
  $(this).addClass("selectedSize");
  pdSize = $(this).text();
});

// Add item to users bag
function addToBag(itemId, userId) {
  var res = $.post("includes/handlers/ajax/addToBag.php", {
    productId: itemId,
    accountId: userId,
    productColor: pdColor,
    productSize: pdSize,
  });

  var currentCount = $("#bagCount").text();
  currentCount++;
  $("#bagCount").text(currentCount);
}

function buyNow(product) {
  user = prompt("Please enter name");
  var item = [product, pdColor, pdSize];
  item = JSON.stringify(item);
  console.log(item);
  var res = $.post("includes/handlers/ajax/placeOrder.php", {
    name: user,
    items: item,
  }).done(orderSent());
}
// Remove an item from users bag
function removeFromBag(id, price) {
  $.post("includes/handlers/ajax/removeFromBag.php", {
    id: id,
  });

  var currentTotal = $("#total").text();
  currentTotal = (currentTotal - price).toFixed(2);
  $("#total").text(currentTotal);
  currentCount;
  $(`#${id}`).hide();
  var currentCount = $("#bagCount").text();
  currentCount--;
  $("#bagCount").text(currentCount);
}

// Log a user out
function logout() {
  $.post("includes/handlers/ajax/logout.php", function () {
    location.reload();
  });
}
