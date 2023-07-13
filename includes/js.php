
<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<!-- jQuery UI -->
<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Chart JS -->
<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Sweet Alert -->
<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Atlantis JS -->
<script src="../assets/js/atlantis.min.js"></script>
<script src="../assets/js/html2canvas.js"></script>

<script>
	$(document).ready(function() {
		$(document).on('click', '.paydues', function(e) {
			e.preventDefault();

			var amount = 1080;
			var type = $(this).data('type');
			var email = $('.usermail').val();

			//alert(amount + ' ' + type + ' ' + email);

			function payWithPaystack(amount, type, email){

			    var handler = PaystackPop.setup({
			      key: 'pk_test_cad279c5049ebec698669f5d2d765aee8a95630b',
			      email: email,
			      amount: (amount) * 100,
			      currency: 'NGN',
			      ref: 'nacostpi-<?php echo uniqid(); ?>'+Math.floor((Math.random() * 1000000000) + 1),
			      callback: function(response){
			          alert('success. transaction ref is ' + response.reference);
			          window.location = `${type}_verify?reference=` + response.reference;
			      },
			      onClose: function(){
			      	window.location = "../student/make_payment?transaction=call";
			      	window.location = "../student/make_payment";
					alert('Transaction Cancelled');
			      }
			    });
			    handler.openIframe();
			}

			payWithPaystack(amount, type, email);

		});
	});
</script>
