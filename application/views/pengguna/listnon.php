<table class="table table-hover">
    <thead>
      <tr class="table-active">
        <th scope="col">#</th>
        <th scope="col">Email</th>
        <th scope="col">Username</th>
        <th scope="col">userType</th>
        <th scope="col">userAlias</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($list_user as $row){ ?>
      <tr>
        <th scope="row"><?php echo $no; ?></th>
        <td><?php echo $row->email; ?></td>
        <td><?php echo $row->namaPengguna; ?></td>
        <td><?php echo $row->userType; ?></td>
        <td><?php echo $row->userAlias; ?></td>
        <td><?php echo anchor("pengguna/active/".$row->idaccount,'<button type="button" class="btn btn-primary">Aktif</button>'); ?>
        
        <?php echo anchor("pengguna/delete/".$row->idaccount,'<button type="button" class="btn btn-danger">Delete</button>'); ?></td>
      </tr>
    </tbody>
    <?php $no++; }?>
  </table>