<?php

if(isset($_POST['getdata']) && ($_POST['getdata'] ==1)){
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.spacexdata.com/v3/launches/upcoming?limit=10",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache",
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $result = json_decode($response);
  }

  $dataRe = array();

    foreach ($result as $row) { 
    	$r = array();
    	$r['flight_number'] = $row->flight_number;
        $r['mission_name'] =  $row->mission_name;                 
        $r['launch_year'] =   $row->launch_year;     
        $r['launch_date_local'] = $row->launch_date_local;          
        $r['rocket_id']    =     $row->rocket->rocket_id;              
        $r['details']  =   $row->details;               
        $dataRe[] = $r;
    } 

  echo json_encode($dataRe);
  exit;
}