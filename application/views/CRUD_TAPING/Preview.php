<html>
<head>
  <title>IMPORT EXCEL CI 3</title>
</head>
<body>
  <h1>Data HENKATEN</h1><hr>
  <a href="<?php echo base_url("index.php/Taping_Henkaten/form"); ?>">Import Data</a><br><br>
  <table border="1" cellpadding="8">
  <tr>
    <th>No</th>
    <th>Ujung</th>
    <th>No Mat</th>
    <th>Mat Old</th>
    <th>Mat New</th>
    <th>Method Old</th>
    <th>Method New</th>
    <th>Critical</th>
    <th>Remarks</th>
  </tr>
  <?php
  if( ! empty($henkaten)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
    foreach($henkaten  as $data) { ?> // Lakukan looping pada variabel siswa dari controller
      <tr>  
        <td> <?php echo $data->no; ?></td>
        <td> <?php echo $data->ujung; ?></td>
        <td> <?php echo $data->no_mat; ?></td>
        <td> <?php echo $data->mat_old; ?></td>
        <td> <?php echo $data->mat_new; ?></td>
        <td> <?php echo $data->method_old; ?></td>
        <td> <?php echo $data->method_new; ?></td>
        <td> <?php echo $data->critical; ?></td>
        <td> <?php echo $data->remarks; ?></td>
      </tr>
      <?php }
  }else{ // Jika data tidak ada
    echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
  }
  ?>
  </table>
</body>
</html>