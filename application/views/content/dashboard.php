
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
       <!-- Custom tabs (Charts with tabs)-->
       <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-th-large"></i>
                  Hallo, <?= ucfirst($session['nama']);?>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <p>Selamat datang di Sistem Informasi Kepegawaian.</p>
                </div>
              </div><!-- /.card-body -->
            </div>
        <div class="row">
          <div class="col-md-6">
            
            <!-- PIE CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Golongan I</h3>

                <div class="card-tools">
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="golongan1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- PIE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Golongan III</h3>

                <div class="card-tools">
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="golongan3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>

           


          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
            <!-- LINE CHART -->
            
            <!-- /.card -->
            <!-- PIE CHART -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Golongan II</h3>

                <div class="card-tools">
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="golongan2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- PIE CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Golongan IV</h3>

                <div class="card-tools">

                </div>
              </div>
              <div class="card-body">
                <canvas id="golongan4" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var dataGolongan1        = {
      labels: [
          'A', 
          'B',
          'C', 
          'D', 
      ],
      datasets: [
        {
          data: [700,500,400,600],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
        }
      ]
    }
  
    //-------------
    //- PIE CHART 1 -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#golongan1').get(0).getContext('2d')
    var pieData        = dataGolongan1;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })

    var dataGolongan2        = {
      labels: [
          'A', 
          'B',
          'C', 
          'D', 
      ],
      datasets: [
        {
          data: [700,500,400,600],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
        }
      ]
    }
  
    //-------------
    //- PIE CHART 2 -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#golongan2').get(0).getContext('2d')
    var pieData        = dataGolongan2;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })

    var dataGolongan3        = {
      labels: [
          'A', 
          'B',
          'C', 
          'D', 
      ],
      datasets: [
        {
          data: [700,500,400,600],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
        }
      ]
    }
  
    //-------------
    //- PIE CHART 3 -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#golongan3').get(0).getContext('2d')
    var pieData        = dataGolongan3;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })

    var dataGolongan4        = {
      labels: [
          'A', 
          'B',
          'C', 
          'D', 
          'E', 
      ],
      datasets: [
        {
          data: [700,500,400,600,300],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
        }
      ]
    }
  
        //-------------
    //- PIE CHART 4 -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#golongan4').get(0).getContext('2d')
    var pieData        = dataGolongan4;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })
  })
</script>
      
    