@extends('employees-mgmt.base')

@section('action-content')
<style type="text/css">




</style>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading title-header">

                    <div class="pull-right"><button class="print-content"  onclick="printDiv('printMe')">print</button> </div>
                </div>
                <div class="panel-body" id="printMe">
                    <div class="table-responsive text-content">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>
                                        <h3>{{ $employee->name_bangla }}</h3>
                                        <p style="margin-bottom: 2px;">{{$employee->designation_name}} , {{$employee->work_place}}</p>
                                        <small>{{$employee->email}}</small>
                                    </td>
                                    <td>
                                     <img src="{{asset('/../avatars/'.$employee->picture)}}" width="150px" height="150px" class="pull-right" />
                                 </td>
                             </tr>
                             <tr>
                                <td>নাম(ইংরেজি)</td>
                                <td>{{$employee->name}}</td>
                            </tr>
                            <tr>
                                <td>নাম(বাংলা)</td>
                                <td>{{$employee->name_bangla}}</td>
                            </tr>
                            <tr>
                                <td>পিতা</td>
                                <td>{{$employee->father}}</td>
                            </tr>
                            <tr>
                                <td>মাতা</td>
                                <td>{{$employee->mother}}</td>
                            </tr>

                            <tr>
                                <td>বর্তমান ঠিকানা</td>
                                <td>{{$employee->pre_address}}</td>
                            </tr>
                            <tr>
                                <td>স্থায়ী ঠিকানা</td>
                                <td>{{$employee->per_address}}</td>
                            </tr>
                            <tr>
                                <td>মোবাইল নাম্বার</td>
                                <td>{{$employee->mobile}}</td>
                            </tr>
                            <tr>
                                <td>জাতীয় পরিচয়পত্র নং</td>
                                <td>{{$employee->nid}}</td>
                            </tr>
                            <tr>
                                <td>পদবী</td>
                                <td>{{$employee->designation_name}}</td>
                            </tr>
                            <tr>
                                <td>বর্তমান কর্মস্থল</td>
                                <td>{{$employee->work_place}}</td>
                            </tr>
                            <tr>
                                <td>যোগদানের তারিখ</td>
                                <td>{{$employee->date_hired}}</td>
                            </tr>

                            @php
                            $pastWp = App\Http\Controllers\EmployeeManagementController:: getPastWorkPlace($employee->past_work_place)
                            @endphp
                            <tr>
                                <td>পূর্ববর্তী কর্মস্থল</td>
                                <td>{{$pastWp->name}}</td>
                            </tr>
                            <tr>
                                <td>অব্যাহতির তারিখ</td>
                                <td>{{$employee->date_resigne}}</td>
                            </tr>

                            <tr>
                                <td>কম্পিউটার স্কিল</td>
                                <td>{{$employee->computer_skill}}</td>
                            </tr>

                            <tr>
                                <td>জন্ম তারিখ</td>
                                <td>{{$employee->dob}}</td>
                            </tr>




                        </tbody>
                    </table>
                </div>
                <h2>Educational Qulafication</h2>
                <hr/>
                <div class="table-responsive text-content">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Level</th>
                                <th>Passing year</th>
                                <th>Insatution</th>
                                <th>Division</th>
                                <th>Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($edu_info)
                            @foreach($edu_info as $info)
                            <tr>
                                <td>{{$info->edu_level}}</td>
                                <td>{{$info->passing_year}}</td>
                                <td>{{$info->name_inst}}</td>
                                <td>{{$info->division}}</td>
                                <td>{{$info->subject}}</td>
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </div>
</div>
</div>




@section('footer-asstes')
<script>
    function printDiv(divName){
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endsection
@endsection
