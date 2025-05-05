<?php
$host = "dedi332.cpt3.host-h.net";
$username = "tdmaputmxp_1";
$password = "f8jTTYJVAFi96AWaGvB8";
$database = "tdmaputmxp_db1";
// $host = "dedi332.cpt3.host-h.net"; // Change as needed
// $username = "tdmaputmxp_2"; // Change as needed
// $password = "D4znU3QrMnTnYsWcnRS8"; // Change as needed
// $database = "tdmaputmxp_db2";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


    // Get JSON data from the request body (form fields)
    

    // Handle file upload
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $contactnumber = htmlspecialchars($_POST['contactnumber']);
        $idnumber = htmlspecialchars($_POST['idnumber']);
        $email = htmlspecialchars($_POST['email']);
        $gender = htmlspecialchars($_POST['gender']);
        $race = htmlspecialchars($_POST['race']);
        $disability = htmlspecialchars($_POST['disability']);
        $type_disability = htmlspecialchars($_POST['type_disability']);
        $province = htmlspecialchars($_POST['province']);
        $city = htmlspecialchars($_POST['city']);
        $qualifications_owner = htmlspecialchars($_POST['qualifications_owner']);
        $business_name = htmlspecialchars($_POST['business_name']);
        $registration_number = htmlspecialchars($_POST['registration_number']);
        $business_address = htmlspecialchars($_POST['business_address']);
        $business_stage = htmlspecialchars($_POST['business_stage']);
        $sector = htmlspecialchars($_POST['sector']);
        $industry = htmlspecialchars($_POST['industry']);
        $business_compliance = htmlspecialchars($_POST['business_compliance']);
        $business_offering = htmlspecialchars($_POST['business_offering']);
        $business_duration = htmlspecialchars($_POST['business_duration']);
        $annual_turnover = htmlspecialchars($_POST['annual_turnover']);
        $monthly_turnover = htmlspecialchars($_POST['monthly_turnover']);
        $employees = htmlspecialchars($_POST['employees']);
        $leadership_structure = htmlspecialchars($_POST['leadership_structure']);
        $tax_compliance = htmlspecialchars($_POST['tax_compliance']);
        $target_market = htmlspecialchars($_POST['target_market']);
        $market_documentation = htmlspecialchars($_POST['market_documentation']);
        $competitors = htmlspecialchars($_POST['competitors']);
        $competitor_analysis = htmlspecialchars($_POST['competitor_analysis']);
        $product_uniqueness = htmlspecialchars($_POST['product_uniqueness']);
        $business_strengths = htmlspecialchars($_POST['business_strengths']);
        $areas_for_improvement = htmlspecialchars($_POST['areas_for_improvement']);
        $marketing_strategy = htmlspecialchars($_POST['marketing_strategy']);
        $operation_location = htmlspecialchars($_POST['operation_location']);
        $efficiency_rating = htmlspecialchars($_POST['efficiency_rating']);
        $sop = htmlspecialchars($_POST['sop']);
        $operations_process = htmlspecialchars($_POST['operations_process']);
        // Check if a file was uploaded without errors

        $target_dir = "uploads/";
        $base_url = "https://tdmap2025.22onsloane.co/uploads_wedp/"; // Full base URL for downloads
        $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf", "doc", "docx", "xls", "xlsx", "csv", "mp4", "mp3", "zip", "ppt", "pptx");
        
    
        function uploadFile($file, $target_dir, $base_url, $allowed_types) {
            if (isset($_FILES[$file]) && $_FILES[$file]["error"] == 0) {
                $original_name = basename($_FILES[$file]["name"]);
                $file_type = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));
        
                if (!in_array($file_type, $allowed_types)) {
                    echo "Invalid file type for $file.";
                    return null;
                }
        
                // Unique filename
                $unique_name = uniqid() . '_' . time() . '.' . $file_type;
                $target_file = $target_dir . $unique_name;
        
                if (move_uploaded_file($_FILES[$file]["tmp_name"], $target_file)) {
                    return [
                        'original_filename' => $original_name,
                        'stored_filename' => $unique_name,
                        'full_url' => $base_url . $unique_name,
                        'filesize' => $_FILES[$file]["size"],
                        'filetype' => $_FILES[$file]["type"]
                    ];
                } else {
                    echo "Error uploading file: $file.";
                    return null;
                }
            }
            return null;
        }
    
        $id_doc = uploadFile('id_doc', $target_dir, $base_url, $allowed_types);
        $tax_clearance_doc = uploadFile('tax_clearance_doc', $target_dir, $base_url, $allowed_types);
        $registration_doc = uploadFile('registration_doc', $target_dir, $base_url, $allowed_types);
        $bbbee_doc = uploadFile('bbbee_doc', $target_dir, $base_url, $allowed_types);
        $company_profile_doc = uploadFile('company_profile_doc', $target_dir, $base_url, $allowed_types);
     
        $id_docpath = $id_doc['full_url'];
        $tax_clearance_docpath = $tax_clearance_doc['full_url'];
        $registration_docpath = $registration_doc['full_url'];
        $bbbee_docpath = $bbbee_doc['full_url'];
        $company_profile_docppath = $company_profile_doc['full_url'];


       // Insert the file information into the database

      
            $sql = "INSERT INTO attendees (name, contactnumber, idnumber, email, gender, race, disability, type_disability, province, city, qualifications_owner, business_name, registration_number, business_address, business_stage, sector, industry, business_compliance, business_offering, business_duration, annual_turnover, monthly_turnover, employees, leadership_structure, tax_compliance, target_market, market_documentation, competitors, competitor_analysis, product_uniqueness, business_strengths, areas_for_improvement, marketing_strategy, operation_location, efficiency_rating, sop, operations_process,  id_doc_url, tax_clearance_url, registration_doc_url, bbbee_doc_url, company_profile_url) 
                    VALUES ('$name', '$contactnumber', '$idnumber', '$email', '$gender', '$race', '$disability', '$type_disability', '$province', '$city', '$qualifications_owner', '$business_name', '$registration_number', '$business_address', '$business_stage', '$sector', '$industry', '$business_compliance', '$business_offering', '$business_duration', '$annual_turnover', '$monthly_turnover', '$employees', '$leadership_structure', '$tax_compliance', '$target_market', '$market_documentation', '$competitors', '$competitor_analysis', '$product_uniqueness', '$business_strengths', '$areas_for_improvement', '$marketing_strategy', '$operation_location', '$efficiency_rating', '$sop', '$operations_process', '$id_docpath', '$tax_clearance_docpath', '$registration_docpath', '$bbbee_docpath', '$company_profile_docppath')";
        
            if ($conn->query($sql) === TRUE) {
                header("Location: https://www.22onsloane.co/thank-you-for-applying/"); // "Thank you for applying to the Bootcamp! We appreciate your interest and will carefully review your submission. Successful applicants will be notified soon. Best of luck!"
                    exit();
            } else {
                echo "Oops, there was an error storing your files, please try again: " . $conn->error;
            }
        }
        $conn->close();
    
?>
