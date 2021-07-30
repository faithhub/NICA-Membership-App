@extends('supervisor.layouts.app')
@section('supervisor')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Siwes Students</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li>Siwes Students</li>
            </ul>
        </div>
        <div class="row">
            <div class="text-center">
                @if (session('success'))
                <div class="alert alert-success font-weight-700">
                    {{ session('success') }}
                    <a href="#" style="float:right;" class="alert-close" data-dismiss="alert">&times;</a>
                </div>
                @endif
            </div>
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h2>My Siwes Students</h2>
                    </div>

                    <div class="widget-inner">
                        <div class="orders-list">
                            <table class="table" id="myTable" width="100%">
                                <thead style="font-weight:bolder">
                                    <tr>
                                        <td>S/N</td>
                                        <td>Matric Number</td>
                                        <td>Student Name</td>
                                        <td>Student Email</td>
                                        <td>School</td>
                                        <td>Department</td>
                                        <td>Date Registered</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($students)
                                    @foreach ($students as $student)
                                    <tr>
                                        <td>{{$sn++}}</td>
                                        <td><b>{{$student->unique}}</b></td>
                                        <td><b>{{$student->name }}</b></td>
                                        <td><b>{{$student->email }}</b></td>
                                        <td><b>{{$student->school->name }}</b></td>
                                        <td><b>{{$student->dept->name }}</b></td>
                                        <td>{{ date('D, M j, Y', strtotime($student->created_at))}}</td>
                                        <td><a href="{{ url('supervisor/view', $student->id) }}" class="btn btn-sm btn-success">View</a></td>
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