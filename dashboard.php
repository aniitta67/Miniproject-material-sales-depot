<?php require('menu.php'); ?>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- ./wrapper -->
      <!-- jQuery -->
      <script src="../asset/jquery/jquery.min.js"></script>
      <script src="../asset/js/adminlte.js"></script>
      <script src="../asset/js/canvasjs.min.js"></script>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
   animationEnabled: true,
   theme: "light2", // "light1", "light2", "dark1", "dark2"
   title:{
      text: "Monthly Sales"
   },
   axisY: {
      title: "Income"
   },
   data: [{        
      type: "column",  
      showInLegend: true, 
      legendMarkerColor: "grey",
      legendText: "MMbbl = one million barrels",
      dataPoints: [      
         { y: 70000, label: "January" },
         { y: 80000,  label: "February" },
         { y: 90000,  label: "March" },
         { y: 85000,  label: "April" },
         { y: 95000,  label: "May" },
         { y: 100000, label: "June" },
         { y: 110000,  label: "July" },
         { y: 99000,  label: "August" },
         { y: 120000,  label: "September" },
         { y: 130000,  label: "October" },
         { y: 140000,  label: "November" },
         { y: 145000,  label: "December" }
      ]
   }]
});
chart.render();

}
</script>
   </body>
</html>