<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use League\Csv\Reader;
use League\Csv\Writer;
use Validator;
use Monolog\Logger;
use Logentries\Handler;




class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data[] = $this->getAllClient();
        return $data;
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validation = Validator::make($request->all(), [
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address'=>'required',
            'nationality' => 'required',
            'date_of_birth' => 'required',
            'education_background' => 'required',
            'preferred_mode_of_contact' => 'required',
       ]);

       if($validation->fails()){
            return $validation->messages();
         }

        $name                      = $request->input('name');
        $gender                    = $request->input('gender');
        $phone                     = $request->input('phone');
        $email                     = $request->input('email');
        $address                   = $request->input('address');
        $nationality               = $request->input('nationality');
        $date_of_birth             = $request->input('date_of_birth');
        $education_background      = $request->input('education_background');
        $preferred_mode_of_contact = $request->input('preferred_mode_of_contact');

        $data = [
        $name, $gender, $phone, $email, $address, $nationality, $date_of_birth, 
        $education_background, $preferred_mode_of_contact
        ];

        $log = new Logger('client');
            $log->pushHandler(new \Logentries\Handler\LogentriesHandler
            ('166c4117-525f-494a-9736-f37b7c6c7308'));
        $addData=$this->addClient($data);
        if($addData){

            
            $log->addInfo('Client Inserted Successfully');
            return ('Client Inserted Successfully');
        }
        else{

            $log->addWarning('Problem inserting client');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    /**
    * Get all client's data from the csv file.
    * 
    * @return array of data
    */
    private function getAllClient()
    {
        $csvData = Reader::createFromPath(base_path().'/data/client.csv');
        $csvData->setDelimiter(';');
        $csvData->setEncodingFrom("iso-8859-15");
        return $csvData;
    }

    /**
    * Add client's data to the csv file.
    *
    *@param array of data
    */
    private function addClient($data)
    {
        $csvData = Writer::createFromPath(base_path().'/data/client.csv','a+'); 
        $csvData->setDelimiter(";"); 
        $csvData->setNewline("\r\n"); 
        $csvData->setOutputBOM(Writer::BOM_UTF8); 
        return $csvData->insertOne($data);

    }

}



        

   



        
    
       
    

    