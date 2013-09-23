function validate(){
    var arr=new Array();
    arr[0]=document.forms['form']['title_en'].value;
    arr[1]=document.forms['form']['title_ua'].value;
    arr[2]=document.forms['form']['title_ru'].value;
    arr[3]=document.forms['form']['text_en'].value;
    arr[4]=document.forms['form']['text_ua'].value;
    arr[5]=document.forms['form']['text_ru'].value;
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