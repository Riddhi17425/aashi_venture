<script src="{{ asset('site-assets/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script src="{{ asset('site-assets/assets/bundles/apexcharts.bundle.js')}}"></script>
<script src="{{ asset('site-assets/assets/bundles/dataTables.bundle.js')}}"></script>
<script src="{{ asset('site-assets/js/template.js')}}"></script>
<script src="{{ asset('site-assets/js/page/index.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
    $(function() {
        if ($.fn.dataTable && $('#myDataTable').length) {
            $('#myDataTable')
                .addClass('nowrap')
                .dataTable({
                    responsive: {
                        details: false
                    },
                    columnDefs: [
                        { targets: '.dt-no-sort', orderable: false }
                    ]
                });
        }
    });
</script>
