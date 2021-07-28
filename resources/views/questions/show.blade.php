@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex align-items-center">
                                <h2>{{ $question->title }}</h2>
                                <div class="ml-auto">
                                    <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">
                                        Back to All Questions
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="media">
                            <div class="d-flex flex-column vote-controls">
                                <a title="This question is useful" class="vote-up">
                                    {{-- As we are using the Svg core we replace i tag with svg --}}
                                    <svg class="fas fa-caret-up fa-3x"></svg>
                                </a>
                                <span class="votes-count">1230</span>
                                <a title="This question is not useful" class="vote-down off">
                                    <svg class="fas fa-caret-down fa-3x"></svg>
                                </a>
                                <a title="Click to mark as favorite question (Click again to undo)"
                                    class="favorite mt-2 favorited">
                                    <svg class="fas fa-star fa-2x"></svg>
                                    <span class="favourites-count">123</span>
                                </a>
                            </div>
                            <div class="media-body">
                                {!! $question->body_html !!}
                                <div class="float-right mt-3">
                                    <span class="text-muted">Questioned by {{ $question->created_date }}</span>
                                    <div class="media mt-1">
                                        <a href="{{ $question->user->url }}" class="pr-2">
                                            <img src="{{ $question->user->avatar }}">
                                        </a>
                                        <div class="media-body">
                                            <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>
                                {{ $question->answers_count . ' ' . Str::plural('Answer', $question->answers_count) }}
                            </h4>
                        </div>
                        <hr>
                        @foreach ($question->answers as $answer)
                            <div class="media">
                                <div class="d-flex flex-column vote-controls">
                                    <a title="This answer is useful" class="vote-up">
                                        {{-- As we are using the Svg core we replace i tag with svg --}}
                                        <svg class="fas fa-caret-up fa-3x"></svg>
                                    </a>
                                    <span class="votes-count">1230</span>
                                    <a title="This answer is not useful" class="vote-down off">
                                        <svg class="fas fa-caret-down fa-3x"></svg>
                                    </a>
                                    <a title="Mark this answer as favorite answer (Click again to undo)"
                                        class="vote-accepted mt-2">
                                        <svg class="fas fa-check fa-2x"></svg>
                                    </a>
                                </div>
                                <div class="media-body">
                                    {!! $answer->body_html !!}
                                    <div class="float-right mt-3">
                                        <span class="text-muted">Answered {{ $answer->created_date }}</span>
                                        <div class="media mt-1">
                                            <a href="{{ $answer->user->url }}" class="pr-2">
                                                <img src="{{ $answer->user->avatar }}">
                                            </a>
                                            <div class="media-body mt-1">
                                                <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
