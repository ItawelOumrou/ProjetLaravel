
<form action="{{url('etudiants/'.$liste->id)}}" method="post">
{{ csrf_field() }}
{{ method_field('DELETE') }}

    <div class="modal fade" id="ModalDelete{{$liste->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-tittle" >Confirmation</h5>
                    </div>
                        <div class="modal-body">
                            Voulez-vous supprimer ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> {{ __('Non') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Oui') }}</button>
                        </div>
                        
                </div>
            </div>
        </div>
  </form>
  
