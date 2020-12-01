<!-- Vendor JS -->
<script src="<?= base_url() ?>assets/js/vendors.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/chat-popup.js"></script>
<script src="<?= base_url() ?>assets/icons/feather-icons/feather.min.js"></script>

<script src="<?= base_url() ?>assets/vendor_components/moment/min/moment.min.js"></script>

<script src="<?= base_url() ?>assets/vendor_components/datatable/datatables.min.js"></script>

<!-- EduAdmin App -->
<script src="<?= base_url() ?>assets/js/template.js"></script>
<script src="<?= base_url() ?>assets/js/currency.js"></script>
<script src="<?= base_url() ?>assets/js/pages/ecommerce_details.js"></script>

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
</body>

</html>
