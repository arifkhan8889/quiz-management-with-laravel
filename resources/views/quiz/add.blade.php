@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Quiz</div>

                <div class="panel-body">
                    {!! Form::open(['class' => 'form-horizontal', 'role' => 'form', "method" => 'POST', "url" => "admin/quiz/add"]) !!}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                {!! Form::text('title', old('title'), ['id' => 'title','class' => 'form-control'])!!}
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('noofquestions') ? ' has-error' : '' }}">
                            <label for="noofquestions" class="col-md-4 control-label">No Of Questions</label>
                            <div class="col-md-6">
                                {!! Form::text('noofquestions', old('noofquestions'), ['id' => 'noofquestions','class' => 'form-control'])!!}
                                @if ($errors->has('noofquestions'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('noofquestions') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('timeperiod') ? ' has-error' : '' }}">
                            <label for="timeperiod" class="col-md-4 control-label">Time Period (In Minutes Only)</label>
                            <div class="col-md-6">
                                {!! Form::text('timeperiod', old('timeperiod'), ['id' => 'timeperiod','class' => 'form-control'])!!}
                                @if ($errors->has('timeperiod'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('timeperiod') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
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
