<?php
$Fullname = filter_var(trim($_POST['Fullname']),
FILTER_SANITIZE_STRING);
$EMAIL = filter_var(trim($_POST['EMAIL']),
FILTER_SANITIZE_STRING);
$School = filter_var(trim($_POST['School']),
FILTER_SANITIZE_STRING);
$Pnumber = filter_var(trim($_POST['Pnumber']),
FILTER_SANITIZE_STRING);
    if(isset($_POST['checkbox'])) {
        $checkboxValues = $_POST['checkbox'];
        if(isset($_POST['other']) && !empty($_POST['other'])){
            $checkboxValues[] = $_POST['other'];
        }
        $valuesString = implode(',', $checkboxValues);
        $savedValues = $valuesString;
    }
$host = "127.0.0.1";
$username = "root";
$password = "";
$bd = "dod";
$conn = mysqli_connect($host, $username, $password, $bd);
if(!$conn)
{
echo 'не удалось подключиться'.mysqli_error();
}
$sql = ("INSERT INTO `members` (`Fullname`, `EMAIL`, `School`, `Pnumber`,`checkbox`)
                  VALUES ('$Fullname', '$EMAIL', '$School', '$Pnumber', '$savedValues')");
if ($conn->query($sql) === TRUE)
{header("Location: end.html"); exit;}
else
{header("Location: error.html");exit;}
$conn ->close();
?>
