<?php
function alert($mensagem){ 
    echo "<script language=\"javascript\" type=\"text/javascript\">";
    echo "alert(\"$mensagem\");";
    echo "</script>";
}

function logado(){
    if(isset($_COOKIE['LOGADO']))
    {
        if($_COOKIE['LOGADO'] == '1')
        {
            return true; 
        }
    }
    return false;
}


?>