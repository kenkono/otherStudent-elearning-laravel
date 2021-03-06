@extends('layouts.app')

@section('content')
    <div class="container">

    @foreach($results as $index => $result)
        <div class="card mb-3">
            <div class="card-body">
            <div class="row">
                <h5 class="card-title col-8">
                    Q{{$index +1}}:     
                    {{$result->quiz->question}}
                </h5>
                @if($result->quiz->image)
                    <img src="{{$result->quiz->image}}" class="col-4" style="width: 10vw; height: 10vw;">
                @endif
            </div>
            </div>
            <ul class="list-group list-group-flush">

                @foreach($result->quiz->choices as $choice)

                    <!-- 
                        $choice->quiz->answer_id  //the correct answer
                        $result->choice_id  // user's choice
                        $choice->id // choice id
                    -->

                    <!-- if the choice_id and the user's choice is same -->
                    @if($choice->id == $result->choice_id) 
                        <!-- if the user's choice and the correct answer is same -->
                        <li class="list-group-item {{$choice->quiz->answer_id == $result->choice_id ? 'correct' : 'incorrect'}}">
                            {{$choice->choice}} 
                        </li>
                    <!-- if the choice is not the users' answer -->
                    @else
                    <!-- if the choice_id and the correct answer is same -->
                        @if($choice->id == $choice->quiz->answer_id)
                            <li class="list-group-item correct">
                                {{$choice->choice}} 
                            </li>
                        @else
                            <li class="list-group-item">
                                {{$choice->choice}} 
                            </li>
                        @endif
                    @endif

                
                @endforeach
            </ul>
        </div>
        @endforeach
        <div class="form-group text-right pt-2">
            <a href="/home" class="btn btn-primary">Go back to Dashoboard</a>
        </div>
    </div>
@endsection('content')