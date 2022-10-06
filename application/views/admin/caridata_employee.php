<!-- Script untuk menampilkan data employee di form -->
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#inputnik').on('input', function() {

            var inputnik = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/get_employee') ?>",
                dataType: "JSON",
                data: {
                    inputnik: inputnik
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(nik, nama) {
                        $('[name="inputnama"]').val(data.inputnama);

                    });
                    $.each(data, function(nik, bagian) {
                        $('[name="inputdivisi"]').val(data.inputdivisi);

                    });
                    $.each(data, function(nik, jabatan) {
                        $('[name="position"]').val(data.position);

                    });

                }
            });
            return false;
        });

    });
</script>