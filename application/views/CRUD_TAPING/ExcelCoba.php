<?php 
$a='';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=tapingSWCT.xls");
header("Pragma: no-cache");
header("Expires: 0");
// header("Content-type=appalication/vnd.ms-excel");
// header("content-disposition:attachment;filename=tapingSWCT.xls");
$no = 1;
?>
<!-- Styles -->
<style>
#chartdiv {
    width   : 100%;
    height  : 500px;
}                       
</style>
<?php
    $dataPoints = [];
    $lastindex = 0;
    foreach ($export as $key) {
        $data_inspection = array(
                    "name" => "",
                    "startTime" => $lastindex,
                    "endTime" => $key->t_grafik,
                    "color" => "#FF0F00"


        );
    
        // $index = /
      $lastindex = $key->t_grafik;

  array_push($dataPoints, $data_inspection);
  }
?>
<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/none.js"></script>

<script type="text/javascript">
    var chart = AmCharts.makeChart("chartdiv", {
    "theme": "none",
    "type": "serial",
    "dataProvider": <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>,
    "valueAxes": [{
        "axisAlpha": 0,
        "gridAlpha": 0.1
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<b>[[category]]</b><br>starts at [[startTime]]<br>ends at [[endTime]]",
        "colorField": "color",
        "fillAlphas": 0.8,
        "lineAlpha": 0,
        "openField": "startTime",
        "type": "column",
        "valueField": "endTime"
    }],
    "rotate": true,
    "columnWidth": 1,
    "categoryField": "name",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha": 0,
        "gridAlpha": 0.1,
        "position": "left"
    },
    "export": {
        "enabled": true
     }
});
</script>
</script>
<table> 
	<thead>
		<tr>
			<td width="1"></td>
			<td colspan="2"><font face="Calibri" size="4" color="black"> NOTE :</font></td>
			<td>
				<font face="Wingdings 2" size="4" color="black">ö</font>
			</td>
			<td colspan="2"><font face="Calibri" size="4" color="black"> tanda ini adalah item yang boleh di backup</font></td>
			
		</tr>
	</thead>
	<tbody>
		<tr>
			<td></td>
			<td colspan="3"> CUSTOMER </td>
			<td colspan="2"> : <?php if (!empty($kop)) { echo $kop->customer; } ?> </td>
			<td colspan="3"></td>
			<td > TANGGAL </td>
			<td colspan="2"> : <?php if (!empty($kop)) { echo date('d-m-Y', strtotime($kop->tanggal)); } ?> </td>
		</tr>
		<tr>
			<td></td>
			<td colspan="3"> CAR MODEL </td>
			<td colspan="2"> : <?php if (!empty($kop)) { echo $kop->carModel; } ?> </td>
			<td colspan="3" rowspan="3" align="center"><B> <font size="6" face="Arial Narrow"> TAPING- <?php if (!empty($kop)) { echo $kop->station; } ?></font></B></td>
			<td > NO. REV </td>
			<td > : <?php if (!empty($kop)) { echo $kop->noRev; } ?></td>
			
		<tr>
			<td></td>
			<td colspan="3"> W/H TYPE </td>
			<td colspan="3"> : <?php if (!empty($kop)) { echo $kop->type; } ?></td>
		</tr>
	
	</tbody>

</table>
<table>
	<thead>
		<tr><B>
			<th></th>
			<th rowspan="3" style="border: thin solid;" ><center>No</center></th>
			<th rowspan="3" style="border: thin solid;"><center>Prosentase</center></th>
			<th rowspan="3" style="border: thin solid; width: 20px"><center>Symbol</center></th>
			<th rowspan="3" width="500" style="border: thin solid;"><center>ELEMENT KERJA</center></th>
			<th rowspan="3" style="border: thin solid;"><center>CRITICAL POINT</center></th>
			<th rowspan="3" style="border: thin solid;"><center>RELATED OS</center></th>
			<th rowspan="3" style="border: thin solid;"><center>GRAFIK</center></th>
			<th colspan="3" rowspan="2" style="border: thin solid;"><center>Standart Waktu (Detik)</center></th>
			<th rowspan="2" colspan="<?php echo count($exportAssy);?>" style="border: thin solid;"><center>ASSY NO</center></th>	
		</B></tr>
		<tr></tr>
		<tr>
			<th></th>
			<th style="border: thin solid;"><center>value work</center></th>
			<th style="border: thin solid;"><center>Non value work</center></th>
			<th style="border: thin solid;"><center>Langkah</center></th>
			<?php foreach ($exportAssy as $key) { ?>
				<th style="border: thin solid;"><center><?php echo str_replace("SaI", "", $key->kode_assy);  ?></center></th>
			<?php } ?> 
		</tr>
	</thead>
		<tbody>
		<?php foreach ($export as $key) { ?>
		<tr>
			<td></td>
			<td style="border: thin solid;"><?php echo $no ?></td>
			<td style="border: thin solid;"></td>
			
				<?php if ($key->jenis=="Non Value Work") {?>
					<td style="text-align: center; border-bottom: thin solid">
						<font face="Symbol" size="2" color="red"> O </font>
					</td>
				<?php } ?>
				<?php if ($key->jenis=="Value Work") {?>
					<td style="text-align: center; border-bottom: thin solid">
						<font face="Symbol" size="2" color="blue">¨</font>
					</td>
				 <?php } ?>
				 <?php if ($key->jenis=="Langkah") {?>
					<td style="text-align: center; border-bottom: thin solid">
						<font face="Symbol" size="2" color="green"> § </font>
					</td>
				 <?php } ?>
			
			<td style="border: thin solid;"><?php echo $key->t_detail_update ?></td>
			<td style="border: thin solid;"><?php echo $key->t_critical ?></td>
			<td style="border: thin solid;"><?php echo $key->t_os ?></td>
			<td style="border: thin solid;">
	           <?php 
	           $putih =0;
	           	$putih = $key->t_grafik - $key->t_std;
                $merah = $key->t_std; 
                
                ?>
                <img src="<?php echo base_url('');?>assets/img/barputih.png" height="6" width="<?php echo $putih; ?>">
                <img src="<?php echo base_url('');?>assets/img/bar.png" height="6" width="<?php echo $merah; ?>">
        	</td>
			<?php if ($key->jenis=="Value Work") {?> <td align="center" style="border: thin solid;"><?php echo $key->t_std ?></td> <?php } else {?>
            <td style="border: thin solid;"></td> <?php } ?>

            <?php if ($key->jenis=="Non Value Work") {?> <td align="center" style="border: thin solid;"><?php echo $key->t_std ?></td><?php } else {?>
            <td style="border: thin solid;"></td> <?php }?>
            
            <?php if ($key->jenis=="Langkah") {?> <td align="center" style="border: thin solid;"><?php echo $key->t_std ?></td><?php } else { ?>
			<td style="border: thin solid;"></td> <?php }?>
				<?php foreach ($exportAssy as $key2) {
                    $a = $key2->kode_assy;?>
                        <?php if($key->$a!=0){ ?>
                            <td style="border: thin solid;"> <center><?php echo $key->$a ?></center></td>
                        <?php }else{?>
                            <td style="background: #ccc" style="border: thin solid;"><center><?php echo "x" ?></center> </td>
                     <?php }?>
                <?php } ?>
		</tr>
		<?php $no++; ?>
		<?php } ?>
	</tbody>
</table>