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
</script>
<script>
	$(document).ready(function() {
		var max_fields = 10; //maximum input boxes allowed
		var wrapper = $(".input_fields_wrap"); //Fields wrapper
		var add_button = $(".add_field_button"); //Add button ID

		var x = 1; //initlal text box count
		$(add_button).click(function(e) { //on add input button click
			e.preventDefault();
			if (x < max_fields) { //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div><input type="text" name="nama_warna[]" class="form-control" required/> <a href="#" class="remove_field">Hapus</a></div>'); //add input box
			}
		});

		$(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
			e.preventDefault();
			$(this).parent('div').remove();
			x--;
		})
	});
</script>
<script>
	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function() {
		'use strict';
		window.addEventListener('load', function() {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();
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
		var didConfirm = confirm("Apakah Anda yakin untuk menghapus baris ?");
		if (didConfirm == true) {
			var id = jQuery(this).attr('data-id');
			var targetDiv = jQuery(this).attr('targetDiv');
			jQuery('#rec-' + id).remove();

			//regnerate index number on table
			$('#tbl_posts_body tr').each(function(index) {
				//alert(index);
				$(this).find('span.sn').html(index + 1);
			});
			return true;
		} else {
			return false;
		}
	});
</script>

<script>
	$(document).ready(function() {
		$('#id_warna').change(function() {
			var id_warna = $('#id_warna').val();
			$.ajax({
				url: '<?= site_url('transaksi/penjualan/find_produk') ?>',
				type: 'POST',
				dataType: 'JSON',
				data: {
					id_warna: id_warna,
				},
				success: function(res) {
					var data = res.produk;
					var stok = res.stock;

					harga_jual = new Intl.NumberFormat('ja-JP').format(data.harga_satuan);
					harga_beli = new Intl.NumberFormat('ja-JP').format(data.harga_beli);
					$('#harga_jual').val('Rp ' + harga_jual);
					$('#stok').val(stok.ready_stock);
					if (stok.ready_stock <= 0) {
						$('#btn-item-sales').attr('disabled', 'disabled');
					}

				}
			});
		});
	});
</script>

</body>

</html>