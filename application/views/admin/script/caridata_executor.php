<!-- Script untuk menampilkan data employee di form -->
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#nik').on('input', function() {

            var nik = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/get_executor') ?>",
                dataType: "JSON",
                data: {
                    nik: nik
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(nik, nama) {
                        $('[name="name"]').val(data.name);

                    });
                    $.each(data, function(nik, bagian) {
                        $('[name="position"]').val(data.position);

                    });
                    $.each(data, function(nik, jabatan) {
                        $('[name="division"]').val(data.division);

                    });

                }
            });
            return false;
        });

    });
</script>