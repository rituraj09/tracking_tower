  
</body>
<script> 
var isShift = false;
var seperator = "-";
function DateFormat(txt, keyCode) {
    if (keyCode == 16)
        isShift = true;
    //Validate that its Numeric
    if (((keyCode >= 48 && keyCode <= 57) || keyCode == 8 ||
         keyCode <= 37 || keyCode <= 39 ||
         (keyCode >= 96 && keyCode <= 105)) && isShift == false) {
        if ((txt.value.length == 2 || txt.value.length == 5) && keyCode != 8) {
            txt.value += seperator;
        }
        return true;
    }
    else {
        return false;
    }
}
function ValidateDate(txt, keyCode) { 
        var dateString = txt.value;
        if (keyCode == 16) {
            isShift = false;
        }
        var regex = /(((0|1)[0-9]|2[0-9]|3[0-1])\-(0[1-9]|1[0-2])\-((19|20)\d\d))$/;
 
        //Check whether valid dd/MM/yyyy Date Format.
        if (regex.test(dateString) || dateString.length == 0) {
          return true; 
        } else {
          txt.value = "";
            alert("Invalid Date");
            return false;
        }
    };  

    function numeric(txt, keyCode) {
    if (keyCode == 16)
        isShift = true;
    //Validate that its Numeric
    if (((keyCode >= 48 && keyCode <= 57) || keyCode == 8 ||
         keyCode <= 37 || keyCode <= 39 ||
         (keyCode >= 96 && keyCode <= 105)) && isShift == false) {
         
        return true;
    }
    else {
        return false;
    }
}
</script>
</html>