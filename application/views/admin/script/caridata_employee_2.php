<!-- Script untuk menampilkan data employee di form -->
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#inputNik').on('input', function() {

            var inputNik = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/get_employee_2') ?>",
                dataType: "JSON",
                data: {
                    inputNik: inputNik
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(nik, nama) {
                        $('[name="inputNama"]').val(data.inputNama);

                    });
                    $.each(data, function(nik, jabatan) {
                        $('[name="unit_division"]').val(data.unit_division);

                    });
                    $.each(data, function(nik, bagian) {
                        $('[name="position"]').val(data.position);

                    });

                }
            });
            return false;
        });

    });
</script>