<?php echo form_open('checkup/getdata',array('id'=>'report_checkup_list','target'=>'_blank')); ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Dokter</label>
        <div class="col-sm-10">
            <select name="idDokter" class="form-control">
                <option>All Dokter</option>
				<?php FOREACH($dokter as $row){ ?>
                <option VALUE="<?php echo $row->idDokter; ?>"><?php echo $row->
                idDokter."-".$row->nadok; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Pasien</label>
        <div class="col-sm-10">
            <select name="idDokter" class="form-control">
                <option>All Dokter</option>
				<?php FOREACH($pasien as $row){ ?>
                <option VALUE="<?php echo $row->idpasien; ?>"><?php echo $row->
                idpasien."-".$row->namapasien; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal</label>
        <div class="col-sm-10">
		<div class="col-sm-4">
            <input type="date" name="tglCheckUpStart" class="form-control">
        </div>s/d
		<div class="col-sm-4">
			<input type="date" name="tglCheckUpStart" class="form-control">
		</div>
		</div>
    </div>
	
	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Tanggal</label>
		<div class="col-sm-10">
			<button type="button" id="btn-proses" class="btn btn-primary"> Proses Data </button>
			<button type="submit" class="btn btn-info"> Print to Pdf </button>
		</div>
	</div>

<script>
$(document).ready(function(){
   
    $('#btn_proses').click(function(){
        $.ajax({
            url: '<?php echo site_url('checkup/getdata'); ?>',
            data:$('#report_checkup_list').serialize(),
            datatype:'html',
            type:'POST',
            beforeSend:function(res){
                $('#reportList').html('loading...');
            },
            success:function(res){
                $('#reportList').html(res);
            }
        });
    });
});
</script>