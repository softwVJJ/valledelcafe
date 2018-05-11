
          <div class="table-responsive">
            <table class="table-bordered" id="table-estate" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>@lang("vista.coffee-grower")</th>
                  <th>@lang("vista.identification_card")</th>
                  <th>@lang("vista.information_estate")</th>
                </tr>
              </thead>
              <tbody>
              @foreach($coffeeGrower as $coffeeGrower)
                <tr>
                  <td>{{$coffeeGrower->names." ".$coffeeGrower->surnames}}</td>
                  <td>{{$coffeeGrower->id}}</td>
                  <td>
                      <button class="btn btn-primary" id="{{$coffeeGrower->id}}" onclick="addEstate(this.id)" data-toggle="tooltip" title="@lang("vista.add_estate")"><i class="fa fa-home"></i></i></button>
                      <table class="table table-bordered text-center">
                      <thead>
                        <tr>
                          <th>Nombre finca</th>
                          <th>@lang("vista.address")</th>
                          <th>@lang("vista.altitude_estate")</th>
                          <th>@lang("vista.city_estate")</th>
                          <th>@lang("vista.vereda_estate")</th>
                          <th>@lang("vista.edit")</th>
                          <th>@lang("vista.remove")</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($estate as $estate2)
                        @if($estate2->people_id == $coffeeGrower->person_id)
                        <tr>
                          <td id="name{{$estate2->id_estates}}">{{$estate2->name}}</td>
                          <td id="address{{$estate2->id_estates}}">{{$estate2->address}}</td>
                          <td id="altitude{{$estate2->id_estates}}">{{$estate2->altitude}}</td>
                          <td id="municipalities_id{{$estate2->id_estates}}">{{$estate2->municipalities_id}}</td>
                          <td id="vereda{{$estate2->id_estates}}">{{$estate2->vereda}}</td>
                          <label for="id" id="identification{{$estate2->id_estates}}">{{$coffeeGrower->id}}</label>
                          <td><button id="{{$estate2->id_estates}}" class="btn btn-primary" onclick="editEstate(this.id)"><i class="fa fa-edit"></i></button></td>
                          <td><button id="{{$estate2->id_estates}}" class="btn btn-danger" onclick="removeEstate(this.id)"><i class="fa fa-trash"></i></button></td>
                        </tr>
                          @endif
                        @endforeach
                    </tbody>
                    </table>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <!-- Modal actualizar fincas -->
          <div class="modal fade bd-example-modal-lg" id="modal-edit-estate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><B>Actualizar finca</B></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="update_estate" method="post">
                  {{ csrf_field() }}
              <input type="text" for="id-estate" name="id-estate" value="" id="id-estate">
                @include("manage.add_estate")
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang("vista.button_close")</button>
              <button class="btn btn-primary" name="btn-manage" value="save" type="submit">@lang("vista.button_save")</button>
              </form>
            </div>
            </div>
          </div>
          </div>
        </div>

        <!-- Modal eliminar fincas -->
        <div class="modal fade" id="modal-remove-estate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><B>@lang("vista.title_remove_estate")</B></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="create_estate" method="post">
                  {{ csrf_field() }}
                  <div class="form-group row">
               <h6>@lang("vista.confirmation_delete")</h6>
               <div class="col-2">
                <input class="form-control" type="text" for="id-estate-remove" name="id-estate-remove" value="" id="id-estate-remove" readonly="true">
               </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang("vista.button_close")</button>
                 <button class="btn btn-primary" name="btn-manage" value="delete" type="submit">@lang("vista.button_delete")</button>
               </div>
          </form>

          </div>
        </div>
        </div>
        </div>

        <!-- Modal agregar fincas -->
        <div class="modal fade bd-example-modal-lg" id="modal-add-estate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><B>@lang("vista.add_estate")</B></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="add_estate" method="post">
                {{ csrf_field() }}

            <input type="text" for="identification-add-estate" name="identification-add-estate" value="" id="identification-add-estate">
              @include("manage.add_estate")

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang("vista.button_close")</button>
            <button class="btn btn-primary" name="btn-manage" value="add" type="submit">@lang("vista.button_save")</button>
            </form>
          </div>
          </div>
        </div>
        </div>
      </div>
