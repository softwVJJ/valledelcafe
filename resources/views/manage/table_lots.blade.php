
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
                      <table class="table table-bordered text-center">
                      <thead>
                        <tr>
                          <th >@lang("vista.names_estate")</th>
                          <th>@lang("vista.address")</th>
                          <th>@lang("vista.altitude_estate")</th>
                          <th>@lang("vista.city_estate")</th>
                          <th>@lang("vista.vereda")</th>
                          <th>@lang("vista.label_add_lot")</th>
                          <th>@lang("vista.label_view_lot")</th>
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
                          <td><button id="{{$estate2->id_estates}}" class="btn btn-primary" onclick="addLots(this.id)"><i class="fa fa-edit"></i></button></td>
                          <td><button id="{{$estate2->id_estates}}" class="btn btn-info" onclick="viewLots(this.id)"><i class="fa fa-eye"></i></button></td>
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

        <!-- Modal eliminar lotes -->
        <div class="modal fade" id="modal-remove-estate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><B>Eliminar finca</B></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="create_estate" method="post">
                  {{ csrf_field() }}
                  <div class="form-group row">
               <label for="example-text-input" class="col-3 col-form-label">Id:</label>
               <div class="col-2">
                <input class="form-control" type="text" name="id-estate-remove" value="" id="id-estate-remove" readonly="true">
               </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                 <button class="btn btn-primary" name="btn-manage" value="delete" type="submit">Eliminar</button>
               </div>
          </form>

          </div>
        </div>
        </div>
        </div>

        <!-- Modal agregar lotes -->
        <div class="modal fade bd-example-modal-lg" id="modal-add-lots" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="create_lots" method="post" id="create-lots">
                {{ csrf_field() }}
             <label></label>
            <input type="text" for="id-estate" name="id-estate" value="" id="id-estate">
              @include("manage.add_lots")
              @include("manage.add_factor")
              @include("manage.cup_profiles")

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button class="btn btn-primary" name="btn-manage" value="add" type="submit">@lang("vista.button_save")</button>
            </form>
          </div>
          </div>
        </div>
        </div>
      </div>

<!-- Modal ver lotes -->
      <div class="modal fade bd-example-modal-lg" id="modal-add-lots" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

        </div>
        </div>
      </div>
      </div>
    </div>
