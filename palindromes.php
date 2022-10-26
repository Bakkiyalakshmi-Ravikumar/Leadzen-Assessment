<!DOCTYPE html>  
<html>  
<body>  
<?php  
$string=null;
if($_SERVER['REQUEST_METHOD']==='POST'){
    $string = $_POST['check'];  
    $flag = true;  

    //Converts the given string into lowercase  
    $string = strtolower($string);  
    
    //Iterate the string forward and backward, compare one character at a time   
    //till middle of the string is reached  
    for($i = 0; $i < strlen($string)/2; $i++){  
        if($string[$i] != $string[strlen($string)-$i-1]){  
            $flag = false;  
            break;  
        }  
    }  
    if($flag)  
        print("<script>alert('Given string is a palindrome'); </script>");  
    else  
        print("<script>alert('Given string is not a palindrome'); </script>");  
}
?>  
 <form name="f1"
          action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
          method="POST">
    <table>
        <tr>
            <td>Enter the String: </td>
            <td><input type="text" name="check" id="check"></td>
        </tr>
        <tr>
            <td><button>Check</button></td>
        </tr>
    </table>
</form>
</body>  
</html>  
