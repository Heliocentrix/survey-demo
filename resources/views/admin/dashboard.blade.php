@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        
        <div class="col-md-4">
            <div class="box bg-info darken">
                <div class="box-cell p-x-3 p-y-1">
                    <div class="font-weight-semibold font-size-20">Survey</div>
                    <div class="font-weight-bold font-size-12">{{$survey_count}}</div>
                    <i class="box-bg-icon middle right font-size-52 ion-ios-people"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box bg-success darken">
                <div class="box-cell p-x-3 p-y-1">
                    <div class="font-weight-semibold font-size-20">Questions</div>
                    <div class="font-weight-bold font-size-12">{{$questions_count}}</div>
                    <i class="box-bg-icon middle right font-size-52 ion-ios-people"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box bg-warning darken">
                <div class="box-cell p-x-3 p-y-1">
                    <div class="font-weight-semibold font-size-20">Users</div>
                    <div class="font-weight-bold font-size-12">{{$users_count}}</div>
                    <i class="box-bg-icon middle right font-size-52 ion-ios-people"></i>
                </div>
            </div>
        </div>
    </div>
    
    
</div>

@endsection


@section('script')
</script>
@endsection