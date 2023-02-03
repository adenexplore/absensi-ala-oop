<?php 

$rayon = $perintah->tampil('tbl_rayon');
$rombel = $perintah->tampil('tbl_rombel');
?>
<div class="modal fade" id="modalEditSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Siswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="formGroupExampleInput">NIS Siswa</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="NIS Siswa" name="nis" required value="<?= $siswaByNis['nis'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Nama Siswa</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Nama Siswa" name="nama" required value="<?= $siswaByNis['nama'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="jk1">JK Siswa</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="jk" required>
                                        <option selected value="<?= $siswaByNis['jk'] ?>"><?= $siswaByNis['jk'] == 'L' ? "Laki-laki" : 'Perempuan' ?></option>

                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Rayon Siswa</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="rayon" required>
                                        <option selected value="<?= $siswaByNis['id_rayon'] ?>"><?= $siswaByNis['rayon'] ?></option>
                                        <?php foreach ($rayon as $rayon) : ?>
                                            <option selected value="<?= $rayon[0] ?>"><?= $rayon[1] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Rombel Siswa</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="rombel" required>
                                        <option selected value="<?= $siswaByNis['id_rombel'] ?>"><?= $siswaByNis['rombel'] ?></option>
                                        <?php foreach ($rombel as $rombel) : ?>
                                            <option selected value="<?= $rombel[0] ?>"><?= $rombel[1] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Tgl Lahir Siswa</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select name="tgl" class="form-control" required>
                                                <option selected value="<?= $date[0] ?>"><?= $date[0] ?></option>
                                                <?php
                                                for ($tgl = 1; $tgl <= 31; $tgl++) {
                                                    if ($tgl <= 9) {
                                                ?>
                                                        <option value="<?php echo "0" . $tgl; ?>"><?php echo "0" . $tgl; ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $tgl; ?>"><?php echo $tgl; ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="bln" class="form-control" required>
                                            <option selected value="<?= $date[1] ?>"><?= $date[1] ?></option>
                                                <?php
                                                for ($bln = 1; $bln <= 12; $bln++) {
                                                    if ($bln <= 9) {
                                                ?>
                                                        <option value="<?php echo "0" . $bln; ?>"><?php echo "0" . $bln; ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $bln; ?>"><?php echo $bln; ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="thn" class="form-control" required>
                                            <option selected value="<?= $date[2] ?>"><?= $date[2] ?></option>
                                                <?php
                                                for ($thn = 1989; $thn <= 2021; $thn++) {
                                                ?>
                                                    <option value="<?php echo $thn; ?>"><?php echo $thn; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Foto Siswa</label>
                                        <img src="../foto/<?= $siswaByNis['foto'] ?>" alt="Foto Siswa" class="img-fluid">
                                    </div>

                                    <div class="custom-file mt-4">
                                        <input type="file" class="custom-file-input" id="customFile" name="foto" >
                                        <label class="custom-file-label" for="customFile">Foto Siswa</label>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name='updateSiswa' class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>