<!DOCTYPE html>
<html>
  <title>&nbsp;</title>
  <head>
    <meta charset="UTF-8">
    <title>&nbsp;</title>
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/report_print.css') }}" />
    <style>
      @media print {
          #myPrntbtn {
              display :  none;
          }
      }
    </style>

  </head>
  <body>
     <input id ="myPrntbtn" type="button" value="Print" onclick="window.print();" >
    <div class="lik-uftcl-ptf-main-body">
      <div class="lik-uftcl-ptf-print-body">
        <form>
          <div class="lik-uftcl-pdf-header"></div>
          <div class="lik-uftcl-pdf-body">
            <div class="main-2" style="width: 798px!important; border-radius: 0px!important; padding: 0px!important;">
              <div class="body-top" >
                <p class="ptf-ln-3">
                  <span>{{$projectDetails[0]->name}} <br/>  Trading Account</span>
                  <span></span>
                  {{-- <img src="../images/logo/acf-pf.png" alt="acf" style="width: 200px;height: 100px;margin-left: auto;margin-right: auto;"> --}}
                  <span>From {{ $from_dat }} to {{ $to_dat }}</span>
                </p>
              </div>
              <?php $total_income = 0; $total_expen = 0;?>
              {{-- @if(count($data)) --}}
            <div style="width:900px">
              <div style="width:48%; float:right; margin:5px">
                    <table class="">
                      <thead>
                        <tr class="">
                          <th> Particulars (Head Wise Income) </th>
                          <th>TK</th>
                        </tr>
                      </thead>
                
                      <tbody>
                      @foreach ($income as $item)
                        <?php ($item->l_name == "Sales Commission" ? $total_income -= $item->amount : $total_income += $item->amount); ?>
                        
                        <tr>
                        <td> {{$item->l_name}} </td>
                        <td style="text-align:right;"> @if($item->l_name == "Sales Commission") ( {{$item->amount }} ) @else {{$item->amount }} @endif</td>
                        </tr>
                      @endforeach   
                      </tbody>
            
                    </table>
                 </div>
                 <div style="width:48%; float:left;margin:5px">
                    <table class="">
                      <thead>
                        <tr class="">
                          <th> Particulars (Head Wise Expenditure) </th>
                          <th>TK</th>
                        </tr>
                      </thead>

                      <tbody>
                      @foreach ($expen as $item)
                      <?php $total_expen += $item->amount; ?>
                        <tr>
                          <td> {{$item->l_name}} </td>
                          <td style="text-align:right;">{{$item->amount }}</td>
                        </tr>
                      @endforeach 
                        <tr>
                          <td> Gross Profit </td>
                          <td style="text-align:right;"><u><?php echo $total_income - $total_expen; ?></u></td>
                        </tr>  
                      </tbody>
                    </table>
                 </div>
              </div>
              
              <div style="width:48%;float:left;margin-left:15px">
                <p class="ptf-ln-3" style="width:66%; margin-top:10px!important;"><b>  Total</b></p>
                <p style=""><u><?php echo $total_income; ?></u>  </p>
              </div>
              <div style="width:48%;float:right;margin-right:15px">
                <p class="ptf-ln-3" style="width:66%; margin-top:10px!important;"><b>  Total</b></p>
                <p style="float:right;margin-right:30px"><u><?php echo $total_income; ?></u>  </p>
              </div>
            </div>
            {{-- @else
             <h3>There is no data found</h3>
             @endif --}}
        <!-- table section end -->
        <div class="body-mid" style="padding-top: 25px;">
          <p style="text-align: center;font-size: 12px;line-height: .5;">"Please report to us within 48 hours if this statement is incorrect. Otherwise this statement will be considered to be confirmed by you."</p>
          <hr style="border-top:.5px dotted;">
          <div class="body-mid-left">
            <span style="font-size: 12px;"><b>Print Date</b></span>
            <span style="font-size: 12px;">:</span>
            <span style="font-size: 12px;"><?php echo date('d-M-Y'); ?></span>
          </div>
          <div class="body-mid-right2">
            <span style="font-size: 12px;"><b>Page 1 of 1</b></span>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
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
</body>
</html>