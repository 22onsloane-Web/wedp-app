

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE attendees (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name varchar(255) ,
  contactnumber varchar(255) ,
  idnumber varchar(255) ,
  email varchar(255) ,
  gender varchar(255) ,
  race varchar(255) ,
  disability varchar(255) ,
  type_disability varchar(255) ,
  province varchar(255) ,
  city varchar(255) ,
  qualifications_owner varchar(255) ,
  business_name varchar(255) ,
  registration_number varchar(255) ,
  business_address varchar(255) ,
  business_stage varchar(255) ,
  sector varchar(255) ,
  industry varchar(255) ,
  business_compliance varchar(255) ,
  business_offering varchar(255) ,
  business_duration varchar(255) ,
  annual_turnover varchar(255) ,
  monthly_turnover varchar(255) ,
  employees varchar(255) ,
  leadership_structure varchar(255) ,
  tax_compliance varchar(255) ,
  target_market varchar(255) ,
  market_documentation varchar(255) ,
  competitors varchar(255) ,
  competitor_analysis varchar(255) ,
  product_uniqueness varchar(255) ,
  business_strengths varchar(255) ,
  areas_for_improvement varchar(255) ,
  marketing_strategy varchar(255) ,
  operation_location varchar(255) ,
  efficiency_rating varchar(255) ,
  sop varchar(255) ,
  operations_process varchar(255) ,
  registration_doc_url VARCHAR(255),
     id_doc_url VARCHAR(255),
    bbbee_doc_url VARCHAR(255),
    tax_clearance_url VARCHAR(255),
    company_profile_url VARCHAR(255),
    
  created_at timestamp  DEFAULT current_timestamp()
)

