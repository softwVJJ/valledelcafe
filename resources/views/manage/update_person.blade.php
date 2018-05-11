<div class="table-responsive">
<table class="table-bordered text-center" id="table-update-person"  width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>@lang("vista.identification_card")</th>
      <th>@lang("vista.names")</th>
      <th>@lang("vista.last_name")</th>
      <th>@lang("vista.telephone")</th>
      <th>@lang("vista.address")</th>
      <th>@lang("vista.email")</th>
      <th>@lang("vista.type_user")</th>
      <th>@lang("vista.edit")</th>
      <!--<th>@lang("vista.remove")</th>-->
    </tr>
  </thead>
  <tbody>
       @foreach($dataPeople as $dataPeople)
        <tr>
          <td id="id{{$dataPeople->id}}">{{$dataPeople->id}}</td>
          <td id="names{{$dataPeople->id}}">{{$dataPeople->names}}</td>
          <td id="surnames{{$dataPeople->id}}">{{$dataPeople->surnames}}</td>
          <td id="phone{{$dataPeople->id}}">{{$dataPeople->phone}}</td>
          <td id="address{{$dataPeople->id}}">{{$dataPeople->address}}</td>
          <td id="email{{$dataPeople->id}}">{{$dataPeople->email}}</td>
          <td id="email{{$dataPeople->id}}">{{$dataPeople->email}}</td>
          <td><button id="{{$dataPeople->id}}" class="btn btn-primary" onclick="editPeople(this.id)"><i class="fa fa-edit"></i></button></td>
          <!--<td><button id="{{$dataPeople->id}}" class="btn btn-danger" onclick="removePeople(this.id)"><i class="fa fa-trash"></i></button></td>-->
        </tr>
       @endforeach
  </tbody>
</table>
</div>


        <!-- Modal eliminar persona -->
        <div class="modal fade" id="modal-remove-people" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><B>Eliminar Persona</B></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="delete_people" method="post">
                  {{ csrf_field() }}
                  <div class="form-group row">
               <label for="example-text-input" class="col-3 col-form-label">Id:</label>
               <div class="col-4">
                <input class="form-control" type="text" name="id-people-remove" value="" id="id-people-remove" readonly="true">
               </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                 <button class="btn btn-primary" name="delete" value="delete" type="submit">Eliminar</button>
               </div>
          </form>

          </div>
        </div>
        </div>
        </div>

        <!-- Modal editar personas -->
        <div class="modal fade bd-example-modal-lg" id="modal-edit-people" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="create_data" method="post" id="create-lots">
                {{ csrf_field() }}
             <label></label>
            <input type="text" for="id-estate" name="id-estate" value="" id="id-estate">
            @include("manage.register_person");


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button class="btn btn-primary" name="btn-manage" value="add" type="submit">@lang("vista.button_save")</button>
            </form>
          </div>
          </div>
        </div>
        </div>
      </div>
