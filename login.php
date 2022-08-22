<?php
$username = $_POST['Username'];
$password = $_POST['password'];

$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    echo "connection failed";
    die('connection Failed : '.$conn->connect_error);
}else{
    echo "connection has been made";
    $stmt = $conn->prepare("insert into login(Username,Password) values(?,?)");
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();
    echo "<script>location.href='newpage.html'</script>";
    $stmt->close();         
    $conn->close();
}
?>