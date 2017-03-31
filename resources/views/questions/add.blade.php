@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Questions</div>

                <div class="panel-body">
                    {!! Form::open(['class' => 'form-horizontal', 'role' => 'form', "method" => 'POST', "url" => "admin/questions/add"]) !!}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="quiz_id" class="col-md-4 control-label">Select Quiz</label>
                            <div class="col-md-6">
                                <select name='quiz_id' id='quiz_id' class='form-control'>
                                    @foreach($quiz as $key => $val)
                                    <option value="{{$val->id}}" data-questions="{{$val->noofquestions}}">{{$val->title}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('quiz_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quiz_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="subquestions"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Add
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $("#quiz_id").on('change', function(){
            var selected = $(this).val();
            var questions = $(this).find(':selected').data('questions');
            var questionhtml = '';
            for(var i=0; i< questions; i++){
                questionhtml += '<div class="panel panel-default">';
                    questionhtml += '<div class="panel-body">';
                        questionhtml += '<div class="form-group">';
                            questionhtml += '<label for="noofquestions" class="col-md-4 control-label">Question '+parseInt(i+1)+'</label>';
                            questionhtml += '<div class="col-md-6">';
                                questionhtml += '<input type="text" name="question['+i+']" class="form-control">'; 
                            questionhtml += '</div>';
                        questionhtml += '</div>';
                        questionhtml += '<div class="form-group">';
                            questionhtml += '<label class="col-md-2 control-label">Options for this question</label>';
                            questionhtml += '<div class="col-md-8">';
                                questionhtml += '<div class="input-group col-xs-8"><span class="input-group-addon"><input type="radio" name="answer['+i+']" value="1">Mark This As An Answer</span><input type="text" name="option['+i+'][]" placeholder="Option 1" class="form-control"></div>'; 
                                questionhtml += '<div class="input-group col-xs-8"><span class="input-group-addon"><input type="radio" name="answer['+i+']" value="2">Mark This As An Answer</span><input type="text" name="option['+i+'][]" placeholder="Option 2" class="form-control"></div>'; 
                                questionhtml += '<div class="input-group col-xs-8"><span class="input-group-addon"><input type="radio" name="answer['+i+']" value="3">Mark This As An Answer</span><input type="text" name="option['+i+'][]" placeholder="Option 3" class="form-control"></div>'; 
                                questionhtml += '<div class="input-group col-xs-8"><span class="input-group-addon"><input type="radio" name="answer['+i+']" value="4">Mark This As An Answer</span><input type="text" name="option['+i+'][]" placeholder="Option 4" class="form-control"></div>'; 
                            questionhtml += '</div>';
                        questionhtml += '</div>';
                    questionhtml += '</div>';
                questionhtml += '</div>';
            }
            $(".subquestions").html(questionhtml);
        });
    });
</script>
@endsection