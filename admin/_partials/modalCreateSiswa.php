<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="formGroupExampleInput">NIS Siswa</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="NIS Siswa" name="nis" required>
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Nama Siswa</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Nama Siswa" name="nama" required>
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput2">JK Siswa</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="jk1" name="jk" class="custom-control-input" value="L">
                                        <label class="custom-control-label" for="jk1">Laki-laki</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="jk2" name="jk" class="custom-control-input" value="P">
                                        <label class="custom-control-label" for="jk2">Perempuan</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Rayon Siswa</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="rayon" required>
                                        <?php foreach ($rayon as $rayon) : ?>
                                            <option selected value="<?= $rayon[0] ?>"><?= $rayon[1] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Rombel Siswa</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="rombel" required>
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

                                    <div class="custom-file mt-4">
                                        <input type="file" class="custom-file-input" id="customFile" name="foto" required>
                                        <label class="custom-file-label" for="customFile">Foto Siswa</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name='tambahSiswa' class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>