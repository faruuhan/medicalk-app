 <form class="form-horizontal" method="POST" action="<?php echo site_url('pengguna/input') ?>">
 <input type="hidden" name="idaccount" class="form-control" id="idaccount" value="<?php echo $pengguna[0]->idaccount; ?>""> 
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="<?php echo $pengguna[0]->email; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="usr-typ">User Type:</label>
    <div class="col-sm-10">
      <select name="userType" class="form-control" id="userType" onChange>
      <?php 
        			$type = array('Admin','Dokter','Pasien');
        			
        			foreach($type as $t){
        				if($t == $pengguna[0]->userType )
        					echo "<option selected='selected' value='".$t."'>".$t."</option>";
        				else
        					echo "<option value='".$t."'>".$t."</option>";
        			}
    	?>
      </select>
    </div>
  </div>
  <div class="form-group" id="userAlias1">
    <label class="control-label col-sm-2" for="usr-typ">User Alias:</label>
    <div class="col-sm-10">
      <select name="userAlias1" class="form-control" id="user_alias1">
      <?php 
        foreach($list_dokter as $row){ ?>
              <option selected='selected' value="<?php echo $row->iddokter; ?>"><?php echo $row->iddokter; ?></option>
      <?php }?>
      </select>
    </div>
  </div>
  <div class="form-group" id="userAlias2">
    <label class="control-label col-sm-2" for="usr-typ">User Alias:</label>
    <div class="col-sm-10">
      <select name="userAlias2" class="form-control" id="user_alias2">
      <?php 
        foreach($list_pasien as $row){ ?>
              <option selected='selected' value="<?php echo $row->idpasien; ?>"><?php echo $row->idpasien; ?></option>
      <?php }?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="user-name">Nama Pengguna:</label>
    <div class="col-sm-10">
      <input type="text" name="namaPengguna" class="form-control" id="namaPengguna" placeholder="Enter User Name" value="<?php echo $pengguna[0]->namaPengguna; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-10">
      <input type="password" name="Password" class="form-control" id="pwd" placeholder="Enter password" value="<?php echo $pengguna[0]->Password; ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
  
<script>
   $('#userAlias1').hide();
   $('#userAlias2').hide();

   $('#userType').on('change', function() {
  //  alert( this.value ); // or $(this).val()
  if(this.value == "Dokter") {
    $('#userAlias1').show();
    $('#userAlias2').hide();
  } else if(this.value == "Pasien") {
    $('#userAlias1').hide();
    $('#userAlias2').show();
  } else {
    $('#userAlias1').hide();
    $('#userAlias2').hide();
  }
});
</script>
  
</form> 