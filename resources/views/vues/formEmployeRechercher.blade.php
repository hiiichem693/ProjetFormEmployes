@extends('layouts.master')
@section('content')
    <div>
        <br> <br>
        <br> <br>
        <div class="container">
            <div class="blanc">
                <h1>Rechercher un employé</h1>
                </div>
                {!! Form::open(array('route' => array ('SelectEmploye'),'method'=>'post')) !!}
                <div class="form-horizontal">
                <div class="form-group">
                    <select class="form-control" name="cbEmplyes" id="Id_Employe" required>
                        @foreach($mesEmployes as $unE){
                        <option value="{{$unE->numEmp}}">{{$unE->nom}}</option>
                        }
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 cold-md-offset-3 col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-ok"></span> Valider
                    </button>
                    &nbsp;
                    <button type="button" class="btn btn-default btn-primary"
                            onclick="javascript:if(confirm('vous êtes sûr ?')) window.location = '{{ url('/')}}';">
                        <span class="glyphicon glyphicon-remove"></span> Annuler
                    </button>
                </div>
            </div>
        </div>
    </div>
@stop
