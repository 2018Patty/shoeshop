document.addEventListener("DOMContentLoaded", function () {
  function checkpassword(password, re_password) {
    // alert(password);
    // alert(re_password);
    let check = false;
    if (password === re_password && password != "" && password != "") {
      check = true;
    }
    return check;
  }

  document.querySelector("#registration").onsubmit = (e) => {
    //e.preventDefault();
    var check = document.getElementsByTagName("input");
    //Textbox
    let name = document.querySelector("#name").value;
    let email = document.querySelector("#email").value;
    let password = document.querySelector("#password").value;
    let re_password = document.querySelector("#re_password").value;
    //alert(name + email + password + re_password);

    //RadioButton
    let gender;
    if (document.querySelector("#gender_female").checked) {
      gender = document.querySelector("#gender_female").value;
    } else if (document.querySelector("#gender_male").checked) {
      gender = document.querySelector("#gender_male").value;
    } else {
      gender = document.querySelector("#gender_other").value;
    }
    //alert(gender);

    //TextArea
    let address = document.querySelector("#address").value;
    //alert(address);
    //Dropdown listbox
    let province = document.querySelector("#province").value;
    //alert(province);
    //Checkbox
    let source_internet;
    let source_friend;
    let source_other;
    if (document.querySelector("#chanel_internet").checked) {
      source_internet = document.querySelector("#chanel_internet").value;
    }

    if (document.querySelector("#chanel_friend").checked) {
      source_friend = document.querySelector("#chanel_friend").value;
    }

    if (document.querySelector("#chanel_other").checked) {
      source_other = document.querySelector("#chanel_other").value;
    }

    // alert(source_internet);
    // alert(source_friend);
    // alert(source_other);

    let checked = checkpassword(password, re_password);

    if (!checked) {
      document.querySelector("#error").innerHTML =
        "***Please check password and re-password";
      alert("***Please check password and re-password");
      document.querySelector("#password").focus();
    } else {
      document.querySelector("#error").innerHTML = "";
      alert("Thanks for Registration");
    }

    //document.write("Goodbye");

    return checked;
    console.log(e);

    // //check undefined
    // if (typeof variable1 == "undefined") {
    //   // Works
    // }

    // if (variable1 === undefined) {
    //   // Throws an error
    // }
  };
});
