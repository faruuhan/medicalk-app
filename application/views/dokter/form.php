<!DOCTYPE html>
<html lang="en">
<body>
	<form class="form-horizontal" method="POST" enctype="multipart/form-data" bgcolor="navy" action="<?php echo site_url('dokter/submit') ?>">
		  <input type="hidden" value="<?php echo $dokter[0]->iddokter; ?>" name="iddokter">
		  <div class="form-group">
			<label class="control-label col-sm-4">Nama Dokter : </label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" value="<?php echo $dokter[0]->namadokter; ?>" placeholder="Nama Dokter" name="namadokter">
			</div>
		  </div>
		 
		  <div class="form-group">
			<label class="control-label col-sm-2">Telepon : </label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" value="<?php echo $dokter[0]->telepon; ?>" placeholder="Telepon" name="telepon">
			</div>
		  </div>
		 
		  <div class="form-group">
            <label class="control-label col-sm-2">Spesialis : </label>
            <div class="col-sm-10">
              <select name="spesialis" class="form-control">
        		<?php 
        			$spesial = array('Mata','Kandungan','Umum');
        			
        			foreach($spesial as $s){
        				if($s == $dokter[0]->spesialis )
        					echo "<option selected='selected' value='".$s."'>".$s."</option>";
        				else
        					echo "<option value='".$s."'>".$s."</option>";
        			}
        		?>
        	  </select>
            </div>
          </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="button" class="btn btn-danger">Batal</button>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		  </div>
	</form>
</body>
</html>