<?php 
$a='';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=settingSWCT.xls");
header("Pragma: no-cache");
header("Expires: 0");

$no = 1;
?>
<table>
 
	<thead>
		<tr>
			<td colspan="2"><B> note : </B></td>
			<td><img src="<?php echo base_url('');?>assets/img/bintang.png"> </td>
			<td colspan="4"> <B>tanda ini adalah item yang boleh di backup</B></td>
			
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="2"> CUSTOMER </td>
			<td colspan="3"> : <?php if (!empty($kop)) { echo $kop->customer; } ?> </td>
			<td colspan="3"></td>
			<td > TANGGAL </td>
			<td colspan="2"> : <?php if (!empty($kop)) { echo $kop->tanggal; } ?> </td>
		</tr>
		<tr>
			<td colspan="2"> CAR MODEL </td>
			<td colspan="2"> : <?php if (!empty($kop)) { echo $kop->carModel; } ?> </td>
			<td colspan="4"><B> <font size="5"> SETTING <?php if (!empty($kop)) { echo $kop->station; } ?></font></B></td>
			<td > NO. REV </td>
			<td > : <?php if (!empty($kop)) { echo $kop->noRev; } ?></td>
			
		<tr>
			<td colspan="2"> W/H TYPE </td>
			<td colspan="3"> : <?php if (!empty($kop)) { echo $kop->type; } ?></td>
		</tr>
	
	</tbody>

</table>
<table>
	<thead>
		<tr><B>
			<th rowspan="3" style="border: thin solid;" ><center>No</center></th>
			<th rowspan="3" style="border: thin solid;"><center>prosentase</center></th>
			<th rowspan="3" colspan="2" style="border: thin solid; width: 20px"><center>symbol</center></th>
			<th rowspan="3" width="500" style="border: thin solid;"><center>ELEMEN KERJA</center></th>
			<th rowspan="3" style="border: thin solid;"><center>CRITICAL POINT</center></th>
			<th rowspan="3" style="border: thin solid;"><center>RELATED OS</center></th>
			<th rowspan="3" style="border: thin solid;"><center>GRAFIK</center></th>
			<th colspan="3" rowspan="2" style="border: thin solid;"><center>Standart Waktu (Detik)</center></th>
			<th rowspan="2" colspan="<?php echo count($exportAssy);?>" style="border: thin solid;"><center>ASSY NO</center></th>	
		</B></tr>
		<tr></tr>
		<tr>
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
			<td style="border: thin solid;"><?php echo $no ?></td>
			<td style="border: thin solid;"></td>
			
				<?php if ($key->nvw=="1") {?>
				<td style="border-bottom: thin solid;"></td>
					<td style="text-align: center; border-bottom: thin solid"><img width="12" height="12px" src="<?php echo base_url('');?>assets/img/bunder.png"></td>
				<?php } ?>
				<?php if ($key->vw=="1") {?>
				<td style="border-bottom: thin solid;"></td>
					<td style="text-align: center; border-bottom: thin solid"><img width="12" height="12px" src="<?php echo base_url('');?>assets/img/belahketupat.png"></td>
				 <?php } ?>
				 <?php if ($key->langkah=="1") {?>
				 <td style="border-bottom: thin solid;"></td>
					<td style="text-align: center; border-bottom: thin solid"><img width="12" height="12px" src="<?php echo base_url('');?>assets/img/waru.png"></td>
				 <?php } ?>
			
			<td style="border: thin solid;"><?php echo $key->detail_update ?></td>
			<td style="border: thin solid;"><?php echo $key->critical ?></td>
			<td style="border: thin solid;"><?php echo $key->os ?></td>
			<td style="border: thin solid;"></td>
			<?php if ($key->vw=="1") {?> <td align="center" style="border: thin solid;"><?php echo $key->std ?></td> <?php } else {?>
            <td style="border: thin solid;"></td> <?php } ?>

            <?php if ($key->nvw=="1") {?> <td align="center" style="border: thin solid;"><?php echo $key->std ?></td><?php } else {?>
            <td style="border: thin solid;"></td> <?php }?>
            
            <?php if ($key->langkah=="1") {?> <td align="center" style="border: thin solid;"><?php echo $key->std ?></td><?php } else { ?>
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