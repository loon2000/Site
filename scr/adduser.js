function validate(){
    var arr=new Array();
    arr[0]=document.forms['form']['login'].value;
    arr[1]=document.forms['form']['pass'].value;
    arr[2]=document.forms['form']['r_pass'].value;
    arr[3]=document.forms['form']['email'].value;
    var n;
    for(var i=0; i<arr.length; i++) {
        n = 'name' + i;
        if (arr[i].length==0){
            document.getElementById(n).style.display = "inline";
            return false;
        }
        else document.getElementById(n).style.display = "none";
    }
    var r = /^[a-zA-Z0-9]+$/;
    if ((arr[0].length < 3) ||  (!r.test(form.arr[0].value))){
        document.getElementById('e_login').style.display = "inline";
        return false;
    }
    else document.getElementById("e_login").style.display = "none";
    if ((arr[1].length < 6) ||  (!r.test(form.arr[1].value)) || (arr[1].length > 16)) {
        document.getElementById("e_pass").style.display = "inline";
        return false;
    }
    else document.getElementById("e_pass").style.display = "none";
    if (arr[1] != arr[2]) {
        document.getElementById("e_r_pass").style.display = "inline";
        return false;
    }
    else document.getElementById("e_r_pass").style.display = "none";
    var r = /^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,6}$/;
    if (!r.test(form.arr[3].value)){
        document.getElementById("e_email").style.display = "inline";
        return false;
    }
    else document.getElementById("e_email").style.display = "none";
}
function checkl(login) {
    var r = /^[a-zA-Z0-9]+$/;
    if ((login.length < 3) ||  (!r.test(form.login.value))) document.getElementById("e_login").style.display = "inline";
    else document.getElementById("e_login").style.display = "none";
}
function checkp(pass) {
    var r = /^[a-zA-Z0-9]+$/;
    if ((pass.length < 6) ||  (!r.test(form.pass.value)) || (pass.length > 16)) document.getElementById("e_pass").style.display = "inline";
    else document.getElementById("e_pass").style.display = "none";
}
function checkrp() {
    var p = document.forms['form']['pass'].value;
    var r_p = document.forms['form']['r_pass'].value;
    if (p != r_p) document.getElementById("e_r_pass").style.display = "inline";
    else document.getElementById("e_r_pass").style.display = "none";
}
function checke(email) {
    var r = /^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,6}$/;
    if (!r.test(form.email.value)) document.getElementById("e_email").style.display = "inline";
    else document.getElementById("e_email").style.display = "none";
}
