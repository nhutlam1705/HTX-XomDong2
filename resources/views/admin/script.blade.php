
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../../../../../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../../../../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../../../../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../../../../../dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../../../../../../../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../../../../../../../plugins/raphael/raphael.min.js"></script>
<script src="../../../../../../../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../../../../../../../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../../../../../../../plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../../../../../../../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../../../../../dist/js/pages/dashboard2.js"></script>

<!-- bs-custom-file-input -->
<script src="../../../../../../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>



<script src="../../../../../../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../../../../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../../../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../../../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../../../../../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../../../../../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../../../../../../plugins/jszip/jszip.min.js"></script>
<script src="../../../../../../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../../../../../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../../../../../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../../../../../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../../../../../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="../../../../../../../plugins/summernote/summernote-bs4.min.js"></script>

<script src="../../../../../../../plugins/codemirror/codemirror.js"></script>
<script src="../../../../../../../plugins/codemirror/mode/css/css.js"></script>
<script src="../../../../../../../plugins/codemirror/mode/xml/xml.js"></script>
<script src="../../../../../../../plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="../../../../js/app.js"></script>


<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    document.querySelector('form').onsubmit = function() {
        var content = document.querySelector('#editor');
        content.value = editor.getData();
    };
</script>

<script>
    function filterFunction(){
        var input, filter, dropdown, options, i;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        dropdown= document.getElementById("myDropdown");
        options = dropdown.getElementByTagName("a");
        for(i=0 ; i< options.length; i++){
            options[i].style.display
                options[i].innerText.toUpperCase().includes(filter) ? "block":"none";
        }
    }
</script>
<!-- Page specific script -->
<script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>
{{-- Hiển thị Ảnh  --}}
<script>
    function previewImage(inputElement, previewElement) {
        inputElement.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewElement.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Sử dụng hàm previewImage
    previewImage(document.getElementById('image'), document.getElementById('imagePreview'));
    previewImage(document.getElementById('image2'), document.getElementById('imagePreview2'));
    previewImage(document.getElementById('image3'), document.getElementById('imagePreview3'));
    previewImage(document.getElementById('image4'), document.getElementById('imagePreview4'));
    previewImage(document.getElementById('image5'), document.getElementById('imagePreview5'));
</script>


<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

    <script>
        $(function () {
        // Summernote
        $('#summernote').summernote()
    
        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
        })
    </script>