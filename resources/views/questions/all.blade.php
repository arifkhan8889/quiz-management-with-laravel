@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">All Questions</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Question Title</th>
                                <th>Quiz Title</th>
                                <th>Options</th>
                                <th>Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $key => $val)

                            <tr>
                                <td>{{$val->title}}</td>
                                {{--*/$quiz=$val->get_quiz()->get()->toArray()/*--}}
                                <td>{{$quiz[0]['title']}}</td>
                                <td>{{$val->options}}</td>
                                <td>{{$val->correct_answer}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
