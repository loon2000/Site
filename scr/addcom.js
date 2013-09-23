function validate(){
    var arr=new Array();
    arr[0]=document.forms['form1']['text_com'].value;
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