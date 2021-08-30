@extends('master')

@section('breadcrumb-title', ' Update Initials Balance')


@section('custom_css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title"> Create Initials Amount</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{route('updateInitials',$initials->id)}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Project<span style="color: red;">*</span></label>
                      <select name="project_id" class="form-control select2bs4">
                        <option value="">--select project name--</option>
                        @foreach ($projects as $project)
                            <option <?= ($initials->project_id == $project->id) ? 'selected' : '' ?> value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('project_id'))
                        <strong class="text-danger">{{ $errors->first('project_id') }}</strong>
                    @endif
                    </div>
                  </div>

                  <div class="col-md-6 {{$errors->has('cash_at_bank') ? 'has-error' : ''}}">
                    <div class="form-group">
                        <label>Cash At Bank</label>
                        <input type="number" name="cash_at_bank" id="cash_at_bank" value="{{ $initials->cash_at_bank }}" class="form-control input value1" placeholder="0">
                        
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Cash In Hand</label>
                        <input type="number" name="cash_in_hand" id="cash_in_hand" class="form-control input value2" value="{{ $initials->cash_in_hand }}" placeholder="0">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Total Initials Balance <span style="color: red;">*</span></label>
                        <input type="number" name="total_initial_balance" id="total_initial_balance" value="{{$initials->total_initial_balance}}" class="form-control" placeholder="0" readonly="">
                    </div>
                  </div>

                   <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Update</button>
                 <a href="{{route('list.data')}}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection

  @section('custom_js')

  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

  <script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
      
      
       $(document).ready(function(){
          $(".input").keyup(function(){
                var val1 = +$(".value1").val();
                var val2 = +$(".value2").val();
                $("#total_initial_balance").val(val1+val2);
          });
        });
     
  </script>
      
  @endsection
