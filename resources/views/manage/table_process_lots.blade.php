
          <div class="table-responsive">
            <table class="table-bordered" id="table-estate" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>@lang("vista.th-waiting_lots")</th>
                  <th>@lang("vista.th-inprocess_lots")</th>
                </tr>
              </thead>
              <tbody>
                <td>
                  <form action="production_lots" method="post">
                    {{ csrf_field() }}
                    <table class="table table-bordered text-center">
                    <thead>
                      <tr>
                        <th>@lang("vista.id_lot")</th>
                        <th>@lang("vista.label_details_lots")</th>
                        <th>@lang("vista.label_enter_production_lost")</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($detailsLost as $detailsLost1)
                       <tr>
                         @if($detailsLost1->state == 'P')
                          <td>{{$detailsLost1->lots_id}}</td>
                          <td><button id="{{$detailsLost1->lots_id}}" class="btn btn-info" onclick="viewLots(this.id)"><i class="fa fa-eye"></i></button></td>
                          <td><button type="submit" id="" name="production" value="{{$detailsLost1->lots_id}}" class="btn btn-info" onclick="viewLots(this.id)"><i class=" fa fa-sign-in"></i></button></td>
                         @endif
                       </tr>
                        @endforeach
                  </tbody>
                  </table>
                </form>
                </td>
                <td>
                  <table class="table table-bordered text-center">
                  <thead>
                    <tr>
                      <th>@lang("vista.label_hour_start")</th>
                      <th>@lang("vista.label_machine_trilla")</th>
                      <th>@lang("vista.label_machine_desimetric")</th>
                      <th>@lang("vista.label_machine_electronic")</th>
                      <th>@lang("vista.label_machine_tostion")</th>
                      <th>@lang("vista.label_machine_select")</th>
                      <th>@lang("vista.label_hour_end")</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($detailsLost as $detailsLost1)
                    <tr>
                      @if($detailsLost1->state == 'A')
                        <td>{{$detailsLost1->start_time}}</td>
                        @foreach($machine as $machine1)
                          @if($machine1->id == 1)
                            <td>{{$machine1->state}}</td>
                          @endif
                        @endforeach
                        @foreach($machine as $machine1)
                          @if($machine1->id == 2)
                            <td>{{$machine1->state}}</td>
                          @endif
                        @endforeach
                        @foreach($machine as $machine1)
                          @if($machine1->id == 3)
                            <td>{{$machine1->state}}</td>
                          @endif
                        @endforeach
                        @foreach($machine as $machine1)
                          @if($machine1->id == 4)
                            <td>{{$machine1->state}}</td>
                          @endif
                        @endforeach
                        @foreach($machine as $machine1)
                          @if($machine1->id == 5)
                            <td>{{$machine1->state}}</td>
                          @endif
                        @endforeach
                        <td>{{$detailsLost1->end_time}}</td>
                        @endif
                    </tr>
                    @endforeach

                </tbody>
                </table>
                </td>


              </tbody>
            </table>
          </div>
