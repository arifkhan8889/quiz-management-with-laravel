@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">All Quiz</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Quiz Title</th>
                                <th>No. Of Questions</th>
                                <th>Time Limit (In Minutes)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quiz as $key => $val)
                            <tr>
                                <td>{{$val->title}}</td>
                                <td>{{$val->noofquestions}}</td>
                                <td><i class="fa fa-clock-o"></i> {{$val->timeperiod }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $quiz->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
