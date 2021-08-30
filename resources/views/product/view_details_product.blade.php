
@extends('master')

@section('breadcrumb-title', 'View Details Product Information')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">View Details Product Information</h3>
        </div>
            <div class="card-body">
                
                <table id="all-landowner" class="table table-bordered">
                    <tbody>
                        {{-- <tr>
                            <th style="width: 80px">Project Name </th>
                            <td style="width: 80px; text-align:center;"> {{ $product->project_id }}</td>
                        </tr> --}}
                        <tr>
                            <th style="width: 80px">Flat Type </th>
                            <td style="width: 80px; text-align:center;"> {{ $product->flat_type }}</td>
                        </tr>
                        <tr>
                            <th style="width: 80px">Floor Number  </th>
                            <td style="width: 80px; text-align:center;"> {{ $product->floor_number }}</td>
                        </tr>
                        <tr>
                            <th style="width: 80px">Flat Size  </th>
                            <td style="width: 80px; text-align:center;"> {{ $product->flat_size }}</td>
                        </tr>
                        <tr>
                            <th style="width: 80px">Unit Price </th>
                            <td style="width: 80px; text-align:center;"> {{ $product->unit_price }}</td>
                        </tr>
                        <tr>
                            <th style="width: 80px">Total Flat Price </th>
                            <td style="width: 80px; text-align:center;">{{ $product->total_flat_price }}</td>
                        </tr>
                        <tr>
                            <th style="width: 80px">Car Parking Charge </th>
                            <td style="width: 80px; text-align:center;">{{ $product->car_parking_charge }} </td>
                        </tr>
                        <tr>
                            <th style="width: 80px">Utility Charge  </th>
                            <td style="width: 80px; text-align:center;"> {{ $product->utility_charge }}</td>
                        </tr>
                        <tr>
                            <th style="width: 80px">Additional Work Charge </th>
                            <td style="width: 80px; text-align:center;"> {{ $product->additional_work_charge }}</td>
                        </tr>
                        <tr>
                            <th style="width: 80px">Other Charge </th>
                            <td style="width: 80px; text-align:center;">{{ $product->other_charge }} </td>
                        </tr>
                        <tr>
                            <th style="width: 80px">Discount</th>
                            <td style="width: 80px; text-align:center;"> {{ $product->discount }}</td>
                        </tr>
                        <tr>
                            <th style="width: 80px">Refund Additional Work Charge  </th>
                            <td style="width: 80px; text-align:center;"> {{ $product->refund_additional_work_charge }}</td>
                        </tr>

                        <tr>
                            <th style="width: 80px">Net Total </th>
                            <td style="width: 80px; text-align:center;"> {{ $product->net_total }}</td>
                        </tr>
                        {{-- <tr>
                            <th style="width: 100px"> Image </th>
                            <td style="width: 100px; text-align:center;"> <img src="{{  }}" alt=""> </td>
                        </tr> --}}
                        <tr>
                            <th style="width: 80px">Description  </th>
                            <td style="width: 80px; text-align:center;"> {{ $product->description }}</td>
                        </tr>
                      </tbody>          
                  </table>
            </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection
