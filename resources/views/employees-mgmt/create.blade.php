@extends('employees-mgmt.base')


@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default cus-panel">
                <div class="panel-heading">Add new employee</div>
                <div class="panel-body cus-form">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('employee-management.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">নাম(ইংরেজি)</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name_bangla') ? ' has-error' : '' }}">
                            <label for="name_bangla" class="col-md-4 control-label">নাম(বাংলা)</label>

                            <div class="col-md-6">
                                <input id="name_bangla" type="text" class="form-control" name="name_bangla" value="{{ old('name_bangla') }}" required>

                                @if ($errors->has('name_bangla'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name_bangla') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('father') ? ' has-error' : '' }}">
                            <label for="father" class="col-md-4 control-label">পিতা</label>

                            <div class="col-md-6">
                                <input id="father" type="text" class="form-control" name="father" value="{{ old('father') }}" required>

                                @if ($errors->has('father'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('father') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('mother') ? ' has-error' : '' }}">
                            <label for="mother" class="col-md-4 control-label">মাতা</label>

                            <div class="col-md-6">
                                <input id="mother" type="text" class="form-control" name="mother" value="{{ old('mother') }}" required>

                                @if ($errors->has('mother'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mother') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('pre_address') ? ' has-error' : '' }}">
                            <label for="pre_address" class="col-md-4 control-label">বর্তমান ঠিকানা</label>

                            <div class="col-md-6">
                                <textarea id="pre_address" type="text" class="form-control" name="pre_address" value="{{ old('pre_address') }}" required > </textarea> 

                                @if ($errors->has('pre_address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pre_address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('per_address') ? ' has-error' : '' }}">
                            <label for="per_address" class="col-md-4 control-label">স্থায়ী ঠিকানা</label>

                            <div class="col-md-6">
                                <textarea id="per_address" type="text" class="form-control" name="per_address" value="{{ old('per_address') }}" required></textarea>

                                @if ($errors->has('per_address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('per_address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                  

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">মোবাইল নাম্বার</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required>

                                @if ($errors->has('mobile'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nid') ? ' has-error' : '' }}">
                            <label for="nid" class="col-md-4 control-label">জাতীয় পরিচয়পত্র নং</label>

                            <div class="col-md-6">
                                <input id="nid" type="text" class="form-control" name="nid" value="{{ old('nid') }}" required>

                                @if ($errors->has('nid'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nid') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    
                        <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">পদবী</label>
                            <div class="col-md-6">
                                <select class="form-control" name="designation">
                                    @foreach($designations as $designation)
                                    <option value="{{$designation->id}}">{{$designation->name}}</option>
                                    
                              @endforeach
                                </select>
                                @if ($errors->has('designation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('designation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

              
                        <div class="form-group">
                            <label class="col-md-4 control-label">বর্তমান কর্মস্থল</label>
                            <div class="col-md-6">
                                <select class="form-control js-states" name="work_place">
                                    <option value="-1">--Please select one--</option>
                                    @foreach ($wps as $wp)
                                    <option value="{{$wp->id}}">{{$wp->name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label">যোগদানের তারিখ</label>
                            <div class="col-md-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="{{ old('date_hired') }}" name="date_hired" class="form-control pull-right" id="hiredDate" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">পূর্ববর্তী কর্মস্থল</label>
                            <div class="col-md-6">
                                <select class="form-control js-states" name="past_work_place">
                                    <option value="-1">--Please select one--</option>
                                    @foreach ($wps as $wp)
                                    <option value="{{$wp->id}}">{{$wp->name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label">অব্যাহতির তারিখ</label>
                            <div class="col-md-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="{{ old('date_resigne') }}" name="date_resigne" class="form-control pull-right" id="resigneDate" required>
                                </div>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('computer_skill') ? ' has-error' : '' }}">
                            <label for="computer_skill" class="col-md-4 control-label">কম্পিউটার স্কিল</label>

                            <div class="col-md-6">
                                <textarea id="computer_skill" type="text" class="form-control" name="computer_skill" value="{{ old('computer_skill') }}" required></textarea>

                                @if ($errors->has('computer_skill'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('computer_skill') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">ইমেইল</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <label class="col-md-4 control-label">জন্ম তারিখ</label>
                            <div class="col-md-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="{{ old('dob') }}" name="dob" class="form-control pull-right" id="birthDate" required>
                                </div>
                            </div>
                        </div>
                      

                        
                        <div class="form-group">
                            <label for="avatar" class="col-md-4 control-label" >ছবি</label>
                            <div class="col-md-6">
                                <input type="file" id="picture" name="picture" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
