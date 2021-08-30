@extends('master')

@section('dashboard-title', 'Admin Dashboard')
@section('breadcrumb-title', 'Admin Dashboard')
@section('custom_css')
<style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-pink elevation-1"><i class="fas fa-project-diagram"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Project</span>
              <span class="info-box-number" id="totalProject">
                {{-- <small>%</small> --}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-yellow elevation-1"><i class="fas fa-boxes"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Product</span>
              <span class="info-box-number" id="totalProducts">
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-green elevation-1"><i class="fas fa-dolly"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sell</span>
              <span class="info-box-number" id="totalSells">
              
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-green elevation-1"><i class="fas fa-dolly"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Requisition</span>
              <span class="info-box-number" id="totalRequisitions">
              
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-pink elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">purchase RQN</span>
              <span class="info-box-number" id="totalRqnConfirmed">10
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-red elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"> Purchase Order</span>
              <span class="info-box-number" id="totalOrder">
                
                {{-- <small>%</small> --}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-cyan elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ledger Type</span>
              <span class="info-box-number" id="totalLedgerType">
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ledger Group</span>
              <span class="info-box-number" id="totalLedgerGroup">
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>

    <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-yellow elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ledger Name</span>
              <span class="info-box-number" id="totalLedgerName">
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-green elevation-1"><i class="fas fa-university"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bank Or Cash</span>
              <span class="info-box-number" id="totalBankOrCash">
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-orange elevation-1"><i class="fas fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">User</span>
              <span class="info-box-number" id="totalUser">
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-red elevation-1"><i class="fas fa-user-lock"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Role Manage</span>
              <span class="info-box-number">12</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-blue elevation-1"><i class="fas fa-receipt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Report</span>
              <span class="info-box-number">14</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
  
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">

            <!-- PIE CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="pieChart" style="height: 230px; min-height: 230px; display: block; width: 487px;" width="487" height="230" class="chartjs-render-monitor"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">

            <!-- STACKED BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Stacked Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="pieChart2" style="height: 230px; min-height: 230px; display: block; width: 487px;" width="487" height="230" class="chartjs-render-monitor"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
      
@endsection

@section('custom_js')
<script src="/assets/plugins/chart.js/Chart.min.js"></script>
<script>
 $.ajax({url: "{{url('/total/project')}}", success: function(result){
    $("#totalProject").html(result);
      //var total_q = parseInt(result);
      $.ajax({url: "{{url('/total/product')}}", success: function(result){
              $("#totalProducts").html(result);

          }});
      $.ajax({url: "{{url('/total/sell')}}", success: function(result){
            $("#totalSells").html(result);
        }});
      $.ajax({url: "{{url('/total/requisition')}}", success: function(result){
            $("#totalRequisitions").html(result);
      }});
      $.ajax({url: "{{url('/total/order')}}", success: function(result){
            $("#totalOrder").html(result);
      }});
      $.ajax({url: "{{url('/total/ledgerType')}}", success: function(result){
            $("#totalLedgerType").html(result);
      }});
      $.ajax({url: "{{url('/total/ledgerGroup')}}", success: function(result){
            $("#totalLedgerGroup").html(result);
      }});
      $.ajax({url: "{{url('/total/ledgerName')}}", success: function(result){
            $("#totalLedgerName").html(result);
      }});
      $.ajax({url: "{{url('/total/bankorcash')}}", success: function(result){
           $("#totalBankOrCash").html(result);
      }});
      $.ajax({url: "{{url('/total/user')}}", success: function(result){
           $("#totalUser").html(result);
      }});
    }});


    //Chart
    $.ajax({url: "{{url('/total/project')}}", success: function(result){
                $("#totalProject").html(result);
                var total_p = parseInt(result);
                $.ajax({url: "{{url('/total/sell')}}", success: function(result){
                        $("#totalSells").html(result);
                        var sell = parseInt(result);
                        //var unans = total_q - ans;
                        //$(".unAns").text(unans);
                $.ajax({url: "{{url('/total/product')}}", success: function(result){
                        $("#totalProducts").html(result);
                        var product = parseInt(result);

                $.ajax({url: "{{url('/total/bankorcash')}}", success: function(result){
                        $("#totalBankOrCash").html(result);
                        var bankOrCash = parseInt(result);

                $.ajax({url: "{{url('/total/requisition')}}", success: function(result){
                        $("#totalRequisitions").html(result);
                        var purchage = parseInt(result);

                $.ajax({url: "{{url('/total/order')}}", success: function(result){
                        $("#totalOrder").html(result);
                        var order = parseInt(result);

                        var ctx = document.getElementById("pieChart");
                        var data = {
                            datasets: [{
                                data: [total_p, sell, product, bankOrCash, purchage, order],
                                backgroundColor: [
                                    "#455C73",
                                    "#9B59B6",
                                    "#007bff",
                                    "#fd7e14",
                                    "#20c997",
                                    "#dc3545",
                                ],
                                label: 'QUestions project/Sell' // for legend
                            }],
                            labels: [
                                "Project",
                                "Sell",
                                "Product",
                                "BankOrCash",
                                "Purchage",
                                "Order",
                            ]
                        };

                        var pieChart = new Chart(ctx, {
                            data: data,
                            type: 'pie',

                        });

                      }});  

                      }});

                      }});

                      }});

                    }});
            }});


        $(function () {
            // Pie chart
            if ($('#pieChart').length ){

            }

        })

  //PicChart2
  $.ajax({url: "{{url('/total/ledgerType')}}", success: function(result){
                $("#totalLedgerType").html(result);
                var ledgerType = parseInt(result);
                $.ajax({url: "{{url('/total/ledgerGroup')}}", success: function(result){
                        $("#totalLedgerGroup").html(result);
                        var lGroup = parseInt(result);
                        //var unans = total_q - ans;
                        //$(".unAns").text(unans);
                $.ajax({url: "{{url('/total/ledgerName')}}", success: function(result){
                        $("#totalLedgerName").html(result);
                        var lName = parseInt(result);

                $.ajax({url: "{{url('/total/user')}}", success: function(result){
                        $("#totalUser").html(result);
                        var user = parseInt(result);

                        var ctx = document.getElementById("pieChart2");
                        var data = {
                            datasets: [{
                                data: [ledgerType, lGroup, lName, user],
                                backgroundColor: [
                                    "#20c997",
                                    "#007bff",
                                    "#28a745",
                                    "#fd7e14",
                                ],
                                label: 'QUestions project/Sell' // for legend
                            }],
                            labels: [
                                "Ledger Type",
                                "Ledger Group",
                                "Ledger Name",
                                "User",
                            ]
                        };

                        var pieChart2 = new Chart(ctx, {
                            data: data,
                            type: 'pie',

                        });

                      }});

                      }});

                    }});
            }});


        $(function () {
            // Pie chart
            if ($('#pieChart2').length ){

            }

        })
    
</script>
@endsection
