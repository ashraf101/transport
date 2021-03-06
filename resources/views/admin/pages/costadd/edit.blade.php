@extends('admin.layouts.master')
@section('title','Cost Edit')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        খরচের ইনফর্মেশন পরিবর্তন
						<a class="btn btn-success float-right mr-2" href="{{route('costadd.index')}}"> খরচের তালিকা</a>
						<a class="btn btn-success float-right mr-2" href="{{route('costadd-all-info')}}">সর্বমোট খরচের তালিকা</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('costadd.update',$costadd->id)}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
						@csrf
						@method('PUT')
                            <h5 class="form-desc">
								খরচের ইনফর্মেশন পরিবর্তন  করুন
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">গাড়ীর নাম </label>
                                <div class="col-sm-5">
									<select name="number" id="number" class="form-control">
										@foreach($carnumber as $carnum)
											<option value="{{$carnum->number}}" {{ $carnum->number == $costadd->number ? 'selected' : '' }} >{{$carnum->number}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">খরচের তালিকা</label>
                                <div class="col-sm-5">
									<select name="cost_name" class="form-control">
										@foreach($costlist as $costlisted)
											<option value="{{$costlisted->cost_name}}" {{ $costlisted->cost_name == $costadd->cost_name ? 'selected' :''  }} >{{$costlisted->cost_name}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">টাকার পরিমান</label>
                                <div class="col-sm-5">
									<input type="number" class="form-control {{ $errors->has('cost_name') ? ' is-invalid' : '' }}" name="taka" id="taka" value="{{$costadd->taka}}">
									@if ($errors->has('cost_name'))
										<span class="invalid-feedback" role="alert">
											<strong>টাকার পরিমান অবশ্যই দিতে হবে </strong>
										</span>
									@endif
                                </div>
							</div>
                            <div class="form-buttons-w text-center">
                                <button class="btn btn-primary" type="submit"> সেইভ করুন</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection