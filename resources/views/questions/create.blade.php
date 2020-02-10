@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Ask questions</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}">All question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('questions.store') }}" method="post">
                        @csrf
    
                        <div class="form-group">
                            <label for="question=title">Question Title</label>
                            <input type="text" name="title" id="quetions-title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" /> 

                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="question-body">Enter your question</label>
                            <textarea name="body" id="quetion-body" rows="10" class="form-control  {{ $errors->has('body') ? 'is-invalid' : '' }}"></textarea>
                            
                            @if ($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-long">Ask this question</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
