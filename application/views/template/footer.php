    <script type="text/javascript">
        $(function() {
            $('#exampleModalCenter').on('shown.bs.modal', function () {
                // $('#myInput').trigger('focus')
                $('.select-propinsi-modal').select2({
                    width: '100%',
                    placeholder: 'Semua Lokasi',
                    allowClear: true,
                });
                $('.select-spesialisasi-modal').select2({
                    width: '100%',
                    placeholder: 'Semua Spesialisasi',
                    allowClear: true,
                });
                $('.select-propinsi-modal').val(null).trigger('change');
                $('.select-spesialisasi-modal').val(null).trigger('change');
                $('.select2-search__field').css('width', '100%');
                $('#alert-subscribe').html('');
                $('#email-modal').val('');
            });
            
            $('#btn-subscribe').click(function (e) {
                e.preventDefault();
            
                var propinsi = $('#propinsi-modal').val();
			    var spesialisasi = $('#spesialisasi-modal').val();
                var email = $('#email-modal').val();

                var $this = $(this);
                var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading ...';
                if ($(this).html() !== loadingText) {
                    $this.data('original-text', $(this).html());
                    $this.html(loadingText);
                }
                
                $.ajax({
                    url: BASE_URL + 'loker/subscribe',
                    type: 'POST',
                    data: {
                        propinsi: propinsi,
                        spesialisasi: spesialisasi,
                        email: email,
                    },
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.success == true) {
                            $('#alert-subscribe').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><small>'+response.message+'</small>'+
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span></button></div>');
                        } else {
                            $('#alert-subscribe').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><small>'+response.message+'</small>'+
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span></button></div>');
                        }
                        $this.html($this.data('original-text'));
                    },
                    error: function (e) {
                        console.log('error', e);
                        $this.html($this.data('original-text'));
                    }

                });
            
            });
        })
    </script>
</body>
</html>
<!-- <footer>
    <div class="copyright-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <p class="copyright"> Copyright © 2018 indoponsel.</a> All rights reserved</p>
                </div>
                
            </div>
        </div>
    </div>
</footer> -->