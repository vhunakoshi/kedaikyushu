

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.4.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <!-- Datatables -->
    <script type="text/javascript" src="assets/js/datatables.min.js"></script>

    <!-- Aos -->
    <script type="text/javascript" src="assets/aos/aos.js"></script>

    <script>
        
        function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = (parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue));
            if (!isNaN(result)) {
               document.getElementById('txt3').value = result;
            }
        }

        function sumBeli() {
            var txtFirstNumberValue = document.getElementById('jumlah').value;
            var txtSecondNumberValue = document.getElementById('harga').value;
            var result = (parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue));
            if (!isNaN(result)) {
               document.getElementById('total').value = result;
            }
        }
    </script>
    <script>
    	$(document).ready( function () {
		    $('#tabel').DataTable();
		} );

        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        
        // AOS.init();
        $(document).ready(function() {
            $('.ubahOrder').on('click', function () {
                let id = $(this).data('id')
                let qty = $('#qty').val()
                let url = "<?= $_SERVER['HTTP_HOST']; ?>"

                fetch('http://'+url+'/kedaikyushu/dashboard/fungsi/ubahOrder.php?id='+id+'&qty='+qty, {
                    method: 'GET'
                }).then(resp => {
                    if(resp.status == 200) {
                        $("#modalKeranjang").modal('hide')
                       location.reload();
                    }
                }).catch(e => {
                    console.log('Connection Error', e)
                    $("#modalKeranjang").modal('hide')
                   location.reload();
                })
            })

            $('.diskon').on('keyup', function() {
                let hartot = $('.hartot').val();
                let diskon = $('.diskon').val();
                let diskonAkhir = hartot * diskon / 100;
                let anjay = hartot - diskonAkhir;
                $('.totbayar').val(anjay);
            })
            $('.uang').on('keyup', function() {
                let totbar = $('.totbayar').val();
                let uang = $('.uang').val();
                let kembalian = uang - totbar;
                $('.kembalian').val(kembalian);
                if (uang == 0) {
                    $('.kembalian').val('');
                }
            })
        })
    </script>
    <script>
</script>
  </body>
</html>