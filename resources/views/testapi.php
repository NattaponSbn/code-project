<?php

use function GuzzleHttp\json_encode;

include('rmccue/requests/library/Requests.php');
    Requests::register_autoloader();
    $headers = array(
        
        'Authorization' => 'Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL3dzLzIwMDgvMDYvaWRlbnRpdHkvY2xhaW1zL3JvbGUiOiJBZG1pbmlzdHJhdG9yIiwiaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvd3MvMjAwNS8wNS9pZGVudGl0eS9jbGFpbXMvZW1haWxhZGRyZXNzIjoiNjAwMjA2MzdAdXAuYWMudGgiLCJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1laWRlbnRpZmllciI6IjI1OWU4Yjc3LWQ4M2YtNDdiMi04Nzg1LTJmNTQ5MGFmNzA4ZiIsImV4cCI6MTYwMTYyMjE3NiwiaXNzIjoiaWQuY29weWxlYWtzLmNvbSIsImF1ZCI6ImFwaS12My5jb3B5bGVha3MuY29tIn0.R-13tinXyNKiHvDOsSPK6HFfwf_aNM5ZqMJhy3Ufrxg7NDlpYOVvXyqTDrkQX6hzm-R9G8X1zLKwn_TRN8B2FDz6Yp3XspnXWdkZ8ekuL_0AApkHC3-UoIR1oU1ZscLgtB8xVV8UC991uSktM_Xj3-rkXCHWFOX7VLpo6sMx-xb8Fr0OCq-nKziDuBQMGvvNfQovZGRkN7rqaX3wg0mpI_Tthro1BLioYYpGpqQK_69lfi5_lvzb8hjuQJ1epuuzK1vZNWHN8SNKvybCK788MBv1aOqwJ2BV0MTsKZUt0viWlM2mKGW3ghnfCHr6v1LIfsCkiKvk8EbL1CnzdNQeqA',
        'Content-type' => 'application/json',
    );

    $file = public_path('project/fileproject/p_BD/139691022.การเขียนสะกดคำภาษาไทยไม่ตรงตามมาตราตัวสะกด.pdf');
    $file_conver = json_encode($file);


    $data = '{
      "url": "http://example.com",
      "email": "60020637@up.ac.th",
      "key": "DEF1F90C-020A-4260-B2D0-0D570B65E874",
      "properties": {
        "webhooks": {
          "status": "https://ictthesiscodedemo.herokuapp.com/"
        }
      }
    }';
    $response = Requests::put('https://api.copyleaks.com/v3/education/submit/url/my-custom-id', $headers, $data);
    // $data1 = '{
    //     "email": "60020637@up.ac.th",
    //     "key": "14A24798-BBF9-4C9B-BFBC-3C580A22416E",
    //     "base64": "SGVsbG8gd29ybGQh",
    //     "filename": "poul.txt",
    //     "properties": {
    //         "webhooks": {
    //           "status": "https://8209b18fa3a2ac891656798ec3e0809b.m.pipedream.net"
    //         },
    //         "sensitivityLevel": "2",
    //         "sandbox":"true"

    //       }
    // }';

    // $response = Requests::put('https://api.copyleaks.com/v3/education/submit/file/my-custom-id', $headers, $data);
    // $response1 = Requests::post('https://api.copyleaks.com/v3/education/scans/MY-SCAN-ID/webhooks/resend', $headers);
    // $data = '{
    //     "base64": "SGVsbG8gd29ybGQh",
    //     "filename": "poul.txt",
    //     "properties": {
    //       "action": 0,
    //       "includeHtml": false,
    //       "developerPayload": "Custom developer payload",
    //       "sandbox": true,
    //       "expiration": 480,
    //       "email": "60020637@up.ac.th",
    //       "key": "14A24798-BBF9-4C9B-BFBC-3C580A22416E",
    //       "webhooks": {
    //         "newResult": "https://yoursite.com/webhook/new-result",
    //         "status": "https://yoursite.com/webhook/{STATUS}/my-custom-id"
    //       },
    //       "filters": {
    //         "identicalEnabled": true,
    //         "minorChangesEnabled": true,
    //         "relatedMeaningEnabled": true,
    //         "minCopiedWords": 10,
    //         "safeSearch": false,
    //         "domains": [
    //           "www.example.com"
    //         ],
    //         "domainsMode": 1
    //       },
    //       "scanning": {
    //         "internet": true
    //       },
    //       "exclude": {
    //         "quotes": false,
    //         "titles": false,
    //         "htmlTemplate": false
    //       },
    //       "sensitivityLevel": 3
    //     }
    //   }';
    //   $response = Requests::put('https://api.copyleaks.com/v3/education/submit/file/my-custom-id', $headers, $data);
    //   compact('response');
    //   foreach($response as $res){

    //   }
    //   $response1 = Requests::get('https://api.copyleaks.com/v3/education/usages/history?start=01-01-2020&end=31-01-2020', $headers);
    //   $download_1 = Requests::get('https://api.copyleaks.com/v3/downloads/my-custom-id', $headers);
    echo'<pre>';
    print_r($response);
    echo'</pre>';
    // echo'<pre>';
    // print_r($response1);
    // echo'</pre>';
    // echo'<pre>';
    // print_r($download_1);
    // echo'</pre>';
    // foreach($download_1 as $download_1){
    //     $download_1->tille
    // }
    // $jsd = json_decode($download_1);
    // print_r($download_1);

?>