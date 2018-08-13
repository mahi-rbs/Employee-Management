@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header cus-content-header">
      <!-- <h4>
        কাস্টমস এক্সাইজ ও ভ্যাট কমিশনারেট ঢাকা (পূর্ব), ঢাকা
      </h4> -->

<h1 class="title-header">কর্মকর্তা ও কর্মচারীদের বিবরণী</h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Employee Mangement</li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection