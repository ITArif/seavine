
@extends('master')

@section('breadcrumb-title', 'All Customer Information')

@section('content')

<section class="content">

  <div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Call Process</h3>
        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="portlet-body form">
        <form action="#" class="form-horizontal">
            <div class="form-body">
                <h3 class="form-section">&nbsp;</h3>
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label col-md-6"><h5>Dialed Number:</h5></label>
                        <label class="control-label col-md-3"><h5 id="content">01634189911 &nbsp;</h5></label>

                        <label class="control-label col-md-1"><a class="copy-text" data-clipboard-target="#content" href="#"><span class="float-right badge bg-primary">copy</span></a></label>
                        <label class="control-label col-md-10 text-center"><p>***** Dialed Number has been requested for {{ $press_button }} *****</p></label>
                        <label class="control-label col-md-2"><p>&nbsp;</p></label>
                        <div class="row">
                        <label class="control-label col-md-6"><h5 style="color: red">&nbsp;&nbsp;Status:</h5></label>
                        <label class="control-label col-md-5"><p style="color: red">{{ $call_status }}</p></label>
                        </div>
                        @if($get_record->count())
                       
                        @else
                          <div class="row" style="margin-bottom: 15px;">
                           <div class="col-md-3"></div>
                           <div class="col-md-6"><a class="btn btn-primary btn-lg" href="{{ url('/create/'.$number) }}" target="_blank">Customer Registration&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                           </div>
                           <div class="col-md-3"></div>
                          </div>
                        @endif
                        <div class="row" style="margin-bottom: 15px">
                           <div class="col-md-3"></div>
                           <div class="col-md-6"><a class="btn btn-success btn-lg" href="#">Request for Other Service</a></div>
                           <div class="col-md-3"></div>
                        </div>
                        <div class="row" style="margin-bottom: 15px">
                           <div class="col-md-3"></div>
                           <div class="col-md-6"><a class="btn btn-warning btn-lg" href="#">Request for information</a></div>
                           <div class="col-md-3"></div>
                        </div>
                        
                    </div>

                    <div class="col-md-6">
                        <div class="card card-primary card-outline">
                          <div class="card-header">
                            <h3 class="card-title">Customer History</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body p-0">
                            <table class="table table-striped">
                              @if ($get_record->count())
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Phone</th>
                                  <th style="width: 40px">Email</th>
                                  <th style="width: 40px">Date</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach($get_record as $val)
                                  <tr>
                                    <td>{{$val->name}}</td>
                                    <td>{{$val->phone}}</td>
                                    <td>{{$val->email}}</td>
                                    <td>{{$val->created_at}}</td>
                                  </tr>
                                  @endforeach
                              </tbody>
                              @else
                                 <p style="color:red;font-weight: bold;">&nbsp;&nbsp; Opps! You are not register customer, Please registration first.</p>
                              @endif 
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection

@section('custom_js')
<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>
<script>
 $(".copy-text").on("click", function(e) {
    e.preventDefault();
    new Clipboard('.copy-text');
    console.log("copied");
});
</script>
@endsection

