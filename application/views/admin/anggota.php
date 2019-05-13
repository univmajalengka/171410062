<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-10">

            <?= form_error('nama', '<div class="alert 
            alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <?= form_error('tempat', '<div class="alert 
            alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <?= form_error('tanggal', '<div class="alert 
            alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <?= form_error('jenis', '<div class="alert 
            alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <?= form_error('prodi', '<div class="alert 
            alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahAnggotaModal">Tambah Buku</a>

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tempat lahir</th>
                        <th scope="col">Tanggal lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($anggota as $a) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $a['nama']; ?></td>
                            <td><?= $a['tempat_lahir']; ?></td>
                            <td><?= $a['tgl_lahir']; ?></td>
                            <td><?= $a['jk']; ?></td>
                            <td><?= $a['prodi']; ?></td>
                            <td><a href="" class="badge badge-success">edit</a></td>
                            <td><a href="" class="badge badge-danger">hapus</a></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="tambahAnggotaModal" tabindex="-1" role="dialog" aria-labelledby="tambahAnggotaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahAnggotaModalLabel">Tambah Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/anggota'); ?> " method="post">
                <div class="modal-body ">
                    <div class="form-group ">

                        <input type="text" class="form-control mb-3" id="nama" name="nama" placeholder="Nama lengkap">
                        <input type="text" class="form-control mb-3" id="tempat" name="tempat" placeholder="Tempat lahir">
                        <input type="date" class="form-control mb-3" id="tanggal" name="tanggal" placeholder="Tanggal lahir">
                        <select class="form-control mb-3" id="jenis" name="jenis" placeholder="Jenis Kelamin">
                            <option value="Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <input type="text" class="form-control mb-3" id="prodi" name="prodi" placeholder="Prodi">


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>