@extends('master')
@section('content')
@section('custom_css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<link rel="stylesheet" type="text/css" media="all" href="{{ URL::to('css/report_print.css') }}" />
@endsection
<style>
@media print {
    #myPrntbtn {
        display :  none;
    }
}
</style>

@section('breadcrumb-title', 'Daily Income Summary Sheet')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
            
                <div class="card-body">
                  <input id ="myPrntbtn" type="button" value="Print" onclick="window.print();" >
                  <h5 style="text-align:center">{{$projectDetails[0]->name}}<br/>Daily Income Summary Sheet</h5><p style="text-align:center">{{ $from_dat }} To {{ $to_dat }}</p>
                </div>
                <?php $total_income = 0; $total_expentiture_amount=0;?>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="text-align:center;">Serial No</th>
                      <th style="text-align:center;">Voucher No</th>
                      <th style="text-align:center;">Head Of Income</th>
                      <th style="text-align:center;">Cash</th>
                      <th style="text-align:center;">Bank</th>
                      <th style="text-align:center;">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $total_cash_ex = 0; $total_bank_ex = 0; ?>
                  @foreach ($income as $item)
                  <?php $total_income += $item->amount; 
                    $cash_amount = 0;
                    $bank_amount = 0;
                    if ($item->bank_name=="Cash") {
                      $cash_amount += $item->amount;
                    }

                    if ($item->bank_name!="Cash") {
                      $bank_amount += $item->amount;
                    }

                    if ($item->bank_name=="Cash") {
                      $total_cash_ex += $item->amount;
                    }

                    if ($item->bank_name!="Cash") {
                      $total_bank_ex += $item->amount;
                    }
                  ?>

                    <tr>
                      <td style="text-align:center;">{{ $loop->iteration }}</td>
                      <td style="text-align:center;">{{$item->v_no}}</td>
                      <td>{{$item->l_name}}</td>
                      <td style="text-align:right;">
                        @if($item->bank_name=="Cash")
                        {{  $item->amount }}
                        @else
                        0
                        @endif
                      </td> 
                      <td style="text-align:right;">
                        @if($item->bank_name!="Cash")
                        {{  $item->amount }}
                        @else
                        0
                        @endif
                      </td> 
                      <td style="text-align:right;">{{$cash_amount + $bank_amount}}</td>
                    </tr>
                  @endforeach
                    <tr>
                      <td></td>
                      <td></td>
                      <td style=" font-weight: bold;text-align:right;">Total Income Taka</td>
                      <td style="text-align:right;">{{ number_format($total_cash_ex,2) }}</td>
                      <td style="text-align:right;">{{ number_format($total_bank_ex,2) }}</td>
                      <td style=" font-weight: bold;text-align:right;">{{ number_format($total_income )}} /=</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="row" hidden>
                <div class="col-sm-4">
                    <div class="card-body">
                        <h5 style="font-size: 110%;" class="card-title">Prepared By</h5><hr style="float:left;margin-left:-90px;width:35%;margin-top:30px; color:blue;border-top: 1px dashed #8c8b8b;;"><br>
                        <p class="card-text">Executive <br/>Finance & Accounts</p>           
                    </div>    
                </div>
                <div class="col-sm-4">   
                    <div class="card-body">
                        <h5 style="font-size: 110%;" class="card-title">Checked By</h5><hr style="float:left;margin-left:-90px;width:35%;margin-top:30px; color:blue;border-top: 1px dashed #8c8b8b;;"><br>
                        <p class="card-text">General Manager <br/>Finance & Accounts</p>     
                    </div> 
                </div>
                <div class="col-sm-4">   
                    <div class="card-body">
                        <h5 style="font-size: 110%;" class="card-title">Approved By</h5><hr style="float:left;margin-left:-90px;width:35%;margin-top:30px; color:blue;border-top: 1px dashed #8c8b8b;;">
                        <p class="card-text">Chirman/Managing Director</p>
                    </div> 
                </div>
              </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('custom_js')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

 function printMyPage() {
        //Get the print button
        var printButton = document.getElementById("myPrntbtn");
        //Hide the print button 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Show back the print button on web page 
        printButton.style.visibility = 'visible';
    }
</script>

@endsection