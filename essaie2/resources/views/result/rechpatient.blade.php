

@section('title', 'rechpatient')
@section('content')
@extends('welcome')

@section('title', 'Admin_Session')
@section('content')

    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between">
                <h1 style=" margin-left: 1%"; class="text-muted">Please enter the patient code </h1>
                <div  class="search-container text-end mt-3 ml-3">
                    <form method="POST" action="{{route('page_pdfexport')}}">
                        @csrf
                    <input type="text" class="search-bar" name="rechpatients" placeholder="Insert name user...">
                    <button type="submit" class="search-button changecolore">
                        <i class="fas fa-search fa-1x"></i>
                    </button>
                </form>
                </div>
                <div  class="search-container text-end mt-3 mr-3">
                    <form method="GET" action="{{route('menupatient')}}" >
                        <button type="submit" class="btn btn-primary changecolore">
                           Menu
                        </button>
                        </form>
                </div>
            </div>
        @include('alert')
        </div>

    </div>

@endsection
