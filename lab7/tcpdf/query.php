<body>
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
mysql_connect('localhost', 'root');
mysql_select_db('test');


$result = mysqli_query($conn, "SELECT type, AVG(rent) FROM propertyforrent GROUP BY type");  


 $records = array();

 while($row = mysql_fetch_assoc($result)){ 
    $records[] = $row;
  }

?>
<div class="row" style="height:300px;overflow:scroll;">
                        <table id="employees" class="table table-striped">
                <thead>         
                    <tr class="warning">
                        <th>Type</th>
                        <th>Rent</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($records as $rec):?>
                    <tr>
                        <td><?php echo $rec[0]?></td>
                        <td><?php echo $rec[1]?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                    </table>
</div>
<li><a href="#" onclick="$('#employees').tableExport({type:'json',escape:'false'});"> <img src="images/json.jpg" width="24px"> JSON</a></li>
                                <li><a href="#" onclick="$('#employees').tableExport({type:'json',escape:'false'});"><img src="images/json.jpg" width="24px">JSON (ignoreColumn)</a></li>

</body>