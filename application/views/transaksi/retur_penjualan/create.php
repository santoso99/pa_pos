<?php $this->load->view('_partials/head'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title"><?= $title ?></h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?= site_url('dashboard') ?>">
                                        <i class="mdi mdi-home-outline"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">Transaksi</li>
                                <li class="breadcrumb-item">Penjualan</li>
                                <li class="breadcrumb-item">Return Penjualan</li>
                                <li class="breadcrumb-item" aria-current="page">Create</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">

                    <?php if ($this->session->flashdata()) : ?>
                        <?php if ($this->session->flashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-ban"></i> Gagal !</h4>
                                <?= $this->session->flashdata('error') ?>
                            </div>
                        <?php endif ?>

                        <?php if ($this->session->flashdata('warning')) : ?>
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
                                <?= $this->session->flashdata('warning') ?>
                            </div>
                        <?php endif ?>

                        <?php if ($this->session->flashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                <h4><i class="icon fa fa-check"></i> Berhasil !</h4>
                                <?= $this->session->flashdata('success') ?>
                            </div>
                        <?php endif ?>
                    <?php endif ?>

                    <div class="box">
                        <!-- <div class="box-header with-border">
                            <h5>Form Retur Pembelian</h5>
                        </div> -->
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form method="POST" action="<?= site_url('retur/penjualan/store') ?>" class="form-horizontal form-element ">
                                <div class="box-body">

                                    <div class="form-group row">
                                        <label for="id_transaksi" class="col-sm-2 control-label">No Transaksi</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="id_transaksi" value="AUTO" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="tanggal" id="tanggal" value="CURRENT TIMESTAMP" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="id_pembelian" class="col-sm-2 control-label">Penjualan</label>
                                        <div class="col-sm-10">
                                            <select name="id_pembelian" id="id_pembelian" class="form-control" aria-placeholder="Pilih pembelian" required>
                                                <option value="">-</option>
                                                <?php foreach ($pembelian as $p) : ?>
                                                    <option value="<?= $p['id_transaksi'] ?>"><?= '(' . $p['id_transaksi'] . ') - ' . $p['keterangan'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="keterangan" class="col-sm-2 control-label">Catatan</label>

                                        <div class="col-sm-10">
                                            <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <table class="table table-sm" id="tbl_posts">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Produk</th>
                                                <th>HPP</th>
                                                <th>Harga Jual</th>
                                                <th>Penjualan</th>
                                                <th>Kuantitas</th>
                                                <th class="no-content"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_posts_body" class="contents">

                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-rounded btn-info pull-right mr-2 mb-2">Simpan</button>
                                    <a href="<?= site_url('retur/penjualan') ?>" class="btn btn-rounded btn-danger pull-right mr-2 mb-2">Batalkan</a>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>
<!-- /.content-wrapper -->

<div class="invisible">
    <table id="sample_table">
        <tr>
            <td class="text-center">
                <span class="sn"></span>
            </td>

            <td>
                <input type="text" name="nama[]" id="ukuran" class="form-control" readonly required>
            </td>
            <td>
                <input type="text" name="cogs[]" id="unit_price-" class="form-control form-calc unit_price" readonly required up-ke='0'>
            </td>
            <td>
                <input type="text" name="ready[]" id="unit_price-" class="form-control form-calc unit_price" readonly required up-ke='0'>
            </td>
            <td>
                <input type="number" name="qty[]" class="form-control form-calc qty" min="1" id="qty-" value="1" required>
            </td>

            <td class="text-center" style="vertical-align: middle;">
                <a href="#" class="text-danger  btn-icon delete-record" data-id="0">
                    Hapus
                </a>
            </td>
        </tr>
    </table>
</div>


<?php $this->load->view('transaksi/retur_penjualan/script'); ?>