<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\YieldFactor;
use App\CupProfile;
use App\InputLot;
use App\ProductionLot;
use App\Machine;
use Illuminate\Support\Facades\DB;

use DateTime;

class Controller_Lots extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idEstate,$inputDate,$kilosNumber,$avaibleKilos,$pasillaPercentage,$whitePercentage,
                              $fermentedPercentage,$borer,$yieldfactor,$cupscore,$armona,$flavor,$acidity,$body,
                                  $sweetnees,$balanceValue,$balanceDescription,$btnManage)
    {
      $yieldFactor = new YieldFactor;
      $cupProfile = new CupProfile;
      $inputLot = new InputLot;
      $productionLots = new ProductionLot;

      $productionLots->start_time = '00:00:00 AM';
      $productionLots->end_time = '00:00:00 PM';
      $save = $productionLots->save();
      $productionLotsId=$productionLots->id;

      $yieldFactor->pasilla_percentage= $pasillaPercentage;
      $yieldFactor->white_percentage= $whitePercentage;
      $yieldFactor->fermented_percentage= $fermentedPercentage;
      $yieldFactor->berry_borer_percentage= $borer;
      $yieldFactor->yield_factor= $yieldfactor;
      $save1 = $yieldFactor->save();
      $cupProfilesId=$yieldFactor->id;


      $cupProfile->cup_score = $cupscore;
      $cupProfile->aroma = $armona;
      $cupProfile->flavor = $flavor;
      $cupProfile->acidity = $acidity;
      $cupProfile->body = $body;
      $cupProfile->sweetness = $sweetnees;
      $cupProfile->balance_value = $balanceValue;
      $cupProfile->balance_description = $balanceDescription;
      $cupProfile->total_input_weight = 10;
      $cupProfile->estimated_output = 100;
      $save2 = $cupProfile->save();
      $yieldFactorId = $cupProfile->id;



      $inputLot->estates_id = $idEstate;
      $inputLot->input_date = $inputDate;
      $inputLot->kilos_number = $kilosNumber;
      $inputLot->available_kilos = $avaibleKilos;
      $inputLot->state = 'P';
      $inputLot->cup_profiles_id = $cupProfilesId;
      $inputLot->yield_factors_id = $yieldFactorId;
      $inputLot->production_lots_id = $productionLotsId;
      $save3 = $inputLot->save();

      if($save ==1 && $save1 == 1 && $save2 == 1 && $save3 == 1)
      {
        echo "<script type=\"text/javascript\">
                alert('Se ha guardado la información correctamente');
                location.href = 'register_lots';
               </script>";

      }
      else
      {
        echo "<script type=\"text/javascript\">
               alert('Ha ocurido un error al actualizar la información');
               history.go(-1);
              </script>";
       exit;

      }




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request->isMethod("post"))
      {
        $idEstate = $request->input('id-estate');
        $inputDate = $request->input('input-date');
        $kilosNumber = $request->input('kilos-number');
        $avaibleKilos = $request->input('avaible-kilos');
        $pasillaPercentage = $request->input('pasilla-percentage');
        $whitePercentage = $request->input('white-percentage');
        $fermentedPercentage = $request->input('fermented-percentage');
        $borer = $request->input('borer');
        $yieldfactor = $request->input('yield-factor');
        $cupscore = $request->input('cup-score');
        $armona = $request->input('aroma');
        $flavor = $request->input('flavor');
        $acidity = $request->input('acidity');
        $body = $request->input('body');
        $sweetnees = $request->input('sweetnees');
        $balanceValue = $request->input('balance-value');
        $balanceDescription = $request->input('balance-description');
        $btnManage = $request->input('btn-manage');

        if($btnManage == "add")
        {

          $this->create($idEstate,$inputDate,$kilosNumber,$avaibleKilos,$pasillaPercentage,$whitePercentage,
                                    $fermentedPercentage,$borer,$yieldfactor,$cupscore,$armona,$flavor,$acidity,$body,
                                        $sweetnees,$balanceValue,$balanceDescription,$btnManage);

        }
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $detailsLost= $this->detailsLost();
      $machine = Machine::get();


      return view("process_lots",compact('detailsLost','machine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


      if($request->isMethod("post"))
      {
        $idLot= $request->input('production');
        //$productionLots = ProductionLot;
        $inputLot = InputLot::find($idLot);
        $inputLot->state = 'A';
        $productionLot = ProductionLot::find($inputLot->production_lots_id);
        $yieldFactor = YieldFactor::find($inputLot->yield_factors_id);

        $starTime = $this->getDateHours();
        $endTime = $this->machinesProduction($yieldFactor);

        $productionLot->start_time = $starTime;
        $productionLot->end_time = $endTime;
        $productionLot->save();
        $inputLot->save();

        $detailsLost= $this->detailsLost();
        $machine= DB::table('machines')
                            ->select('*')
                            ->get();


        return view("process_lots",compact('detailsLost','machine'));




      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function machinesProduction($yieldFactor)
    {
      $pasillaPercentage = $yieldFactor->pasilla_percentage;
      $whitePercentage = $yieldFactor->white_percentage;
      $fermentedPercentage = $yieldFactor->fermented_percentage;
      $borer = $yieldFactor->berry_borer_percentage;
      $minutes =0;

      $machine = Machine::find(1);
      $machine->state = 'I';
      $machine->save();

      $machine = Machine::find(2);
      $machine->state = 'I';
      $machine->save();

      $machine = Machine::find(3);
      $machine->state = 'I';
      $machine->save();

      $machine = Machine::find(4);
      $machine->state = 'I';
      $machine->save();

      $machine = Machine::find(5);
      $machine->state = 'I';
      $machine->save();


      if($pasillaPercentage>0)
      {

        $machine = Machine::find(1);
        $machine->state = 'A';
        $machine->save();
        $minutes +=60;

      }
      if($whitePercentage>0 && $fermentedPercentage>0 && $borer>0)
      {
        $machine = Machine::find(2);
        $machine->state = 'A';
        $machine->save();
        $minutes +=60;
      }
      if($whitePercentage>3 && $fermentedPercentage>3 && $borer>3)
      {
        $machine = Machine::find(3);
        $machine->state = 'A';
        $machine->save();
        $minutes +=60;
      }

      $machine = Machine::find(4);
      $machine->state = 'A';
      $machine->save();
      $minutes +=60;

      $machine = Machine::find(5);
      $machine->state = 'A';
      $machine->save();
      $minutes +=60;

      return $this->addMinutes($minutes);

    }

   /**
   **Obtiene el valor de hora minutos y segundos.
   **/
    public function getDateHours()
    {
      $hoy = getdate();
      $hour = $hoy['hours'];
      $minutes = $hoy['minutes'];
      $seconds = $hoy['seconds'];

      return $hour.":".$minutes.":".$seconds;
    }

    public function addMinutes($minutes)
    {
      $date = new DateTime();
      $date->modify('0 hours');
      $date->modify('+'.$minutes.' minute');
      $date->modify('0 second');
      return $date->format('H:i:s');
    }

    public function detailsLost()
    {

      $detailsLost= DB::table('yield_factors')
                          ->join('input_lots', 'yield_factors.id', '=', 'input_lots.yield_factors_id')
                          ->join('estates', 'input_lots.estates_id', '=', 'estates.id')
                          ->join('people', 'estates.people_id', '=', 'people.id')
                          ->join('production_lots', 'input_lots.production_lots_id', '=', 'production_lots.id')
                          ->whereIn('state',array('A','P'))
                          ->select('input_lots.id as lots_id','*')
                          ->get();


      return $detailsLost;
    }
}
