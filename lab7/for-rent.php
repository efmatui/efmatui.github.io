<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Segment 11</title>
</head>
<body>

    <form method="post">
    <select name='choice' onchange="this.form.submit()"">
        <option value="Choose">Choose</option>
        <option value="FPDF">FPDF</option>
        <option value="TCPDF">TCPDF</option>
        <option value="JQuery">JQuery</option>
    </select>
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="tableExport.js"></script>
<script type="text/javascript" src="jquery.base64.js"></script>
<script type="text/javascript" src="html2canvas.js"></script>
<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="jspdf/jspdf.js"></script>
<script type="text/javascript" src="jspdf/libs/base64.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<?php
$servername = "localhost";
$username = "root"; 
$password = "ts0073592";
$dbname = "dreamhome";
$conn = new mysqli($servername, $username, $password, $dbname);

require("fpdf181/fpdf.php");
require("tcpdf/tcpdf.php");
$pdf = new FPDF();
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$header=array('Type','Rent');
$data=array();
function BasicTable($pdf,$header, $data)
        {   
            // Header
            foreach($header as $col)
                $pdf->Cell(40,7,$col,1);
            $pdf->Ln();
            // Data
            foreach($data as $row)
            {
                foreach($row as $col)
                    $pdf->Cell(40,6,$col,1);
                $pdf->Ln();
            }
        }
if(isset($_POST['choice'])){
    $selected_val = $_POST['choice'];
    if ($selected_val=="FPDF"){
        $result = mysqli_query($conn,"SELECT type, AVG(rent) FROM propertyforrent GROUP BY type");
        echo "<table border='1'>
        <tr>
        <th>type</th>
        <th>rent</th>
        </tr>";
        while ($row = mysqli_fetch_array($result)) {
            array_push($data,array($row[0],$row[1]));
            echo "<tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "</tr>";
        }
        print_r ($data);
        echo "</table>";
        mysqli_close($conn);
        BasicTable($pdf,$header, $data);
        ob_start();
        $pdf->Output();
    }
        else if ($selected_val=="TCPDF"){
            $output = '';  
            $result = mysqli_query($conn, "SELECT type, AVG(rent) FROM propertyforrent GROUP BY type");  
            while($row = mysqli_fetch_array($result))  
            { 
            $output .= '<tr>  
                          <td>'.$row[0].'</td>  
                          <td>'.$row[1].'</td>  
                     </tr>  
                          ';  
            }
            $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
            $obj_pdf->SetCreator(PDF_CREATOR);  
            $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
            $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
            $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
            $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
            $obj_pdf->SetDefaultMonospacedFont('helvetica');  
            $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
            $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
            $obj_pdf->setPrintHeader(false);  
            $obj_pdf->setPrintFooter(false);  
            $obj_pdf->SetAutoPageBreak(TRUE, 10);  
            $obj_pdf->SetFont('helvetica', '', 12);  
            $obj_pdf->AddPage();  
            $content = '';  
            $content .= '  
            <table border="1" cellspacing="0" cellpadding="5">  
            <tr>  
                <th width="30%">Type</th>  
                <th width="30%">Rent</th>  
           </tr>  
            ';  
            $content .= $output;  
            $content .= '</table>';  
            $obj_pdf->writeHTML($content);  
            ob_start();
            $obj_pdf->Output('sample.pdf', 'I');    
        }

        else if ($selected_val=="JQuery"){

            $result = mysqli_query($conn,"SELECT type, AVG(rent) FROM propertyforrent GROUP BY type");
            echo "<table id='query' border='1'>
            <thead><tr>
            <th>Type</th>
            <th>rent</th>
            </tr></thead>";
            while ($row = mysqli_fetch_array($result)) {
            array_push($data,array($row[0],$row[1]));
                echo "<tr>";
                 echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<script>$('#query').tableExport({type:'pdf',escape:'false'})</script>";
        }

    }
// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//} 

?>

</html>