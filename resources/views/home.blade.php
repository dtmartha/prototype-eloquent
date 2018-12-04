@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createGroupModal">Gebruiker aanmaken</button>

                    <div>
                        @if($peoples != null)
                        <h3>Gebruikers</h3>
                        @foreach ($peoples as $people)
                        <div>
                        <a title="Gebruiker bekijken" href="/home/{{$people->id}}"><p>{{$people->firstname}}</p></a>
                        </div>

                            @endforeach
                        </div>
                        @else
                        <h3>Er zijn geen gebruikers gevonden.</h3>
                        @endif


                        <div id="createGroupModal" class="modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Gebruiker aanmaken</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/storePeople" method="POST" id="makeGroup">
                                        <div class="modal-body">
                                            @csrf
                                            <div class="form-group">
                                                <input id="voornaam" type="text" name="voornaam" class="form-control" placeholder="Voornaam">
                                            </div>
                                            <div class="form-group">
                                                <input id="straatnaam" type="text" name="straatnaam" class="form-control" placeholder="Straatnaam">
                                            </div>
                                            <div class="form-group">
                                                <input id="huisnummer" type="number" name="huisnummer" class="form-control" placeholder="Huisnummer">
                                            </div>
                                            <div class="form-group">
                                                <input id="postcode" type="text" name="postcode" class="form-control" placeholder="Postcode">
                                            </div>
                                            <div class="form-group">
                                                <input id="email" type="email" name="email" class="form-control" placeholder="Email">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                                            <button type="submit" class="btn btn-primary" id="sendGroep">Opslaan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
