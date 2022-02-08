@extends('template')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 m-5" >
            <div class="card">
                <div class="card-header">
                    <h3>  Formulaire pour modifier une diplome</h3>
                </div>
                <div class="card-body">

                    <form action="{{'/diplomes/'.$dp->id}}" method='post' autocomplete="on">
                    {{csrf_field()}} 
                    <input type='hidden' name='_method' value="PUT">

                    <div class="form-group @if($errors->get('reference')) has-error @endif">
                            <label for="">Nom & Prenom :</label>
                            <select name="reference" id="" class="form-control">
                            @foreach($et as $et) 
                                @if($dp->reference == $et->id)
                                    <option value="{{$et->id}}">{{$et->prenom}} {{$et->nom}}</option>
                                    @continue
                                    @endif
                                    <option value="{{$et->id}}">{{$et->prenom}} {{$et->nom}}</option>
                                
                            @endforeach
                                
                            </select>
                            @if($errors->has('reference'))
                            <span class="text-danger">
                                {{ $errors->first('reference') }}
                            </span>
                            @endif
                        </div>
                        
                        <div class="form-group @if($errors->get('intitule')) has-error @endif">
                            <label for="">Intitué :</label>
                            <input type="text" name="intitule" class="form-control" value="{{$dp->intitule}}"required>
                            @if($errors->has('intitule'))
                            <span class=" text-danger">
                                {{ $errors->first('intitule') }}
                            </span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->get('nomEtablissement')) has-error @endif">
                            <label for="">Non de l'établissement :</label>
                            <input type="text" name="nomEtablissement" class="form-control" value="{{$dp->nomEtablissement}}" required>
                            @if($errors->has('nomEtablissement'))
                            <span class=" text-danger">
                                {{ $errors->first('nomEtablissement') }}
                            </span>
                            @endif
                        </div>
                       
                        <div class="form-group mt-2">
                            <a href="{{url('diplomes')}}" class="btn btn-danger">Annuler</a>
                        <input type="submit" id="bt"   value="Enregistrer" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
