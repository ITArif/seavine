<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/report_print.css') }}" />
    <title>Trial Balance</title>
    <style>
      @media print {
          #myPrntbtn {
              display :  none;
          }
      }
    </style>
  </head>
  <body>
    <br>
       <input id ="myPrntbtn" type="button" value="Print" onclick="window.print();" >
      <br><br>
      <h3 class="text-center">{{$projectDetails[0]->name}}</h3>
      <h3 class="text-center">Trial Balance (Fund Flow Statement)</h3>
      <h3 class="text-center">From: {{ $from_dat }} To: {{ $to_dat }}</h3>
    <br><br>


<div class="card ml-5 mr-5">
    <div class="card-body">
      @if(count($trial_balance_details))
        <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">SL NO</th>
                <th scope="col">Particulars</th>
                <th scope="col">Debit</th>
                <th scope="col">Credit</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td> <b>1</b> </td>
                <td> <b>Cash In Hand</b> </td>
                <td style="text-align: center"> 
                    0
                </td>
                <td style="text-align: center">
                  @if (!empty($cash_in_hand_amount))
                  {{ number_format($cash_in_hand_amount) }}
                  @else
                    0
                  @endif
                </td>
              </tr>

              <tr>
                <td> <b>2</b> </td>
                <td> <b>Cash At Bank</b> </td>
                <td style="text-align: center"> 
                    0
                </td>
                <td style="text-align: center">
                  @if (!empty($cash_in_bank_amount))
                  {{ number_format($cash_in_bank_amount) }}
                  @else
                    0
                  @endif
                </td>
              </tr>

                @php $cr_sum = 0; $dr_sum = 0;  $i = 3; @endphp

                @foreach ($trial_balance_details as $item)
                 @php

                 if ($item->CR) {
                  $cr_sum+= $item->CR;
                 }
                 if ($item->DR) {
                  $dr_sum+= $item->DR;
                 }
                 @endphp
                <tr>
                    <th> {{ $i++ }}</th>
                    <td>{{ $item->ledger_name }}</td>
                    <td style="text-align: center">{{ number_format($item->DR) }}</td>
                    <td style="text-align: center">{{ number_format($item->CR) }}</td>
                  </tr>
                @endforeach

                @php
                  $total_cr_amount = $cr_sum + $cash_in_bank_amount + $cash_in_hand_amount;
                @endphp
                <tr>
                  <td> <b> @php echo $i++; @endphp </b> </td>
                  <td> <b>Cash In Hand</b> </td>
                  <td style="text-align: center"> 
                     {{ number_format($total_cr_amount - $dr_sum) }}
                  </td>
                  <td  style="text-align: center">
                      0
                  </td>
                </tr>

                <tr>
                    <td></td>
                    <td> <b> Total</b> </td>
                    <td style="text-align: center"> 
                        <b> {{ number_format($total_cr_amount - $dr_sum) }} </b>
                    </td>
                    <td style="text-align: center">
                        <b> {{ number_format($total_cr_amount - $dr_sum)}} </b>
                    </td>
                </tr>
    
            </tbody> 
          </table>
          @else
            <h3 class="text-center text-danger">There is no data found!</h3>
          @endif 
    </div>

</div>

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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>