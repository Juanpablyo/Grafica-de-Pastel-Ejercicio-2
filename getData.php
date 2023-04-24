<?php  
// MySQL database connection code
$connection = mysqli_connect("localhost","root","","panini") or die("Error " . mysqli_error($connection));
//Fetch Cómics data
$sql = "SELECT * FROM Cómics";
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
//create an array
$array = array();
$i = 0;
while($row = mysqli_fetch_assoc($result))
{  
    $Cómics = $row['Cómics'];
    $unidades_vendidas = $row['unidades_vendidas'];
    $array['cols'][] = array('type' => 'string'); 
    $array['rows'][] = array('c' => array( array('v'=> $Cómics), array('v'=>(int)$unidades_vendidas)) );
}
$data = json_encode($array);
echo $data;
?>