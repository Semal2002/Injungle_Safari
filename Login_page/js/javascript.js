var x = document.getElementById("login");
var y = document.getElementById("register");

function login() {
    x.style.left = "4px";
    y.style.right = "-520px";
    x.style.opacity = 1;
    y.style.opacity = 0;
}

function register() {
    x.style.left = "-510px";
    y.style.right = "5px";
    x.style.opacity = 0;
    y.style.opacity = 1;
}

function validateform() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmpassword").value;

    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }
    return true;
}


function openDialog() {
    document.getElementById("Dialog").style.display = "block";
}

function closeDialog() {
    document.getElementById("Dialog").style.display = "none";
}

function deleteAccount() {
    $.ajax({
        url: window.location.href,
        type: "POST",
        data: { deleteAccount: true },
        success: function (response) {
            if (response === "success") {
                closeDialog();
                window.location.href = "logout.php";
            } else {
                alert("Error1 deleting account");
            }
        },
        error: function () {
            alert("Error deleting account");
        }
    });
}