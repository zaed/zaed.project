function verifyForm(form) {
    var userName = form.name.value;
    var userEmail = form.email.value;
    var success = 1;
    if (!userName) {
        document.getElementById("usernameMsg").style.display = "block";
        form.name.style.backgroundColor = "yellow";
        form.name.style.border = "3px red solid";
        success = 0;
    }
    else {
        form.name.style.backgroundColor = "";
        form.name.style.border = "";
        document.getElementById("usernameMsg").style.display = "none";
    }
    if (!userEmail) {
        document.getElementById("emailMsg").style.display = "block";
        form.email.style.backgroundColor = "yellow";
        form.email.style.border = "3px red solid";
        success = 0;
    }
    else {
        form.email.style.backgroundColor = "";
        form.email.style.border = "";
        document.getElementById("emailMsg").style.display = "none";
    }
    if(!success) {
        alert("The form is incomplete.  Please read the error message(s).");
        return false;
    }
    else {
        alert("The form was submitted succesfully!");
        return true;
    }
}