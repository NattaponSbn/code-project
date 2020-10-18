
    <?php 
        include('library/Requests.php');
        Requests::register_autoloader();
        $datatest = $_GET['filetest'];
        $headers = array(
            'Authorization' => 'Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL3dzLzIwMDgvMDYvaWRlbnRpdHkvY2xhaW1zL3JvbGUiOiJBZG1pbmlzdHJhdG9yIiwiaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvd3MvMjAwNS8wNS9pZGVudGl0eS9jbGFpbXMvZW1haWxhZGRyZXNzIjoiNjAwMjA2MzdAdXAuYWMudGgiLCJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1laWRlbnRpZmllciI6IjI1OWU4Yjc3LWQ4M2YtNDdiMi04Nzg1LTJmNTQ5MGFmNzA4ZiIsImV4cCI6MTYwMDc5Nzk3NiwiaXNzIjoiaWQuY29weWxlYWtzLmNvbSIsImF1ZCI6ImFwaS12My5jb3B5bGVha3MuY29tIn0.ZWhsLKPkwrhk8Vm8f0LujrZl1IToLdGh5xISC93JuIFhbWRzfvcfy0mJ4zjMq1-cunzHWbDh-AFRajhC6oYNJwR--8PTR23R9RYqTgisUsi1bKtnzcdQeGtNCgqo7FCiwegzS_z-hhRaxf4mCVeyT0kbPHlQ9YiCD_gMwkvYkoFcRuH_jAq-n9CTC0fI7eB1TRkiQlyHM3pGRdqYL3GCpxAnVbS0QFhSh2Obkhm-rXvwcGDGQoVWa_zkbXhrxFUGvgm9oar8dQ5ZBPWjEbFMg24XsxJOxAD4HkjQOY_YGfseeaHFzV8gTR8EER2VrXSr-6b8nUl9wZ3iKXGMOaU82w',
            'Content-type' => 'application/json'
        );
        $data = '{
            "base64": "SGVsbG8gd29ybGQh",
            "filename": "file1.txt",
            "properties": {
              "webhooks": {
                "status": "https://api.copyleaks.com/educationapi"
              }
            }
          }';
        $response = Requests::put('https://api.copyleaks.com/v3/education/submit/file/my-custom-id', $headers,$datatest);
        print_r($response);
        // include_once('autoload.php');

        // $config = new \ReflectionClass('Copyleaks\Config');
        // $clConst = $config->getConstants();

        // $email = '600206372@up.ac.th';
        // $apiKey = '061B2DBA-FD7A-4A2C-8987-70FBB7DEDAE4';   

        // $additionalHeaders = array($clConst['HTTP_CALLBACK'].':  c' );
        // $process  = $clCloud->createByURL('https://api.copyleaks.com',$additionalHeaders); 
        // while ($process->getStatus() != 100){
        //     sleep(2);              
        // }
        // $results = $process->getResult();
        // // Print the results
        // foreach ($results as $result) {
        //     echo $result;
        // }

        // $additionalHeaders = array(
        //     $clConst['SANDBOX_MODE_HEADER'], // Sandbox mode - Scan without consuming any credits and get back dummy results
        //     $clConst['HTTP_CALLBACK'].': http://your.website.com/callbacks/', # For a fast testing of callbacks option we recommend to use http://requestb.in
        //     $clConst['IN_PROGRESS_RESULT'].': https://copyleaks.com/dashboard/v1/education/account/new-scan/files',
        //     $clConst['EMAIL_CALLBACK'].': myemail@company.com',
        //     $clConst['CLIENT_CUSTOM_PREFIX'].'name: some name',
        //     $clConst['PARTIAL_SCAN_HEADER'],
        //     $clConst['COMPARE_ONLY'], # Compare files in between - available only on createByFiles
        //     $clConst['IMPORT_FILE_TO_DATABASE'] # Import your file to our database only
        //     );

        // try{
        //     $clCloud = new CopyleaksCloud($email, $apiKey, Products::Education);
        // }catch(Exception $e){
        //     echo "<Br/>Failed to connect to Copyleaks Cloud with exception: ". $e->getMessage();
        //     die();
        // } 

        // $headers = array(
        //     'Authorization' => 'Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL3dzLzIwMDgvMDYvaWRlbnRpdHkvY2xhaW1zL3JvbGUiOiJBZG1pbmlzdHJhdG9yIiwiaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvd3MvMjAwNS8wNS9pZGVudGl0eS9jbGFpbXMvZW1haWxhZGRyZXNzIjoiNjAwMjA2MzdAdXAuYWMudGgiLCJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1laWRlbnRpZmllciI6IjI1OWU4Yjc3LWQ4M2YtNDdiMi04Nzg1LTJmNTQ5MGFmNzA4ZiIsImV4cCI6MTYwMDc5Nzk3NiwiaXNzIjoiaWQuY29weWxlYWtzLmNvbSIsImF1ZCI6ImFwaS12My5jb3B5bGVha3MuY29tIn0.ZWhsLKPkwrhk8Vm8f0LujrZl1IToLdGh5xISC93JuIFhbWRzfvcfy0mJ4zjMq1-cunzHWbDh-AFRajhC6oYNJwR--8PTR23R9RYqTgisUsi1bKtnzcdQeGtNCgqo7FCiwegzS_z-hhRaxf4mCVeyT0kbPHlQ9YiCD_gMwkvYkoFcRuH_jAq-n9CTC0fI7eB1TRkiQlyHM3pGRdqYL3GCpxAnVbS0QFhSh2Obkhm-rXvwcGDGQoVWa_zkbXhrxFUGvgm9oar8dQ5ZBPWjEbFMg24XsxJOxAD4HkjQOY_YGfseeaHFzV8gTR8EER2VrXSr-6b8nUl9wZ3iKXGMOaU82w',
        //     'Content-type' => 'application/json'
        // );
        // $fileapi = $_GET('$file');
        // $data = '{
        //     "base64": "SGVsbG8gd29ybGQh",
        //     "filename": "$fileapi",
        //     "properties": {
        //         "webhooks": {
        //         "status": "https://copyleaks.com/dashboard/v1/education/account/new-scan/files"
        //         }
        //     }
        // }';
        // $response = Requests::put('https://api.copyleaks.com/v3/education/submit/file/my-custom-id', $headers, $datatest);
        // print_r($response);
        
    ?>
