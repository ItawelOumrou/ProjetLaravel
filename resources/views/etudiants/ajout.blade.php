@extends('template')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 m-3" >
            <div class="card">
                <div class="card-header">
                    <h3>  Formulaire ajouter un étudiant</h3>
                </div>
                <div class="card-body">

                    <form action="{{'/etudiants'}}" method='post' autocomplete="off">
                    {{csrf_field()}} 
                    <div class="form-group @if($errors->get('matricule')) has-error @endif">
                            <label for="">Matricule :</label>
                            <input type="text" name="matricule" id="matricule" class="form-control"  
                             value="{{ old('matricule')}}" required>
                            @if($errors->has('matricule'))
                            <span class="text-danger">
                                {{ $errors->first('matricule') }}
                            </span>
                            @endif
                            <span class="text-danger" id="ms"></span>
                        </div>
                        <div class="form-group @if($errors->get('nom')) has-error @endif">
                            <label for="">Nom :</label>
                            <input type="text"  name="nom" class="form-control" value="{{ old('nom')}}" required>
                            @if($errors->has('nom'))
                            <span class=" text-danger">
                                {{ $errors->first('nom') }}
                            </span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->get('prenom')) has-error @endif">
                            <label for="">Prénom :</label>
                            <input type="text" name="prenom" class="form-control" value="{{ old('prenom')}}"required>
                            @if($errors->has('prenom'))
                            <span class=" text-danger">
                                {{ $errors->first('prenom') }}
                            </span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->get('email')) has-error @endif">
                        <label for="">Email :</label>
                            <input type="text"    name="email" id="email" class="form-control" 
                            
                                value="{{ old('email')}}" required > 
                            @if($errors->has('email'))
                            <span class=" text-danger">
                                {{ $errors->first('email') }}
                            </span>
                            @endif
                            <span class="text-danger" id="msgs"></span>
                        </div>
                        <div class="form-group @if($errors->get('telephone')) has-error @endif">
                            <label>Numero du téléphone :</label>
                            <input type="number" name="telephone" id="numtel"  class="form-control" 
                                oninput="javascript: if (this.value.length > this.maxLength)
                                this.value = this.value.slice(0, this.maxLength);" maxlength = "8" 
                                value="{{ old('telephone')}}" required 
                                 autocomplete="off">
                            @if($errors->has('telephone'))
                                <span class="text-danger">
                                    {{ $errors->first('telephone') }}
                                </span>
                            @endif
                            <span class="text-danger" id="msg"></span>
                        </div>
                        
                        <div class="form-group @if($errors->get('intitule')) has-error @endif">
                            <label for="">Intitué :</label>
                            <input type="text" name="intitule" class="form-control" value="{{ old('intitule')}}"required>
                            @if($errors->has('intitule'))
                            <span class=" text-danger">
                                {{ $errors->first('intitule') }}
                            </span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->get('nomEtablissement')) has-error @endif">
                            <label for="">Non de l'établissement :</label>
                            <input type="text" name="nomEtablissement" class="form-control" value="{{ old('nomEtablissement')}}"required>
                            @if($errors->has('nomEtablissement'))
                            <span class=" text-danger">
                                {{ $errors->first('nomEtablissement') }}
                            </span>
                            @endif
                        </div>
                       
                        <div class="form-group mt-2">
                            <a href="{{url('etudiants')}}" class="btn btn-danger">Annuler</a>
                        <input type="submit" id="bt"   value="Enregistrer" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    @endsection
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
          </script>
          <script>
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
     </script>
     <script>

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