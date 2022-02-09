@extends('template')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 m-5">
            <div class="card">
                <div class="card-header">
                    <h3>  Formulaire pour modifier un étudiant</h3>
                </div>
                <div class="card-body">

                    <form action="{{'/etudiants/'.$list->id}}" method='post' autocomplete="off">
                    {{csrf_field()}} 
                    <input type='hidden' name='_method' value="PUT">
                    <div class="form-group @if($errors->get('matricule')) has-error @endif">
                            <label for="">Matricule :</label>
                            <input type="text" name="matricule" class="form-control" value="{{ $list->matricule}}"
                            required> <!--  onkeyup="return valideMatricule(this.value);" -->
                            @if($errors->has('matricule'))
                            <span class="text-danger">
                                {{ $errors->first('matricule') }}
                            </span>
                            @endif
                            <span class="text-danger" id="ms"></span>
                        </div>
                        <div class="form-group @if($errors->get('nom')) has-error @endif">
                            <label for="">Nom :</label>
                            <input type="text"  name="nom" class="form-control" value="{{ $list->nom}}" required>
                            @if($errors->has('nom'))
                            <span class=" text-danger">
                                {{ $errors->first('nom') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group @if($errors->get('prenom')) has-error @endif">
                            <label for="">Prénom :</label>
                            <input type="text" name="prenom" class="form-control" value="{{ $list->prenom}}"required>
                            @if($errors->has('prenom'))
                            <span class=" text-danger">
                                {{ $errors->first('prenom') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group @if($errors->get('email')) has-error @endif">
                        <label for="">Email :</label>
                            <input type="text"    name="email" class="form-control"  
                                
                                value="{{$list->email}}" required > 
                            @if($errors->has('email'))
                            <span class=" text-danger">
                                {{ $errors->first('email') }}
                            </span>
                            @endif
                            <span class="text-danger" id="msgs"></span>
                        </div>
                        <div class="form-group @if($errors->get('telephone')) has-error @endif">
                            <label >Numero du téléphone :</label>
                            <input type="number" name="telephone" id="numtel"  class="form-control" 
                                oninput="javascript: if (this.value.length > this.maxLength)
                                this.value = this.value.slice(0, this.maxLength);" maxlength = "8" 
                                value="{{$list->telephone}}" required 
                                placeholder="le numéro du téléphone doit commencer par 2 , 3 ou 4" autocomplete="off">
                            @if($errors->has('telephone'))
                                <span class="text-danger">
                                    {{ $errors->first('telephone') }}
                                </span>
                            @endif
                            <span class="text-danger" id="msg"></span>
                        </div>
                        
                        
                       
                        <div class="form-group mt-2">
                            <a href="{{url('etudiants')}}" class="btn btn-danger">Annuler</a>
                        <input type="submit"    value="Enregistrer" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script>
          function valide(numtel){
         
              var 
                    mssg = document.getElementById('msg'),
                    btn = document.getElementById('bt'),
                     regex = /^[234].*$/;
             if(!numtel.match(regex)){
                        
                           mssg.innerHTML = "le numéro de téléphone doit commener par 2 , 3 ou 4";
                           btn.type="button";
                       }
                       else{
                            mssg.innerHTML = "";
                            btn.type="submit";
                    }
                            
                
          }
          function valideEmail(email){
         
         var 
               mssg = document.getElementById('msgs'),
               btn = document.getElementById('bt'),
                regex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if(!email.match(regex)){
                   
                      mssg.innerHTML = "l'email est  invalide'";
                      btn.type="button";
                  }
                  else{
                       mssg.innerHTML = "";
                       btn.type="submit";
               }
                       
           
     }

     function valideMatricule(matricule){
         
         var 
               mssg = document.getElementById('ms'),
               btn = document.getElementById('bt'),
                regex = /^I[0-9]+$/;
        if(!matricule.match(regex)){
                   
                      mssg.innerHTML = "le matricule doit commencer par le lettre 'I' ";
                      btn.type="button";
                  }
                  else{
                       mssg.innerHTML = "";
                       btn.type="submit";
               }
                       
           
     }
      </script>
@endsection
