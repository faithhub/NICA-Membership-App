@extends('student.layouts.app')
@section('student')
<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Assignments</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Assignments</li>
				</ul>
			</div>	
			<div class="row">
                <!-- <div class="text-center">                    
                    @if (session('success'))
                    <div class="alert alert-success font-weight-700">
                        {{ session('success') }}
                        <a href="#" style="float:right;" class="alert-close" data-dismiss="alert">&times;</a>
                    </div>
                @endif
                </div> -->
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h2>All Siwes Weeks</h2>
						</div>
						
						<div class="widget-inner">
							<div class="orders-list">
                                <table class="table table-bordered table-striped">
                                    <thead class="">
                                        <tr>                                            
                                            <td>S/N</td>
                                            <td>Weeks</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($weeks)                                            
                                            @foreach ($weeks as $week)                                            
                                                <tr>        
                                                    <td>{{$sn++}}</td>                                    
                                                    <td><b>{{$week->name}}</b></td>
                                                    <td><a href="{{ route('week', $week->id) }}" class="btn btn-sm btn-secondary" >View</a></td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>                                   
							</div>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
@endsection