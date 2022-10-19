<!-- Script untuk menampilkan data employee di form -->
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#nik_receiver').on('input', function() {

            var nik_receiver = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/get_receiver') ?>",
                dataType: "JSON",
                data: {
                    nik_receiver: nik_receiver
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(nik, nama) {
                        $('[name="nama_receiver"]').val(data.nama_receiver);

                    });
                    $.each(data, function(nik, jabatan) {
                        $('[name="division_receiver"]').val(data.division_receiver);

                    });
                    $.each(data, function(nik, bagian) {
                        $('[name="position_receiver"]').val(data.position_receiver);

                    });

                }
            });
            return false;
        });

    });
</script>