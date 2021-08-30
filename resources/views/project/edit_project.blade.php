
@extends('master')

@section('breadcrumb-title', 'Edit Project Information')

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
          <h3 class="card-title">Edit Project Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('updateProject',$project->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Name" value="{{$project->name}}">
                      @if($errors->has('name'))
                          <strong class="text-danger">{{ $errors->first('name') }}</strong>
                      @endif
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Description</label>
                          <textarea name="description" id="description" cols="3" rows="3" class="form-control" placeholder="Description">{{$project->description}}</textarea>
                          @if($errors->has('description'))
                              <strong class="text-danger">{{ $errors->first('description') }}</strong>
                          @endif                      
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Location</label>
                          <input type="text" name="location" class="form-control" placeholder="Location" value="{{$project->location}}">
                          @if($errors->has('location'))
                              <strong class="text-danger">{{ $errors->first('location') }}</strong>
                          @endif
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Facing</label>
                            <input type="text" name="facing" class="form-control" placeholder="Facing" value="{{$project->facing}}">
                             @if($errors->has('facing'))
                                <strong class="text-danger">{{ $errors->first('facing') }}</strong>
                             @endif
                    </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                      <label>Building Height</label>
                      <input type="text" name="building_height" class="form-control" placeholder="Building Height" value="{{$project->building_height}}">
                      @if($errors->has('building_height'))
                        <strong class="text-danger">{{ $errors->first('building_height') }}</strong>
                      @endif
                  </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <label>Land Area</label>
                    <input type="text" class="form-control" name="land_area"  placeholder="Land Area" value="{{$project->land_area}}">
                    @if($errors->has('land_area'))
                      <strong class="text-danger">{{ $errors->first('land_area') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label>Lanching Date</label>
                  <input type="text" class="form-control" name="launching_date" id="launching_date" value="{{$project->launching_date}}">
                  @if($errors->has('launching_date'))
                    <strong class="text-danger">{{ $errors->first('launching_date') }}</strong>
                  @endif
              </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
                <label>Hand Over Date</label>
                <input type="text" class="form-control" name="hand_over_date" id="hand_over_date" value="{{$project->hand_over_date}}">
                @if($errors->has('hand_over_date'))
                  <strong class="text-danger">{{ $errors->first('hand_over_date') }}</strong>
                @endif
            </div>
        </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Update</button>
                 <a href="{{ route('allProject') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection

  @section('custom_js')

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>

    $(function () {
      $( "#launching_date" ).datepicker({dateFormat: 'yy-mm-dd'});
      $( "#hand_over_date" ).datepicker({dateFormat: 'yy-mm-dd'});
    })

</script>
    
@endsection