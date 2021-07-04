<!-- Vendor JS -->
<script src="<?= base_url() ?>assets/js/vendors.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/chat-popup.js"></script>
<script src="<?= base_url() ?>assets/icons/feather-icons/feather.min.js"></script>

<script src="<?= base_url() ?>assets/vendor_components/moment/min/moment.min.js"></script>

<script src="<?= base_url() ?>assets/vendor_components/datatable/datatables.min.js"></script>
<script src="<?= base_url() ?>assets/vendor_components/select2/dist/js/select2.full.js"></script>
<!-- EduAdmin App -->
<script src="<?= base_url() ?>assets/js/template.js"></script>
<script src="<?= base_url() ?>assets/js/currency.js"></script>
<script src="<?= base_url() ?>assets/js/pages/ecommerce_details.js"></script>
<script src="<?= base_url() ?>assets/js/pages/advanced-form-element.js"></script>
<script>
    $('#example1').DataTable();

    $(document).ready(function() {
        function format_number(x) {
            return new Intl.NumberFormat('de-DE').format(x)
        }
        $('#id_pembelian').on('change', function(e) {
            e.preventDefault()
            var id = $(this).val()

            console.log('change --find pembelian' + id)
            if (id == '') {
                alert('Pilih Pembelian Terlebih Dahulu')
            } else {
                $.ajax({
                    type: 'GET',
                    url: '<?= base_url('retur/pembelian/find/') ?>' + id,
                    dataType: 'JSON',
                    success: function(data) {
                        console.log(data)
                        var html = ''
                        var no = 1;
                        var dataId = 1;
                        var id = 1;

                        for (let i = 0; i < data.length; i++) {
                            html += `<tr id ="rec-` + id++ + `"> 
                                <td class="text-center">
                                    <span class="sn">` + no++ + `</span>
                                </td>
                               
                                <td>
                                    <input type="hidden" value="` + data[i].id_pembelian + `" name="id_pmb[]"  class="form-control" readonly required>
                                    <input type="hidden" value="` + data[i].id_warna + `" name="id_warna[]"  class="form-control" readonly required>

                                    <input type="text" value="` + data[i].nama_barang + " " + data[i].nama_warna + `" name="nama[]" id="ukuran" class="form-control" readonly required>
                                </td>
                                <td>
                                    <input type="text" name="cogs[]" value="` + format_number(data[i].cogs) + `" id="unit_price-" class="form-control form-calc unit_price" readonly required up-ke='0'>
                                </td>
                                <td>
                                    <input type="text" name="ready[]" value="` + data[i].ready + `" id="unit_price-" class="form-control form-calc unit_price" readonly required up-ke='0'>
                                </td>
                                <td>
                                    <input type="number" name="qty[]" class="form-control form-calc qty" min="1" max="` + data[i].ready + `" id="qty-" value="1" required>
                                </td>

                                <td class="text-center" style="vertical-align: middle;">
                                    <a href="#" class="text-danger  btn-icon delete-record" data-id="` + dataId++ + `">
                                        Hapus
                                    </a>
                                </td>

                            </tr>`
                        }
                        $('#tbl_posts_body').html(html)
                    }
                })
            }

        })

        $('#tbl_posts').on('change', '.form-calc', function(e) {
            e.preventDefault()

            var parent = $(this).closest("tr");

            var product = parent.find('.product_id').val()

            // var product = parent.find('.product_id').val()

            console.log(product)

            $.ajax({
                type: 'POST',
                url: '<?= base_url('transaksi/order/find_product') ?>',
                data: {
                    product_id: product
                },
                dataType: 'JSON',
                success: function(data) {

                    parent.find('.unit_price').val(format_number(data.sales_price))
                    var qty = parseInt(parent.find('.qty').val())

                    var jumlah = data.sales_price * qty
                    parent.find('.jumlah').val(format_number(jumlah))
                    // $('#jumlah-' + id).val(format_number(jumlah))

                }
            })
        })
    })
</script>






<!-- scritp dynamic form -->
<script type="text/javascript">
    jQuery(document).delegate('a.add-record', 'click', function(e) {
        e.preventDefault();
        var content = jQuery('#sample_table tr'),
            size = jQuery('#tbl_posts >tbody >tr').length + 1,
            element = null,
            element = content.clone();

        element.attr('id', 'rec-' + size);
        element.find('.delete-record').attr('data-id', size);
        element.appendTo('#tbl_posts_body');
        element.find('.sn').html(size);
        element.find('.select21').select2();
        $("input[data-type='currency']").on({
            keyup: function() {
                formatCurrency($(this));
            },
            blur: function() {
                formatCurrency($(this), "blur");
            }
        });
    });
</script>
<script>
    jQuery(document).delegate('a.delete-record', 'click', function(e) {
        e.preventDefault();
        // var didConfirm = confirm("Apakah Anda yakin untuk menghapus baris ?");

        var id = jQuery(this).attr('data-id');
        var targetDiv = jQuery(this).attr('targetDiv');
        jQuery('#rec-' + id).remove();

        //regnerate index number on table
        $('#tbl_posts_body tr').each(function(index) {
            //alert(index);
            $(this).find('span.sn').html(index + 1);
        });
        return true;
    });
</script>