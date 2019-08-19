<?php 

session_start();
require("../includes/mysql_connect.php");

$article = intval($_GET['id']);

$reviewer = intval($_GET['reviewer']);


echo $article."<br>";

echo $reviewer."<br>";



//Generar la constancia usar la de rol has article para concatenar bd's


$query = "SELECT * FROM article WHERE idarticle=$article";
$result1 = mysqli_query($dbc, $query) or die (mysqli_error($dbc));
$row_article = mysqli_fetch_assoc($result1);

$title = $row_article['title'];
$fechaOriginal = $row_article['uploadDate'];
//FECHA EN ESPECIAL 
$dia = date("d", strtotime($fechaOriginal));
$mes = date("m", strtotime($fechaOriginal));
$anio = date("Y", strtotime($fechaOriginal));


if ($mes == 1) {
 $mes = "enero";
}elseif ($mes == 2) {
  $mes = "febero";
}elseif ($mes == 3) {
  $mes = "marzo";
}elseif ($mes == 4) {
  $mes = "abril";
}elseif ($mes == 5) {
  $mes = "mayo";
}elseif ($mes == 6) {
  $mes = "junio";
}elseif ($mes == 7) {
  $mes = "julio";
}elseif ($mes == 8) {
  $mes = "agosto";
}elseif ($mes == 9) {
  $mes = "septiembre";
}elseif ($mes == 10) {
  $mes = "octubre";
}elseif ($mes == 11) {
  $mes = "noviembre";
}elseif ($mes == 12) {
  $mes = "diciembre";
}

$fecha = $dia." de ".$mes." del ".$anio;


if ($result1) {
	$query = "SELECT degree, name, lastName, familyName FROM rol WHERE idrol=$reviewer";
	$result2 = mysqli_query($dbc, $query) or die (mysqli_error($dbc));
	$row_reviewer = mysqli_fetch_assoc($result2);

	$fullname = $row_reviewer['degree']." ".$row_reviewer['name']." ".$row_reviewer['lastName']." ".$row_reviewer['familyName'];
	if ($result2) {
		echo "<p>El revisor si existe.</p>";
	
		//Formato PDF
		require("../fpdf/fpdf.php");
		ob_end_clean();
    	$pdf=new FPDF();

		$pdf->AddPage('L','Letter');
		$pdf->Image("../img/bg.png",0,17,0,0);

		$pdf->SetFont('Arial','B',18);
		$pdf->SetXY(10, 125);
		$pdf->Multicell(260,6,utf8_decode("Al: ".$fullname),0,"C",0,5);

		
		$pdf->SetFont('Arial','',16);
		$pdf->SetY($pdf->GetY()+3);
		$pdf->SetX(53);
        $pdf->Multicell(170,6,utf8_decode("Por estar como revisor en la plataforma de la revista digital de Fisica de la BUAP, el articulo a revisar es:"),0,"J",0,5);

        $pdf->SetY($pdf->GetY()+3);
		$pdf->SetX(53);
		$pdf->SetFont('Arial','B',16);
		$pdf->Multicell(170,6,utf8_decode($title),0,"C",0,5);

		$pdf->SetY($pdf->GetY()+1);
		$pdf->SetX(52);
		$pdf->SetFont('Arial','I',12);
		$pdf->Multicell(170,6,utf8_decode('"Pensar bien, para vivir mejor"'),0,"J",0,5);
		$pdf->SetX(52);
		$pdf->SetFont('Arial','',12);
		$pdf->Multicell(170,6,utf8_decode("H. Puebla de Z., a ".$fecha."."),0,"J",0,5);


		$pdf->Image("../img/firma.png",$pdf->GetX()+110,$pdf->GetY(),35,27);
		$pdf->SetFont('Arial','B',12);
		$pdf->SetY($pdf->GetY()+13);
		$pdf->SetX(56);
		$pdf->Multicell(170,6,utf8_decode("Director de Fisica"),0,"C",0,5);
		
		$pdf->Output();


	}

}else{


	echo '<script type="text/javascript">
		alert("Data error! Try again");
		window.location="index.php";
	</script>';

}


?>