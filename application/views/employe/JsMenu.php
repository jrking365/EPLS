<script type="text/javascript">
    $('document').ready(function () {
        $('#btn_generalList').click(function () {
            $('#show_element').load('<?= base_url() ?>Employes/listGenerale');
            event.preventDefault();
        });
        $('#typeList').on("change",function () {
            var value = $(this).val();
            $('#show_element').load('<?= base_url() ?>Employes/listByPosition/'+value);
            event.preventDefault();
        });




    });

    $(document).ready(function () {
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},
                {extend: 'print',
                    customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                    }
                }
            ]

        });

    });



    $("#region").on("change", function () {
        var value = $(this).val();
        $.ajax({
            url: "<?= base_url() ?>Employes/getVille",
            type: "post",
            data: {"value": value},
            success: function (data) {
                $("#ville").html(data);
            },
        });
    });

    $('#data_1 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });

    $('#data_2 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });

    /* $('body').on('submit','form'function(e){
     e.preventDefault();
     
     $.ajax({
     type:"POST"
     url:"<?= base_url() ?>Employes/addEmploye",
     data:$(this).serialize(),
     success:function(){alert('enregistrement reussi');},
     error: function(){alert('erreur');}
     });
     });*/



</script> 

<script type="text/javascript">
    $('document').ready(function () {
        $('#enregistrer').click(function () {
            event.preventDefault();

            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>Employes/addEmploye", ,
                        data: $('#form').serialize(),
                success: function () {
                    alert('enregistrement reussi');
                },
                error: function () {
                    alert('erreur');
                }
            });
        });
    });

</script>