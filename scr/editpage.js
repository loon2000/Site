function validate(){
    var arr=new Array();
    arr[0]=document.forms['form']['title_page'].value;
    arr[1]=document.forms['form']['text_page'].value;
    var n;
    for(var i=0; i<arr.length; i++) {
        n = 'name' + i;
        if (arr[i].length==0){
            document.getElementById(n).style.display = "inline";
            return false;
        }
        else document.getElementById(n).style.display = "none";
    }
}