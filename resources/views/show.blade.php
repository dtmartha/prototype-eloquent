@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/public.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
    <a href="/home" class="btn btn-secondary">← Ga terug</a><br><br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if($person != null)
                <div class="card-header">{{$person->firstname}}
                    @if($person->user_id == auth()->user()->id)
                    <button type="button" class="btn btn-primary marginLeft" data-toggle="modal" data-target="#createGroupModal">Gebruiker bewerken</button>
                    @endif
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div>
                        <p>Email: {{$person->email}}</p>
                        <p>Adres: {{$person->streetname}} {{$person->housenumber}}</p>
                        <p>Postcode: {{$person->postalcode}}</p>
                        <p>Aangemaakt op: {{ Carbon\Carbon::parse($person->created_at)->format('d-m-Y') }}

                        </p>
                    </div>
                    @if($person->user_id == auth()->user()->id)
                    <div>
                        <form action="/deletePeople/{{$person->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger float">Gebruiker verwijderen</button>

                        </form>
                    </div>
                    @endif

                    <div id="createGroupModal" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Gebruiker bewerken</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/editPeople" method="POST" id="makeGroup">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="form-group">
                                            <input id="voornaam" type="text" name="voornaam" class="form-control" placeholder="Voornaam" value="{{$person->firstname}}">
                                        </div>
                                        <div class="form-group">
                                            <input id="straatnaam" type="text" name="straatnaam" class="form-control" placeholder="Straatnaam" value="{{$person->streetname}}">
                                        </div>
                                        <div class="form-group">
                                            <input id="huisnummer" type="number" name="huisnummer" class="form-control" placeholder="Huisnummer" value="{{$person->housenumber}}">
                                        </div>
                                        <div class="form-group">
                                            <input id="postcode" type="text" name="postcode" class="form-control" placeholder="Postcode" value="{{$person->postalcode}}">
                                        </div>
                                        <div class="form-group">
                                            <input id="email" type="email" name="email" class="form-control" placeholder="Email" value="{{$person->email}}">
                                        </div>
                                        <div class="form-group opacity">
                                            <input id="id" type="number" name="id" class="form-control" value="{{$person->id}}">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary" id="sendGroep">Opslaan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
