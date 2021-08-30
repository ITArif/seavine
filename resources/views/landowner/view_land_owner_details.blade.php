
@extends('master')

@section('breadcrumb-title', 'Landowner Details information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">Landowner Details information</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <table id="all-landowner" class="table table-bordered">
            <h4 style="text-align: center;  border: 1px solid #808080; height:50px; padding-top:10px;" >General information</h4>
            <br>
            <tbody>
                <tr>
                    <th style="width: 150px">Name</th>
                    <td>{{ $landowner_details[0]->name }}</td>
                </tr>
                <tr>
                    <th style="width: 150px">Father Name</th>
                    <td>{{ $landowner_details[0]->father_name }}</td>
                </tr>
                <tr>
                    <th style="width: 150px">Mother Name</th>
                    <td>{{ $landowner_details[0]->mother_name }}</td>
                </tr>
                <tr>
                    <th style="width: 150px">Address</th>
                    <td> <b>Permanent Address:</b> {{ $landowner_details[0]->permanent_address }} <br> <b>Present Address:</b> {{ $landowner_details[0]->present_address }}</td>
                </tr>
                <tr>
                    <th style="width: 150px">NID</th>
                    <td>{{ $landowner_details[0]->nid_no }}</td>                
                </tr>
                <tr>
                    <th style="width: 150px">Mobile</th>
                    <td>{{ $landowner_details[0]->mobile }}</td>                
                </tr>
                <tr>
                    <th style="width: 150px">Email</th>
                    <td>{{ $landowner_details[0]->email }}</td>                
                </tr>
            </tbody>
          </table>
          <br>

          <table id="all-landowner" class="table table-bordered">
            {{-- <div class="card-header card-success card-outline">
                <h4 class="card-title text-center">General information</h4>
            </div> --}}
            <h4 style="text-align: center;  border: 1px solid #808080; height:50px; padding-top:10px;" >Others information</h4>
            <br>
            <tbody>
                <tr>
                    <th style="width: 200px">Mouza</th>
                    <td>{{ $landowner_details[0]->mouza }}</td>
                </tr>
                <tr>
                    <th style="width: 200px">PS</th>
                    <td>{{ $landowner_details[0]->ps }}</td>
                </tr>
                <tr>
                    <th style="width: 200px">Media Man</th>
                    <td>{{ $landowner_details[0]->media_man }}</td>
                </tr>
                <tr>
                    <th style="width: 200px">Investigation Person</th>
                    <td>{{ $landowner_details[0]->investigation_person }}</td>
                </tr>
                <tr>
                    <th style="width: 200px">District</th>
                    <td>{{ $landowner_details[0]->district }} </td>
                </tr>
                <tr>
                    <th style="width: 200px">Deed Number</th>
                    <td>{{ $landowner_details[0]->deed_number }}</td>                
                </tr>
                <tr>
                    <th style="width: 200px">Document</th>
                    <td>
                    <a style="width: 200px; display: block;" href="{{asset('/uploads/landowners/'.$landowner_details[0]->upload_file) }}">View Document</a></td>                
                </tr>
            </tbody>
          </table>
          <br>

      <table id="all-landowner" class="table table-bordered table-striped">
            {{-- <div class="card-header" style="text-align: center"> --}}
                <h4 style="text-align: center;  border: 1px solid #808080; height:50px; padding-top:10px;" >Land Schedule</h4>
            {{-- </div> --}}
            <br>
        <thead>
            <tr>
              <th colspan="3" class="text-center">Khatian</th>
              <th colspan="2" class="text-center">Dag</th>
            </tr>
            <tr class="text-center">
                <th>CS</th>
                <th>SA</th>
                <th>RS</th>
                <th>CS/SA</th>
                <th>RS</th>
                </tr>
          </thead>
          <tbody>
                <tr class="text-center">
                    <td>{{ $landowner_details[0]->cs_khatian }}</td>
                    <td>{{ $landowner_details[0]->sa_khatian }}</td>
                    <td>{{ $landowner_details[0]->rs_khatian }}</td>
                    <td>{{ $landowner_details[0]->cs_sa_dag }}</td>
                    <td>{{ $landowner_details[0]->rs_dag }}</td>
                </tr>
          </tbody>
          
      </table>
      <br>

      <table class="table table-bordered">
        <tbody>
            <tr>
                <th style="width: 300px;">Total Land Amount of CS and SA Dag</th>
                <td colspan="2" class="text-center">{{ $landowner_details[0]->cs_sa_dag }}</td>
                <td>Shotok</td>
            </tr>
            <tr>
                <th style="width: 300px;">Total Land Amount of RS Dag</th>
                <td class="text-center">{{ $landowner_details[0]->rs_dag }}</td>
                <td class="text-center">{{ $landowner_details[0]->total_land_of_rs }}</td>
                <td>Shotok</td>
            </tr>
        </tbody>      
    </table>

    <br>

    <div class="row">
        <table class="table table-bordered" style="width: 40%; margin-left:.6%;">
            <tbody>
                <tr>
                    <th style="width: 300px">Total Land Amount of RS {{ $landowner_details[0]->rs_dag }}  </th>
                    <td class="text-center" style="width: 150px" >{{ $landowner_details[0]->total_land_of_rs }}</td>
                    <td>Shotok</td>
                </tr>
                <tr>
                    <th style="width: 300px">Purchase of Land  </th>
                    <td class="text-center" style="width: 150px" >{{ $landowner_details[0]->purchase_of_land }}</td>
                    <td>Shotok</td>
                </tr>
                <tr>
                    <th style="width: 300px" class="text-right">Available  </th>
                    <td class="text-center" style="width: 150px" >{{ $landowner_details[0]->total_land_of_rs - $landowner_details[0]->purchase_of_land }}</td>
                    <td>Shotok</td>
                </tr>
            </tbody>      
        </table>
        {{-- <br> --}}
        <table id="all-landowner" class="table table-bordered" style="width: 55%; margin-left:3.9%;">
            <tbody>
                <tr>
                    <th style="width: 300px">Total Land  </th>
                    <td style="width: 200px; text-align:right;">{{ $landowner_details[0]->purchase_of_land }}</td>
                    <td style="width: 200px; text-align:center;">Shotok</td>
                </tr>
                <tr>
                    <th style="width: 300px">Per Shotok Price </th>
                    <td style="width: 200px; text-align:right;">{{ number_format($landowner_details[0]->tp_land_price_percent) }}</td>
                    <td style="width: 200px; text-align:center;">TK</td>
                </tr>
                <tr>
                    <th style="width: 300px">Total Bigha Price  </th>
                    <td style="width: 200px; text-align:right;">{{ number_format($landowner_details[0]->per_bigha_price)}}</td>
                    <td style="width: 200px; text-align:center;">TK</td>
                </tr>
                <tr>
                    <th style="width: 300px; text-align:right;">Total  </th>
                    <td style="width: 200px; text-align:right;">{{ number_format($landowner_details[0]->purchase_of_land * $landowner_details[0]->tp_land_price_percent) }}</td>
                    <td style="width: 200px; text-align:center;">TK</td>
                </tr>
              </tbody>          
          </table>
    </div>
    <br>
      <table id="all-landowner" class="table table-bordered table-striped">
        <h4 style="text-align: center;  border: 1px solid #808080; height:50px; padding-top:10px;" >Installment information</h4> <br>
    <thead>
        <tr style="width: 200px; text-align:center;">
            <th>SL</th>
            <th>Date</th>
            <th>Payment</th>
            <th>Total Payment</th>
            <th>Due Amount</th>
            </tr>
      </thead>
      <tbody>

          @php
              $total_amount = $landowner_details[0]->purchase_of_land * $landowner_details[0]->tp_land_price_percent;
              $due_amount = $total_amount;
              $combined_amount = 0;
          @endphp
        @foreach ($landowner_details as $key => $installment)
        @php
            $due_amount -= $installment->installment_amount;
            $combined_amount += $installment->installment_amount;
        @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                {{-- <td>{{ date('j F, Y', strtotime($installment->installment_date,3)) }} </td> --}}
                <td>{{ $installment->installment_date ? $installment->installment_date : '' }} </td>
                <td style="width: 200px; text-align:right;">{{ number_format($installment->installment_amount) }}</td>
                <td style="width: 200px; text-align:right;">{{ number_format($combined_amount) }}</td>
                <td style="width: 200px; text-align:right;">{{ number_format($due_amount)}}</td>
            </tr>
        @endforeach
      </tbody>
      
  </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection
