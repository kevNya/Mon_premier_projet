@extends('welcome')

@section('title', 'listedepatient')
@section('content')
<div class="d-flex justify-content-between">
    <h1 style=" margin-left: 1%"; class="text-muted">Staff List </h1>
    <div  class="search-container mt-3 ml-3">
    </div>
    <div  class="search-container text-end mt-3 mr-3">
        <form method="GET" action="{{route('menupatient')}}" >
        <button type="submit" class="btn btn-primary changecolore">
           Menu
        </button>
    </form>
    </div>
</div>
<div class="container">
    <div class="display2">
        <div class="left-box3">
            @if(count($lestaff) > 0)
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Name </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lestaff as $rdv)
                        <tr>
                            <td><a href="{{route('page_detailstaff',['nomperso' =>$rdv->name])}}">{{ $rdv->name }}</a></td>
                            {{-- {{route('pagedetailsMateriel',['nomperso' =>$rdv->name])}} --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div  class="alert alert-danger text-center col-md-4 mx-auto mt-5 clignotant" role="alert">
                <strong>This patient is not in our list</strong>
            </div>
        @endif
        </div>
        <div class="right-box3">
            <div class="profile-card">
                <!-- Photo Section -->
                <div class="photo">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Default Photo">
                </div>

                <!-- Info Section -->
                <div class="info">
                    <h3>Name: <strong>Kevin Nya</strong></h3><br><br><br>
                    <p>Email: <strong>kevinnya@gmail.com</strong></p><br><br>
                    <p>Phone: <strong>+1565654654665</strong></p><br><br>
                    <p>Role: <strong>Admin</strong></p><br><br>
                    <p>Age: <strong>30</strong></p><br><br>
                    <p>Sex: <strong>M</strong></p><br><br>

                </div>
            </div>
        </div>
    </div>


</div>
@endsection
