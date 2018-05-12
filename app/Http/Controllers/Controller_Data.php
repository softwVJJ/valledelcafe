<?php

namespace App\Http\Controllers;

use App\Person;
use App\UserType;
use App\IdentificationType;
use App\EmployeeRole;
use App\Estate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Controller_Data extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if($request->isMethod("post"))
        // {fgjdfg
        //   $user = $_POST['type-user'];
        //   $identification = $_POST['identification_card'];
        //   return view("registro_datos",compact('user','identification'));
        // }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($employeeRole2,$typeUser,$type_identification,$identification,$name,$last_name,$telephone,$address,$email,
                           $nameEstate,$addressEstate,$altitudeEstate,$cityEstate,$veredaEstate)
    {


        $person = new Person;
        $userType = new UserType;

        $validation = $person->find($identification);

        if(count($validation) == 1)
        {
          echo "<script type=\"text/javascript\">
                 alert('El usuario con número de identificación $identification ya esta registrado');
                 history.go(-1);
                </script>";
              exit;
        }

        $person->id = $identification;
        $person->names = $name;
        $person->surnames = $last_name;
        $person->phone = $telephone;
        $person->address = $address;
        $person->email = $email;
        $person->employee_roles_id = $employeeRole2;
        $person->identification_types_id = $type_identification;

        if($person->save()==1)
        {
          $person->user_types()->attach($typeUser);
          if($typeUser == 2)
          {
            $estate = new Estate;
            $estate->people_id = $identification;
            $estate->name = $nameEstate;
            $estate->address = $addressEstate;
            $estate->altitude = $altitudeEstate;
            $estate->municipalities_id = $cityEstate;
            $estate->vereda = $veredaEstate;
            $estate->save();

          }
          echo "<script type=\"text/javascript\">
  								alert('Se ha guardado la información correctamente');
  								location.href = 'registro_datos';
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
      $identificationType = new IdentificationType;
      $employeeRole= new EmployeeRole;

      $identificationType = $identificationType->get();
      $employeeRole= $employeeRole->get();

      $estate= DB::table('people')
                  ->select('estates.id as id_estates','*')
                  ->join('estates', 'people.id', '=', 'estates.people_id')
                  ->orderBy('people.id')
                  ->get();

      $coffeeGrower= DB::table('person_user_type')
                          ->join('people', 'person_user_type.person_id', '=', 'people.id')
                          ->where('person_user_type.user_type_id',2)
                          ->select('*')
                          ->get();

      //$departaments = DB::table('departments')->get();
      $municipalities = DB::table('municipalities')->get();

      $userType = DB::table('user_types')->get();

      $dataPeople = DB::table('people')->get();



      if($request->isMethod("post"))
      {
        $typeUser= $request->input('type-user');
        $employeeRole2= $request->input('employee-role');
        $type_identification = $request->input('type-identification');
        $identification = $request->input('identification-card');
        $name = $request->input('names');
        $last_name = $request->input('last-names');
        $telephone = $request->input('telephone');
        $address = $request->input('address');
        $email = $request->input('email');
        $nameEstate = $request->input('names-estate');
        $addressEstate = $request->input('address-estate');
        $altitudeEstate = $request->input('altitude-estate');
        $cityEstate = $request->input('city-estate');
        $veredaEstate = $request->input('vereda-estate');
        $idDeletePeople = $request->input('id-people-remove');


        if($request->input('delete') == 'delete')
        {
          $this->destroy($idDeletePeople);
        }
        else if($typeUser == 1 && $request->input('save') != "save" && $request->input('update') != "update")
        {
          return view("registro_datos",compact('typeUser','type_identification','identification','name','last_name','telephone',
                                                  'address','email','identificationType','employeeRole','userType','dataPeople','estate','coffeeGrower','municipalities'));
        }
        else if($typeUser == 2 && $request->input('save') != "save" && $request->input('update') != "update")
        {
          return view("registro_datos",compact('typeUser','type_identification','identification','name','last_name','telephone',
                                                  'address','email','identificationType','employeeRole','userType','dataPeople','estate','coffeeGrower','municipalities'));
        }
        else if($typeUser== 3 && $request->input('save') != "save" && $request->input('update') != "update")
        {
          return view("registro_datos",compact('typeUser','type_identification','identification','name','last_name','telephone',
                                                  'address','email','identificationType','employeeRole','userType','dataPeople','estate','coffeeGrower','municipalities'));
        }
        else if($request->input('save') == "save")
        {

          $this->create($employeeRole2,$typeUser,$type_identification,$identification,$name,$last_name,$telephone,$address,$email,
                          $nameEstate,$addressEstate,$altitudeEstate,$cityEstate,$veredaEstate);
        }
        else if($request->input('update') == "update")
        {

          $this->update($employeeRole2,$typeUser,$type_identification,$identification,$name,$last_name,$telephone,$address,$email,
                          $nameEstate,$addressEstate,$altitudeEstate,$cityEstate,$veredaEstate);
        }

      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update($employeeRole2,$typeUser,$type_identification,$identification,$name,$last_name,$telephone,$address,$email,
                    $nameEstate,$addressEstate,$altitudeEstate,$cityEstate,$veredaEstate)
    {

              $person = Person::find($identification);
              $userType = new UserType;

              //$validation = $person->find($identification);

              if(count($person) == 0)
              {
                echo "<script type=\"text/javascript\">
                       alert('El usuario con número de identificación $identification no existe');
                       history.go(-1);
                      </script>";
                    exit;
              }

              $person->id = $identification;
              $person->names = $name;
              $person->surnames = $last_name;
              $person->phone = $telephone;
              $person->address = $address;
              $person->email = $email;
              $person->employee_roles_id = $employeeRole2;
              $person->identification_types_id = $type_identification;

              if($person->save()==1)
              {

                  $personTypeUser =  $person->user_types()->find($typeUser);



                   if($personTypeUser == '')
                   {
                     $person->user_types()->attach($typeUser);
                   }

                  if($typeUser == 2)
                  {

                    $estate = new Estate;
                    $estate->people_id = $identification;
                    $estate->name = $nameEstate;
                    $estate->address = $addressEstate;
                    $estate->altitude = $altitudeEstate;
                    $estate->municipalities_id = $cityEstate;
                    $estate->vereda = $veredaEstate;
                    $estate->save();


                  }
                  echo "<script type=\"text/javascript\">
        								alert('Se ha guardado la información correctamente');
        								location.href = 'registro_datos';
        						   </script>";

              }
              else if($person->save()==0)
              {
                echo "<script type=\"text/javascript\">
                       alert('El usuario con número de identificación $identification no existe');
                       history.go(-1);
                      </script>";
               exit;

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $people_id = $id;
      $estates = Estate::where('people_id',$id)->delete();//::find($estates_id);

      $person = Person::find($id)->tags()->detach();
      $person->user_types()->detach($id);



      if($person->delete()==1)
      {
        echo "<script type=\"text/javascript\">
                alert('Se ha eliminado la información correctamente');
                location.href = 'registro_datos';
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
}
