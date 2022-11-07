<?php 
include_once(__DIR__.'/../vendor/autoload.php');
use App\Model\Pessoa;
use App\Persistence\ConnectionFactory;
use App\DTOS\SensorDTO;

$p = new Pessoa("Hughinho","123");
$p->nome = "Aldeumiro";

print  ($p->nome . " " . $p->tel . "<br>");


echo date("d-M-Y");
echo date("d-M-Y");
echo date("d-M-Y");


$connectionFactory = new ConnectionFactory();
$conn = $connectionFactory->getInstance();
var_dump($conn);

$sensorDTO11 = new SensorDTO(10,150);
$sensorDTO22 = new SensorDTO(20,170);

$connectionFactory = new ConnectionFactory();
$conn = $connectionFactory->getInstance();
var_dump($conn);

$sqlInsertSensorData = "insert into dadosbrutos (temperatura,umidade) values ";
$conn->exec($sqlInsertSensorData."(".$sensorDTO11->_temperatura.",".$sensorDTO11->_umidade.");");
$conn->exec($sqlInsertSensorData."(".$sensorDTO22->_temperatura.",".$sensorDTO22->_umidade.");");

$sqlSelectDadosBrutos = "select * from dadosbrutos";

$stmt = $conn->query($sqlSelectDadosBrutos);
$sensorDataArr = $stmt->fetchAll(\PDO::FETCH_ASSOC);

echo "<br></br>temperatura -- umidade <br></br>";

foreach($sensorDataArr as $sensorData){
    echo "<br></br>".$sensorData['temperatura']."  -- ".$sensorData['umidade'];
}
/*$sql = "insert into pessoas (nome, tel) values ('zezinho', '123')";
echo $sql;
$query = $conn->prepare($sql);
$query->execute();*/