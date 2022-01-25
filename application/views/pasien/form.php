<html>
	<body>
		<form class="form-horizontal" method="POST" enctype="multipart/form-data" bgcolor="navy" action="<?php echo site_url('pasien/submit') ?>">
		  <input type="hidden" value="<?php echo $pasien[0]->idpasien; ?>" name="idpasien">
		  <div class="form-group">
			<label class="control-label col-sm-4">Nama Pasien : </label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" value="<?php echo $pasien[0]->namapasien; ?>" placeholder="Nama Pasien" name="namapasien">
			</div>
		  </div>
		 
		  <div class="form-group">
			<label class="control-label col-sm-2">Tgl Lahir : </label>
			<div class="col-sm-10">
			  <input type="date" class="form-control" value="<?php echo $pasien[0]->tgllahir; ?>" placeholder="Umur" name="tgllahir">
			</div>
		  </div>
		 
		  <div class="form-group">
			<label class="control-label col-sm-2">Alamat : </label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" value="<?php echo $pasien[0]->alamat; ?>" placeholder="Alamat" name="alamat">
			</div>
		  </div>
		 
		  <div class="form-group">
            <label class="control-label col-sm-2">Jenis Kelamin : </label>
            <div class="col-sm-10">
              <select name="gender" class="form-control">
        		<?php 
        			$gender = array('P','L');
        			
        			foreach($gender as $g){
        				if($g == $pasien[0]->gender )
        					echo "<option selected='selected' value='".$g."'>".$g."</option>";
        				else
        					echo "<option value='".$g."'>".$g."</option>";
        			}
        		?>
        	  </select>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-sm-2">Golongan Darah : </label>
            <div class="col-sm-10">
              <select name="golongan" class="form-control">
        		<?php 
        			$gol = array('AB','A','B','O');
        			
        			foreach($gol as $g){
        				if($g == $pasien[0]->golongan )
        					echo "<option selected='selected' value='".$g."'>".$g."</option>";
        				else
        					echo "<option value='".$g."'>".$g."</option>";
        			}
        		?>
        	  </select>
            </div>
          </div>
          
        	<br>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="button" class="btn btn-danger">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
		</form>
	</body>
</html>