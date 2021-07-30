@extends('supervisor.layouts.app')
@section('supervisor')

<!--Main container start -->
<main class="ttr-wrapper">
	<div class="container-fluid">
		<div class="db-breadcrumb">
			<h4 class="breadcrumb-title">Siwes Student</h4>
			<ul class="db-breadcrumb-list">
				<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
				<li>Siwes Student</li>
			</ul>
		</div>
		<div class="row">
			<!-- Your Profile Views Chart -->
			<div class="col-lg-12 m-b30">
				<div class="widget-box">
					<div class="wc-title">
						<h4>{{$student->name}} Siwes Profile</h4>
					</div>
					<div class="widget-inner">

						<div class="card-courses-list bookmarks-bx">
							<div class="card-courses-media">
								@if ($student->avatar == null)
								<img src="{{ asset('uploads/avatar_pics.jpg') }}" alt="">
								@else
								<img src="{{ asset('uploads/student_avatar/'.$student->avatar) }}" alt="{{$student->surname}} {{$student->last_name}}">
								@endif
							</div>
							<div class="card-courses-full-dec">
								<div class="card-courses-list-bx">
									<ul class="card-courses-view">
										<li class="card-courses-categories">
											<h4>Student Matric Number:</h4>
											<h3>{{$student->unique}}</h3>
										</li>
									</ul>
								</div>
								<div class="card-courses-list-bx">
									<ul class="card-courses-view">
										<li class="card-courses-categories">
											<h4>Student Name:</h4>
											<h3>{{$student->name}}</h3>
										</li>
									</ul>
								</div>
								<div class="card-courses-list-bx">
									<ul class="card-courses-view">
										<li class="card-courses-categories">
											<h4>Student Email:</h4>
											<h3>{{$student->email}}</h3>
										</li>
									</ul>
								</div>
								<div class="card-courses-list-bx">
									<ul class="card-courses-view">
										<li class="card-courses-categories">
											<h4>Student School:</h4>
											<h3>{{$student->school->name}}</h3>
										</li>
									</ul>
								</div>
								<div class="card-courses-list-bx">
									<ul class="card-courses-view">
										<li class="card-courses-categories">
											<h4>Student Department:</h4>
											<h3>{{$student->dept->name}}</h3>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-lg-12 m-b30">
				<div class="widget-box">
					<div class="wc-title">
						<h4>{{$student->name}} Siwes Log-Book Records</h4>
					</div>
					<div class="widget-inner">
						<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
							@isset($weeks)
							@foreach($weeks as $week)
							<li class="nav-item">
								<a class="nav-link m-2 @once active @endonce" id="pills-{{$week->id}}-tab" data-toggle="pill" href="#pills-{{$week->id}}" role="tab" aria-controls="pills-{{$week->id}}" aria-selected="true">
									{{$week->name}}
								</a>
							</li>
							@endforeach
							@endisset
						</ul>
						<div class="tab-content ml-4" id="pills-tabContent">

							@isset($weeks)
							@foreach($weeks as $week)
							<div class="tab-pane fade @once show active @endonce" id="pills-{{$week->id}}" role="tabpanel" aria-labelledby="pills-{{$week->id}}-tab">
								<fieldset>
									<legend>
										<h4>{{$week->name}} Log Details</h4>
									</legend>
									@foreach($days as $day)
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">{{$day->name}}</label>
										<div class="col-sm-10">
											<p>{{ \App\Models\Logbook::where(['user_id' => $student->id, 'week_id' => $week->id, 'day_id' => $day->id])->pluck('log')->first() }}</p>
										</div>
									</div>
									@endforeach
								</fieldset>
							</div>
							@endforeach
							@endisset
						</div>
					</div>
				</div>
			</div>
			<!-- Your Profile Views Chart END-->
		</div>
	</div>
</main>
@endsection