<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo site_url('Welcome/FotoInsert'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul_foto" class="form-label">Judul Foto</label>
                            <input name="judul_foto" type="text" class="form-control" id="test">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_foto" class="form-label">Deskripsi Foto</label>
                            <textarea name="deskripsi_foto" id="deskripsi_foto" class="form-control" cols="30" rows="10"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_unggah" class="form-label">Tanggal Unggah</label>
                            <input type="date" class="form-control" id="tanggal_unggah" name="tanggal_unggah" required>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi_file" class="form-label"> Lokasi File</label>
                            <input type="file" class="form-control" id="lokasi_file" name="lokasi_file"
                                placeholder="Masukkan lokasi file">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <div id="pesan" class="alert" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Delete -->
    <!-- <div class="modal fade" id="deleteModal_<?= $foto->foto_id ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                    <form id="deleteForm" method="POST" action="<?php echo site_url('Welcome/FotoDelete'); ?>">
                        <input type="hidden" name="foto_id" id="foto_id_delete">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->


   <div class="container-fluid mt-4">
    <!-- Konten lainnya ... -->

    <!-- Grid untuk menampilkan data foto dalam card -->
    <div class="row">
    <?php foreach ($DataFoto as $foto): 
    $likeCount = $this->MSudi->hitung_like($foto->foto_id);?>
   <div class="col-md-4 mb-4">
    <div class="card">
        <img src="<?= base_url('uploads/'.$foto->lokasi_file) ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $foto->judul_foto; ?></h5>
            <p class="card-text"><?php echo $foto->deskripsi_foto; ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Tanggal Unggah: <?php echo $foto->tanggal_unggah; ?></li>
        </ul>
        <div class="card-body d-flex pb-0">
            <div class="d-flex mt-2 h-auto">
                <p class="mr-1 text-danger font-weight-bold"><?php echo $likeCount; ?></p>
                <!-- Tombol untuk like -->
                <a href="<?= site_url('Like/likeFoto/'.$foto->foto_id) ?>" class="card-link">❤️</a>
            </div>
            <form class="ml-3"
                   action="<?= site_url('Komentar/tambahKomentar/'.$foto->foto_id) ?>" method="post">
                        <div class="form-group">
                                <input type="text" class="form-control" id="komentar" name="komentar" placeholder="Komentar...">
                        </div>
                     </form>
                    </div>
                    <button class="btn btn-link ml-3" id="collapseButton" type="button" data-toggle="collapse" data-target="#komentarCollapse<?=$foto->foto_id?>" aria-expanded="false" aria-controls="komentarCollapse">
                        <i class="fas fa-chevron-down"></i>
                    </button>
        <div class="collapse" id="komentarCollapse<?=$foto->foto_id?>">
            <div class="px-3 pb-3" id="komentar">
                <?php 
                    // Ambil semua komentar berdasarkan foto_id
                    $komentar = $this->MSudi->getKomentarByFotoId($foto->foto_id); 
                    foreach ($komentar as $comment): 
                        // Ambil data user berdasarkan user_id
                        $user = $this->MSudi->GetDataWhere("user", "user_id", $comment->user_id);
                        // Periksa apakah ada data user
                        if ($user->num_rows() > 0) {
                            // Ambil nama user
                            $nama_user = $user->row()->username;
                        } else {
                            // Jika tidak ada data user, atur nama user menjadi "Unknown"
                            $nama_user = "Unknown";
                        }
                    ?>
                        <p style="margin:0;">
                            <?= $nama_user ?>: <?= $comment->isi_komentar ?>
                        </p>
                    <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


        <script>
            function checkEnter(event) {
                if (event.keyCode === 13) { // Tekan enter
                    submitForm(event);
                }
            }

            function submitForm(event) {
                event.preventDefault(); // Mencegah form dari submit default

                var form = event.target.closest('form');
                var komentar = form.querySelector('#komentar').value;

                if (komentar.trim() !== '') { // Memastikan komentar tidak kosong
                    form.submit();
                }
            }
        </script>


         

        <!-- Modal untuk mengkonfirmasi penghapusan data -->
        <div class="modal fade" id="deleteModal_<?php echo $foto->foto_id; ?>" tabindex="-1" role="dialog"
            aria-labelledby="deleteModalLabel_<?php echo $foto->foto_id; ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel_<?php echo $foto->foto_id; ?>">
                            Konfirmasi Penghapusan Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus foto ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <!-- Form untuk menghapus data -->
                        <form id="deleteForm" method="POST"
                            action="<?php echo site_url('Welcome/FotoDelete/' . $foto->foto_id); ?>">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

         <!-- Modal untuk update data foto -->
         <div class="modal fade" id="updateModal_<?php echo $foto->foto_id; ?>" tabindex="-1" role="dialog"
            aria-labelledby="updateModalLabel_<?php echo $foto->foto_id; ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel_<?php echo $foto->foto_id; ?>">
                            Update Data Foto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= site_url('Welcome/FotoUpdate/' . $foto->judul_foto) ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="judul_foto" class="form-label">Judul Foto</label>
                                <input name="judul_foto" type="text" class="form-control" value="<?php echo $foto->judul_foto; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi_foto" class="form-label">Deskripsi Foto</label>
                                <textarea name="deskripsi_foto" id="deskripsi_foto" class="form-control" cols="30" rows="10"
                                    required><?php echo $foto->deskripsi_foto; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_unggah" class="form-label">Tanggal Unggah</label>
                                <input type="date" class="form-control" id="tanggal_unggah" name="tanggal_unggah"
                                    value="<?php echo $foto->tanggal_unggah; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="lokasi_file" class="form-label">Lokasi File</label>
                                <input type="file" class="form-control" id="lokasi_file" name="lokasi_file"
                                    placeholder="Masukkan lokasi file">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
</div>