<footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="https://adminlte.io">Injectech</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets2/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets2/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../assets2/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../assets2/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../assets2/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets2/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets2/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../assets2/plugins/moment/moment.min.js"></script>
<script src="../assets2/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets2/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../assets2/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets2/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets2/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets2/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets2/dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="../assets2/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets2/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets2/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets2/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets2/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets2/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets2/plugins/jszip/jszip.min.js"></script>
<script src="../assets2/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets2/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets2/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets2/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets2/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
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
</body>
</html>
