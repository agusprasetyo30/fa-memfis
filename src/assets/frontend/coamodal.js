let CoaDatatables = {
    init: function () {
        $("#coa_datatables").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/coa/datatables/modal",
            columns: [
                {
                    data: 'code'
                },
                {
                    data: "name"
                },
                {
                    data: "Actions",
                    searchable: false,
                    orderable: false
                }
            ],
            columnDefs: [{
                targets: -1,
                orderable: !1,
                render: function (a, e, t, n) {
                    return '<a id="userow" class="btn btn-primary btn-sm m-btn--hover-brand select-coa" title="View" data-id="" data-uuid="' + t.uuid + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                }
            },

            ]
        })

        // $('<a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm refresh" style="margin-left: 60%; color: white;"><span><i class="la la-refresh"></i><span>Reload</span></span> </button>').appendTo('div.dataTables_filter');
        $('.paging_simple_numbers').addClass('pull-left');
        $('.dataTables_length').addClass('pull-right');
        $('.dataTables_info').addClass('pull-left');
        $('.dataTables_info').addClass('margin-info');
        $('.paging_simple_numbers').addClass('padding-datatable');

        $('.dataTables_filter').on('click', '.refresh', function () {
            $('#coa_datatables').DataTable().ajax.reload(null, false);

        });

        $('#coa_datatables').on('click', '.select-coa', function () {
            var code = $(this).data('uuid');
            var dataid = document.getElementById('hiderow').value;
            console.log(dataid);
            console.log(code);
            $.ajax({
                url: '/coa/data/' + code,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    
                    var idtest = "code"+dataid;
                    var nametest = "name"+dataid;
                    if(dataid == null || dataid == "" || dataid == undefined){
                        console.log(data);
                        document.getElementById('coa').value = data.code;
                        document.getElementById('coaid').value = data.id;
                        //console.log(document.getElementById('coaid').value);
                        document.getElementById('acd').value = data.name;
                        document.getElementById('hiderow').value = "";
                    } else {
                        console.log(dataid);
                        document.getElementById(idtest).value = data.code;
                        var coadynac = "id"+idtest;
                        document.getElementById(nametest).value = data.name;
                        document.getElementById(coadynac).value = data.id;
                        document.getElementById('hiderow').value = "";
                    }
                    
                    $('#coa_modal').modal('hide');
                }
            });
        });


    }
};

jQuery(document).ready(function () {
    CoaDatatables.init();
});
jQuery(document).on("click", ".open-AddRowDialog", function () {
    
    var myBookId = $(this).data('id');
    console.log(myBookId);
    document.getElementById('hiderow').value = myBookId;
    

    
    // As pointed out in comments, 
    // it is unnecessary to have to manually call the modal.
    // $('#addBookDialog').modal('show');
});
