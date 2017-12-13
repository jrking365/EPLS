<script>
    $(document).ready(function () {
        $.get('<?= base_url() ?>Teachers/searchEmp', function (data) {
            $(".typeahead_2").typeahead({source: data});
        }, 'json');
        
        $('#btn_generalList').click(function () {
            $('#show_element').load('<?= base_url() ?>Teachers/generalList');
            event.preventDefault();
        });
        $('#typeGrade').on("change",function () {
            var value = $(this).val();
            $('#show_element').load('<?= base_url() ?>Teachers/listByGrade/'+value);
            event.preventDefault();
        });
        $('#typeLevel').on("change",function () {
            var value = $(this).val();
            $('#show_element').load('<?= base_url() ?>Teachers/listByLevel/'+value);
            event.preventDefault();
        });

    });
</script>