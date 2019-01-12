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
		<?php 
			$time=0;
			foreach ($export as $key) { 
				$time=$time+$key->t_std;
			}
			$bagi = $time/4;
			//echo $bagi."=".$time.":4";
			//echo count($export);
			$persen=0;
		?>
		<?php $timeku=0; foreach ($export as $key) { 
			$timeku=$timeku+$key->t_std;
		?>
		<tr>
			<td></td>
			<td style="border: thin solid;"><?php echo $no ?></td>
			<td style="border: thin solid;" bgcolor="<?php 
				if($timeku<$bagi){
					echo "";
					$persen="25%";
				}
				if($timeku>$bagi && $timeku<(2*$bagi)){
					echo "green";
					$persen="50%";
				}
				if($timeku>(2*$bagi) && $timeku<(3*$bagi)){
					echo "yellow";
					$persen="75%";
				}
				if($timeku>(3*$bagi) && $timeku<=(4*$bagi)){
					echo "red";
					$persen = "100%";

				}
			?>"><?php echo $persen;?></td>
			
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
				if ($key->idt_hapus==1) {
					$merah = $key->t_std;
					?>
					<img src="<?php echo base_url('');?>assets/img/bar.png" height="10" width="<?php echo $merah; ?>">
					<?php
				}else{
					$merah = $key->t_std; 
	            	$putih = $key->t_grafik-$merah;
	            	?>
	            	<img src="<?php echo base_url('');?>assets/img/barputih.png" height="10" width="<?php echo $putih; ?>">
	            	<img src="<?php echo base_url('');?>assets/img/bar.png" height="10" width="<?php echo $merah; ?>">
				<?php 
			} 
	            ?>
	            
	            
	        
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
		<?php 
		} 
		?>
	</tbody>
</table>