<div class="row mt-4 ">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>
                        {{ $answersCount . ' ' . Str::plural('Answer', $answersCount) }}
                    </h4>
                </div>
                <hr>

                @include('layouts._messages')

                @foreach ($answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="This answer is useful" class="vote-up">
                                {{-- As we are using the Svg core we replace i tag with svg --}}
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes-count">1230</span>
                            <a title="This answer is not useful" class="vote-down off">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>
                            <a title="Mark this answer as favorite answer (Click again to undo)"
                                class="{{ $answer->status }} mt-2">
                                <i class="fas fa-check fa-2x"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            {!! $answer->body_html !!}
                            <div class="row">
                                <div class="col-4">
                                    <div class="ml-auto mt-3">
                                        {{-- @if (Auth::user()->can('update->answer', $answer)) --}}
                                        @can('update', $answer)
                                            <a class="btn btn-sm btn-outline-info"
                                                href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}">
                                                Edit </a>
                                        @endcan
                                        {{-- @endif --}}
                                        {{-- @if (Auth::user()->can('delete->answer', $answer)) --}}
                                        @can('delete', $answer)
                                            <form class="form-delete"
                                                action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        @endcan
                                        {{-- @endif --}}
                                    </div>
                                </div>
                                <div class="col-4"></div>
                                <div class="col-4">
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
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
