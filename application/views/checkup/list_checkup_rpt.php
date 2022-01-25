<table id="example" class="display" style="width:100%">
	<thead>
		<tr>
			<th> ID Checkup </th>
			<th> ID Dokter </th>
			<th> Nama Dokter </th>
			<th> ID Pasien </th>
			<th> Nama Pasien </th>
			<th> Tgl Checkup </th>
			<th> keluhan </th>
			<th> Diagnosa </th>
			<th> Harga </th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($checkup as $row){ ?>
			<tr>
				<td><?php echo $row->checkupId; ?></td>
				<td><?php echo $row->idDokter; ?></td>
				<td><?php echo $row->nadok; ?></td>
				<td><?php echo $row->idpasien; ?></td>
				<td><?php echo $row->namapasien; ?></td>
				<td><?php echo $row->tglCheckup; ?></td>
				<td><?php echo $row->keluhan; ?></td>
				<td><?php echo $row->diagnosa; ?></td>
				<td><?php echo number_format($row->harga); ?></td>
				</tr>
		<?php } ?>
		</tbody>
</table>

<script>
$(document).ready(function(){
	$('#example').Datatable();
});
</script>