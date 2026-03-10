<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="jean khechfe">
    <title>Hope Center</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    @stack('navbar_styles')
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head><!--/head-->
<body>

@stack('navbar_body')
<section style="padding-top: 30px;">
    <div class="container">
        @include('admin.messages')
    </div>
    <div class="container">
        <h3 class="title">Edit Project</h3>
        {!! Form::open(['route' => ['update.project', $project->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="form-group col-md-8 col-md-offset-2">
                <label>City <span class="red-color">*</span></label><br>
                <div class="btn-group donors-list" data-toggle="buttons">
                    @foreach($places as $place)
                        <label class="btn btn-primary @if($project->MPE_City==$place->id) active @endif ">
                            <input name="city" type="radio" value="{{$place->id}}" @if($project->MPE_City==$place->id) checked @endif>
                        {{$place->name}}</label>
                    @endforeach
                </div>
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                <label>Project Type <span class="red-color">*</span></label><br>
                <div class="btn-group donors-list" data-toggle="buttons">
                    @foreach($types as $type)
                        <label id="type_{{$type->id}}_lbl" class="btn btn-primary @if($project->projecttype_id==$type->id) active @endif ">
                            <input id="type_{{$type->id}}" name="projecttype" type="radio" value="{{$type->id}}" @if($project->projecttype_id==$type->id) checked @endif>
                            {{$type->name}}</label>
                    @endforeach
                </div>
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                <label>Project Sub Type <span class="red-color">*</span></label><br>
                <div class="btn-group donors-list" data-toggle="buttons">
                    @foreach($subtypes as $type)
                        <label name="{{$type->id}}" class="btn btn-primary @if($project->projectsubtype_id==$type->id) active @endif ">
                            <input name="projectsubtype" type="radio" value="{{$type->id}}" @if($project->projectsubtype_id==$type->id) checked @endif>
                            {{$type->name}}</label>
                    @endforeach
                </div>
            </div>

            <div class="form-group col-md-2 col-md-offset-2">
                {{Form::label('MicroProject_ID', 'Project Number')}} <span class="red-color">*</span>
                {{Form::number('MicroProject_ID', $project->MicroProject_ID, ['class' => 'form-control', 'placeholder' => 'Project Number', 'required', 'readonly'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('name', 'Project Name')}} <span class="red-color">*</span>
                {{Form::text('name', $project->english->MPE_Name, ['class' => 'form-control', 'placeholder' => 'Project Name', 'required'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('beneficiary', 'Beneficiary Name')}} <span class="red-color">*</span>
                {{Form::text('beneficiary', $project->MPE_BeneficiaryName, ['class' => 'form-control', 'placeholder' => 'Project Manager', 'required'])}}
            </div>

            <div class="form-group col-md-2 col-md-offset-2">
                {{Form::label('DOB', 'Year of Birth')}} <span class="red-color">*</span>
                {{Form::number('DOB',  $project->DOB, ['class' => 'form-control', 'placeholder' => 'Year of Birth','min="1920"','max="2020"', 'required'])}}
            </div>
            <div class="form-group col-md-2 ">
                {{Form::label('FamilyMembers', 'Family Members')}} <span class="red-color">*</span>
                {{Form::number('FamilyMembers', $project->FamilyMembers, ['class' => 'form-control', 'placeholder' => 'Family Members','min="0"', 'required'])}}
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                <label>Has the beneficiary lost his work during war? <span class="red-color">*</span></label><br>
                <div class="btn-group donors-list" data-toggle="buttons">
                    <label class="btn btn-primary @if($project->WorkLoss=='1') active @endif ">
                        <input name="WorkLoss" type="radio" value="1" @if($project->WorkLoss=='1') checked @endif>
                        Yes</label>
                    <label class="btn btn-primary @if($project->WorkLoss=='0') active @endif ">
                        <input name="WorkLoss" type="radio" value="0" @if($project->WorkLoss=='0') checked @endif>
                        No</label>
                </div>
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('expSkill', 'Skills and Experiences')}}
                {{Form::textarea('expSkill', $project->english->MPE_ExpSkill, ['class' => 'form-control', 'placeholder' => 'Skills and Experiences','rows' => '2'])}}
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('partner', 'Partner Name')}}
                {{Form::text('partner', $project->MPE_PartnerName == '0' ? '' : $project->MPE_PartnerName, ['class' => 'form-control', 'placeholder' => 'Partner Name'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('partner2', 'Second Partner Name')}}
                {{Form::text('partner2', $project->MPE_PartnerName2 == '0' ? '' : $project->MPE_PartnerName2, ['class' => 'form-control', 'placeholder' => 'Second Partner Name'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('suffering', 'Suffering and Need')}} <span class="red-color">*</span>
                {!!Form::textarea('suffering', $project->english->MPE_Suffering, ['class' => 'hidden', 'id' => 'editor', 'placeholder' => 'Suffering and Need'])!!}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('location', 'Project Location')}}
                {{Form::text('location', $project->MPE_Location == '0' ? '' : $project->MPE_Location, ['class' => 'form-control', 'id' => 'location', 'placeholder' => 'Project Location'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('video', 'Video Link')}}
                {{Form::text('video', $project->MPE_Video == '0' ? '' : $project->MPE_Video, ['class' => 'form-control', 'placeholder' => 'Video Link'])}}
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('mobile', 'Mobile')}}
                {{Form::text('mobile', $project->Mobile == '0' ? '' : $project->Mobile, ['class' => 'form-control', 'placeholder' => '09########'])}}
            </div>

            <div class="form-group col-md-3 col-md-offset-2 ">
                {{Form::label('fundDate', 'Date of Fund')}}
                @if($project->MPE_FundedDate == NULL)
                    {{Form::date('fundDate', '' ,['class' => 'form-control', 'min="2018-01-01"', 'max='.\Carbon\Carbon::now()])}}
                @else
                    {{Form::date('fundDate', $project->MPE_FundedDate ,['class' => 'form-control', 'min="2018-01-01"', 'max='.\Carbon\Carbon::now()])}}
                @endif
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                <label>Project Donor <span class="red-color">*</span></label><br>
                <div class="btn-group donors-list" data-toggle="buttons">
                    @foreach($donors as $donor)
                        <label class="btn btn-primary @if($project->MPE_Donor==$donor->id)  active @endif ">
                            <input name="donor" type="radio" value="{{$donor->id}}" @if($project->MPE_Donor==$donor->id) checked @endif>
                            {{$donor->name}}</label>
                    @endforeach
                </div>
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                <label>Project Status <span class="red-color">*</span></label><br>
                <div class="btn-group project-status" data-toggle="buttons">
                    <label class="btn btn-primary @if($project->MPE_Done=='0' or $project->MPE_Done=='1') active @endif ">
                        <input name="status" id="funded" type="radio" value="1" @if($project->MPE_Done=='0' or $project->MPE_Done=='1') checked @endif >
                        Funded</label>
                    <label class="btn btn-primary  @if($project->MPE_Done=='2') active @endif ">
                        <input name="status" id="canceled" type="radio" value="2" @if($project->MPE_Done=='2') checked @endif >
                        Canceled</label>
                </div>
            </div>
        </div>
        <p id="date-funded-alert" style="padding-top:10px;color: #f0ad4e;display: none;">
            <i class="fa fa-exclamation-triangle"></i> Date of fund is empty</p>
        <p id="location-funded-alert" style="padding-top:10px;color: #f0ad4e;display: none;">
            <i class="fa fa-exclamation-triangle"></i> Project location is empty</p>
        <p id="donor-funded-alert" style="padding-top:10px;color: red;display: none;">
            <i class="fa fa-exclamation-triangle"></i> Project status is funded without a Donor</p>
        <button class="btn btn-default" onclick="event.preventDefault();window.history.back();" style="margin-top: 15px"><i class="fa fa-arrow-left"></i> back</button>

        {{Form::button('<i class="fa fa-refresh"></i> Update', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-top: 15px;'])}}
        {!! Form::close() !!}
    </div>
</section>

@stack('navbar_scripts')

<script>
    $(document).ready(function () {

        @if($project->projecttype_id == '1')  {
            $('#type_3_lbl').click();
            $('#type_1_lbl').click();
        }
         @elseif($project->projecttype_id == '2')  {
            $('#type_3_lbl').click();
            $('#type_2_lbl').click();
        }
        @elseif($project->projecttype_id == '3')  {
            $('#type_1_lbl').click();
            $('#type_3_lbl').click();
        }
        @endif
    });
</script>
<script>
    $("input[name='projecttype']").change(function ()
    {
        // $("input[name='projectsubtype']")  // for all inputs
        //     .each(function() {  // remove checked from sub types
        //         $("input[name='projectsubtype']").removeAttr('checked');;
        //     }) ;

        if($('#type_1').is(':checked'))
        {
            $("label[name='4']").show();
            $("label[name='5']").show();

            $("label[name='1']").hide();
            $("label[name='2']").hide();
            $("label[name='3']").hide();

            $("label[name='6']").hide();
            $("label[name='7']").hide();
        }
        else if($('#type_2').is(':checked'))
        {
            $("label[name='4']").hide();
            $("label[name='5']").hide();

            $("label[name='1']").show();
            $("label[name='2']").show();
            $("label[name='3']").show();

            $("label[name='6']").hide();
            $("label[name='7']").hide();
        }
        else if($('#type_3').is(':checked'))
        {
            $("label[name='4']").hide();
            $("label[name='5']").hide();

            $("label[name='1']").hide();
            $("label[name='2']").hide();
            $("label[name='3']").hide();

            $("label[name='6']").show();
            $("label[name='7']").show();
        }
    });
</script>

<script>
    if($('#donor-none').is(':checked') && $('#funded').is(':checked')) {
        $('#donor-funded-alert').show();
        $('#submit-form').attr('disabled',true);
    }
    $("input[name='donor']").change(function () {
        if($('#donor-none').is(':checked') && $('#funded').is(':checked')) {
            $('#donor-funded-alert').show();
            $('#submit-form').attr('disabled',true);
        }else {
            $('#donor-funded-alert').hide();
            $('#submit-form').attr('disabled',false);
        }
    });
    $("input[name='status']").change(function () {
        if($('#donor-none').is(':checked') && $('#funded').is(':checked')) {
            $('#donor-funded-alert').show();
            $('#submit-form').attr('disabled',true);
        }else {
            $('#donor-funded-alert').hide();
            $('#submit-form').attr('disabled',false);
        }
        if(!($('#location').val()) && $('#funded').is(':checked')) {
            $('#location-funded-alert').show();
        }else {
            $('#location-funded-alert').hide();
        }
    });
    $("input[name='location']").on('input',function () {
        if(!($('#location').val()) && $('#funded').is(':checked')) {
            $('#location-funded-alert').show();
        }else {
            $('#location-funded-alert').hide();
        }
    });
    $("input[name='fundDate']").on('input',function () {
        if( $('#fundDate').val().isNull()) {
            $('#date-funded-alert').show();
        }else {
            $('#date-funded-alert').hide();
        }
    });
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>

