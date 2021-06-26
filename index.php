<?php 	use Dompdf\Dompdf;
	$database = new mysqli("localhost", "root", "", "mydatabase");
$select = $database->query("SELECT * FROM mydompdf ORDER BY id DESC");
$TR ='<img src="NX.png">
	<h1>NEXAMPLE DOMPDF</h1>
';
	if($select->num_rows > 0){
	while($data = $select->fetch_assoc()){
		$name = $data['name'];
		$email = $data['email'];
		$mobile = $data['mobile'];
$TR .= '<tr>
	<td>'.$name.'</td>
	<td>'.$email.'</td>
	<td>'.$mobile.'</td>
</tr>';
}}
$HTML = '<Table>
<tr>
	<td>name</td>
	<td>email</td>
	<td>mobile</td>
</tr>'.$TR.'</Table>';
if(empty($_GET['download'])){
	$file = '';
	$Attachment = false;
}else{	$file = $_GET['download'];
	$Attachment = true;
}	require_once 'dompdf/autoload.inc.php';
	$dompdf = new Dompdf();
	$dompdf->loadHtml($HTML);
	$dompdf->setPaper('A4', 'portrate');
	$dompdf->render();
	$dompdf->stream($file, array("Attachment" => $Attachment));

?>