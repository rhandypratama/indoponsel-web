<?php require('template/header.php'); ?>
<?php require('template/top_bar.php'); ?>

<div class="container-fluid">
	<div class="row flex-xl-nowrap">
		<?php // require('template/left_menu_loker.php'); ?>
		<?php // require('template/right_menu.php'); ?>

		<main class="col-12 col-sm-6 col-md-6 col-xl-6 mx-auto d-block" role="main">
            <!-- <h2 class="mt-2">Daftar lowongan kerja dengan gaji tertinggi</h2> -->
            <h2 class="pt-4">Let's Connect</h2>
            <p>Ingin menghubungi kami, silahkan gunakan form di bawah ini</p>

            <div id="alert-contact"></div>
            <!-- <p> -->
            <form id="contactForm">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Name *</label>
                        <input type="text" id="name-contact" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email *</label>
                        <input type="email" id="email-contact" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Message *</label>
                    <textarea class="form-control" id="message-contact" rows="6"></textarea>
                </div>
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6LeMZXYUAAAAALucJSR1Hsvj8JEHSjr_MdNjnW1g"></div>
                </div>
                <div class="form-group">
                    <button type="button" id="btn-kirim-bantuan" class="btn btn-info">Kirim</button>
                </div>
            </form>
            <!-- </div> -->
        </main>
	</div>
</div>
<?php require('template/load_javascript.php'); ?>
<script type="text/javascript">
    $(function() {

        $('#btn-kirim-bantuan').click(function (e) {
            e.preventDefault();
        
            var nama = $('#name-contact').val();
            var email = $('#email-contact').val();
            var message = $('#message-contact').val();
            var captchaResponse = grecaptcha.getResponse();
            // console.log(captchaResponse);
            
            if ((!nama) || nama == '') {
                alert('Name wajib diisi');
                $('#name-contact').focus();
                return false;
            } else if ((!email) || email == '') {
                alert('Email wajib diisi');
                $('#email-contact').focus();
                return false;
            } else if ((!message) || message == '') {
                alert('Message wajib diisi');
                $('#message-contact').focus();
                return false;
            } 
            else if ((!captchaResponse) || captchaResponse === '') {
                alert('Pastikan anda bukan robot');
                return false;
            }

            var $this = $(this);
            var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading ...';
            if ($(this).html() !== loadingText) {
                $this.data('original-text', $(this).html());
                $this.html(loadingText);
            }

            $.ajax({
                url: BASE_URL + 'loker/siteVerify',
                type: 'POST',
                data: {
                    nama: nama,
                    email: email,
                    message: message,
                    response: captchaResponse,
                },
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.success == true) {
                        $('#alert-contact').html('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            '<strong>Selamat!</strong> '+response.message+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                            '<span aria-hidden="true">&times;</span></button></div>');
                    } else {
                        $('#alert-contact').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
                            '<strong>Error!</strong> '+response.message+
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
    });
</script>
<?php require('template/footer.php'); ?>
