 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
 <script src="assets/vendor/js/vendor.bundle.base.js"></script>
 
 
 <script src="assets/vendor/chart.js/Chart.min.js"></script>
 <script src="assets/vendor/jquery/jquery.slim.map.js"></script>
 
 
 <script src="assets/js/off-canvas.js"></script>
 <script src="assets/js/hoverable-collapse.js"></script>
 <script src="assets/js/misc.js"></script>
 
 
 
 <script src="assets/js/todolist.js"></script>
 <script src="assets/js/file-upload.js"></script>
 
 <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <script src="assets/js/jquery.cslider.js"></script>
 <script src="assets/js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
 <script src="assets/js/custom.js"></script>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'Farm Store'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

<script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>
</html>