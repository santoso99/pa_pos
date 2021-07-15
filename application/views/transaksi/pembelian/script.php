<script>
    $(document).ready(function() {
        function format_number(x) {
            return new Intl.NumberFormat('de-DE').format(x)
        }
        $('#tbl_posts').on('change', '.form-calc', function(e) {
            e.preventDefault()

            var parent = $(this).closest("tr");

            var product = parent.find('.id_warna').val()

            console.log(product)

            $.ajax({
                type: 'POST',
                url: '<?= base_url('transaksi/pembelian/find_produk') ?>',
                data: {
                    id_warna: product
                },
                dataType: 'JSON',
                success: function(data) {

                    parent.find('.cogs').val(format_number(data.harga_beli))
                    var qty = parseInt(parent.find('.qty').val())

                    var jumlah = data.harga_beli * qty
                    parent.find('.jumlah').val(format_number(jumlah))
                    // $('#jumlah-' + id).val(format_number(jumlah))

                }
            })
        });
    });
</script>