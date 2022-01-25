<table class="table table-hover">
    <thead>
      <tr class="table-active">
        <th scope="col">#</th>
        <th scope="col">ID</th>
        <th scope="col">Nama</th>
        <th scope="col">Gender</th>
        <th scope="col">Alamat</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($list_pasien as $row){ ?>
      <tr>
        <th scope="row"><?php echo $no; ?></th>
        <td><?php echo $row->idpasien; ?></td>
        <td><?php echo $row->namapasien; ?></td>
        <td><?php echo $row->gender; ?></td>
        <td><?php echo $row->alamat; ?></td>
        <td><?php echo anchor("pasien/index/".$row->idpasien,'<button type="button" class="btn btn-primary">Edit</button>'); ?>
        
        <?php echo anchor("pasien/delete/".$row->idpasien,'<button type="button" class="btn btn-danger">Delete</button>'); ?></td>
      </tr>
    </tbody>
    <?php $no++; }?>
  </table>