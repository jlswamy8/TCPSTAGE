<?php
// Template Name: Execute Documents Template
get_header(); ?>  

<?php  
error_reporting(E_ERROR);

$pageNumber = 0; $pagesCount = 5; $confirmPage = false;

//function customError($errno, $errstr) {
//echo "<b>Error:</b> [$errno] $errstr<br>";
//echo "Ending Script";
//die();
//} 
//set_error_handler("customError"); 

function GetFileFields() { return array(""); }
function GetSuccessMsg() { return "Thank You! We will generate the relevant documents for your signature"; }
function GetFormTitle() { return "New Account Application"; }
function GetHeaderPanel() { return "The Dicke Company, LLC"; }
function GetFooterPanel() { return ""; }
function GetLeftPanel() { return ""; }
function GetRightPanel() { return ""; }
function GetCountry($idx) { 
 $list = array('' => 'Unknown', '' => 'Select One', 'af' => 'Afghanistan', 'ax' => 'Aland Islands', 'al' => 'Albania', 'dz' => 'Algeria', 'as' => 'American Samoa', 'ad' => 'Andorra', 'ao' => 'Angola', 'ai' => 'Anguilla', 'aq' => 'Antarctica', 'ag' => 'Antigua and Barbuda', 'ar' => 'Argentina', 'am' => 'Armenia', 'aw' => 'Aruba', 'au' => 'Australia', 'at' => 'Austria', 'az' => 'Azerbaijan', 'bs' => 'Bahamas', 'bh' => 'Bahrain', 'bd' => 'Bangladesh', 'bb' => 'Barbados', 'by' => 'Belarus', 'be' => 'Belgium', 'bz' => 'Belize', 'bj' => 'Benin', 'bm' => 'Bermuda', 'bt' => 'Bhutan', 'bo' => 'Bolivia', 'ba' => 'Bosnia and Herzegovina', 'bw' => 'Botswana', 'bv' => 'Bouvet Island', 'br' => 'Brazil', 'io' => 'British Indian Ocean Territory', 'vg' => 'British Virgin Islands', 'bn' => 'Brunei', 'bg' => 'Bulgaria', 'bf' => 'Burkina Faso', 'bi' => 'Burundi', 'kh' => 'Cambodia', 'cm' => 'Cameroon', 'ca' => 'Canada', 'cv' => 'Cape Verde', 'ky' => 'Cayman Islands', 'cf' => 'Central African Republic', 'td' => 'Chad', 'cl' => 'Chile', 'cn' => 'China', 'cx' => 'Christmas Island', 'cc' => 'Cocos (Keeling) Islands', 'co' => 'Colombia', 'cg' => 'Congo', 'ck' => 'Cook Islands', 'cr' => 'Costa Rica', 'hr' => 'Croatia', 'cu' => 'Cuba', 'cy' => 'Cyprus', 'cz' => 'Czech Republic', 'cd' => 'Democratic Republic of Congo', 'dk' => 'Denmark', 'xx' => 'Disputed Territory', 'dj' => 'Djibouti', 'dm' => 'Dominica', 'do' => 'Dominican Republic', 'tl' => 'East Timor', 'ec' => 'Ecuador', 'eg' => 'Egypt', 'sv' => 'El Salvador', 'gq' => 'Equatorial Guinea', 'er' => 'Eritrea', 'ee' => 'Estonia', 'et' => 'Ethiopia', 'fk' => 'Falkland Islands', 'fo' => 'Faroe Islands', 'fm' => 'Federated States of Micronesia', 'fj' => 'Fiji', 'fi' => 'Finland', 'fr' => 'France', 'gf' => 'French Guyana', 'pf' => 'French Polynesia', 'tf' => 'French Southern Territories', 'ga' => 'Gabon', 'gm' => 'Gambia', 'ge' => 'Georgia', 'de' => 'Germany', 'gh' => 'Ghana', 'gi' => 'Gibraltar', 'gr' => 'Greece', 'gl' => 'Greenland', 'gd' => 'Grenada', 'gp' => 'Guadeloupe', 'gu' => 'Guam', 'gt' => 'Guatemala', 'gn' => 'Guinea', 'gw' => 'Guinea-Bissau', 'gy' => 'Guyana', 'ht' => 'Haiti', 'hm' => 'Heard Island and McDonald Islands', 'hn' => 'Honduras', 'hk' => 'Hong Kong', 'hu' => 'Hungary', 'is' => 'Iceland', 'in' => 'India', 'id' => 'Indonesia', 'ir' => 'Iran', 'iq' => 'Iraq', 'xe' => 'Iraq-Saudi Arabia Neutral Zone', 'ie' => 'Ireland', 'il' => 'Israel', 'it' => 'Italy', 'ci' => 'Ivory Coast', 'jm' => 'Jamaica', 'jp' => 'Japan', 'jo' => 'Jordan', 'kz' => 'Kazakhstan', 'ke' => 'Kenya', 'ki' => 'Kiribati', 'kw' => 'Kuwait', 'kg' => 'Kyrgyz Republic', 'la' => 'Laos', 'lv' => 'Latvia', 'lb' => 'Lebanon', 'ls' => 'Lesotho', 'lr' => 'Liberia', 'ly' => 'Libya', 'li' => 'Liechtenstein', 'lt' => 'Lithuania', 'lu' => 'Luxembourg', 'mo' => 'Macau', 'mk' => 'Macedonia', 'mg' => 'Madagascar', 'mw' => 'Malawi', 'my' => 'Malaysia', 'mv' => 'Maldives', 'ml' => 'Mali', 'mt' => 'Malta', 'mh' => 'Marshall Islands', 'mq' => 'Martinique', 'mr' => 'Mauritania', 'mu' => 'Mauritius', 'yt' => 'Mayotte', 'mx' => 'Mexico', 'md' => 'Moldova', 'mc' => 'Monaco', 'mn' => 'Mongolia', 'me' => 'Montenegro', 'ms' => 'Montserrat', 'ma' => 'Morocco', 'mz' => 'Mozambique', 'mm' => 'Myanmar', 'na' => 'Namibia', 'nr' => 'Nauru', 'np' => 'Nepal', 'an' => 'Netherlands Antilles', 'nl' => 'Netherlands', 'nc' => 'New Caledonia', 'nz' => 'New Zealand', 'ni' => 'Nicaragua', 'ne' => 'Niger', 'ng' => 'Nigeria', 'nu' => 'Niue', 'nf' => 'Norfolk Island', 'kp' => 'North Korea', 'mp' => 'Northern Mariana Islands', 'no' => 'Norway', 'om' => 'Oman', 'pk' => 'Pakistan', 'pw' => 'Palau', 'ps' => 'Palestinian Territories', 'pa' => 'Panama', 'pg' => 'Papua New Guinea', 'py' => 'Paraguay', 'pe' => 'Peru', 'ph' => 'Philippines', 'pn' => 'Pitcairn Islands', 'pl' => 'Poland', 'pt' => 'Portugal', 'pr' => 'Puerto Rico', 'qa' => 'Qatar', 're' => 'Reunion', 'ro' => 'Romania', 'ru' => 'Russia', 'rw' => 'Rwanda', 'sh' => 'Saint Helena and Dependencies', 'kn' => 'Saint Kitts &amp; Nevis', 'lc' => 'Saint Lucia', 'pm' => 'Saint Pierre and Miquelon', 'vc' => 'Saint Vincent and the Grenadines', 'ws' => 'Samoa', 'sm' => 'San Marino', 'st' => 'Sao Tome and Principe', 'sa' => 'Saudi Arabia', 'sn' => 'Senegal', 'rs' => 'Serbia', 'sc' => 'Seychelles', 'sl' => 'Sierra Leone', 'sg' => 'Singapore', 'sk' => 'Slovakia', 'si' => 'Slovenia', 'sb' => 'Solomon Islands', 'so' => 'Somalia', 'za' => 'South Africa', 'gs' => 'South Georgia and the South Sandwich Islands', 'kr' => 'South Korea', 'es' => 'Spain', 'pi' => 'Spratly Islands', 'lk' => 'Sri Lanka', 'sd' => 'Sudan', 'sr' => 'Suriname', 'sj' => 'Svalbard and Jan Mayen Islands', 'sz' => 'Swaziland', 'se' => 'Sweden', 'ch' => 'Switzerland', 'sy' => 'Syria', 'tw' => 'Taiwan', 'tj' => 'Tajikistan', 'tz' => 'Tanzania', 'th' => 'Thailand', 'tg' => 'Togo', 'tk' => 'Tokelau', 'to' => 'Tonga', 'tt' => 'Trinidad and Tobago', 'tn' => 'Tunisia', 'tr' => 'Turkey', 'tm' => 'Turkmenistan', 'tc' => 'Turks and Caicos Islands', 'tv' => 'Tuvalu', 'vi' => 'US Virgin Islands', 'ug' => 'Uganda', 'ua' => 'Ukraine', 'km' => 'Union of the Comoros', 'ae' => 'United Arab Emirates', 'uk' => 'United Kingdom', 'um' => 'United States Minor Outlying Islands', 'us' => 'United States', 'uy' => 'Uruguay', 'uz' => 'Uzbekistan', 'vu' => 'Vanuatu', 'va' => 'Vatican City', 've' => 'Venezuela', 'vn' => 'Vietnam', 'wf' => 'Wallis and Futuna Islands', 'eh' => 'Western Sahara', 'ye' => 'Yemen', 'zm' => 'Zambia', 'zw' => 'Zimbabwe');
 return $list[$idx]; }

function GetHobby($idx) { 
 $list = array('' => 'Unknown', '' => 'Select One', '1' => 'Automobiles', '2' => 'Business', '3' => 'Children', '4' => 'Computing', '5' => 'Consumers', '6' => 'Cooking', '54' => 'Dance', '7' => 'Education', '53' => 'Electronics', '9' => 'Entertainment', '10' => '  Gaming', '11' => '  Music', '57' => 'Fashion', '60' => 'Finance', '50' => 'Gift Shop', '55' => 'Guitar', '12' => 'Health', '13' => 'Hobbies', '14' => '  Animals', '15' => '  Animals Agenda', '16' => '  Art', '17' => '  Boating', '18' => '  Flying', '19' => '  Gardening', '20' => '  History', '21' => '  Photography', '22' => '  Travel', '23' => '  Woodworking', '59' => 'Hobby Modeling', '24' => 'Home', '58' => 'Lifestyle', '25' => 'Men', '26' => '  Men`s health', '27' => 'News', '28' => 'Other', '29' => 'Outdoors', '30' => 'People', '56' => 'Politics', '34' => 'Regional', '35' => 'Religion', '52' => 'Running', '44' => 'Sports', '36' => '  Baseball', '37' => '  Basketball', '38' => '  Bowling', '39' => '  Cycling', '40' => '  Diving', '41' => '  Extreme Sports', '42' => '  Fishing', '43' => '  Football', '45' => '  Golf', '46' => '  Hunting', '47' => '  Skiing', '48' => 'Women &amp; Teen', '49' => '  Teens');
 return $list[$idx]; }

function GetState($idx) { 
 $list = array('' => 'Unknown', '' => 'Select One', 'AL' => 'Alabama', 'AK' => 'Alaska', 'AZ' => 'Arizona', 'AR' => 'Arkansas', 'CA' => 'California', 'CO' => 'Colorado', 'CT' => 'Connecticut', 'DE' => 'Delaware', 'DC' => 'District of Columbia', 'FL' => 'Florida', 'GA' => 'Georgia', 'HI' => 'Hawaii', 'ID' => 'Idaho', 'IL' => 'Illinois', 'IN' => 'Indiana', 'IA' => 'Iowa', 'KS' => 'Kansas', 'KY' => 'Kentucky', 'LA' => 'Louisiana', 'ME' => 'Maine', 'MD' => 'Maryland', 'MA' => 'Massachusetts', 'MI' => 'Michigan', 'MN' => 'Minnesota', 'MS' => 'Mississippi', 'MO' => 'Missouri', 'MT' => 'Montana', 'NE' => 'Nebraska', 'NV' => 'Nevada', 'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico', 'NY' => 'New York', 'NC' => 'North Carolina', 'ND' => 'North Dakota', 'OH' => 'Ohio', 'OK' => 'Oklahoma', 'OR' => 'Oregon', 'PA' => 'Pennsylvania', 'RI' => 'Rhode Island', 'SC' => 'South Carolina', 'SD' => 'South Dakota', 'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah', 'VT' => 'Vermont', 'VA' => 'Virginia', 'WA' => 'Washington', 'WV' => 'West Virginia', 'WI' => 'Wisconsin', 'WY' => 'Wyoming');
 return $list[$idx]; }

function GetJob($idx) { 
 $list = array('' => 'Unknown', '' => 'Select One', '1' => 'Accounting', '2' => 'Administration', '3' => 'Advertising', '4' => 'Aerospace', '5' => 'Agriculture', '6' => 'Airlines', '7' => 'Architecture', '8' => 'Auditing', '9' => 'Automotive', '10' => 'Aviation', '11' => 'Aviation Engineering', '12' => 'Banking', '13' => 'Biomedical Engineering', '14' => 'Book keeping', '15' => 'Broadcasting', '16' => 'Chemical Engineering', '17' => 'Chemistry', '18' => 'Civil Engineering', '19' => 'Communication Engineering', '20' => 'Computer Education', '21' => 'Computer Hardware', '22' => 'Computer Software', '23' => 'Construction Engineering', '24' => 'Consultation', '25' => 'Control Engineering', '27' => 'Custodial/Janitorial', '28' => 'Customer Services', '113' => 'Data BAse Administration', '29' => 'Decoration', '30' => 'Dentistry', '31' => 'Driving', '32' => 'Dyeing', '33' => 'Electrical Engineering', '34' => 'Electronics', '35' => 'Engineering Management', '36' => 'Environmental', '37' => 'Environmental Engineering', '38' => 'Financial Management', '39' => 'Fire Prevention', '40' => 'Food Security', '41' => 'Graphics designing', '42' => 'Health', '43' => 'Home services', '44' => 'Hospitals', '45' => 'Hotel', '46' => 'Housing and Constructing', '47' => 'Human Resources', '48' => 'HVAC', '49' => 'Import &amp; Export', '52' => 'Information Technology (IT)', '50' => 'Industrial', '51' => 'Industrial Engineering', '53' => 'Insurance', '54' => 'Internet', '110' => 'Interior Design', '55' => 'Journalism', '56' => 'Law', '57' => 'Library', '58' => 'Logistics Manager', '59' => 'Maintenance/Repair', '60' => 'Management', '61' => 'Manufacturing &amp; production', '62' => 'Marketing', '63' => 'Mechanical Engineering', '64' => 'Media', '65' => 'Medical Services', '66' => 'Medicine', '67' => 'Metallurgy Engineering', '68' => 'Military', '69' => 'Multimedia', '70' => 'Networks Administration', '71' => 'Nursing', '72' => 'Petroleum Engineering', '73' => 'Pharmacy', '74' => 'Photography', '75' => 'Physics', '76' => 'Physiotherapy', '77' => 'Politics', '78' => 'Printing', '79' => 'Production Engineering', '80' => 'Public Relations', '111' => 'Purchasing', '82' => 'Quality Control', '81' => 'Quality Assurance', '83' => 'Rcreation', '84' => 'Research', '85' => 'Restaurants', '86' => 'Sales', '87' => 'Science', '88' => 'Secretarial', '89' => 'Security', '90' => 'Social services', '91' => 'Software Engneering', '92' => 'Sports', '93' => 'Structural Engineering', '112' => 'System Analysis', '94' => 'Teaching', '95' => 'Telecommunications', '96' => 'Telemarketing', '97' => 'Television', '98' => 'Textile Engineering', '99' => 'Tourism', '100' => 'Trade', '26' => 'Trading &amp; Contracting', '101' => 'Training', '102' => 'Translation', '103' => 'Transportation', '104' => 'Travel', '105' => 'Typist', '106' => 'Utilities', '107' => 'Veterinary Medicine', '108' => 'Word processing', '109' => 'Work from home', '0' => 'Other');
 return $list[$idx]; }

function GetJobType($idx) { 
 $list = array('' => 'Unknown', '' => 'Select One', '1' => 'Full Time', '2' => 'Part Time', '3' => 'Consultant', '4' => 'Intership', '5' => 'Temporary', '6' => 'Training');
 return $list[$idx]; }

function GetMarital($idx) { 
 $list = array('' => 'Unknown');
 return $list[$idx]; }

?>
<?php function GetSummary($includePrivate) {
$block = 'SUBMISSION_TIME='.date('l jS, F Y h:i:s A')."\r\n";
$block .= "plname=".trim($_POST['plname'])."\r\n";
$block .= "pfname=".trim($_POST['pfname'])."\r\n";
$block .= "pmname=".trim($_POST['pmname'])."\r\n";
$block .= "psaddress=".trim($_POST['psaddress'])."\r\n";
$block .= "pcity=".trim($_POST['pcity'])."\r\n";
$block .= "pstate=".trim(GetState($_POST['pstate']))."\r\n";
$block .= "pzip=".trim($_POST['pzip'])."\r\n";
$block .= "pemail=".trim($_POST['pemail'])."\r\n";
$block .= "pbdate=".trim($_POST['pbdate'])."\r\n";
$block .= "pSSN=".trim($_POST['pSSN'])."\r\n";
$block .= "phomephone=".trim($_POST['phomephone'])."\r\n";
$block .= "pdaytimephone=".trim($_POST['pdaytimephone'])."\r\n";
$block .= "pidtype=".trim($_POST['pidtype'])."\r\n";
$block .= "pidnum=".trim($_POST['pidnum'])."\r\n";
$block .= "pissuer=".trim($_POST['pissuer'])."\r\n";
$block .= "pexpdate=".trim($_POST['pexpdate'])."\r\n";
$block .= "pissuedate=".trim($_POST['pissuedate'])."\r\n";
$block .= "paccttype=".trim(GetValuesList("paccttype", 1))."\r\n";
$block .= "pacctown=".trim(GetValuesList("pacctown",1))."\r\n";
$block .= "pacctfunding=".trim(GetValuesList("pacctfunding", 2))."\r\n";
$block .= "pamtwapp=".trim($_POST['pamtwapp'])."\r\n";
$block .= "ptotalamt=".trim($_POST['ptotalamt'])."\r\n";
$block .= "pfundswiredt=".trim($_POST['pfundswiredt'])."\r\n";
$block .= "pnetworth=".trim($_POST['pnetworth'])."\r\n";
$block .= "pgrossincome=".trim($_POST['pgrossincome'])."\r\n";
$block .= "pliquidity=".trim($_POST['pliquidity'])."\r\n";
$block .= "pemergency=".trim($_POST['pemergency'])."\r\n";
$block .= "pliquidamt=".trim($_POST['pliquidamt'])."\r\n";
$block .= "ptaxbracket=".trim($_POST['ptaxbracket'])."\r\n";
$block .= "pothertaxbracket=".trim($_POST['pothertaxbracket'])."\r\n";
$block .= "pincomesource=".trim(GetValuesList("pincomesource", 5))."\r\n";
$block .= "potherincome=".trim($_POST['potherincome'])."\r\n";
$block .= "pexpoverincome=".trim(S_POST['pexpoverincome'])."\r\n";
$block .= "pincchange=".trim(S_POST['pincchange'])."\r\n";
$block .= "pinclevelexplanation=".trim($_POST['pinclevelexplanation'])."\r\n";
$block .= "pincchangeexplanation=".trim($_POST['pincchangeexplanation'])."\r\n";
$block .= "pexpchange=".trim($_POST['pexpchange'])."\r\n";
$block .= "pexpchangeexplanation=".trim($_POST['pexpchangeexplanation'])."\r\n";
$block .= "pfinobj=".trim(GetValuesList("pfinobj", 5))."\r\n";
$block .= "potherfinobj=".trim($_POST['potherfinobj'])."\r\n";
$block .= "jlname=".trim($_POST['jlname'])."\r\n";
$block .= "jbirthdate=".trim($_POST['jbirthdate'])."\r\n";
$block .= "jSSN=".trim($_POST['jSSN'])."\r\n";
$block .= "jemail=".trim($_POST['jemail'])."\r\n";
$block .= "jhomephone=".trim($_POST['jhomephone'])."\r\n";
$block .= "jdaytimephone=".trim($_POST['jdaytimephone'])."\r\n";
$block .= "jsameaddress=".trim(GetValuesList("jsameaddress", 2))."\r\n";
$block .= "jaddress=".trim($_POST['jaddress'])."\r\n";
$block .= "jcity=".trim($_POST['jcity'])."\r\n";
$block .= "jstate=".trim(GetState($_POST['jstate']))."\r\n";
$block .= "jzip=".trim($_POST['jzip'])."\r\n";
$block .= "jfname=".trim($_POST['jfname'])."\r\n";
$block .= "jmname=".trim($_POST['jmname'])."\r\n";
$block .= "trustname=".trim($_POST['trustname'])."\r\n";
$block .= "trusteename=".trim($_POST['trusteename'])."\r\n";
$block .= "trustdate=".trim($_POST['trustdate'])."\r\n";
$block .= "ttaxid=".trim($_POST['ttaxid'])."\r\n";
$block .= "temail=".trim($_POST['temail'])."\r\n";
$block .= "tphone=".trim($_POST['tphone'])."\r\n";
$block .= "tstreetaddress=".trim($_POST['tstreetaddress'])."\r\n";
$block .= "tcity=".trim($_POST['tcity'])."\r\n";
$block .= "tstate=".trim(GetState($_POST['tstate']))."\r\n";
$block .= "tzip=".trim($_POST['tzip'])."\r\n";
$block .= "b1name=".trim($_POST['b1name'])."\r\n";
$block .= "b1relationship=".trim($_POST['b1relationship'])."\r\n";
$block .= "b1percentshare=".trim($_POST['b1percentshare'])."\r\n";
$block .= "b1SSN=".trim($_POST['b1SSN'])."\r\n";
$block .= "b1birthdate=".trim($_POST['b1birthdate'])."\r\n";
$block .= "b1phone=".trim($_POST['b1phone'])."\r\n";
$block .= "b1saddress=".trim($_POST['b1saddress'])."\r\n";
$block .= "b1city=".trim($_POST['b1city'])."\r\n";
$block .= "b1state=".trim(GetState($_POST['b1state']))."\r\n";
$block .= "b1zip=".trim($_POST['b1zip'])."\r\n";
$block .= "b2name=".trim($_POST['b2name'])."\r\n";
$block .= "b2relationship=".trim($_POST['b2relationship'])."\r\n";
$block .= "b2percentshare=".trim($_POST['b2percentshare'])."\r\n";
$block .= "b2SSN=".trim($_POST['b2SSN'])."\r\n";
$block .= "b2birthdate=".trim($_POST['b2birthdate'])."\r\n";
$block .= "b2phone=".trim($_POST['b2phone'])."\r\n";
$block .= "b2saddress=".trim($_POST['b2saddress'])."\r\n";
$block .= "b2city=".trim($_POST['b2city'])."\r\n";
$block .= "b2state=".trim(GetState($_POST['b2state']))."\r\n";
$block .= "b2zip=".trim($_POST['b2zip'])."\r\n";
$block .= "sb1name=".trim($_POST['sb1name'])."\r\n";
$block .= "sb1relationship=".trim($_POST['sb1relationship'])."\r\n";
$block .= "sb1percentshare=".trim($_POST['sb1percentshare'])."\r\n";
$block .= "sb1SSN=".trim($_POST['sb1SSN'])."\r\n";
$block .= "sb1birthdate=".trim($_POST['sb1birthdate'])."\r\n";
$block .= "sb1phone=".trim($_POST['sb1phone'])."\r\n";
$block .= "sb1saddress=".trim($_POST['sb1saddress'])."\r\n";
$block .= "sb1city=".trim($_POST['sb1city'])."\r\n";
$block .= "sb1state=".trim(GetState($_POST['sb1state']))."\r\n";
$block .= "sb1zip=".trim($_POST['sb1zip'])."\r\n";
$block .= "sb2name=".trim($_POST['sb2name'])."\r\n";
$block .= "sb2relationship=".trim($_POST['sb2relationship'])."\r\n";
$block .= "sb2percentshare=".trim($_POST['sb2percentshare'])."\r\n";
$block .= "sb2SSN=".trim($_POST['sb2SSN'])."\r\n";
$block .= "sb2birthdate=".trim($_POST['sb2birthdate'])."\r\n";
$block .= "sb2phone=".trim($_POST['sb2phone'])."\r\n";
$block .= "sb2saddress=".trim($_POST['sb2saddress'])."\r\n";
$block .= "sbcity=".trim($_POST['sbcity'])."\r\n";
$block .= "sb2state=".trim(GetState($_POST['sb2state']))."\r\n";
$block .= "sb2zip=".trim($_POST['sb2zip'])."\r\n";
return $block;
 } ?>
<?php function GetCsvLine($includePrivate) {
$block = '"'.date('l jS, F Y h:i:s A').'"';
$block .= ',"'.trim($_POST['plname']).'"';
$block .= ',"'.trim($_POST['pfname']).'"';
$block .= ',"'.trim($_POST['pmname']).'"';
$block .= ',"'.trim($_POST['psaddress']).'"';
$block .= ',"'.trim($_POST['pcity']).'"';
$block .= ',"'.trim(GetState($_POST['pstate'])).'"';
$block .= ',"'.trim($_POST['pzip']).'"';
$block .= ',"'.trim($_POST['pemail']).'"';
$block .= ',"'.trim($_POST['pbdate']).'"';
$block .= ',"'.trim($_POST['pSSN']).'"';
$block .= ',"'.trim($_POST['phomephone']).'"';
$block .= ',"'.trim($_POST['pdaytimephone']).'"';
$block .= ',"'.trim($_POST['pidtype']).'"';
$block .= ',"'.trim($_POST['pidnum']).'"';
$block .= ',"'.trim($_POST['pissuer']).'"';
$block .= ',"'.trim($_POST['pexpdate']).'"';
$block .= ',"'.trim($_POST['pissuedate']).'"';
$block .= ',"'.trim(GetValuesListradio("paccttype", 1)).'"';
$block .= ',"'.trim(GetValuesListradio("pacctown",1)).'"';
$block .= ',"'.trim(GetValuesList("pacctfunding", 2)).'"';
$block .= ',"'.trim($_POST['pamtwapp']).'"';
$block .= ',"'.trim($_POST['ptotalamt']).'"';
$block .= ',"'.trim($_POST['pfundswiredt']).'"';
$block .= ',"'.trim($_POST['pnetworth']).'"';
$block .= ',"'.trim($_POST['pgrossincome']).'"';
$block .= ',"'.trim($_POST['pliquidity']).'"';
$block .= ',"'.trim($_POST['pemergency']).'"';
$block .= ',"'.trim($_POST['pliquidamt']).'"';
$block .= ',"'.trim($_POST['ptaxbracket']).'"';
$block .= ',"'.trim($_POST['pothertaxbracket']).'"';
$block .= ',"'.trim(GetValuesList("pincomesource", 5)).'"';
$block .= ',"'.trim($_POST['potherincome']).'"';
$block .= ',"'.trim($_POST['pexpoverincome']).'"';
$block .= ',"'.trim($_POST['pincchange']).'"';
$block .= ',"'.trim($_POST['pinclevelexplanation']).'"';
$block .= ',"'.trim($_POST['pincchangeexplanation']).'"';
$block .= ',"'.trim($_POST['pexpchange']).'"';
$block .= ',"'.trim($_POST['pexpchangeexplanation']).'"';
$block .= ',"'.trim(GetValuesList("pfinobj", 5)).'"';
$block .= ',"'.trim($_POST['potherfinobj']).'"';
$block .= ',"'.trim($_POST['jlname']).'"';
$block .= ',"'.trim($_POST['jbirthdate']).'"';
$block .= ',"'.trim($_POST['jSSN']).'"';
$block .= ',"'.trim($_POST['jemail']).'"';
$block .= ',"'.trim($_POST['jhomephone']).'"';
$block .= ',"'.trim($_POST['jdaytimephone']).'"';
$block .= ',"'.trim(GetValuesList("jsameaddress", 2)).'"';
$block .= ',"'.trim($_POST['jaddress']).'"';
$block .= ',"'.trim($_POST['jcity']).'"';
$block .= ',"'.trim(GetState($_POST['jstate'])).'"';
$block .= ',"'.trim($_POST['jzip']).'"';
$block .= ',"'.trim($_POST['jfname']).'"';
$block .= ',"'.trim($_POST['jmname']).'"';
$block .= ',"'.trim($_POST['trustname']).'"';
$block .= ',"'.trim($_POST['trusteename']).'"';
$block .= ',"'.trim($_POST['trustdate']).'"';
$block .= ',"'.trim($_POST['ttaxid']).'"';
$block .= ',"'.trim($_POST['temail']).'"';
$block .= ',"'.trim($_POST['tphone']).'"';
$block .= ',"'.trim($_POST['tstreetaddress']).'"';
$block .= ',"'.trim($_POST['tcity']).'"';
$block .= ',"'.trim(GetState($_POST['tstate'])).'"';
$block .= ',"'.trim($_POST['tzip']).'"';
$block .= ',"'.trim($_POST['b1name']).'"';
$block .= ',"'.trim($_POST['b1relationship']).'"';
$block .= ',"'.trim($_POST['b1percentshare']).'"';
$block .= ',"'.trim($_POST['b1SSN']).'"';
$block .= ',"'.trim($_POST['b1birthdate']).'"';
$block .= ',"'.trim($_POST['b1phone']).'"';
$block .= ',"'.trim($_POST['b1saddress']).'"';
$block .= ',"'.trim($_POST['b1city']).'"';
$block .= ',"'.trim(GetState($_POST['b1state'])).'"';
$block .= ',"'.trim($_POST['b1zip']).'"';
$block .= ',"'.trim($_POST['b2name']).'"';
$block .= ',"'.trim($_POST['b2relationship']).'"';
$block .= ',"'.trim($_POST['b2percentshare']).'"';
$block .= ',"'.trim($_POST['b2SSN']).'"';
$block .= ',"'.trim($_POST['b2birthdate']).'"';
$block .= ',"'.trim($_POST['b2phone']).'"';
$block .= ',"'.trim($_POST['b2saddress']).'"';
$block .= ',"'.trim($_POST['b2city']).'"';
$block .= ',"'.trim(GetState($_POST['b2state'])).'"';
$block .= ',"'.trim($_POST['b2zip']).'"';
$block .= ',"'.trim($_POST['sb1name']).'"';
$block .= ',"'.trim($_POST['sb1relationship']).'"';
$block .= ',"'.trim($_POST['sb1percentshare']).'"';
$block .= ',"'.trim($_POST['sb1SSN']).'"';
$block .= ',"'.trim($_POST['sb1birthdate']).'"';
$block .= ',"'.trim($_POST['sb1phone']).'"';
$block .= ',"'.trim($_POST['sb1saddress']).'"';
$block .= ',"'.trim($_POST['sb1city']).'"';
$block .= ',"'.trim(GetState($_POST['sb1state'])).'"';
$block .= ',"'.trim($_POST['sb1zip']).'"';
$block .= ',"'.trim($_POST['sb2name']).'"';
$block .= ',"'.trim($_POST['sb2relationship']).'"';
$block .= ',"'.trim($_POST['sb2percentshare']).'"';
$block .= ',"'.trim($_POST['sb2SSN']).'"';
$block .= ',"'.trim($_POST['sb2birthdate']).'"';
$block .= ',"'.trim($_POST['sb2phone']).'"';
$block .= ',"'.trim($_POST['sb2saddress']).'"';
$block .= ',"'.trim($_POST['sbcity']).'"';
$block .= ',"'.trim(GetState($_POST['sb2state'])).'"';
$block .= ',"'.trim($_POST['sb2zip']).'"';
return $block."\n";
 } ?>
<?php function ValidateFields() {
 global $pageNumber, $pagesCount;
 $isValid = false; $isBlockValid = true;
if ($pageNumber == 0) {
if ((isset($_POST['pcity']) && strlen(trim($_POST['pcity'])) > 0) ? IsValidString($_POST['pcity']) : true) {
 unset($GLOBALS['pcity_invalid_flag']);
} else { DeleteUpload("", "pcity");
 $GLOBALS['pcity_invalid_flag'] = 1;
 unset($_SESSION['pcity_uploaded']);
 unset($_SESSION['pcity_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['plname']) && strlen(trim($_POST['plname'])) > 0) ? IsValidString($_POST['plname']) : false) {
 unset($GLOBALS['plname_invalid_flag']);
} else { DeleteUpload("", "plname");
 $GLOBALS['plname_invalid_flag'] = 1;
 unset($_SESSION['plname_uploaded']);
 unset($_SESSION['plname_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pfname']) && strlen(trim($_POST['pfname'])) > 0) ? IsValidString($_POST['pfname']) : false) {
 unset($GLOBALS['pfname_invalid_flag']);
} else { DeleteUpload("", "pfname");
 $GLOBALS['pfname_invalid_flag'] = 1;
 unset($_SESSION['pfname_uploaded']);
 unset($_SESSION['pfname_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pmname']) && strlen(trim($_POST['pmname'])) > 0) ? IsValidString($_POST['pmname']) : true) {
 unset($GLOBALS['pmname_invalid_flag']);
} else { DeleteUpload("", "pmname");
 $GLOBALS['pmname_invalid_flag'] = 1;
 unset($_SESSION['pmname_uploaded']);
 unset($_SESSION['pmname_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['psaddress']) && strlen(trim($_POST['psaddress'])) > 0) ? IsValidString($_POST['psaddress']) : true) {
 unset($GLOBALS['psaddress_invalid_flag']);
} else { DeleteUpload("", "psaddress");
 $GLOBALS['psaddress_invalid_flag'] = 1;
 unset($_SESSION['psaddress_uploaded']);
 unset($_SESSION['psaddress_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pstate']) && strlen(trim($_POST['pstate'])) > 0) ? IsValidString($_POST['pstate']) : true) {
 unset($GLOBALS['pstate_invalid_flag']);
} else { DeleteUpload("", "pstate");
 $GLOBALS['pstate_invalid_flag'] = 1;
 unset($_SESSION['pstate_uploaded']);
 unset($_SESSION['pstate_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pzip']) && strlen(trim($_POST['pzip'])) > 0) ? IsValidString($_POST['pzip']) : true) {
 unset($GLOBALS['pzip_invalid_flag']);
} else { DeleteUpload("", "pzip");
 $GLOBALS['pzip_invalid_flag'] = 1;
 unset($_SESSION['pzip_uploaded']);
 unset($_SESSION['pzip_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pemail']) && strlen(trim($_POST['pemail'])) > 0) ? IsValidEmail($_POST['pemail']) : false) {
 unset($GLOBALS['pemail_invalid_flag']);
} else { DeleteUpload("", "pemail");
 $GLOBALS['pemail_invalid_flag'] = 1;
 unset($_SESSION['pemail_uploaded']);
 unset($_SESSION['pemail_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pbdate']) && strlen(trim($_POST['pbdate'])) > 0) ? IsValidString($_POST['pbdate']) : false) {
 unset($GLOBALS['pbdate_invalid_flag']);
} else { DeleteUpload("", "pbdate");
 $GLOBALS['pbdate_invalid_flag'] = 1;
 unset($_SESSION['pbdate_uploaded']);
 unset($_SESSION['pbdate_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pSSN']) && strlen(trim($_POST['pSSN'])) > 0) ? IsValidString($_POST['pSSN']) : false) {
 unset($GLOBALS['pSSN_invalid_flag']);
} else { DeleteUpload("", "pSSN");
 $GLOBALS['pSSN_invalid_flag'] = 1;
 unset($_SESSION['pSSN_uploaded']);
 unset($_SESSION['pSSN_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['phomephone']) && strlen(trim($_POST['phomephone'])) > 0) ? IsValidString($_POST['phomephone']) : true) {
 unset($GLOBALS['phomephone_invalid_flag']);
} else { DeleteUpload("", "phomephone");
 $GLOBALS['phomephone_invalid_flag'] = 1;
 unset($_SESSION['phomephone_uploaded']);
 unset($_SESSION['phomephone_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pdaytimephone']) && strlen(trim($_POST['pdaytimephone'])) > 0) ? IsValidString($_POST['pdaytimephone']) : true) {
 unset($GLOBALS['pdaytimephone_invalid_flag']);
} else { DeleteUpload("", "pdaytimephone");
 $GLOBALS['pdaytimephone_invalid_flag'] = 1;
 unset($_SESSION['pdaytimephone_uploaded']);
 unset($_SESSION['pdaytimephone_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pidtype']) && strlen(trim($_POST['pidtype'])) > 0) ? IsValidString($_POST['pidtype']) : true) {
 unset($GLOBALS['pidtype_invalid_flag']);
} else { DeleteUpload("", "pidtype");
 $GLOBALS['pidtype_invalid_flag'] = 1;
 unset($_SESSION['pidtype_uploaded']);
 unset($_SESSION['pidtype_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pidnum']) && strlen(trim($_POST['pidnum'])) > 0) ? IsValidString($_POST['pidnum']) : true) {
 unset($GLOBALS['pidnum_invalid_flag']);
} else { DeleteUpload("", "pidnum");
 $GLOBALS['pidnum_invalid_flag'] = 1;
 unset($_SESSION['pidnum_uploaded']);
 unset($_SESSION['pidnum_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pissuer']) && strlen(trim($_POST['pissuer'])) > 0) ? IsValidString($_POST['pissuer']) : true) {
 unset($GLOBALS['pissuer_invalid_flag']);
} else { DeleteUpload("", "pissuer");
 $GLOBALS['pissuer_invalid_flag'] = 1;
 unset($_SESSION['pissuer_uploaded']);
 unset($_SESSION['pissuer_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pexpdate']) && strlen(trim($_POST['pexpdate'])) > 0) ? IsValidString($_POST['pexpdate']) : true) {
 unset($GLOBALS['pexpdate_invalid_flag']);
} else { DeleteUpload("", "pexpdate");
 $GLOBALS['pexpdate_invalid_flag'] = 1;
 unset($_SESSION['pexpdate_uploaded']);
 unset($_SESSION['pexpdate_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pissuedate']) && strlen(trim($_POST['pissuedate'])) > 0) ? IsValidString($_POST['pissuedate']) : true) {
 unset($GLOBALS['pissuedate_invalid_flag']);
} else { DeleteUpload("", "pissuedate");
 $GLOBALS['pissuedate_invalid_flag'] = 1;
 unset($_SESSION['pissuedate_uploaded']);
 unset($_SESSION['pissuedate_upload_name']);
 $isBlockValid = false;
 }

if ((isset($_POST['paccttype']) && strlen(trim($_POST['paccttype'])) > 0) ? IsValidString($_POST['paccttype']) : true) {
 unset($GLOBALS['paccttype_invalid_flag']);
} else { DeleteUpload("", "paccttype");
 $GLOBALS['paccttype_invalid_flag'] = 1;
 unset($_SESSION['paccttype_uploaded']);
 unset($_SESSION['paccttype_upload_name']);
 $isBlockValid = false;
 }

if ((isset($_POST['pacctown']) && strlen(trim($_POST['pacctown'])) > 0) ? IsValidString($_POST['pacctown']) : true) {
 unset($GLOBALS['pacctown_invalid_flag']);
} else { DeleteUpload("", "pacctown");
 $GLOBALS['pacctown_invalid_flag'] = 1;
 unset($_SESSION['pacctown_uploaded']);
 unset($_SESSION['pacctown_upload_name']);
 $isBlockValid = false;
 }

if (IsValidCheckbox('pacctfunding', 2) || true) {
 unset($GLOBALS['pacctfunding_invalid_flag']);
} else { DeleteUpload("", "pacctfunding");
 $GLOBALS['pacctfunding_invalid_flag'] = 1;
 unset($_SESSION['pacctfunding_uploaded']);
 unset($_SESSION['pacctfunding_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pamtwapp']) && strlen(trim($_POST['pamtwapp'])) > 0) ? IsValidString($_POST['pamtwapp']) : true) {
 unset($GLOBALS['pamtwapp_invalid_flag']);
} else { DeleteUpload("", "pamtwapp");
 $GLOBALS['pamtwapp_invalid_flag'] = 1;
 unset($_SESSION['pamtwapp_uploaded']);
 unset($_SESSION['pamtwapp_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['ptotalamt']) && strlen(trim($_POST['ptotalamt'])) > 0) ? IsValidString($_POST['ptotalamt']) : true) {
 unset($GLOBALS['ptotalamt_invalid_flag']);
} else { DeleteUpload("", "ptotalamt");
 $GLOBALS['ptotalamt_invalid_flag'] = 1;
 unset($_SESSION['ptotalamt_uploaded']);
 unset($_SESSION['ptotalamt_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pfundswiredt']) && strlen(trim($_POST['pfundswiredt'])) > 0) ? IsValidString($_POST['pfundswiredt']) : true) {
 unset($GLOBALS['pfundswiredt_invalid_flag']);
} else { DeleteUpload("", "pfundswiredt");
 $GLOBALS['pfundswiredt_invalid_flag'] = 1;
 unset($_SESSION['pfundswiredt_uploaded']);
 unset($_SESSION['pfundswiredt_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['trustdate']) && strlen(trim($_POST['trustdate'])) > 0) ? IsValidString($_POST['trustdate']) : true) {
 unset($GLOBALS['trustdate_invalid_flag']);
} else { DeleteUpload("", "trustdate");
 $GLOBALS['trustdate_invalid_flag'] = 1;
 unset($_SESSION['trustdate_uploaded']);
 unset($_SESSION['trustdate_upload_name']);
 $isBlockValid = false;
 }
}
if ($pageNumber == 1) {
if ((isset($_POST['potherfinobj']) && strlen(trim($_POST['potherfinobj'])) > 0) ? IsValidString($_POST['potherfinobj']) : true) {
 unset($GLOBALS['potherfinobj_invalid_flag']);
} else { DeleteUpload("", "potherfinobj");
 $GLOBALS['potherfinobj_invalid_flag'] = 1;
 unset($_SESSION['potherfinobj_uploaded']);
 unset($_SESSION['potherfinobj_upload_name']);
 $isBlockValid = false;
 }

if (IsValidCheckbox('pfinobj', 5) || true) {
 unset($GLOBALS['pfinobj_invalid_flag']);
} else { DeleteUpload("", "pfinobj");
 $GLOBALS['pfinobj_invalid_flag'] = 1;
 unset($_SESSION['pfinobj_uploaded']);
 unset($_SESSION['pfinobj_upload_name']);
 $isBlockValid = false;
 }

if ((isset($_POST['pexpchangeexplanation']) && strlen(trim($_POST['pexpchangeexplanation'])) > 0) ? IsValidString($_POST['pexpchangeexplanation']) : true) {
 unset($GLOBALS['pexpchangeexplanation_invalid_flag']);
} else { DeleteUpload("", "pexpchangeexplanation");
 $GLOBALS['pexpchangeexplanation_invalid_flag'] = 1;
 unset($_SESSION['pexpchangeexplanation_uploaded']);
 unset($_SESSION['pexpchangeexplanation_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pexpchange']) && strlen(trim($_POST['pexpchange'])) > 0) ? IsValidString($_POST['pexpchange']) : true) {
 unset($GLOBALS['pexpchange_invalid_flag']);
} else { DeleteUpload("", "pexpchange");
 $GLOBALS['pexpchange_invalid_flag'] = 1;
 unset($_SESSION['pexpchange_uploaded']);
 unset($_SESSION['pexpchange_upload_name']);
 $isBlockValid = false;
 }

if ((isset($_POST['pincchangeexplanation']) && strlen(trim($_POST['pincchangeexplanation'])) > 0) ? IsValidString($_POST['pincchangeexplanation']) : true) {
 unset($GLOBALS['pincchangeexplanation_invalid_flag']);
} else { DeleteUpload("", "pincchangeexplanation");
 $GLOBALS['pincchangeexplanation_invalid_flag'] = 1;
 unset($_SESSION['pincchangeexplanation_uploaded']);
 unset($_SESSION['pincchangeexplanation_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pinclevelexplanation']) && strlen(trim($_POST['pinclevelexplanation'])) > 0) ? IsValidString($_POST['pinclevelexplanation']) : true) {
 unset($GLOBALS['pinclevelexplanation_invalid_flag']);
} else { DeleteUpload("", "pinclevelexplanation");
 $GLOBALS['pinclevelexplanation_invalid_flag'] = 1;
 unset($_SESSION['pinclevelexplanation_uploaded']);
 unset($_SESSION['pinclevelexplanation_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pincchange']) && strlen(trim($_POST['pincchange'])) > 0) ? IsValidString($_POST['pincchange']) : true) {
 unset($GLOBALS['pincchange_invalid_flag']);
} else { DeleteUpload("", "pincchange");
 $GLOBALS['pincchange_invalid_flag'] = 1;
 unset($_SESSION['pincchange_uploaded']);
 unset($_SESSION['pincchange_upload_name']);
 $isBlockValid = false;
 }

if ((isset($_POST['pexpoverincome']) && strlen(trim($_POST['pexpoverincome'])) > 0) ? IsValidString($_POST['pexpoverincome']) : true) {
 unset($GLOBALS['pexpoverincome_invalid_flag']);
} else { DeleteUpload("", "pexpoverincome");
 $GLOBALS['pexpoverincome_invalid_flag'] = 1;
 unset($_SESSION['pexpoverincome_uploaded']);
 unset($_SESSION['pexpoverincome_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['potherincome']) && strlen(trim($_POST['potherincome'])) > 0) ? IsValidString($_POST['potherincome']) : true) {
 unset($GLOBALS['potherincome_invalid_flag']);
} else { DeleteUpload("", "potherincome");
 $GLOBALS['potherincome_invalid_flag'] = 1;
 unset($_SESSION['potherincome_uploaded']);
 unset($_SESSION['potherincome_upload_name']);
 $isBlockValid = false;
 }
if (IsValidCheckbox('pincomesource', 5) || true) {
 unset($GLOBALS['pincomesource_invalid_flag']);
} else { DeleteUpload("", "pincomesource");
 $GLOBALS['pincomesource_invalid_flag'] = 1;
 unset($_SESSION['pincomesource_uploaded']);
 unset($_SESSION['pincomesource_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pothertaxbracket']) && strlen(trim($_POST['pothertaxbracket'])) > 0) ? IsValidString($_POST['pothertaxbracket']) : true) {
 unset($GLOBALS['pothertaxbracket_invalid_flag']);
} else { DeleteUpload("", "pothertaxbracket");
 $GLOBALS['pothertaxbracket_invalid_flag'] = 1;
 unset($_SESSION['pothertaxbracket_uploaded']);
 unset($_SESSION['pothertaxbracket_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['ptaxbracket']) && strlen(trim($_POST['ptaxbracket'])) > 0) ? IsValidString($_POST['ptaxbracket']) : true) {
 unset($GLOBALS['ptaxbracket_invalid_flag']);
} else { DeleteUpload("", "ptaxbracket");
 $GLOBALS['ptaxbracket_invalid_flag'] = 1;
 unset($_SESSION['ptaxbracket_uploaded']);
 unset($_SESSION['ptaxbracket_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pliquidamt']) && strlen(trim($_POST['pliquidamt'])) > 0) ? IsValidString($_POST['pliquidamt']) : true) {
 unset($GLOBALS['pliquidamt_invalid_flag']);
} else { DeleteUpload("", "pliquidamt");
 $GLOBALS['pliquidamt_invalid_flag'] = 1;
 unset($_SESSION['pliquidamt_uploaded']);
 unset($_SESSION['pliquidamt_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pemergency']) && strlen(trim($_POST['pemergency'])) > 0) ? IsValidString($_POST['pemergency']) : true) {
 unset($GLOBALS['pemergency_invalid_flag']);
} else { DeleteUpload("", "pemergency");
 $GLOBALS['pemergency_invalid_flag'] = 1;
 unset($_SESSION['pemergency_uploaded']);
 unset($_SESSION['pemergency_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pliquidity']) && strlen(trim($_POST['pliquidity'])) > 0) ? IsValidString($_POST['pliquidity']) : true) {
 unset($GLOBALS['pliquidity_invalid_flag']);
} else { DeleteUpload("", "pliquidity");
 $GLOBALS['pliquidity_invalid_flag'] = 1;
 unset($_SESSION['pliquidity_uploaded']);
 unset($_SESSION['pliquidity_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pgrossincome']) && strlen(trim($_POST['pgrossincome'])) > 0) ? IsValidString($_POST['pgrossincome']) : true) {
 unset($GLOBALS['pgrossincome_invalid_flag']);
} else { DeleteUpload("", "pgrossincome");
 $GLOBALS['pgrossincome_invalid_flag'] = 1;
 unset($_SESSION['pgrossincome_uploaded']);
 unset($_SESSION['pgrossincome_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['pnetworth']) && strlen(trim($_POST['pnetworth'])) > 0) ? IsValidString($_POST['pnetworth']) : true) {
 unset($GLOBALS['pnetworth_invalid_flag']);
} else { DeleteUpload("", "pnetworth");
 $GLOBALS['pnetworth_invalid_flag'] = 1;
 unset($_SESSION['pnetworth_uploaded']);
 unset($_SESSION['pnetworth_upload_name']);
 $isBlockValid = false;
 }
}
if ($pageNumber == 2) {
if ((isset($_POST['jlname']) && strlen(trim($_POST['jlname'])) > 0) ? IsValidString($_POST['jlname']) : true) {
 unset($GLOBALS['jlname_invalid_flag']);
} else { DeleteUpload("", "jlname");
 $GLOBALS['jlname_invalid_flag'] = 1;
 unset($_SESSION['jlname_uploaded']);
 unset($_SESSION['jlname_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['jbirthdate']) && strlen(trim($_POST['jbirthdate'])) > 0) ? IsValidString($_POST['jbirthdate']) : true) {
 unset($GLOBALS['jbirthdate_invalid_flag']);
} else { DeleteUpload("", "jbirthdate");
 $GLOBALS['jbirthdate_invalid_flag'] = 1;
 unset($_SESSION['jbirthdate_uploaded']);
 unset($_SESSION['jbirthdate_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['jSSN']) && strlen(trim($_POST['jSSN'])) > 0) ? IsValidString($_POST['jSSN']) : true) {
 unset($GLOBALS['jSSN_invalid_flag']);
} else { DeleteUpload("", "jSSN");
 $GLOBALS['jSSN_invalid_flag'] = 1;
 unset($_SESSION['jSSN_uploaded']);
 unset($_SESSION['jSSN_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['jemail']) && strlen(trim($_POST['jemail'])) > 0) ? IsValidEmail($_POST['jemail']) : true) {
 unset($GLOBALS['jemail_invalid_flag']);
} else { DeleteUpload("", "jemail");
 $GLOBALS['jemail_invalid_flag'] = 1;
 unset($_SESSION['jemail_uploaded']);
 unset($_SESSION['jemail_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['jhomephone']) && strlen(trim($_POST['jhomephone'])) > 0) ? IsValidString($_POST['jhomephone']) : true) {
 unset($GLOBALS['jhomephone_invalid_flag']);
} else { DeleteUpload("", "jhomephone");
 $GLOBALS['jhomephone_invalid_flag'] = 1;
 unset($_SESSION['jhomephone_uploaded']);
 unset($_SESSION['jhomephone_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['jdaytimephone']) && strlen(trim($_POST['jdaytimephone'])) > 0) ? IsValidString($_POST['jdaytimephone']) : true) {
 unset($GLOBALS['jdaytimephone_invalid_flag']);
} else { DeleteUpload("", "jdaytimephone");
 $GLOBALS['jdaytimephone_invalid_flag'] = 1;
 unset($_SESSION['jdaytimephone_uploaded']);
 unset($_SESSION['jdaytimephone_upload_name']);
 $isBlockValid = false;
 }
if (IsValidCheckbox('jsameaddress', 2) || true) {
 unset($GLOBALS['jsameaddress_invalid_flag']);
} else { DeleteUpload("", "jsameaddress");
 $GLOBALS['jsameaddress_invalid_flag'] = 1;
 unset($_SESSION['jsameaddress_uploaded']);
 unset($_SESSION['jsameaddress_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['jaddress']) && strlen(trim($_POST['jaddress'])) > 0) ? IsValidString($_POST['jaddress']) : true) {
 unset($GLOBALS['jaddress_invalid_flag']);
} else { DeleteUpload("", "jaddress");
 $GLOBALS['jaddress_invalid_flag'] = 1;
 unset($_SESSION['jaddress_uploaded']);
 unset($_SESSION['jaddress_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['jcity']) && strlen(trim($_POST['jcity'])) > 0) ? IsValidString($_POST['jcity']) : true) {
 unset($GLOBALS['jcity_invalid_flag']);
} else { DeleteUpload("", "jcity");
 $GLOBALS['jcity_invalid_flag'] = 1;
 unset($_SESSION['jcity_uploaded']);
 unset($_SESSION['jcity_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['jstate']) && strlen(trim($_POST['jstate'])) > 0) ? IsValidString($_POST['jstate']) : true) {
 unset($GLOBALS['jstate_invalid_flag']);
} else { DeleteUpload("", "jstate");
 $GLOBALS['jstate_invalid_flag'] = 1;
 unset($_SESSION['jstate_uploaded']);
 unset($_SESSION['jstate_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['jzip']) && strlen(trim($_POST['jzip'])) > 0) ? IsValidString($_POST['jzip']) : true) {
 unset($GLOBALS['jzip_invalid_flag']);
} else { DeleteUpload("", "jzip");
 $GLOBALS['jzip_invalid_flag'] = 1;
 unset($_SESSION['jzip_uploaded']);
 unset($_SESSION['jzip_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['jfname']) && strlen(trim($_POST['jfname'])) > 0) ? IsValidString($_POST['jfname']) : true) {
 unset($GLOBALS['jfname_invalid_flag']);
} else { DeleteUpload("", "jfname");
 $GLOBALS['jfname_invalid_flag'] = 1;
 unset($_SESSION['jfname_uploaded']);
 unset($_SESSION['jfname_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['jmname']) && strlen(trim($_POST['jmname'])) > 0) ? IsValidString($_POST['jmname']) : true) {
 unset($GLOBALS['jmname_invalid_flag']);
} else { DeleteUpload("", "jmname");
 $GLOBALS['jmname_invalid_flag'] = 1;
 unset($_SESSION['jmname_uploaded']);
 unset($_SESSION['jmname_upload_name']);
 $isBlockValid = false;
 }
}
if ($pageNumber == 3) {
if ((isset($_POST['trustname']) && strlen(trim($_POST['trustname'])) > 0) ? IsValidString($_POST['trustname']) : true) {
 unset($GLOBALS['trustname_invalid_flag']);
} else { DeleteUpload("", "trustname");
 $GLOBALS['trustname_invalid_flag'] = 1;
 unset($_SESSION['trustname_uploaded']);
 unset($_SESSION['trustname_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['trusteename']) && strlen(trim($_POST['trusteename'])) > 0) ? IsValidString($_POST['trusteename']) : true) {
 unset($GLOBALS['trusteename_invalid_flag']);
} else { DeleteUpload("", "trusteename");
 $GLOBALS['trusteename_invalid_flag'] = 1;
 unset($_SESSION['trusteename_uploaded']);
 unset($_SESSION['trusteename_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['ttaxid']) && strlen(trim($_POST['ttaxid'])) > 0) ? IsValidString($_POST['ttaxid']) : true) {
 unset($GLOBALS['ttaxid_invalid_flag']);
} else { DeleteUpload("", "ttaxid");
 $GLOBALS['ttaxid_invalid_flag'] = 1;
 unset($_SESSION['ttaxid_uploaded']);
 unset($_SESSION['ttaxid_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['temail']) && strlen(trim($_POST['temail'])) > 0) ? IsValidEmail($_POST['temail']) : true) {
 unset($GLOBALS['temail_invalid_flag']);
} else { DeleteUpload("", "temail");
 $GLOBALS['temail_invalid_flag'] = 1;
 unset($_SESSION['temail_uploaded']);
 unset($_SESSION['temail_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['tphone']) && strlen(trim($_POST['tphone'])) > 0) ? IsValidString($_POST['tphone']) : true) {
 unset($GLOBALS['tphone_invalid_flag']);
} else { DeleteUpload("", "tphone");
 $GLOBALS['tphone_invalid_flag'] = 1;
 unset($_SESSION['tphone_uploaded']);
 unset($_SESSION['tphone_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['tstreetaddress']) && strlen(trim($_POST['tstreetaddress'])) > 0) ? IsValidString($_POST['tstreetaddress']) : true) {
 unset($GLOBALS['tstreetaddress_invalid_flag']);
} else { DeleteUpload("", "tstreetaddress");
 $GLOBALS['tstreetaddress_invalid_flag'] = 1;
 unset($_SESSION['tstreetaddress_uploaded']);
 unset($_SESSION['tstreetaddress_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['tcity']) && strlen(trim($_POST['tcity'])) > 0) ? IsValidString($_POST['tcity']) : true) {
 unset($GLOBALS['tcity_invalid_flag']);
} else { DeleteUpload("", "tcity");
 $GLOBALS['tcity_invalid_flag'] = 1;
 unset($_SESSION['tcity_uploaded']);
 unset($_SESSION['tcity_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['tstate']) && strlen(trim($_POST['tstate'])) > 0) ? IsValidString($_POST['tstate']) : true) {
 unset($GLOBALS['tstate_invalid_flag']);
} else { DeleteUpload("", "tstate");
 $GLOBALS['tstate_invalid_flag'] = 1;
 unset($_SESSION['tstate_uploaded']);
 unset($_SESSION['tstate_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['tzip']) && strlen(trim($_POST['tzip'])) > 0) ? IsValidString($_POST['tzip']) : true) {
 unset($GLOBALS['tzip_invalid_flag']);
} else { DeleteUpload("", "tzip");
 $GLOBALS['tzip_invalid_flag'] = 1;
 unset($_SESSION['tzip_uploaded']);
 unset($_SESSION['tzip_upload_name']);
 $isBlockValid = false;
 }
}
if ($pageNumber == 4) {
if ((isset($_POST['b1name']) && strlen(trim($_POST['b1name'])) > 0) ? IsValidString($_POST['b1name']) : true) {
 unset($GLOBALS['b1name_invalid_flag']);
} else { DeleteUpload("", "b1name");
 $GLOBALS['b1name_invalid_flag'] = 1;
 unset($_SESSION['b1name_uploaded']);
 unset($_SESSION['b1name_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b1relationship']) && strlen(trim($_POST['b1relationship'])) > 0) ? IsValidString($_POST['b1relationship']) : true) {
 unset($GLOBALS['b1relationship_invalid_flag']);
} else { DeleteUpload("", "b1relationship");
 $GLOBALS['b1relationship_invalid_flag'] = 1;
 unset($_SESSION['b1relationship_uploaded']);
 unset($_SESSION['b1relationship_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b1percentshare']) && strlen(trim($_POST['b1percentshare'])) > 0) ? IsValidString($_POST['b1percentshare']) : true) {
 unset($GLOBALS['b1percentshare_invalid_flag']);
} else { DeleteUpload("", "b1percentshare");
 $GLOBALS['b1percentshare_invalid_flag'] = 1;
 unset($_SESSION['b1percentshare_uploaded']);
 unset($_SESSION['b1percentshare_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b1SSN']) && strlen(trim($_POST['b1SSN'])) > 0) ? IsValidString($_POST['b1SSN']) : true) {
 unset($GLOBALS['b1SSN_invalid_flag']);
} else { DeleteUpload("", "b1SSN");
 $GLOBALS['b1SSN_invalid_flag'] = 1;
 unset($_SESSION['b1SSN_uploaded']);
 unset($_SESSION['b1SSN_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b1birthdate']) && strlen(trim($_POST['b1birthdate'])) > 0) ? IsValidString($_POST['b1birthdate']) : true) {
 unset($GLOBALS['b1birthdate_invalid_flag']);
} else { DeleteUpload("", "b1birthdate");
 $GLOBALS['b1birthdate_invalid_flag'] = 1;
 unset($_SESSION['b1birthdate_uploaded']);
 unset($_SESSION['b1birthdate_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b1phone']) && strlen(trim($_POST['b1phone'])) > 0) ? IsValidString($_POST['b1phone']) : true) {
 unset($GLOBALS['b1phone_invalid_flag']);
} else { DeleteUpload("", "b1phone");
 $GLOBALS['b1phone_invalid_flag'] = 1;
 unset($_SESSION['b1phone_uploaded']);
 unset($_SESSION['b1phone_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b1saddress']) && strlen(trim($_POST['b1saddress'])) > 0) ? IsValidString($_POST['b1saddress']) : true) {
 unset($GLOBALS['b1saddress_invalid_flag']);
} else { DeleteUpload("", "b1saddress");
 $GLOBALS['b1saddress_invalid_flag'] = 1;
 unset($_SESSION['b1saddress_uploaded']);
 unset($_SESSION['b1saddress_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b1city']) && strlen(trim($_POST['b1city'])) > 0) ? IsValidString($_POST['b1city']) : true) {
 unset($GLOBALS['b1city_invalid_flag']);
} else { DeleteUpload("", "b1city");
 $GLOBALS['b1city_invalid_flag'] = 1;
 unset($_SESSION['b1city_uploaded']);
 unset($_SESSION['b1city_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b1state']) && strlen(trim($_POST['b1state'])) > 0) ? IsValidString($_POST['b1state']) : true) {
 unset($GLOBALS['b1state_invalid_flag']);
} else { DeleteUpload("", "b1state");
 $GLOBALS['b1state_invalid_flag'] = 1;
 unset($_SESSION['b1state_uploaded']);
 unset($_SESSION['b1state_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b1zip']) && strlen(trim($_POST['b1zip'])) > 0) ? IsValidString($_POST['b1zip']) : true) {
 unset($GLOBALS['b1zip_invalid_flag']);
} else { DeleteUpload("", "b1zip");
 $GLOBALS['b1zip_invalid_flag'] = 1;
 unset($_SESSION['b1zip_uploaded']);
 unset($_SESSION['b1zip_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b2name']) && strlen(trim($_POST['b2name'])) > 0) ? IsValidString($_POST['b2name']) : true) {
 unset($GLOBALS['b2name_invalid_flag']);
} else { DeleteUpload("", "b2name");
 $GLOBALS['b2name_invalid_flag'] = 1;
 unset($_SESSION['b2name_uploaded']);
 unset($_SESSION['b2name_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b2relationship']) && strlen(trim($_POST['b2relationship'])) > 0) ? IsValidString($_POST['b2relationship']) : true) {
 unset($GLOBALS['b2relationship_invalid_flag']);
} else { DeleteUpload("", "b2relationship");
 $GLOBALS['b2relationship_invalid_flag'] = 1;
 unset($_SESSION['b2relationship_uploaded']);
 unset($_SESSION['b2relationship_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b2percentshare']) && strlen(trim($_POST['b2percentshare'])) > 0) ? IsValidString($_POST['b2percentshare']) : true) {
 unset($GLOBALS['b2percentshare_invalid_flag']);
} else { DeleteUpload("", "b2percentshare");
 $GLOBALS['b2percentshare_invalid_flag'] = 1;
 unset($_SESSION['b2percentshare_uploaded']);
 unset($_SESSION['b2percentshare_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b2SSN']) && strlen(trim($_POST['b2SSN'])) > 0) ? IsValidString($_POST['b2SSN']) : true) {
 unset($GLOBALS['b2SSN_invalid_flag']);
} else { DeleteUpload("", "b2SSN");
 $GLOBALS['b2SSN_invalid_flag'] = 1;
 unset($_SESSION['b2SSN_uploaded']);
 unset($_SESSION['b2SSN_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b2birthdate']) && strlen(trim($_POST['b2birthdate'])) > 0) ? IsValidString($_POST['b2birthdate']) : true) {
 unset($GLOBALS['b2birthdate_invalid_flag']);
} else { DeleteUpload("", "b2birthdate");
 $GLOBALS['b2birthdate_invalid_flag'] = 1;
 unset($_SESSION['b2birthdate_uploaded']);
 unset($_SESSION['b2birthdate_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b2phone']) && strlen(trim($_POST['b2phone'])) > 0) ? IsValidString($_POST['b2phone']) : true) {
 unset($GLOBALS['b2phone_invalid_flag']);
} else { DeleteUpload("", "b2phone");
 $GLOBALS['b2phone_invalid_flag'] = 1;
 unset($_SESSION['b2phone_uploaded']);
 unset($_SESSION['b2phone_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b2saddress']) && strlen(trim($_POST['b2saddress'])) > 0) ? IsValidString($_POST['b2saddress']) : true) {
 unset($GLOBALS['b2saddress_invalid_flag']);
} else { DeleteUpload("", "b2saddress");
 $GLOBALS['b2saddress_invalid_flag'] = 1;
 unset($_SESSION['b2saddress_uploaded']);
 unset($_SESSION['b2saddress_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b2city']) && strlen(trim($_POST['b2city'])) > 0) ? IsValidString($_POST['b2city']) : true) {
 unset($GLOBALS['b2city_invalid_flag']);
} else { DeleteUpload("", "b2city");
 $GLOBALS['b2city_invalid_flag'] = 1;
 unset($_SESSION['b2city_uploaded']);
 unset($_SESSION['b2city_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b2state']) && strlen(trim($_POST['b2state'])) > 0) ? IsValidString($_POST['b2state']) : true) {
 unset($GLOBALS['b2state_invalid_flag']);
} else { DeleteUpload("", "b2state");
 $GLOBALS['b2state_invalid_flag'] = 1;
 unset($_SESSION['b2state_uploaded']);
 unset($_SESSION['b2state_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['b2zip']) && strlen(trim($_POST['b2zip'])) > 0) ? IsValidString($_POST['b2zip']) : true) {
 unset($GLOBALS['b2zip_invalid_flag']);
} else { DeleteUpload("", "b2zip");
 $GLOBALS['b2zip_invalid_flag'] = 1;
 unset($_SESSION['b2zip_uploaded']);
 unset($_SESSION['b2zip_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb1name']) && strlen(trim($_POST['sb1name'])) > 0) ? IsValidString($_POST['sb1name']) : true) {
 unset($GLOBALS['sb1name_invalid_flag']);
} else { DeleteUpload("", "sb1name");
 $GLOBALS['sb1name_invalid_flag'] = 1;
 unset($_SESSION['sb1name_uploaded']);
 unset($_SESSION['sb1name_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb1relationship']) && strlen(trim($_POST['sb1relationship'])) > 0) ? IsValidString($_POST['sb1relationship']) : true) {
 unset($GLOBALS['sb1relationship_invalid_flag']);
} else { DeleteUpload("", "sb1relationship");
 $GLOBALS['sb1relationship_invalid_flag'] = 1;
 unset($_SESSION['sb1relationship_uploaded']);
 unset($_SESSION['sb1relationship_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb1percentshare']) && strlen(trim($_POST['sb1percentshare'])) > 0) ? IsValidString($_POST['sb1percentshare']) : true) {
 unset($GLOBALS['sb1percentshare_invalid_flag']);
} else { DeleteUpload("", "sb1percentshare");
 $GLOBALS['sb1percentshare_invalid_flag'] = 1;
 unset($_SESSION['sb1percentshare_uploaded']);
 unset($_SESSION['sb1percentshare_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb1SSN']) && strlen(trim($_POST['sb1SSN'])) > 0) ? IsValidString($_POST['sb1SSN']) : true) {
 unset($GLOBALS['sb1SSN_invalid_flag']);
} else { DeleteUpload("", "sb1SSN");
 $GLOBALS['sb1SSN_invalid_flag'] = 1;
 unset($_SESSION['sb1SSN_uploaded']);
 unset($_SESSION['sb1SSN_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb1birthdate']) && strlen(trim($_POST['sb1birthdate'])) > 0) ? IsValidString($_POST['sb1birthdate']) : true) {
 unset($GLOBALS['sb1birthdate_invalid_flag']);
} else { DeleteUpload("", "sb1birthdate");
 $GLOBALS['sb1birthdate_invalid_flag'] = 1;
 unset($_SESSION['sb1birthdate_uploaded']);
 unset($_SESSION['sb1birthdate_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb1phone']) && strlen(trim($_POST['sb1phone'])) > 0) ? IsValidString($_POST['sb1phone']) : true) {
 unset($GLOBALS['sb1phone_invalid_flag']);
} else { DeleteUpload("", "sb1phone");
 $GLOBALS['sb1phone_invalid_flag'] = 1;
 unset($_SESSION['sb1phone_uploaded']);
 unset($_SESSION['sb1phone_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb1saddress']) && strlen(trim($_POST['sb1saddress'])) > 0) ? IsValidString($_POST['sb1saddress']) : true) {
 unset($GLOBALS['sb1saddress_invalid_flag']);
} else { DeleteUpload("", "sb1saddress");
 $GLOBALS['sb1saddress_invalid_flag'] = 1;
 unset($_SESSION['sb1saddress_uploaded']);
 unset($_SESSION['sb1saddress_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb1city']) && strlen(trim($_POST['sb1city'])) > 0) ? IsValidString($_POST['sb1city']) : true) {
 unset($GLOBALS['sb1city_invalid_flag']);
} else { DeleteUpload("", "sb1city");
 $GLOBALS['sb1city_invalid_flag'] = 1;
 unset($_SESSION['sb1city_uploaded']);
 unset($_SESSION['sb1city_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb1state']) && strlen(trim($_POST['sb1state'])) > 0) ? IsValidString($_POST['sb1state']) : true) {
 unset($GLOBALS['sb1state_invalid_flag']);
} else { DeleteUpload("", "sb1state");
 $GLOBALS['sb1state_invalid_flag'] = 1;
 unset($_SESSION['sb1state_uploaded']);
 unset($_SESSION['sb1state_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb1zip']) && strlen(trim($_POST['sb1zip'])) > 0) ? IsValidString($_POST['sb1zip']) : true) {
 unset($GLOBALS['sb1zip_invalid_flag']);
} else { DeleteUpload("", "sb1zip");
 $GLOBALS['sb1zip_invalid_flag'] = 1;
 unset($_SESSION['sb1zip_uploaded']);
 unset($_SESSION['sb1zip_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb2name']) && strlen(trim($_POST['sb2name'])) > 0) ? IsValidString($_POST['sb2name']) : true) {
 unset($GLOBALS['sb2name_invalid_flag']);
} else { DeleteUpload("", "sb2name");
 $GLOBALS['sb2name_invalid_flag'] = 1;
 unset($_SESSION['sb2name_uploaded']);
 unset($_SESSION['sb2name_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb2relationship']) && strlen(trim($_POST['sb2relationship'])) > 0) ? IsValidString($_POST['sb2relationship']) : true) {
 unset($GLOBALS['sb2relationship_invalid_flag']);
} else { DeleteUpload("", "sb2relationship");
 $GLOBALS['sb2relationship_invalid_flag'] = 1;
 unset($_SESSION['sb2relationship_uploaded']);
 unset($_SESSION['sb2relationship_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb2percentshare']) && strlen(trim($_POST['sb2percentshare'])) > 0) ? IsValidString($_POST['sb2percentshare']) : true) {
 unset($GLOBALS['sb2percentshare_invalid_flag']);
} else { DeleteUpload("", "sb2percentshare");
 $GLOBALS['sb2percentshare_invalid_flag'] = 1;
 unset($_SESSION['sb2percentshare_uploaded']);
 unset($_SESSION['sb2percentshare_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb2SSN']) && strlen(trim($_POST['sb2SSN'])) > 0) ? IsValidString($_POST['sb2SSN']) : true) {
 unset($GLOBALS['sb2SSN_invalid_flag']);
} else { DeleteUpload("", "sb2SSN");
 $GLOBALS['sb2SSN_invalid_flag'] = 1;
 unset($_SESSION['sb2SSN_uploaded']);
 unset($_SESSION['sb2SSN_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb2birthdate']) && strlen(trim($_POST['sb2birthdate'])) > 0) ? IsValidString($_POST['sb2birthdate']) : true) {
 unset($GLOBALS['sb2birthdate_invalid_flag']);
} else { DeleteUpload("", "sb2birthdate");
 $GLOBALS['sb2birthdate_invalid_flag'] = 1;
 unset($_SESSION['sb2birthdate_uploaded']);
 unset($_SESSION['sb2birthdate_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb2phone']) && strlen(trim($_POST['sb2phone'])) > 0) ? IsValidString($_POST['sb2phone']) : true) {
 unset($GLOBALS['sb2phone_invalid_flag']);
} else { DeleteUpload("", "sb2phone");
 $GLOBALS['sb2phone_invalid_flag'] = 1;
 unset($_SESSION['sb2phone_uploaded']);
 unset($_SESSION['sb2phone_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb2saddress']) && strlen(trim($_POST['sb2saddress'])) > 0) ? IsValidString($_POST['sb2saddress']) : true) {
 unset($GLOBALS['sb2saddress_invalid_flag']);
} else { DeleteUpload("", "sb2saddress");
 $GLOBALS['sb2saddress_invalid_flag'] = 1;
 unset($_SESSION['sb2saddress_uploaded']);
 unset($_SESSION['sb2saddress_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sbcity']) && strlen(trim($_POST['sbcity'])) > 0) ? IsValidString($_POST['sbcity']) : true) {
 unset($GLOBALS['sbcity_invalid_flag']);
} else { DeleteUpload("", "sbcity");
 $GLOBALS['sbcity_invalid_flag'] = 1;
 unset($_SESSION['sbcity_uploaded']);
 unset($_SESSION['sbcity_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb2state']) && strlen(trim($_POST['sb2state'])) > 0) ? IsValidString($_POST['sb2state']) : true) {
 unset($GLOBALS['sb2state_invalid_flag']);
} else { DeleteUpload("", "sb2state");
 $GLOBALS['sb2state_invalid_flag'] = 1;
 unset($_SESSION['sb2state_uploaded']);
 unset($_SESSION['sb2state_upload_name']);
 $isBlockValid = false;
 }
if ((isset($_POST['sb2zip']) && strlen(trim($_POST['sb2zip'])) > 0) ? IsValidString($_POST['sb2zip']) : true) {
 unset($GLOBALS['sb2zip_invalid_flag']);
} else { DeleteUpload("", "sb2zip");
 $GLOBALS['sb2zip_invalid_flag'] = 1;
 unset($_SESSION['sb2zip_uploaded']);
 unset($_SESSION['sb2zip_upload_name']);
 $isBlockValid = false;
 }
}
return $isBlockValid; } ?>
<?php function DoSubmit() {


$actionFile = fopen(GetSafeFileSpec("formdata/NAA_v1_olive.txt", true), 'w');
 if ($actionFile) {
fwrite($actionFile, GetCsvLine(true)."\r\n");
 fclose($actionFile); }
//SendEmailWithFiles($_POST['pemail'], 'vasu@ccprllc.com', 'Form //submitted', GetSummary(true));
//include('testmail.php');
//myemail();

include('fillpdf.php'); 
//echo "hurrah" ;
DoProcessing();
//include('send-pdf-by-email.php');
//Send_Pdf_By_Email($_POST('pemail'), $_POST('pfname'));
//Send_Pdf_By_Email();

} ?>


<?php function DisplayConfirmation() {
GeneratePlainField("Last Name", "plname");
GeneratePlainField("First Name", "pfname");
GeneratePlainField("Middle Name", "pmname");
GeneratePlainField("Street Address", "psaddress");
GeneratePlainField("City", "pcity");
GenerateStateField("State", "pstate");
GeneratePlainField("ZIP", "pzip");
GeneratePlainField("Email", "pemail");
GeneratePlainField("Birth Date", "pbdate");
GeneratePlainField("Social Security Number", "pSSN");
GeneratePlainField("Home Telephone", "phomephone");
GeneratePlainField("Daytime Phone", "pdaytimephone");
GeneratePlainField("Type of ID", "pidtype");
GeneratePlainField("ID Number", "pidnum");
GeneratePlainField("Issuing Jurisdiction", "pissuer");
GeneratePlainField("Expiration Date", "pexpdate");
GeneratePlainField("Issue Date", "pissuedate");
GenerateListField("Account Type", "paccttype", 1);
GenerateListField("Account Ownership", "pacctown", 1);
GenerateListField("Funding the Account", "pacctfunding", 2);
GeneratePlainField("Amount with Application", "pamtwapp");
GeneratePlainField("Total Amount", "ptotalamt");
GeneratePlainField("Will wire funds on", "pfundswiredt");
GeneratePlainField("Total Household Net Worth", "pnetworth");
GenerateListField("Approximate Gross Annual Income", "pgrossincome", 5);
GeneratePlainField("Not Liquid", "pliquidity");
GeneratePlainField("Emergency Liquidity", "pemergency");
GeneratePlainField("Liquid Amount", "pliquidamt");
GeneratePlainField("Federal Income Tax Bracket ", "ptaxbracket");
GeneratePlainField("Other Tax Bracket", "pothertaxbracket");
GenerateListField("Source of Income", "pincomesource", 5);
GeneratePlainField("Other Income", "potherincome");
GeneratePlainField("Does your monthly expenses exceed your monthly income", "pexpoverincome");
GeneratePlainField("Change in Income", "pincchange");
GeneratePlainField("Income Level Explanation", "pinclevelexplanation");
GeneratePlainField("Income Change Explanation", "pincchangeexplanation");
GenerateListField("Any Anticipated Change in Expenses", "pexpchange", 2);
GeneratePlainField("Expense Change Explanation", "pexpchangeexplanation");
GenerateListField("Financial Objectives", "pfinobj", 5);
GeneratePlainField("Other Financial Objective", "potherfinobj");
GeneratePlainField("Joint Owner Last Name", "jlname");
GeneratePlainField("Joint Owner Birth Date", "jbirthdate");
GeneratePlainField("Joint Owner Social Security Number", "jSSN");
GeneratePlainField("Joint Owner Email Address", "jemail");
GeneratePlainField("Joint Owner Home Phone", "jhomephone");
GeneratePlainField("Joint Owner Daytime Phone", "jdaytimephone");
GenerateListField("Address Same as that of Participant", "jsameaddress", 2);
GeneratePlainField("Joint Owner Street Address", "jaddress");
GeneratePlainField("Joint Owner City", "jcity");
GenerateStateField("Joint Owner State", "jstate");
GeneratePlainField("Joint Owner Zip", "jzip");
GeneratePlainField("Joint Owner First Name", "jfname");
GeneratePlainField("Joint Owner Middle Name", "jmname");
GeneratePlainField("Trust Name", "trustname");
GeneratePlainField("Trustee Name", "trusteename");
GeneratePlainField("Date of Trust", "trustdate");
GeneratePlainField("Trust Tax ID Number", "ttaxid");
GeneratePlainField("Trust Email", "temail");
GeneratePlainField("Trust Telephone Number", "tphone");
GeneratePlainField("Trust Street Address", "tstreetaddress");
GeneratePlainField("Trust City", "tcity");
GenerateStateField("Trust State", "tstate");
GeneratePlainField("Trust ZIP", "tzip");
GeneratePlainField("Beneficiary 1 Name", "b1name");
GeneratePlainField("Beneficiary 1 Relationship", "b1relationship");
GeneratePlainField("Beneficiary 1 Percent Share", "b1percentshare");
GeneratePlainField("Beneficiary 1 SSN", "b1SSN");
GeneratePlainField("Beneficiary 1 Birth Date", "b1birthdate");
GeneratePlainField("Beneficiary 1 Phone", "b1phone");
GeneratePlainField("Beneficiary 1 Street Address", "b1saddress");
GeneratePlainField("Beneficiary 1 City", "b1city");
GenerateStateField("Beneficiary 1 State", "b1state");
GeneratePlainField("Beneficiary 1 zip", "b1zip");
GeneratePlainField("Beneficiary 2 Name", "b2name");
GeneratePlainField("Beneficiary 2 Relationship", "b2relationship");
GeneratePlainField("Beneficiary 2 Percent Share", "b2percentshare");
GeneratePlainField("Beneficiary 2 SSN", "b2SSN");
GeneratePlainField("Beneficiary 2 Birtn Date", "b2birthdate");
GeneratePlainField("Beneficiary 2 Phone", "b2phone");
GeneratePlainField("Beneficiary 2 Street Address", "b2saddress");
GeneratePlainField("Beneficiary 2 City", "b2city");
GenerateStateField("Beneficiary 2 State", "b2state");
GeneratePlainField("Beneficiary 2 Zip", "b2zip");
GeneratePlainField("Secondary Beneficiary 1 Name", "sb1name");
GeneratePlainField("Secondary Beneficiary 1 Relationship", "sb1relationship");
GeneratePlainField("Secondary Beneficiary 1 Percent Share", "sb1percentshare");
GeneratePlainField("Secondary Beneficiary 1 SSN", "sb1SSN");
GeneratePlainField("Secondary Beneficiary 1 Birth Date", "sb1birthdate");
GeneratePlainField("Secondary Beneficiary 1 Phone", "sb1phone");
GeneratePlainField("Secondary Beneficiary 1 Street Address", "sb1saddress");
GeneratePlainField("Secondary Beneficiary 1 City", "sb1city");
GenerateStateField("Secondary Beneficiary 1 State", "sb1state");
GeneratePlainField("Secondary Beneficiary 1 Zip", "sb1zip");
GeneratePlainField("Secondary Beneficiary 2 Name", "sb2name");
GeneratePlainField("Secondary Beneficiary 2 Relationship", "sb2relationship");
GeneratePlainField("Secondary Beneficiary 2 Percent Share", "sb2percentshare");
GeneratePlainField("Secondary Beneficiary 2 SSN", "sb2SSN");
GeneratePlainField("Secondary Beneficiary 2 Birth Date", "sb2birthdate");
GeneratePlainField("Secondary Beneficiary 2 Phone", "sb2phone");
GeneratePlainField("Secondary Beneficiary 2 Street Address", "sb2saddress");
GeneratePlainField("Secondary Beneficiary 2 City", "sbcity");
GenerateStateField("Secondary Beneficiary 2 State", "sb2state");
GeneratePlainField("Secondary Beneficiary 2 ZIP", "sb2zip");
} ?>
<?php

$formgen_action_back = false;
$formgen_action_next = false;
$formgen_action_submit = false;
$formgen_action_confirm = false;
$formgen_page_validated = false;

session_start();

function IsValidEmail($email)
{
	return preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/i", $email);
}

function IsValidZIP($zip)
{
	return preg_match("/^[0-9]{3,5}$/i", $zip);
}

function IsValidURL($url)
{
	return preg_match("#^http(s)?://[a-z0-9-_.]+\.[a-z]{2,4}#i", $url);
}

function IsValidPhone($phone)
{
	return preg_match("/^[0-9]{7,11}$/i", $phone);
}

function IsValidSSN($ssn)
{
	return preg_match("/^[\d]{9}$/", $ssn);
}

function IsValidDate($date)
{
	if (preg_match("/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/", $date, $parts))
		return checkdate($parts[1], $parts[2], $parts[3]);
	else
		return false;
}

function IsValidFile($fileName)
{
	return ($_FILES[$fileName]["error"] === UPLOAD_ERR_OK);
}

function IsValidFileSize($fileName, $maxSize)
{
	return (($maxSize == 0) || $_FILES[$fileName]["size"] <= $maxSize);
}

function IsValidImage($imageName)
{
	if (!IsValidFile($imageName))
		return false;
		
	return (strcasecmp(substr($_FILES[$imageName]["type"], 0, 6), "image/") == 0);
}

function IsValidAudio($audioName)
{
	if (!IsValidFile($audioName))
		return false;
		
	return (strcasecmp(substr($_FILES[$audioName]["type"], 0, 6), "audio/") == 0);
}

function IsValidVideo($videoName)
{
	if (!IsValidFile($videoName))
		return false;
		
	return (strcasecmp(substr($_FILES[$videoName]["type"], 0, 6), "video/") == 0);
}

function IsValidDocument($docName)
{
	if (!IsValidFile($docName))
		return false;
	
	switch ($_FILES[$docName]["type"])
	{
		case "application/msword":
		case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
		case "application/vnd.ms-excel":
		case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet":
		case "application/pdf";
			return true;
		default:
			return (strcasecmp(substr($_FILES[$docName]["type"], 0, 5), "text/") == 0);
	}
}

function IsValidArchive($archiveName)
{
	if (!IsValidFile($archiveName))
		return false;
	
	switch ($_FILES[$archiveName]["type"])
	{
		case "application/zip":
		case "application/rar":
		case "application/7z":
		case "application/x-zip":
		case "application/x-rar":
		case "application/x-7z":
		case "application/x-zip-compressed":
		case "application/x-7z-compressed":
		case "application/x-rar-compressed":
			return true;
		default:
			return false;
	}
}

function IsValidString($str)
{
	return strlen(trim($str)) > 0;
}

function IsValidCheckbox($fieldName, $optionsCount)
{
	for ($i = 0; $i < $optionsCount; $i++)
		if (isset($_POST[$fieldName.'_'.$i]))
			return true;

	return false;
}


if(!function_exists('mime_content_type'))
{
	function mime_content_type($filename)
	{
		$mime_types = array
		(
			'txt' => 'text/plain',
			'htm' => 'text/html',
			'html' => 'text/html',
			'php' => 'text/html',
			'css' => 'text/css',
			'js' => 'application/javascript',
			'json' => 'application/json',
			'xml' => 'application/xml',
			'swf' => 'application/x-shockwave-flash',
			'flv' => 'video/x-flv',
			// images
			'png' => 'image/png',
			'jpe' => 'image/jpeg',
			'jpeg' => 'image/jpeg',
			'jpg' => 'image/jpeg',
			'gif' => 'image/gif',
			'bmp' => 'image/bmp',
			'ico' => 'image/vnd.microsoft.icon',
			'tiff' => 'image/tiff',
			'tif' => 'image/tiff',
			'svg' => 'image/svg+xml',
			'svgz' => 'image/svg+xml',
			// archives
			'zip' => 'application/zip',
			'rar' => 'application/x-rar-compressed',
			'exe' => 'application/x-msdownload',
			'msi' => 'application/x-msdownload',
			'cab' => 'application/vnd.ms-cab-compressed',
			// audio/video
			'mp3' => 'audio/mpeg',
			'qt' => 'video/quicktime',
			'mov' => 'video/quicktime',
			// adobe
			'pdf' => 'application/pdf',
			'psd' => 'image/vnd.adobe.photoshop',
			'ai' => 'application/postscript',
			'eps' => 'application/postscript',
			'ps' => 'application/postscript',
			// ms office
			'doc' => 'application/msword',
			'rtf' => 'application/rtf',
			'xls' => 'application/vnd.ms-excel',
			'ppt' => 'application/vnd.ms-powerpoint',
			// open office
			'odt' => 'application/vnd.oasis.opendocument.text',
			'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
		);

		$arr = explode('.',$filename);
		$ext = strtolower(array_pop($arr));
		if (array_key_exists($ext, $mime_types))
			return $mime_types[$ext];
		elseif (function_exists('finfo_open'))
		{
			$finfo = finfo_open(FILEINFO_MIME);
			$mimetype = finfo_file($finfo, $filename);
			finfo_close($finfo);
			return $mimetype;
		}
		else
			return 'application/octet-stream';
	}
}

function MakeDirectory($dir, $mode)
{
	if (is_dir($dir) || @mkdir($dir, $mode))
		return TRUE;
	if (!MakeDirectory(dirname($dir), $mode))
		return FALSE;
		
	return @mkdir($dir, $mode);
}

function GetSafePathName($fileName, $create)
{
	$safeName = trim(preg_replace("[^a-zA-Z0-9.-_/]", "_", $fileName));
	if (strlen($safeName) == 0)
		return "";
		
	if ($create && !file_exists($fileName))
		MakeDirectory($safeName, 0755);
		
	return $safeName;
}

function GetSafeFileName($fileName)
{
	return preg_replace("[^a-zA-Z0-9.-_]", "_", $fileName);
}

function GetSafeFileSpec($fileName, $createDir)
{
	$dir = realpath(dirname(GetSafePathName($fileName, false)));
	if ($createDir && !file_exists($dir))
		MakeDirectory($dir, 0755);
	
	return $dir.'/'.GetSafeFileName(basename($fileName));
}

function RecreateSession()
{
	foreach ($_SESSION as $x => $y)
		unset ($_SESSION[$x]);
	
	$_SESSION = array();
	
	if (isset($_COOKIE[session_name()]))
		setcookie(session_name(), '', time()-42000, '/');

	session_unset();
	session_destroy();
	session_regenerate_id();
	session_start();
}

function GetUploadedFileName($location, $fieldName)
{
	$idx = $fieldName.'_upload_name';
	if (!isset($_SESSION[$idx]))
		return "";

	$path = GetSafePathName($location, true);
	if (strlen($path) > 0 && substr($path, -1) != "/")
		$path .= "/";
		
	return $path.GetSafeFileName(session_id().'_'.$fieldName.'_'.$_SESSION[$idx]);
}

function GenerateUploadFileName($location, $fieldName)
{
	if (!isset($_FILES[$fieldName]))
		return "";
	
	$path = GetSafePathName($location, true);
	if (strlen($path) > 0 && substr($path, -1) != "/")
		$path .= "/";

	$i = 1;
	$fullPath = $path.GetSafeFileName(session_id().'_'.$fieldName.'_'.$_FILES[$fieldName]['name']);
	while (is_dir($fullPath) && $i++)
		$fullPath = $path.$i.GetSafeFileName(session_id().'_'.$fieldName.'_'.$_FILES[$fieldName]['name']);
	
	return $fullPath;
}

function DeleteUpload($location, $fieldName)
{
	if (isset($_SESSION[$fieldName.'_upload_name']))
	{
		$fileName = GetUploadedFileName($location, $fieldName);
		if (file_exists($fileName))
			unlink($fileName);
		
		unset($_SESSION[$fieldName.'_uploaded']);
		unset($_SESSION[$fieldName.'_upload_name']);
	}
}

function GetValuesList($fieldName, $optionsCount)
{
	$retValue = "";
	
	for ($i = 0; $i < $optionsCount; $i++)
	{
		$optionName = $fieldName.'_'.$i;
		if (isset($_POST[$optionName]) && strlen(trim($_POST[$optionName])) > 0)
		{
			if (strlen($retValue) > 0)
				$retValue = $retValue.', ';
			$retValue = $retValue.$_POST[$optionName];
		}
	}
	return $retValue;
}

function GetValuesListradio($fieldName, $optionsCount)
{
	$retValue = "";
	
	for ($i = 0; $i < $optionsCount; $i++)
	{
		$optionName = $fieldName;
		if (isset($_POST[$optionName]) && strlen(trim($_POST[$optionName])) > 0)
		{
			if (strlen($retValue) > 0)
				$retValue = $retValue.', ';
			$retValue = $retValue.$_POST[$optionName];
		}
	}
	return $retValue;
}


function GetValuesArray($fieldName)
{
	$retValue = "";
	if (isset($_POST[$fieldName]))
	{
		$cnt = count($_POST[$fieldName]);
		for ($i = 0; $i < $cnt; $i++)
		{
			if (strlen($retValue) > 0)
				$retValue = $retValue.', ';
			$retValue = $retValue.$_POST[$fieldName][$i];
		}
	}
	return $retValue;
}

function GetUploadedFiles()
{
	$files = GetFileFields();
	for ($i = 0; $i < count($files); $i++)
	{
		$fileName = "";
		$filePath = "";
		if (isset($_SESSION[$files[$i].'_full_path']) && isset($_SESSION[$files[$i].'_upload_name']))
		{
			$fileName = $_SESSION[$files[$i].'_upload_name'];
			$filePath = $_SESSION[$files[$i].'_full_path'];
		}
		$files[$i] = array("name" => $fileName, "path" => $filePath);
	}
	return $files;
}

function SendEmail($from, $to, $subject, $body)
{
	$headers = (strlen(trim($from)) == 0) ? "" : "From: ".$from."\r\nReply-To: ".$from;
	$mail_sent = @mail($to, $subject, $body, $headers);
}

function SendEmailWithFiles($from, $to, $subject, $body)
{
	$boundary = "==Multipart_Boundary_".md5(date('r', time()));

	$headers = (strlen(trim($from)) == 0) ? "" : "From: ".$from."\nReply-To: ".$from."\n";
	$headers .= "MIME-Version: 1.0\nContent-Type: multipart/mixed;\n boundary=\"".$boundary."\"";
	
	$message = "ZZZ \n\n--".$boundary."\n";
	$message .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
	$message .= "Content-Transfer-Encoding: 7bit\n\n";
	$message .= $body;
	//$message .= "\n\n--".$boundary."\n";
	
	$files = GetUploadedFiles();
	foreach($files as $key => $attachFile)
	{
		if (file_exists($attachFile["path"]))
		{
			$message .= "\n\n--".$boundary."\n";
			$message .= "Content-Type: ".mime_content_type($attachFile["path"])."; name=\"".$attachFile["name"]."\"\n";
			$message .= "Content-Disposition: attachment\n";
			$message .= "Content-Transfer-Encoding: base64\n\n";
			$message .= chunk_split(base64_encode(file_get_contents($attachFile["path"])));
		}
	}

	$mail_sent = @mail($to, $subject, $message, $headers);
}

function GenerateSubmitButton()
{
	global $pageNumber, $pagesCount, $confirmPage;
	global $formgen_action_submit, $formgen_action_confirm;
	global $formgen_page_validated;
	
	if ($formgen_action_submit && $formgen_page_validated)
		return; // already submitted. no button needed
	
	$showConfirm = ($formgen_action_confirm && $formgen_page_validated && ($pageNumber == $pagesCount));
	if ($pagesCount > 1 || $showConfirm)
	{
		echo '<tr><td colspan="3"><table align="right"><tr>';
		if ($pageNumber > 0)
			echo '<td><br /><input type="submit" class="btn_half" name="formgen_submit" value="Back" /></td>';
			
		if ($pageNumber == $pagesCount)
			$action = "Submit";
		else if ($pageNumber == ($pagesCount - 1))
			$action = $confirmPage ? 'Confirm' : 'Submit';
		else
			$action = 'Next';
			
		echo '<td><br /><input type="submit" class="btn_half" name="formgen_submit" value="'.$action.'"/></td></tr></table></td></tr>';
	}
	else
	{
		if ($confirmPage)
			$action = 'Confirm';
		else
			$action = 'Submit';
		
		echo '<tr><td colspan="3"><br /><input type="submit" class="btn" name="formgen_submit" value="'.$action.'" /></td></tr>';
	}
}

function GenerateField($fieldCaption, $fieldValue)
{
	echo '<tr><td><div class="caption_fields"><b>'.$fieldCaption.":&nbsp;</b></div></td>";
	echo '<td colspan="2"><div class="caption_fields">'.$fieldValue."</div></td></tr>\n";
}

function GeneratePlainField($fieldCaption, $fieldName)
{
	GenerateField($fieldCaption, isset($_POST[$fieldName]) ? $_POST[$fieldName] : '');
}

function GenerateCountryField($fieldCaption, $fieldName)
{
	GenerateField($fieldCaption, isset($_POST[$fieldName]) ? GetCountry($_POST[$fieldName]) : '');
}

function GenerateStateField($fieldCaption, $fieldName)
{
	GenerateField($fieldCaption, isset($_POST[$fieldName]) ? GetState($_POST[$fieldName]) : '');
}

function GenerateHobbyField($fieldCaption, $fieldName)
{
	GenerateField($fieldCaption, isset($_POST[$fieldName]) ? GetHobby($_POST[$fieldName]) : '');
}

function GenerateJobField($fieldCaption, $fieldName)
{
	GenerateField($fieldCaption, isset($_POST[$fieldName]) ? GetJob($_POST[$fieldName]) : '');
}

function GenerateJobTypeField($fieldCaption, $fieldName)
{
	GenerateField($fieldCaption, isset($_POST[$fieldName]) ? GetJobType($_POST[$fieldName]) : '');
}

function GenerateNameField($fieldCaption, $fieldName)
{
	$fullName = (isset($_POST[$fieldName.'_FIRST']) ? $_POST[$fieldName.'_FIRST'] : '').' '.
				(isset($_POST[$fieldName.'_MIDDLE']) ? $_POST[$fieldName.'_MIDDLE'] : '').' '.
				(isset($_POST[$fieldName.'_LAST']) ? $_POST[$fieldName.'_LAST'] : '');
	
	GenerateField($fieldCaption, $fullName);
}

function GenerateArrayField($fieldCaption, $fieldName)
{
	GenerateField($fieldCaption, GetValuesArray($fieldName));
}

function GenerateListField($fieldCaption, $fieldName, $itemsCount)
{
	GenerateField($fieldCaption, GetValuesList($fieldName, $itemsCount));
}

function GenerateFileField($fieldCaption, $fieldName)
{
	GenerateField($fieldCaption, isset($_SESSION[$fieldName.'_upload_name']) ? $_SESSION[$fieldName.'_upload_name'] : '');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formgen_submit']))
{
	if (isset($_POST['NAME']))
		$userName = trim($_POST['NAME']);
	
	if (isset($_POST['formgen_page_number']))
		$pageNumber = intval($_POST['formgen_page_number']);
	
	if (strcasecmp($_POST['formgen_submit'], "Back") == 0)
		$formgen_action_back = true;
	else if (strcasecmp($_POST['formgen_submit'], "Next") == 0)
		$formgen_action_next = true;	
	else if (strcasecmp($_POST['formgen_submit'], "Submit") == 0)
		$formgen_action_submit = true;
	else if (strcasecmp($_POST['formgen_submit'], "Confirm") == 0)
		$formgen_action_confirm = true;
	
	if ($formgen_action_back)
	{
		$pageNumber--;
		if ($pageNumber < 0)
			$pageNumber = 0;
	}
	else
	{
		$formgen_page_validated = ValidateFields();
		if ($formgen_page_validated)
		{
			if ($formgen_action_next)
			{
				$pageNumber++;
				if ($pageNumber >= $pagesCount)
					$pageNumber = $pagesCount - 1;
			}
			else if ($formgen_action_submit || $formgen_action_confirm)
			{
				$pageNumber = $pagesCount;
			}
		}
	}
}
else
{
	RecreateSession();
}


?>

<title>New Account Application</title><style type="text/css">
body
{
	margin:0;
	background-color:#FFFFFF;
}

.center_window
{
	width:900px;
	height:auto;
	margin-left:auto;
	margin-right:auto;
}

.header
{
	width:975px;
	height:18px;
	float:left;
	background-image:url(images/header.jpg);
	background-repeat:repeat-x;
}

.header_text
{
	width:auto;
	height:auto;
	float:left;
	margin-top:20px;
	margin-left:40px;
	font-family:tahoma,arial;
	font-size:25px;
	color:#fff;
}

.content
{
	width:900px;
	height:auto;
	float:left;
	background-color:#cccc99;
}

.form_title
{
	width:700px;
	height:auto;
	float:left;
	margin-top:0px;
	margin-left:10px;
	font-family:tahoma,arial;
	font-size:25px;
	color:#666633;
        text-align: center;
        text-decoration: underline;
}

.description_form
{
	width:900px;
	height:auto;
	float:left;
	margin-left:10px;
	font-family:tahoma, Times, serif;
	font-size:16px;
	color:#333333;
}

.border_form
{
	width:800px;
	height:auto;
	float:left;
	margin-top:0px;
	margin-left:10px;
}

.td_width
{
	width:155px;
}

.caption_fields
{
	width:auto;
	height:auto;
	float:left;
	margin-right:40px;
	margin-bottom:3px;
	font-family:tahoma,arial;
	font-size:14px;
	color:#333333;
}

.input_width1
{
        width:100px;
	float:left;
}

.input_width
{
	width:200px;
	float:left;
}
.input_width2
{
	width:450px;
	float:left;
}


.error_message
{
	width:auto;
	height:auto;
	float:left;
	margin-bottom:3px;
	font-family:tahoma,arial;
	font-size:13px;
	color:#990000;
}

.btn
{
	width:519px;
	height:76px;
	float:left;
	text-align:center;
	font-family:tahoma,arial;
	font-size:22px;
	color:#333333;
	border:0px solid white;
	border-style:none;
	background-image:url(images/btn.png);
	background-repeat:no-repeat;
	cursor:pointer;
}

.btn_half
{
	width:250px;
	height:76px;
	float:left;
	text-align:center;
	font-family:tahoma,arial;
	font-size:22px;
	color:#333333;
	border:0px solid white;
	border-style:none;
	background-image:url(images/btn_half.png);
	background-repeat:no-repeat;
	cursor:pointer;
}

.confirmation_messages
{
	width:550px;
	height:auto;
	float:left;
	text-align:center;
	margin-left:410px;
	margin-top:-50px;
	font-family:tahoma,arial;
	font-size:12px;
	color:#333;
}

.footer
{
	width:975px;
	height:213px;
	float:left;
	background-image:url(images/footer.jpg);
	background-repeat:repeat-x;
}

.txt_footer
{
	width:auto;
	height:auto;
	float:right;
	margin-right:20px;
	margin-top:20px;
	font-family:tahoma,arial;
	font-size:30px;
	color:#FFFFFF;
}

.hidden_page_field { visibility: collapse; display: none; }
.invisible_page_field { visibility: hidden; }
</style>
<script type="text/javascript">
function addUpload(elmName)
{
	var newDiv = document.createElement('div');
	newDiv.innerHTML = "<input type='file' class='input_width' name='" + elmName + "'>";
	var parent = document.getElementById(elmName + '_div_id');
	var child = document.getElementById(elmName + '_delete_div');
	
	parent.removeChild(child);
	parent.appendChild(newDiv);
}
</script>
<div class="center_window">
<div class="header"><div class="header_text">The Dicke Company, LLC</div></div>
<div class="content"><div class="form_title">New Account Application</div>
<form class="border_form" method="POST" enctype="multipart/form-data" action="">
<input type="hidden" name="formgen_page_number" value="<?=$pageNumber?>" />
<table>

<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?>><td colspan="3"><b> PARTICIPANT IDENTIFICATION</b> </td><td></td><td></td><td></td> </tr>

<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td> </td><td> </td> <td> </td></tr>

<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">Last Name</div><div class="error_message"><?php if (isset($plname_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="plname" value="<?php if (isset($_POST['plname']) && strlen(trim($_POST['plname'])) > 0) echo $_POST['plname']; else echo ""; ?>" />
</td><td><div class="caption_fields">First Name</div><div class="error_message"><?php if (isset($pfname_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pfname" value="<?php if (isset($_POST['pfname']) && strlen(trim($_POST['pfname'])) > 0) echo $_POST['pfname']; else echo ""; ?>" /></td><td><div class="caption_fields">Middle Name</div><div class="error_message"><?php if (isset($pmname_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pmname" value="<?php if (isset($_POST['pmname']) && strlen(trim($_POST['pmname'])) > 0) echo $_POST['pmname']; else echo ""; ?>" /></td><td><div class="caption_fields">Birth Date</div><div class="error_message"><?php if (isset($pbdate_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pbdate" value="<?php if (isset($_POST['pbdate']) && strlen(trim($_POST['pbdate'])) > 0) echo $_POST['pbdate']; else echo ""; ?>" /></td></tr>

<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?> ><td  colspan="4"><div class="caption_fields">Street Address</div><div class="error_message"><?php if (isset($psaddress_invalid_flag)) echo "Invalid Value"; ?></div><br /><input type="text" class="input_width2" name="psaddress" value="<?php if (isset($_POST['psaddress']) && strlen(trim($_POST['psaddress'])) > 0) echo $_POST['psaddress']; else echo ""; ?>" />
</td><td></td><td colspan="1"><div class="caption_fields">Social Security Num</div><div class="error_message"><?php if (isset($pSSN_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pSSN" value="<?php if (isset($_POST['pSSN']) && strlen(trim($_POST['pSSN'])) > 0) echo $_POST['pSSN']; else echo ""; ?>" /></td></tr>

<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">City</div><div class="error_message"><?php if (isset($pcity_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pcity" value="<?php if (isset($_POST['pcity']) && strlen(trim($_POST['pcity'])) > 0) echo $_POST['pcity']; else echo ""; ?>" />
</td><td><div class="caption_fields">State</div><div class="error_message"><?php if (isset($pstate_invalid_flag)) echo "Invalid Value"; ?></div><select  class="input_width" name="pstate">
<option value="" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], '') == 0) echo 'selected'; ?> >Select One</option>
<option value="AL" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'AL') == 0) echo 'selected'; ?> >Alabama</option>
<option value="AK" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'AK') == 0) echo 'selected'; ?> >Alaska</option>
<option value="AZ" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'AZ') == 0) echo 'selected'; ?> >Arizona</option>
<option value="AR" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'AR') == 0) echo 'selected'; ?> >Arkansas</option>
<option value="CA" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'CA') == 0) echo 'selected'; ?> >California</option>
<option value="CO" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'CO') == 0) echo 'selected'; ?> >Colorado</option>
<option value="CT" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'CT') == 0) echo 'selected'; ?> >Connecticut</option>
<option value="DE" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'DE') == 0) echo 'selected'; ?> >Delaware</option>
<option value="DC" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'DC') == 0) echo 'selected'; ?> >District of Columbia</option>
<option value="FL" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'FL') == 0) echo 'selected'; ?> >Florida</option>
<option value="GA" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'GA') == 0) echo 'selected'; ?> >Georgia</option>
<option value="HI" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'HI') == 0) echo 'selected'; ?> >Hawaii</option>
<option value="ID" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'ID') == 0) echo 'selected'; ?> >Idaho</option>
<option value="IL" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'IL') == 0) echo 'selected'; ?> >Illinois</option>
<option value="IN" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'IN') == 0) echo 'selected'; ?> >Indiana</option>
<option value="IA" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'IA') == 0) echo 'selected'; ?> >Iowa</option>
<option value="KS" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'KS') == 0) echo 'selected'; ?> >Kansas</option>
<option value="KY" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'KY') == 0) echo 'selected'; ?> >Kentucky</option>
<option value="LA" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'LA') == 0) echo 'selected'; ?> >Louisiana</option>
<option value="ME" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'ME') == 0) echo 'selected'; ?> >Maine</option>
<option value="MD" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'MD') == 0) echo 'selected'; ?> >Maryland</option>
<option value="MA" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'MA') == 0) echo 'selected'; ?> >Massachusetts</option>
<option value="MI" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'MI') == 0) echo 'selected'; ?> >Michigan</option>
<option value="MN" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'MN') == 0) echo 'selected'; ?> >Minnesota</option>
<option value="MS" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'MS') == 0) echo 'selected'; ?> >Mississippi</option>
<option value="MO" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'MO') == 0) echo 'selected'; ?> >Missouri</option>
<option value="MT" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'MT') == 0) echo 'selected'; ?> >Montana</option>
<option value="NE" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'NE') == 0) echo 'selected'; ?> >Nebraska</option>
<option value="NV" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'NV') == 0) echo 'selected'; ?> >Nevada</option>
<option value="NH" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'NH') == 0) echo 'selected'; ?> >New Hampshire</option>
<option value="NJ" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'NJ') == 0) echo 'selected'; ?> >New Jersey</option>
<option value="NM" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'NM') == 0) echo 'selected'; ?> >New Mexico</option>
<option value="NY" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'NY') == 0) echo 'selected'; ?> >New York</option>
<option value="NC" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'NC') == 0) echo 'selected'; ?> >North Carolina</option>
<option value="ND" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'ND') == 0) echo 'selected'; ?> >North Dakota</option>
<option value="OH" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'OH') == 0) echo 'selected'; ?> >Ohio</option>
<option value="OK" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'OK') == 0) echo 'selected'; ?> >Oklahoma</option>
<option value="OR" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'OR') == 0) echo 'selected'; ?> >Oregon</option>
<option value="PA" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'PA') == 0) echo 'selected'; ?> >Pennsylvania</option>
<option value="RI" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'RI') == 0) echo 'selected'; ?> >Rhode Island</option>
<option value="SC" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'SC') == 0) echo 'selected'; ?> >South Carolina</option>
<option value="SD" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'SD') == 0) echo 'selected'; ?> >South Dakota</option>
<option value="TN" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'TN') == 0) echo 'selected'; ?> >Tennessee</option>
<option value="TX" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'TX') == 0) echo 'selected'; ?> >Texas</option>
<option value="UT" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'UT') == 0) echo 'selected'; ?> >Utah</option>
<option value="VT" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'VT') == 0) echo 'selected'; ?> >Vermont</option>
<option value="VA" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'VA') == 0) echo 'selected'; ?> >Virginia</option>
<option value="WA" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'WA') == 0) echo 'selected'; ?> >Washington</option>
<option value="WV" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'WV') == 0) echo 'selected'; ?> >West Virginia</option>
<option value="WI" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'WI') == 0) echo 'selected'; ?> >Wisconsin</option>
<option value="WY" <?php if (isset($_POST['pstate']) && strcasecmp($_POST['pstate'], 'WY') == 0) echo 'selected'; ?> >Wyoming</option>
</select>
</td><td><div class="caption_fields">Zip</div><div class="error_message"><?php if (isset($pzip_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pzip" value="<?php if (isset($_POST['pzip']) && strlen(trim($_POST['pzip'])) > 0) echo $_POST['pzip']; else echo ""; ?>" /></td><td><div class="caption_fields">Home Telephone</div><div class="error_message"><?php if (isset($phomephone_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="phomephone" value="<?php if (isset($_POST['phomephone']) && strlen(trim($_POST['phomephone'])) > 0) echo $_POST['phomephone']; else echo ""; ?>" /></td></tr>

<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?> ><td  colspan="4"><div class="caption_fields">Email</div><div class="error_message"><?php if (isset($pemail_invalid_flag)) echo "Invalid Value"; ?></div><br /><input type="text" class="input_width2" name="pemail" value="<?php if (isset($_POST['pemail']) && strlen(trim($_POST['pemail'])) > 0) echo $_POST['pemail']; else echo ""; ?>" />
</td><td></td><td><div class="caption_fields">Daytime Phone</div><div class="error_message"><?php if (isset($pdaytimephone_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pdaytimephone" value="<?php if (isset($_POST['pdaytimephone']) && strlen(trim($_POST['pdaytimephone'])) > 0) echo $_POST['pdaytimephone']; else echo ""; ?>" /></td></tr>

<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td> </td><td> </td> <td> </td></tr>

<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?>> <td><b> PHOTO IDENTIFICATION</b> </td><td></td><td></td><td></td> </tr>

<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td> </td><td> </td> <td> </td></tr>

<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">Type of ID</div><div class="error_message"><?php if (isset($pidtype_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pidtype" value="<?php if (isset($_POST['pidtype']) && strlen(trim($_POST['pidtype'])) > 0) echo $_POST['pidtype']; else echo ""; ?>" />
</td><td><div class="caption_fields">ID Number</div><div class="error_message"><?php if (isset($pidnum_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pidnum" value="<?php if (isset($_POST['pidnum']) && strlen(trim($_POST['pidnum'])) > 0) echo $_POST['pidnum']; else echo ""; ?>" /></td><td colspan="1"><div class="caption_fields">Issuing Jurisdiction</div><div class="error_message"><?php if (isset($pissuer_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pissuer" value="<?php if (isset($_POST['pissuer']) && strlen(trim($_POST['pissuer'])) > 0) echo $_POST['pissuer']; else echo ""; ?>" /></td></tr>

<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?> ><td colspan="3"></td><td  ><div class="caption_fields">Issue Date</div><div class="error_message"><?php if (isset($pissuedate_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pissuedate" value="<?php if (isset($_POST['pissuedate']) && strlen(trim($_POST['pissuedate'])) > 0) echo $_POST['pissuedate']; else echo ""; ?>" />
</td><td><div class="caption_fields">Expiration Date</div><div class="error_message"><?php if (isset($pexpdate_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pexpdate" value="<?php if (isset($_POST['pexpdate']) && strlen(trim($_POST['pexpdate'])) > 0) echo $_POST['pexpdate']; else echo ""; ?>" /></td><td></td></tr>

<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td> </td><td> </td> <td> </td></tr>

<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?>> <td colspan = "4"><b> ESTABLISHING YOUR ACCOUNT</b> </td><td></td><td></td> </tr>

<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td> </td><td> </td> <td> </td></tr>


<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">Account Type </div><div class="error_message"><?php if (isset($paccttype_invalid_flag)) echo "Invalid Value"; ?></div></td><td><div class="input_width"><input type="radio" name="paccttype" value="Non Qualified" <?php if (isset($_POST['paccttype']) && strcasecmp($_POST['paccttype'],'Non Qualified')== 0) echo 'checked';  ?> /> Non Qualified</div></td><td>
<div class="input_width"><input type="radio" name="paccttype" value="Qualified" <?php if (isset($_POST['paccttype']) && strcasecmp($_POST['paccttype'],'Qualified') == 0) echo 'checked'; ?> /> Qualified</div>
</td><td></td></tr>
<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td><hr> </td><td><hr> </td> <td><hr> </td></tr>

<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">Account Ownership </div><div class="error_message"><?php if (isset($pacctown_invalid_flag)) echo "Invalid Value"; ?></div></td><td><div class="input_width"><input type="radio" name="pacctown" value="Individual" <?php if (isset($_POST['pacctown']) && strlen(trim($_POST['pacctown'])) > 0) echo 'checked'; ?> /> Individual</div>
</td><td><div class="input_width"><input type="radio" name="pacctown" value="Joint Owners" <?php if (isset($_POST['pacctown']) && strlen(trim($_POST['pacctown'])) > 0) echo 'checked'; ?> /> Joint Owners</div>
</td><td><div class="input_width"><input type="radio" name="pacctown" value="Trust" <?php if (isset($_POST['pacctown']) && strlen(trim($_POST['pacctown'])) > 0) echo 'checked'; ?> /> Trust</div><br />
</td></tr>
<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td><hr> </td><td><hr> </td> <td><hr> </td></tr>

<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">Funding the Account</div><div class="error_message"><?php if (isset($pacctfunding_invalid_flag)) echo "Invalid Value"; ?></div></td><td><div class="input_width"><input type="checkbox" name="pacctfunding_0" value="Cash" <?php if (isset($_POST['pacctfunding_0']) && strlen(trim($_POST['pacctfunding_0'])) > 0) echo 'checked'; ?> /> Cash or Check</div></td><td>
<div class="input_width"><input type="checkbox" name="pacctfunding_1" value="Will Wire Funds" <?php if (isset($_POST['pacctfunding_1']) && strlen(trim($_POST['pacctfunding_1'])) > 0) echo 'checked'; ?> /> Will Wire Funds</div>
</td><td></td></tr>
<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td><hr> </td><td><hr> </td> <td><hr> </td></tr>

<tr <?php if ($pageNumber != 0) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">Amount with Application</div><div class="error_message"><?php if (isset($pamtwapp_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pamtwapp" value="<?php if (isset($_POST['pamtwapp']) && strlen(trim($_POST['pamtwapp'])) > 0) echo $_POST['pamtwapp']; else echo ""; ?>" />
</td><td><div class="caption_fields">Total Amount</div><div class="error_message"><?php if (isset($ptotalamt_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="ptotalamt" value="<?php if (isset($_POST['ptotalamt']) && strlen(trim($_POST['ptotalamt'])) > 0) echo $_POST['ptotalamt']; else echo ""; ?>" /></td><td colspan="2"><div class="caption_fields">Will wire funds on (date) </div><div class="error_message"><?php if (isset($pfundswiredt_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pfundswiredt" value="<?php if (isset($_POST['pfundswiredt']) && strlen(trim($_POST['pfundswiredt'])) > 0) echo $_POST['pfundswiredt']; else echo ""; ?>" /></td></tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td> </td><td> </td> <td> </td></tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?>> <td colspan = "4"><b> FINANCIAL INFORMATION</b> </td><td></td><td></td> </tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td> </td><td> </td> <td> </td></tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?> ><td ><div class="caption_fields">Total Household Net Worth</div><div class="error_message"><?php if (isset($pnetworth_invalid_flag)) echo "Invalid Value"; ?></td><td></div><input type="text" class="input_width1" name="pnetworth" value="<?php if (isset($_POST['pnetworth']) && strlen(trim($_POST['pnetworth'])) > 0) echo $_POST['pnetworth']; else echo ""; ?>" />
</td><td></td><td></td></tr>
<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td><hr> </td><td><hr> </td> <td><hr> </td></tr>
<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?> ><td  colspan="1"><div class="caption_fields">Annual Income (Pick one)</div><div class="error_message"><?php if (isset($pgrossincome_invalid_flag)) echo "Invalid Value"; ?></div></td><td><div class="input_width"><input type="radio" name="pgrossincome" value="249000" <?php if (isset($_POST['pgrossincome']) && strcasecmp($_POST['pgrossincome'],'249000') == 0) echo 'checked'; ?> /> $100,000 - $249,000</div><br />
<div class="input_width"><input type="radio" name="pgrossincome" value="300000" <?php if (isset($_POST['pgrossincome']) && strcasecmp($_POST['pgrossincome'],'300000') == 0) echo 'checked'; ?> /> $250,000 - $300,000</div><br />
<div class="input_width"><input type="radio" name="pgrossincome" value="400000" <?php if (isset($_POST['pgrossincome']) && strcasecmp($_POST['pgrossincome'],'400000') == 0) echo 'checked'; ?> /> $301,000 - $400,000</div><br />
<div class="input_width"><input type="radio" name="pgrossincome" value="400000plus" <?php if (isset($_POST['pgrossincome']) && strcasecmp($_POST['pgrossincome'],'400000plus') == 0) echo 'checked'; ?> /> $400,000 plus</div><br />
</td><td></td><td></td><td></td></tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td><hr> </td><td><hr> </td> <td><hr> </td></tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?> ><td  colspan="1"><div class="caption_fields">Financial Objectives</div></td><td><div class="error_message"><?php if (isset($pfinobj_invalid_flag)) echo "Invalid Value"; ?></div><div class="input_width"><input type="checkbox" name="pfinobj_0" value="Long Term Growth" <?php if (isset($_POST['pfinobj_0']) && strlen(trim($_POST['pfinobj_0'])) > 0) echo 'checked'; ?> /> Long Term Growth</div><br />
<div class="input_width"><input type="checkbox" name="pfinobj_1" value="Investment Income" <?php if (isset($_POST['pfinobj_1']) && strlen(trim($_POST['pfinobj_1'])) > 0) echo 'checked'; ?> /> Investment Income</div><br />
<div class="input_width"><input type="checkbox" name="pfinobj_2" value="Pass on to heirs" <?php if (isset($_POST['pfinobj_2']) && strlen(trim($_POST['pfinobj_2'])) > 0) echo 'checked'; ?> /> Pass on to heirs</div><br />
<div class="input_width"><input type="checkbox" name="pfinobj_3" value="Retirement Income" <?php if (isset($_POST['pfinobj_3']) && strlen(trim($_POST['pfinobj_3'])) > 0) echo 'checked'; ?> /> Retirement Income</div>
</td></tr>


<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?> ><td></td><td colspan="1"><div class="input_width"><input type="checkbox" name="pfinobj_4" value="Other" <?php if (isset($_POST['pfinobj_4']) && strlen(trim($_POST['pfinobj_4'])) > 0) echo 'checked'; ?> /> Other</div><div class="error_message"><?php if (isset($potherfinobj_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="potherfinobj" value="<?php if (isset($_POST['potherfinobj']) && strlen(trim($_POST['potherfinobj'])) > 0) echo $_POST['potherfinobj']; else echo ""; ?>" />
</td><td></td></tr>
<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td><hr> </td><td><hr> </td> <td><hr> </td></tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">Did your agent explain that this account is NOT liquid and you CAN NOT take money from this account until maturity per policy?</div></td><td><div class="error_message"><?php if (isset($pliquidity_invalid_flag)) echo "Invalid Value"; ?></div><div class="input_width"><input type="radio" name="pliquidity" value="Yes" <?php if (isset($_POST['pliquidity']) && strcasecmp($_POST['pliquidity'],'Yes') == 0) echo 'checked'; ?> /> Yes</div></td><td>
<div class="input_width"><input type="radio" name="pliquidity" value="No" <?php if (isset($_POST['pliquidity']) && strcasecmp($_POST['pliquidity'],'No') == 0) echo 'checked'; ?> /> No</div><br />
</td><td></td><td></td></tr>
<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td><hr> </td><td><hr> </td> <td><hr> </td></tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">Do you have sufficient liquid assets in addition to the money you are using to purchase this contract for unforeseen events or emergencies? (Emergency Liquidity)</div></td><td><div class="error_message"><?php if (isset($pemergency_invalid_flag)) echo "Invalid Value"; ?></div><div class="input_width"><input type="radio" name="pemergency" value="Yes" <?php if (isset($_POST['pemergency']) && strcasecmp($_POST['pemergency'],'Yes')== 0) echo 'checked'; ?> /> Yes</div><br />
</td><td><div class="input_width"><input type="radio" name="pemergency" value="No" <?php if (isset($_POST['pemergency']) && strcasecmp($_POST['pemergency'],'No')== 0) echo 'checked'; ?> /> No</div><br />
</td><td></td><td></td></tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">If you indicated YES above, please provide the approximate amount of assets you have </div><div class="error_message"><?php if (isset($pliquidamt_invalid_flag)) echo "Invalid Value"; ?></div></td><td><input type="text" class="input_width" name="pliquidamt" value="<?php if (isset($_POST['pliquidamt']) && strlen(trim($_POST['pliquidamt'])) > 0) echo $_POST['pliquidamt']; else echo ""; ?>" />
</td><td></td></tr>
<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td><hr> </td><td><hr> </td> <td><hr> </td></tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?> ><td  colspan="1"><div class="caption_fields">Federal Income Tax Bracket </div><div class="error_message"><?php if (isset($ptaxbracket_invalid_flag)) echo "Invalid Value"; ?></div></td><td><div class="input_width"><input type="radio" name="ptaxbracket" value="0" <?php if (isset($_POST['ptaxbracket']) && strcasecmp($_POST['ptaxbracket'],'0') == 0) echo 'checked'; ?> /> 0%</div><br />
<div class="input_width"><input type="radio" name="ptaxbracket" value="10" <?php if (isset($_POST['ptaxbracket']) && strcasecmp($_POST['ptaxbracket'],'10') == 0) echo 'checked'; ?> /> 10%</div><br />
<div class="input_width"><input type="radio" name="ptaxbracket" value="15" <?php if (isset($_POST['ptaxbracket']) && strcasecmp($_POST['ptaxbracket'],'15') == 0) echo 'checked'; ?> /> 15%</div><br />
<div class="input_width"><input type="radio" name="ptaxbracket" value="25" <?php if (isset($_POST['ptaxbracket']) && strcasecmp($_POST['ptaxbracket'],'25') == 0) echo 'checked'; ?> /> 25%</div><br />
<div class="input_width"><input type="radio" name="ptaxbracket" value="28" <?php if (isset($_POST['ptaxbracket']) && strcasecmp($_POST['ptaxbracket'],'28') == 0) echo 'checked'; ?> /> 28%</div><br />
<div class="input_width"><input type="radio" name="ptaxbracket" value="35" <?php if (isset($_POST['ptaxbracket']) && strcasecmp($_POST['ptaxbracket'],'35') == 0) echo 'checked'; ?> /> 35%</div>
</td><td></td><td></td></tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?> ><td  colspan="1"></td><td><div class="input_width"><input type="radio" name="ptaxbracket" value="Other" <?php if (isset($_POST['ptaxbracket']) && strcasecmp($_POST['ptaxbracket'],'Other') == 0) echo 'checked'; ?> /> Other</div></td><td><div class="error_message"><?php if (isset($pothertaxbracket_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pothertaxbracket" value="<?php if (isset($_POST['pothertaxbracket']) && strlen(trim($_POST['pothertaxbracket'])) > 0) echo $_POST['pothertaxbracket']; else echo ""; ?>" />
</td><td></td></tr>
<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td><hr> </td><td><hr> </td> <td><hr> </td></tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?> ><td  colspan="1"><div class="caption_fields">Source of Income</div><div class="error_message"><?php if (isset($pincomesource_invalid_flag)) echo "Invalid Value"; ?></div></td><td><div class="input_width"><input type="checkbox" name="pincomesource_0" value="Current Wages" <?php if (isset($_POST['pincomesource_0']) && strlen(trim($_POST['pincomesource_0'])) > 0) echo 'checked'; ?> /> Current Wages</div><br />
<div class="input_width"><input type="checkbox" name="pincomesource_1" value="Plan or IRA" <?php if (isset($_POST['pincomesource_1']) && strlen(trim($_POST['pincomesource_1'])) > 0) echo 'checked'; ?> /> Plan or IRA</div><br />
<div class="input_width"><input type="checkbox" name="pincomesource_2" value="Investment Income" <?php if (isset($_POST['pincomesource_2']) && strlen(trim($_POST['pincomesource_2'])) > 0) echo 'checked'; ?> /> Investment Income</div><br />
<div class="input_width"><input type="checkbox" name="pincomesource_3" value="Social Security" <?php if (isset($_POST['pincomesource_3']) && strlen(trim($_POST['pincomesource_3'])) > 0) echo 'checked'; ?> /> Social Security</div><br />
</td><td></td><td></td><td></td></tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?> ><td  colspan="1"></td><td><div class="input_width"><input type="checkbox" name="pincomesource_4" value="Other" <?php if (isset($_POST['pincomesource_4']) && strlen(trim($_POST['pincomesource_4'])) > 0) echo 'checked'; ?> /> Other</div></td><td><div class="error_message"><?php if (isset($potherincome_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="potherincome" value="<?php if (isset($_POST['potherincome']) && strlen(trim($_POST['potherincome'])) > 0) echo $_POST['potherincome']; else echo ""; ?>" />
</td><td></td></tr>
<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td><hr> </td><td><hr> </td> <td><hr> </td></tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">Does your monthly expenses exceed your monthly income</div><div class="error_message"><?php if (isset($pexpoverincome_invalid_flag)) echo "Invalid Value"; ?></div></td><td><div class="input_width"><input type="radio" name="pexpoverincome" value="Yes" <?php if (isset($_POST['pexpoverincome']) && strcasecmp($_POST['pexpoverincome'],'Yes') == 0) echo 'checked'; ?> /> Yes</div></td><td>
<div class="input_width"><input type="radio" name="pexpoverincome" value="No" <?php if (isset($_POST['pexpoverincome_1']) && strcasecmp($_POST['pexpoverincome'],'No')== 0) echo 'checked'; ?> /> No</div>
</td><td></td></tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">If YES, please explain</div><div class="error_message"><?php if (isset($pinclevelexplanation_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pinclevelexplanation" value="<?php if (isset($_POST['pinclevelexplanation']) && strlen(trim($_POST['pinclevelexplanation'])) > 0) echo $_POST['pinclevelexplanation']; else echo ""; ?>" />
</td><td></td><td></td><td></td></tr>
<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td><hr> </td><td><hr> </td> <td><hr> </td></tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">Do you anticipate a change in your future income during the length of this contract?</div><div class="error_message"><?php if (isset($pincchange_invalid_flag)) echo "Invalid Value"; ?></div></td><td><div class="input_width"><input type="radio" name="pincchange" value="Yes" <?php if (isset($_POST['pincchange']) && strcasecmp($_POST['pincchange'],'Yes') == 0) echo 'checked'; ?> /> Yes</div></td><td>
<div class="input_width"><input type="radio" name="pincchange" value="No" <?php if (isset($_POST['pincchange']) && strcasecmp($_POST['pincchange'],'No') == 0) echo 'checked'; ?> /> No</div>
</td><td></td></tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">If YES, please explain</div><div class="error_message"><?php if (isset($pincchangeexplanation_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pincchangeexplanation" value="<?php if (isset($_POST['pincchangeexplanation']) && strlen(trim($_POST['pincchangeexplanation'])) > 0) echo $_POST['pincchangeexplanation']; else echo ""; ?>" />
</td><td></td><td></td><td></td></tr>
<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td><hr> </td><td><hr> </td> <td><hr> </td></tr>

<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">Do you anticipate a change in your future living expenses during the length of this contract?</div></td><td><div class="error_message"><?php if (isset($pexpchange_invalid_flag)) echo "Invalid Value"; ?></div><div class="input_width"><input type="radio" name="pexpchange" value="Yes" <?php if (isset($_POST['pexpchange']) && strcasecmp($_POST['pexpchange'],'Yes') == 0) echo 'checked'; ?> /> Yes</div></td><td>
<div class="input_width"><input type="radio" name="pexpchange" value="No" <?php if (isset($_POST['pexpchange']) && strcasecmp($_POST['pexpchange'],'No') == 0) echo 'checked'; ?> /> No</div>
</td><td></td></tr>


<tr <?php if ($pageNumber != 1) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">If YES, Please explain</div><div class="error_message"><?php if (isset($pexpchangeexplanation_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="pexpchangeexplanation" value="<?php if (isset($_POST['pexpchangeexplanation']) && strlen(trim($_POST['pexpchangeexplanation'])) > 0) echo $_POST['pexpchangeexplanation']; else echo ""; ?>" />
</td><td></td><td></td><td></td></tr>

<tr <?php if ($pageNumber != 2) echo "class=\"hidden_page_field\""; ?>> <td colspan="2"><b> JOINT OWNER IDENTIFICATION (Click NEXT if no joint owner)</b> </td><td></td><td></td><td></td> </tr>

<tr <?php if ($pageNumber != 2) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td> </td><td> </td> <td> </td></tr>


<tr <?php if ($pageNumber != 2) echo "class=\"hidden_page_field\""; ?> ><td  colspan="1"><div class="caption_fields">Last Name</div><div class="error_message"><?php if (isset($jlname_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="jlname" value="<?php if (isset($_POST['jlname']) && strlen(trim($_POST['jlname'])) > 0) echo $_POST['jlname']; else echo ""; ?>" />
</td><td><div class="caption_fields">First Name</div><div class="error_message"><?php if (isset($jfname_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="jfname" value="<?php if (isset($_POST['jfname']) && strlen(trim($_POST['jfname'])) > 0) echo $_POST['jfname']; else echo ""; ?>" /></td><td><div class="caption_fields">Middle Name</div><div class="error_message"><?php if (isset($jmname_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="jmname" value="<?php if (isset($_POST['jmname']) && strlen(trim($_POST['jmname'])) > 0) echo $_POST['jmname']; else echo ""; ?>" /></td><td><div class="caption_fields">Birth Date</div><div class="error_message"><?php if (isset($jbirthdate_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="jbirthdate" value="<?php if (isset($_POST['jbirthdate']) && strlen(trim($_POST['jbirthdate'])) > 0) echo $_POST['jbirthdate']; else echo ""; ?>" /></td></tr>

<tr <?php if ($pageNumber != 2) echo "class=\"hidden_page_field\""; ?> ><td  colspan="2"><div class="caption_fields">Street Address</div><div class="error_message"><?php if (isset($jaddress_invalid_flag)) echo "Invalid Value"; ?></div><br /><input type="text" class="input_width2" name="jaddress" value="<?php if (isset($_POST['jaddress']) && strlen(trim($_POST['jaddress'])) > 0) echo $_POST['jaddress']; else echo ""; ?>" />
</td><td></td><td><div class="caption_fields">Social Security Number</div><div class="error_message"><?php if (isset($jSSN_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="jSSN" value="<?php if (isset($_POST['jSSN']) && strlen(trim($_POST['jSSN'])) > 0) echo $_POST['jSSN']; else echo ""; ?>" /></td></tr>

<tr <?php if ($pageNumber != 2) echo "class=\"hidden_page_field\""; ?> ><td  colspan="1"><div class="caption_fields">City</div><div class="error_message"><?php if (isset($jcity_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="jcity" value="<?php if (isset($_POST['jcity']) && strlen(trim($_POST['jcity'])) > 0) echo $_POST['jcity']; else echo ""; ?>" />
</td><td><div class="caption_fields">State</div><div class="error_message"><?php if (isset($jstate_invalid_flag)) echo "Invalid Value"; ?></div><select  class="input_width" name="jstate">
<option value="" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], '') == 0) echo 'selected'; ?> >Select One</option>
<option value="AL" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'AL') == 0) echo 'selected'; ?> >Alabama</option>
<option value="AK" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'AK') == 0) echo 'selected'; ?> >Alaska</option>
<option value="AZ" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'AZ') == 0) echo 'selected'; ?> >Arizona</option>
<option value="AR" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'AR') == 0) echo 'selected'; ?> >Arkansas</option>
<option value="CA" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'CA') == 0) echo 'selected'; ?> >California</option>
<option value="CO" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'CO') == 0) echo 'selected'; ?> >Colorado</option>
<option value="CT" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'CT') == 0) echo 'selected'; ?> >Connecticut</option>
<option value="DE" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'DE') == 0) echo 'selected'; ?> >Delaware</option>
<option value="DC" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'DC') == 0) echo 'selected'; ?> >District of Columbia</option>
<option value="FL" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'FL') == 0) echo 'selected'; ?> >Florida</option>
<option value="GA" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'GA') == 0) echo 'selected'; ?> >Georgia</option>
<option value="HI" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'HI') == 0) echo 'selected'; ?> >Hawaii</option>
<option value="ID" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'ID') == 0) echo 'selected'; ?> >Idaho</option>
<option value="IL" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'IL') == 0) echo 'selected'; ?> >Illinois</option>
<option value="IN" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'IN') == 0) echo 'selected'; ?> >Indiana</option>
<option value="IA" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'IA') == 0) echo 'selected'; ?> >Iowa</option>
<option value="KS" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'KS') == 0) echo 'selected'; ?> >Kansas</option>
<option value="KY" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'KY') == 0) echo 'selected'; ?> >Kentucky</option>
<option value="LA" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'LA') == 0) echo 'selected'; ?> >Louisiana</option>
<option value="ME" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'ME') == 0) echo 'selected'; ?> >Maine</option>
<option value="MD" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'MD') == 0) echo 'selected'; ?> >Maryland</option>
<option value="MA" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'MA') == 0) echo 'selected'; ?> >Massachusetts</option>
<option value="MI" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'MI') == 0) echo 'selected'; ?> >Michigan</option>
<option value="MN" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'MN') == 0) echo 'selected'; ?> >Minnesota</option>
<option value="MS" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'MS') == 0) echo 'selected'; ?> >Mississippi</option>
<option value="MO" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'MO') == 0) echo 'selected'; ?> >Missouri</option>
<option value="MT" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'MT') == 0) echo 'selected'; ?> >Montana</option>
<option value="NE" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'NE') == 0) echo 'selected'; ?> >Nebraska</option>
<option value="NV" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'NV') == 0) echo 'selected'; ?> >Nevada</option>
<option value="NH" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'NH') == 0) echo 'selected'; ?> >New Hampshire</option>
<option value="NJ" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'NJ') == 0) echo 'selected'; ?> >New Jersey</option>
<option value="NM" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'NM') == 0) echo 'selected'; ?> >New Mexico</option>
<option value="NY" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'NY') == 0) echo 'selected'; ?> >New York</option>
<option value="NC" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'NC') == 0) echo 'selected'; ?> >North Carolina</option>
<option value="ND" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'ND') == 0) echo 'selected'; ?> >North Dakota</option>
<option value="OH" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'OH') == 0) echo 'selected'; ?> >Ohio</option>
<option value="OK" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'OK') == 0) echo 'selected'; ?> >Oklahoma</option>
<option value="OR" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'OR') == 0) echo 'selected'; ?> >Oregon</option>
<option value="PA" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'PA') == 0) echo 'selected'; ?> >Pennsylvania</option>
<option value="RI" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'RI') == 0) echo 'selected'; ?> >Rhode Island</option>
<option value="SC" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'SC') == 0) echo 'selected'; ?> >South Carolina</option>
<option value="SD" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'SD') == 0) echo 'selected'; ?> >South Dakota</option>
<option value="TN" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'TN') == 0) echo 'selected'; ?> >Tennessee</option>
<option value="TX" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'TX') == 0) echo 'selected'; ?> >Texas</option>
<option value="UT" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'UT') == 0) echo 'selected'; ?> >Utah</option>
<option value="VT" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'VT') == 0) echo 'selected'; ?> >Vermont</option>
<option value="VA" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'VA') == 0) echo 'selected'; ?> >Virginia</option>
<option value="WA" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'WA') == 0) echo 'selected'; ?> >Washington</option>
<option value="WV" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'WV') == 0) echo 'selected'; ?> >West Virginia</option>
<option value="WI" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'WI') == 0) echo 'selected'; ?> >Wisconsin</option>
<option value="WY" <?php if (isset($_POST['jstate']) && strcasecmp($_POST['jstate'], 'WY') == 0) echo 'selected'; ?> >Wyoming</option>
</select>
</td><td><div class="caption_fields">Zip</div><div class="error_message"><?php if (isset($jzip_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="jzip" value="<?php if (isset($_POST['jzip']) && strlen(trim($_POST['jzip'])) > 0) echo $_POST['jzip']; else echo ""; ?>" /></td><td><div class="caption_fields">Home Phone</div><div class="error_message"><?php if (isset($jhomephone_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="jhomephone" value="<?php if (isset($_POST['jhomephone']) && strlen(trim($_POST['jhomephone'])) > 0) echo $_POST['jhomephone']; else echo ""; ?>" /></td></tr>

<tr <?php if ($pageNumber != 2) echo "class=\"hidden_page_field\""; ?> ><td  colspan="2"><div class="caption_fields">Email Address</div><div class="error_message"><?php if (isset($jemail_invalid_flag)) echo "Invalid Value"; ?></div><br /><input type="text" class="input_width2" name="jemail" value="<?php if (isset($_POST['jemail']) && strlen(trim($_POST['jemail'])) > 0) echo $_POST['jemail']; else echo ""; ?>" />
</td><td></td><td><div class="caption_fields">Daytime Phone</div><div class="error_message"><?php if (isset($jdaytimephone_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="jdaytimephone" value="<?php if (isset($_POST['jdaytimephone']) && strlen(trim($_POST['jdaytimephone'])) > 0) echo $_POST['jdaytimephone']; else echo ""; ?>" /></td><td></td></tr>

<tr <?php if ($pageNumber != 3) echo "class=\"hidden_page_field\""; ?>> <td colspan="2"><b> TRUST IDENTIFICATION</b> </td><td></td><td></td><td></td> </tr>

<tr <?php if ($pageNumber != 3) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td> </td><td> </td> <td> </td></tr>


<tr <?php if ($pageNumber != 3) echo "class=\"hidden_page_field\""; ?> ><td  colspan="2"><div class="caption_fields">Trust Name</div><div class="error_message"><?php if (isset($trustname_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="trustname" value="<?php if (isset($_POST['trustname']) && strlen(trim($_POST['trustname'])) > 0) echo $_POST['trustname']; else echo ""; ?>" />
</td><td><div class="caption_fields">Trustee Name</div><div class="error_message"><?php if (isset($trusteename_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="trusteename" value="<?php if (isset($_POST['trusteename']) && strlen(trim($_POST['trusteename'])) > 0) echo $_POST['trusteename']; else echo ""; ?>" /></td><td><div class="caption_fields">Date of Trust</div><div class="error_message"><?php if (isset($trustdate_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="trustdate" value="<?php if (isset($_POST['trustdate']) && strlen(trim($_POST['trustdate'])) > 0) echo $_POST['trustdate']; else echo ""; ?>" /></td><td></td></tr>

<tr <?php if ($pageNumber != 3) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">Trust Street Address</div><div class="error_message"><?php if (isset($tstreetaddress_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width2" name="tstreetaddress" value="<?php if (isset($_POST['tstreetaddress']) && strlen(trim($_POST['tstreetaddress'])) > 0) echo $_POST['tstreetaddress']; else echo ""; ?>" />
</td><td><div class="caption_fields">Trust Tax ID Number</div><div class="error_message"><?php if (isset($ttaxid_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="ttaxid" value="<?php if (isset($_POST['ttaxid']) && strlen(trim($_POST['ttaxid'])) > 0) echo $_POST['ttaxid']; else echo ""; ?>" /></td><td></td><td></td></tr>

<tr <?php if ($pageNumber != 3) echo "class=\"hidden_page_field\""; ?> ><td  colspan="2"><div class="caption_fields">Trust City</div><div class="error_message"><?php if (isset($tcity_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="tcity" value="<?php if (isset($_POST['tcity']) && strlen(trim($_POST['tcity'])) > 0) echo $_POST['tcity']; else echo ""; ?>" />
</td><td><div class="caption_fields">Trust State</div><div class="error_message"><?php if (isset($tstate_invalid_flag)) echo "Invalid Value"; ?></div><select  class="input_width" name="tstate">
<option value="" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], '') == 0) echo 'selected'; ?> >Select One</option>
<option value="AL" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'AL') == 0) echo 'selected'; ?> >Alabama</option>
<option value="AK" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'AK') == 0) echo 'selected'; ?> >Alaska</option>
<option value="AZ" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'AZ') == 0) echo 'selected'; ?> >Arizona</option>
<option value="AR" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'AR') == 0) echo 'selected'; ?> >Arkansas</option>
<option value="CA" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'CA') == 0) echo 'selected'; ?> >California</option>
<option value="CO" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'CO') == 0) echo 'selected'; ?> >Colorado</option>
<option value="CT" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'CT') == 0) echo 'selected'; ?> >Connecticut</option>
<option value="DE" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'DE') == 0) echo 'selected'; ?> >Delaware</option>
<option value="DC" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'DC') == 0) echo 'selected'; ?> >District of Columbia</option>
<option value="FL" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'FL') == 0) echo 'selected'; ?> >Florida</option>
<option value="GA" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'GA') == 0) echo 'selected'; ?> >Georgia</option>
<option value="HI" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'HI') == 0) echo 'selected'; ?> >Hawaii</option>
<option value="ID" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'ID') == 0) echo 'selected'; ?> >Idaho</option>
<option value="IL" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'IL') == 0) echo 'selected'; ?> >Illinois</option>
<option value="IN" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'IN') == 0) echo 'selected'; ?> >Indiana</option>
<option value="IA" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'IA') == 0) echo 'selected'; ?> >Iowa</option>
<option value="KS" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'KS') == 0) echo 'selected'; ?> >Kansas</option>
<option value="KY" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'KY') == 0) echo 'selected'; ?> >Kentucky</option>
<option value="LA" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'LA') == 0) echo 'selected'; ?> >Louisiana</option>
<option value="ME" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'ME') == 0) echo 'selected'; ?> >Maine</option>
<option value="MD" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'MD') == 0) echo 'selected'; ?> >Maryland</option>
<option value="MA" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'MA') == 0) echo 'selected'; ?> >Massachusetts</option>
<option value="MI" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'MI') == 0) echo 'selected'; ?> >Michigan</option>
<option value="MN" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'MN') == 0) echo 'selected'; ?> >Minnesota</option>
<option value="MS" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'MS') == 0) echo 'selected'; ?> >Mississippi</option>
<option value="MO" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'MO') == 0) echo 'selected'; ?> >Missouri</option>
<option value="MT" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'MT') == 0) echo 'selected'; ?> >Montana</option>
<option value="NE" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'NE') == 0) echo 'selected'; ?> >Nebraska</option>
<option value="NV" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'NV') == 0) echo 'selected'; ?> >Nevada</option>
<option value="NH" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'NH') == 0) echo 'selected'; ?> >New Hampshire</option>
<option value="NJ" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'NJ') == 0) echo 'selected'; ?> >New Jersey</option>
<option value="NM" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'NM') == 0) echo 'selected'; ?> >New Mexico</option>
<option value="NY" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'NY') == 0) echo 'selected'; ?> >New York</option>
<option value="NC" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'NC') == 0) echo 'selected'; ?> >North Carolina</option>
<option value="ND" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'ND') == 0) echo 'selected'; ?> >North Dakota</option>
<option value="OH" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'OH') == 0) echo 'selected'; ?> >Ohio</option>
<option value="OK" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'OK') == 0) echo 'selected'; ?> >Oklahoma</option>
<option value="OR" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'OR') == 0) echo 'selected'; ?> >Oregon</option>
<option value="PA" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'PA') == 0) echo 'selected'; ?> >Pennsylvania</option>
<option value="RI" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'RI') == 0) echo 'selected'; ?> >Rhode Island</option>
<option value="SC" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'SC') == 0) echo 'selected'; ?> >South Carolina</option>
<option value="SD" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'SD') == 0) echo 'selected'; ?> >South Dakota</option>
<option value="TN" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'TN') == 0) echo 'selected'; ?> >Tennessee</option>
<option value="TX" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'TX') == 0) echo 'selected'; ?> >Texas</option>
<option value="UT" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'UT') == 0) echo 'selected'; ?> >Utah</option>
<option value="VT" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'VT') == 0) echo 'selected'; ?> >Vermont</option>
<option value="VA" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'VA') == 0) echo 'selected'; ?> >Virginia</option>
<option value="WA" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'WA') == 0) echo 'selected'; ?> >Washington</option>
<option value="WV" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'WV') == 0) echo 'selected'; ?> >West Virginia</option>
<option value="WI" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'WI') == 0) echo 'selected'; ?> >Wisconsin</option>
<option value="WY" <?php if (isset($_POST['tstate']) && strcasecmp($_POST['tstate'], 'WY') == 0) echo 'selected'; ?> >Wyoming</option>
</select>
</td><td><div class="caption_fields">Trust ZIP</div><div class="error_message"><?php if (isset($tzip_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="tzip" value="<?php if (isset($_POST['tzip']) && strlen(trim($_POST['tzip'])) > 0) echo $_POST['tzip']; else echo ""; ?>" /></td><td></td></tr>

<tr <?php if ($pageNumber != 3) echo "class=\"hidden_page_field\""; ?> ><td  colspan="3"><div class="caption_fields">Trust Email</div><div class="error_message"><?php if (isset($temail_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width2" name="temail" value="<?php if (isset($_POST['temail']) && strlen(trim($_POST['temail'])) > 0) echo $_POST['temail']; else echo ""; ?>" />
</td><td><div class="caption_fields">Trust Telephone Number</div><div class="error_message"><?php if (isset($tphone_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="tphone" value="<?php if (isset($_POST['tphone']) && strlen(trim($_POST['tphone'])) > 0) echo $_POST['tphone']; else echo ""; ?>" />
</td><td></td><td></td></tr>

<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?>> <td colspan="2"><b> PRIMARY BENEFICIARIES</b> </td><td></td><td></td><td></td> </tr>

<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td> </td><td> </td> <td> </td></tr>

<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?>> <td colspan="2"> PRIMARY BENEFICIARY # 1 </td><td></td><td></td><td></td> </tr>


<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?> ><td  colspan="1"><div class="caption_fields">Name</div><div class="error_message"><?php if (isset($b1name_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="b1name" value="<?php if (isset($_POST['b1name']) && strlen(trim($_POST['b1name'])) > 0) echo $_POST['b1name']; else echo ""; ?>" />
</td><td><div class="caption_fields">Relationship</div><div class="error_message"><?php if (isset($b1relationship_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="b1relationship" value="<?php if (isset($_POST['b1relationship']) && strlen(trim($_POST['b1relationship'])) > 0) echo $_POST['b1relationship']; else echo ""; ?>" /></td><td></td><td></td></tr>

<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?> ><td  colspan="2"><div class="caption_fields">Street Address</div><div class="error_message"><?php if (isset($b1saddress_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width2" name="b1saddress" value="<?php if (isset($_POST['b1saddress']) && strlen(trim($_POST['b1saddress'])) > 0) echo $_POST['b1saddress']; else echo ""; ?>" />
</td><td><div class="caption_fields">Percent Share</div><div class="error_message"><?php if (isset($b1percentshare_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="b1percentshare" value="<?php if (isset($_POST['b1percentshare']) && strlen(trim($_POST['b1percentshare'])) > 0) echo $_POST['b1percentshare']; else echo ""; ?>" /></td><td></td><td></td></tr>

<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?> ><td colspan="2"><div class="caption_fields">City</div><div class="error_message"><?php if (isset($b1city_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="b1city" value="<?php if (isset($_POST['b1city']) && strlen(trim($_POST['b1city'])) > 0) echo $_POST['b1city']; else echo ""; ?>" />
</td><td ><div class="caption_fields">State</div><div class="error_message"><?php if (isset($b1state_invalid_flag)) echo "Invalid Value"; ?></div><select  class="input_width" name="b1state">
<option value="" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], '') == 0) echo 'selected'; ?> >Select One</option>
<option value="AL" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'AL') == 0) echo 'selected'; ?> >Alabama</option>
<option value="AK" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'AK') == 0) echo 'selected'; ?> >Alaska</option>
<option value="AZ" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'AZ') == 0) echo 'selected'; ?> >Arizona</option>
<option value="AR" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'AR') == 0) echo 'selected'; ?> >Arkansas</option>
<option value="CA" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'CA') == 0) echo 'selected'; ?> >California</option>
<option value="CO" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'CO') == 0) echo 'selected'; ?> >Colorado</option>
<option value="CT" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'CT') == 0) echo 'selected'; ?> >Connecticut</option>
<option value="DE" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'DE') == 0) echo 'selected'; ?> >Delaware</option>
<option value="DC" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'DC') == 0) echo 'selected'; ?> >District of Columbia</option>
<option value="FL" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'FL') == 0) echo 'selected'; ?> >Florida</option>
<option value="GA" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'GA') == 0) echo 'selected'; ?> >Georgia</option>
<option value="HI" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'HI') == 0) echo 'selected'; ?> >Hawaii</option>
<option value="ID" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'ID') == 0) echo 'selected'; ?> >Idaho</option>
<option value="IL" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'IL') == 0) echo 'selected'; ?> >Illinois</option>
<option value="IN" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'IN') == 0) echo 'selected'; ?> >Indiana</option>
<option value="IA" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'IA') == 0) echo 'selected'; ?> >Iowa</option>
<option value="KS" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'KS') == 0) echo 'selected'; ?> >Kansas</option>
<option value="KY" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'KY') == 0) echo 'selected'; ?> >Kentucky</option>
<option value="LA" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'LA') == 0) echo 'selected'; ?> >Louisiana</option>
<option value="ME" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'ME') == 0) echo 'selected'; ?> >Maine</option>
<option value="MD" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'MD') == 0) echo 'selected'; ?> >Maryland</option>
<option value="MA" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'MA') == 0) echo 'selected'; ?> >Massachusetts</option>
<option value="MI" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'MI') == 0) echo 'selected'; ?> >Michigan</option>
<option value="MN" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'MN') == 0) echo 'selected'; ?> >Minnesota</option>
<option value="MS" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'MS') == 0) echo 'selected'; ?> >Mississippi</option>
<option value="MO" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'MO') == 0) echo 'selected'; ?> >Missouri</option>
<option value="MT" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'MT') == 0) echo 'selected'; ?> >Montana</option>
<option value="NE" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'NE') == 0) echo 'selected'; ?> >Nebraska</option>
<option value="NV" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'NV') == 0) echo 'selected'; ?> >Nevada</option>
<option value="NH" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'NH') == 0) echo 'selected'; ?> >New Hampshire</option>
<option value="NJ" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'NJ') == 0) echo 'selected'; ?> >New Jersey</option>
<option value="NM" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'NM') == 0) echo 'selected'; ?> >New Mexico</option>
<option value="NY" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'NY') == 0) echo 'selected'; ?> >New York</option>
<option value="NC" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'NC') == 0) echo 'selected'; ?> >North Carolina</option>
<option value="ND" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'ND') == 0) echo 'selected'; ?> >North Dakota</option>
<option value="OH" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'OH') == 0) echo 'selected'; ?> >Ohio</option>
<option value="OK" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'OK') == 0) echo 'selected'; ?> >Oklahoma</option>
<option value="OR" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'OR') == 0) echo 'selected'; ?> >Oregon</option>
<option value="PA" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'PA') == 0) echo 'selected'; ?> >Pennsylvania</option>
<option value="RI" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'RI') == 0) echo 'selected'; ?> >Rhode Island</option>
<option value="SC" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'SC') == 0) echo 'selected'; ?> >South Carolina</option>
<option value="SD" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'SD') == 0) echo 'selected'; ?> >South Dakota</option>
<option value="TN" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'TN') == 0) echo 'selected'; ?> >Tennessee</option>
<option value="TX" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'TX') == 0) echo 'selected'; ?> >Texas</option>
<option value="UT" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'UT') == 0) echo 'selected'; ?> >Utah</option>
<option value="VT" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'VT') == 0) echo 'selected'; ?> >Vermont</option>
<option value="VA" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'VA') == 0) echo 'selected'; ?> >Virginia</option>
<option value="WA" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'WA') == 0) echo 'selected'; ?> >Washington</option>
<option value="WV" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'WV') == 0) echo 'selected'; ?> >West Virginia</option>
<option value="WI" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'WI') == 0) echo 'selected'; ?> >Wisconsin</option>
<option value="WY" <?php if (isset($_POST['b1state']) && strcasecmp($_POST['b1state'], 'WY') == 0) echo 'selected'; ?> >Wyoming</option>
</select>
</td><td ><div class="caption_fields">Zip</div><div class="error_message"><?php if (isset($b1zip_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="b1zip" value="<?php if (isset($_POST['b1zip']) && strlen(trim($_POST['b1zip'])) > 0) echo $_POST['b1zip']; else echo ""; ?>" /></td><td></td></tr>


<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?> ><td  colspan="1"><div class="caption_fields">SSN</div><div class="error_message"><?php if (isset($b1SSN_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="b1SSN" value="<?php if (isset($_POST['b1SSN']) && strlen(trim($_POST['b1SSN'])) > 0) echo $_POST['b1SSN']; else echo ""; ?>" />
</td><td><div class="caption_fields">Birth Date</div><div class="error_message"><?php if (isset($b1birthdate_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="b1birthdate" value="<?php if (isset($_POST['b1birthdate']) && strlen(trim($_POST['b1birthdate'])) > 0) echo $_POST['b1birthdate']; else echo ""; ?>" /></td><td><div class="caption_fields">Phone</div><div class="error_message"><?php if (isset($b1phone_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="b1phone" value="<?php if (isset($_POST['b1phone']) && strlen(trim($_POST['b1phone'])) > 0) echo $_POST['b1phone']; else echo ""; ?>" /></td><td></td></tr>

<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td><hr> </td><td><hr> </td> <td><hr> </td></tr>
<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?>> <td colspan="2"> PRIMARY BENEFICIARY # 2 </td><td></td><td></td><td></td> </tr>


<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?> ><td  colspan="1"><div class="caption_fields">Name</div><div class="error_message"><?php if (isset($b2name_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="b2name" value="<?php if (isset($_POST['b2name']) && strlen(trim($_POST['b2name'])) > 0) echo $_POST['b2name']; else echo ""; ?>" />
</td><td><div class="caption_fields"> Relationship</div><div class="error_message"><?php if (isset($b2relationship_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="b2relationship" value="<?php if (isset($_POST['b2relationship']) && strlen(trim($_POST['b2relationship'])) > 0) echo $_POST['b2relationship']; else echo ""; ?>" /></td><td></td><td></td></tr>

<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?> ><td  colspan="2"><div class="caption_fields">Street Address</div><div class="error_message"><?php if (isset($b2saddress_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width2" name="b2saddress" value="<?php if (isset($_POST['b2saddress']) && strlen(trim($_POST['b2saddress'])) > 0) echo $_POST['b2saddress']; else echo ""; ?>" />
</td><td><div class="caption_fields">Percent Share</div><div class="error_message"><?php if (isset($b2percentshare_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="b2percentshare" value="<?php if (isset($_POST['b2percentshare']) && strlen(trim($_POST['b2percentshare'])) > 0) echo $_POST['b2percentshare']; else echo ""; ?>" /></td><td></td><td></td></tr>

<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?> ><td  colspan="2"><div class="caption_fields">City</div><div class="error_message"><?php if (isset($b2city_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="b2city" value="<?php if (isset($_POST['b2city']) && strlen(trim($_POST['b2city'])) > 0) echo $_POST['b2city']; else echo ""; ?>" />
</td><td><div class="caption_fields">State</div><div class="error_message"><?php if (isset($b2state_invalid_flag)) echo "Invalid Value"; ?></div><select  class="input_width" name="b2state">
<option value="" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], '') == 0) echo 'selected'; ?> >Select One</option>
<option value="AL" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'AL') == 0) echo 'selected'; ?> >Alabama</option>
<option value="AK" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'AK') == 0) echo 'selected'; ?> >Alaska</option>
<option value="AZ" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'AZ') == 0) echo 'selected'; ?> >Arizona</option>
<option value="AR" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'AR') == 0) echo 'selected'; ?> >Arkansas</option>
<option value="CA" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'CA') == 0) echo 'selected'; ?> >California</option>
<option value="CO" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'CO') == 0) echo 'selected'; ?> >Colorado</option>
<option value="CT" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'CT') == 0) echo 'selected'; ?> >Connecticut</option>
<option value="DE" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'DE') == 0) echo 'selected'; ?> >Delaware</option>
<option value="DC" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'DC') == 0) echo 'selected'; ?> >District of Columbia</option>
<option value="FL" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'FL') == 0) echo 'selected'; ?> >Florida</option>
<option value="GA" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'GA') == 0) echo 'selected'; ?> >Georgia</option>
<option value="HI" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'HI') == 0) echo 'selected'; ?> >Hawaii</option>
<option value="ID" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'ID') == 0) echo 'selected'; ?> >Idaho</option>
<option value="IL" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'IL') == 0) echo 'selected'; ?> >Illinois</option>
<option value="IN" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'IN') == 0) echo 'selected'; ?> >Indiana</option>
<option value="IA" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'IA') == 0) echo 'selected'; ?> >Iowa</option>
<option value="KS" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'KS') == 0) echo 'selected'; ?> >Kansas</option>
<option value="KY" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'KY') == 0) echo 'selected'; ?> >Kentucky</option>
<option value="LA" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'LA') == 0) echo 'selected'; ?> >Louisiana</option>
<option value="ME" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'ME') == 0) echo 'selected'; ?> >Maine</option>
<option value="MD" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'MD') == 0) echo 'selected'; ?> >Maryland</option>
<option value="MA" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'MA') == 0) echo 'selected'; ?> >Massachusetts</option>
<option value="MI" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'MI') == 0) echo 'selected'; ?> >Michigan</option>
<option value="MN" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'MN') == 0) echo 'selected'; ?> >Minnesota</option>
<option value="MS" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'MS') == 0) echo 'selected'; ?> >Mississippi</option>
<option value="MO" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'MO') == 0) echo 'selected'; ?> >Missouri</option>
<option value="MT" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'MT') == 0) echo 'selected'; ?> >Montana</option>
<option value="NE" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'NE') == 0) echo 'selected'; ?> >Nebraska</option>
<option value="NV" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'NV') == 0) echo 'selected'; ?> >Nevada</option>
<option value="NH" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'NH') == 0) echo 'selected'; ?> >New Hampshire</option>
<option value="NJ" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'NJ') == 0) echo 'selected'; ?> >New Jersey</option>
<option value="NM" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'NM') == 0) echo 'selected'; ?> >New Mexico</option>
<option value="NY" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'NY') == 0) echo 'selected'; ?> >New York</option>
<option value="NC" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'NC') == 0) echo 'selected'; ?> >North Carolina</option>
<option value="ND" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'ND') == 0) echo 'selected'; ?> >North Dakota</option>
<option value="OH" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'OH') == 0) echo 'selected'; ?> >Ohio</option>
<option value="OK" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'OK') == 0) echo 'selected'; ?> >Oklahoma</option>
<option value="OR" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'OR') == 0) echo 'selected'; ?> >Oregon</option>
<option value="PA" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'PA') == 0) echo 'selected'; ?> >Pennsylvania</option>
<option value="RI" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'RI') == 0) echo 'selected'; ?> >Rhode Island</option>
<option value="SC" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'SC') == 0) echo 'selected'; ?> >South Carolina</option>
<option value="SD" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'SD') == 0) echo 'selected'; ?> >South Dakota</option>
<option value="TN" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'TN') == 0) echo 'selected'; ?> >Tennessee</option>
<option value="TX" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'TX') == 0) echo 'selected'; ?> >Texas</option>
<option value="UT" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'UT') == 0) echo 'selected'; ?> >Utah</option>
<option value="VT" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'VT') == 0) echo 'selected'; ?> >Vermont</option>
<option value="VA" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'VA') == 0) echo 'selected'; ?> >Virginia</option>
<option value="WA" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'WA') == 0) echo 'selected'; ?> >Washington</option>
<option value="WV" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'WV') == 0) echo 'selected'; ?> >West Virginia</option>
<option value="WI" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'WI') == 0) echo 'selected'; ?> >Wisconsin</option>
<option value="WY" <?php if (isset($_POST['b2state']) && strcasecmp($_POST['b2state'], 'WY') == 0) echo 'selected'; ?> >Wyoming</option>
</select>
</td><td><div class="caption_fields">Zip</div><div class="error_message"><?php if (isset($b2zip_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="b2zip" value="<?php if (isset($_POST['b2zip']) && strlen(trim($_POST['b2zip'])) > 0) echo $_POST['b2zip']; else echo ""; ?>" /></td><td></td></tr>


<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?> ><td  colspan="1"><div class="caption_fields">SSN</div><div class="error_message"><?php if (isset($b2SSN_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="b2SSN" value="<?php if (isset($_POST['b2SSN']) && strlen(trim($_POST['b2SSN'])) > 0) echo $_POST['b2SSN']; else echo ""; ?>" />
</td><td><div class="caption_fields">Birth Date</div><div class="error_message"><?php if (isset($b2birthdate_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="b2birthdate" value="<?php if (isset($_POST['b2birthdate']) && strlen(trim($_POST['b2birthdate'])) > 0) echo $_POST['b2birthdate']; else echo ""; ?>" /></td><td><div class="caption_fields">Phone</div><div class="error_message"><?php if (isset($b2phone_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="b2phone" value="<?php if (isset($_POST['b2phone']) && strlen(trim($_POST['b2phone'])) > 0) echo $_POST['b2phone']; else echo ""; ?>" /></td><td></td></tr>


<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td><hr> </td><td><hr> </td> <td><hr> </td></tr>
<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?>> <td colspan="2"><b> SECONDARY BENEFICIARIES</b> </td><td></td><td></td><td></td> </tr>

<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td> </td><td> </td> <td> </td></tr>

<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?>> <td colspan="2"> SECONDARY BENEFICIARY # 1 </td><td></td><td></td><td></td> </tr>


<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?> ><td  colspan="1"><div class="caption_fields">Name</div><div class="error_message"><?php if (isset($sb1name_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="sb1name" value="<?php if (isset($_POST['sb1name']) && strlen(trim($_POST['sb1name'])) > 0) echo $_POST['sb1name']; else echo ""; ?>" />
</td><td><div class="caption_fields"> Relationship</div><div class="error_message"><?php if (isset($sb1relationship_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="sb1relationship" value="<?php if (isset($_POST['sb1relationship']) && strlen(trim($_POST['sb1relationship'])) > 0) echo $_POST['sb1relationship']; else echo ""; ?>" /></td><td></td><td></td></tr>

<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?> ><td  colspan="2"><div class="caption_fields">Street Address</div><div class="error_message"><?php if (isset($sb1saddress_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width2" name="sb1saddress" value="<?php if (isset($_POST['sb1saddress']) && strlen(trim($_POST['sb1saddress'])) > 0) echo $_POST['sb1saddress']; else echo ""; ?>" />
</td><td><div class="caption_fields">Percent Share</div><div class="error_message"><?php if (isset($sb1percentshare_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="sb1percentshare" value="<?php if (isset($_POST['sb1percentshare']) && strlen(trim($_POST['sb1percentshare'])) > 0) echo $_POST['sb1percentshare']; else echo ""; ?>" /></td><td></td><td></td></tr>

<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?> ><td  colspan="2"><div class="caption_fields">City</div><div class="error_message"><?php if (isset($sb1city_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="sb1city" value="<?php if (isset($_POST['sb1city']) && strlen(trim($_POST['sb1city'])) > 0) echo $_POST['sb1city']; else echo ""; ?>" />
</td><td colspan="1"><div class="caption_fields">State</div><div class="error_message"><?php if (isset($sb1state_invalid_flag)) echo "Invalid Value"; ?></div><select  class="input_width" name="sb1state">
<option value="" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], '') == 0) echo 'selected'; ?> >Select One</option>
<option value="AL" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'AL') == 0) echo 'selected'; ?> >Alabama</option>
<option value="AK" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'AK') == 0) echo 'selected'; ?> >Alaska</option>
<option value="AZ" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'AZ') == 0) echo 'selected'; ?> >Arizona</option>
<option value="AR" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'AR') == 0) echo 'selected'; ?> >Arkansas</option>
<option value="CA" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'CA') == 0) echo 'selected'; ?> >California</option>
<option value="CO" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'CO') == 0) echo 'selected'; ?> >Colorado</option>
<option value="CT" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'CT') == 0) echo 'selected'; ?> >Connecticut</option>
<option value="DE" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'DE') == 0) echo 'selected'; ?> >Delaware</option>
<option value="DC" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'DC') == 0) echo 'selected'; ?> >District of Columbia</option>
<option value="FL" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'FL') == 0) echo 'selected'; ?> >Florida</option>
<option value="GA" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'GA') == 0) echo 'selected'; ?> >Georgia</option>
<option value="HI" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'HI') == 0) echo 'selected'; ?> >Hawaii</option>
<option value="ID" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'ID') == 0) echo 'selected'; ?> >Idaho</option>
<option value="IL" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'IL') == 0) echo 'selected'; ?> >Illinois</option>
<option value="IN" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'IN') == 0) echo 'selected'; ?> >Indiana</option>
<option value="IA" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'IA') == 0) echo 'selected'; ?> >Iowa</option>
<option value="KS" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'KS') == 0) echo 'selected'; ?> >Kansas</option>
<option value="KY" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'KY') == 0) echo 'selected'; ?> >Kentucky</option>
<option value="LA" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'LA') == 0) echo 'selected'; ?> >Louisiana</option>
<option value="ME" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'ME') == 0) echo 'selected'; ?> >Maine</option>
<option value="MD" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'MD') == 0) echo 'selected'; ?> >Maryland</option>
<option value="MA" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'MA') == 0) echo 'selected'; ?> >Massachusetts</option>
<option value="MI" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'MI') == 0) echo 'selected'; ?> >Michigan</option>
<option value="MN" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'MN') == 0) echo 'selected'; ?> >Minnesota</option>
<option value="MS" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'MS') == 0) echo 'selected'; ?> >Mississippi</option>
<option value="MO" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'MO') == 0) echo 'selected'; ?> >Missouri</option>
<option value="MT" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'MT') == 0) echo 'selected'; ?> >Montana</option>
<option value="NE" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'NE') == 0) echo 'selected'; ?> >Nebraska</option>
<option value="NV" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'NV') == 0) echo 'selected'; ?> >Nevada</option>
<option value="NH" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'NH') == 0) echo 'selected'; ?> >New Hampshire</option>
<option value="NJ" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'NJ') == 0) echo 'selected'; ?> >New Jersey</option>
<option value="NM" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'NM') == 0) echo 'selected'; ?> >New Mexico</option>
<option value="NY" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'NY') == 0) echo 'selected'; ?> >New York</option>
<option value="NC" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'NC') == 0) echo 'selected'; ?> >North Carolina</option>
<option value="ND" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'ND') == 0) echo 'selected'; ?> >North Dakota</option>
<option value="OH" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'OH') == 0) echo 'selected'; ?> >Ohio</option>
<option value="OK" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'OK') == 0) echo 'selected'; ?> >Oklahoma</option>
<option value="OR" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'OR') == 0) echo 'selected'; ?> >Oregon</option>
<option value="PA" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'PA') == 0) echo 'selected'; ?> >Pennsylvania</option>
<option value="RI" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'RI') == 0) echo 'selected'; ?> >Rhode Island</option>
<option value="SC" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'SC') == 0) echo 'selected'; ?> >South Carolina</option>
<option value="SD" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'SD') == 0) echo 'selected'; ?> >South Dakota</option>
<option value="TN" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'TN') == 0) echo 'selected'; ?> >Tennessee</option>
<option value="TX" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'TX') == 0) echo 'selected'; ?> >Texas</option>
<option value="UT" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'UT') == 0) echo 'selected'; ?> >Utah</option>
<option value="VT" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'VT') == 0) echo 'selected'; ?> >Vermont</option>
<option value="VA" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'VA') == 0) echo 'selected'; ?> >Virginia</option>
<option value="WA" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'WA') == 0) echo 'selected'; ?> >Washington</option>
<option value="WV" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'WV') == 0) echo 'selected'; ?> >West Virginia</option>
<option value="WI" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'WI') == 0) echo 'selected'; ?> >Wisconsin</option>
<option value="WY" <?php if (isset($_POST['sb1state']) && strcasecmp($_POST['sb1state'], 'WY') == 0) echo 'selected'; ?> >Wyoming</option>
</select>
</td><td><div class="caption_fields">Zip</div><div class="error_message"><?php if (isset($sb1zip_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="sb1zip" value="<?php if (isset($_POST['sb1zip']) && strlen(trim($_POST['sb1zip'])) > 0) echo $_POST['sb1zip']; else echo ""; ?>" /></td><td></td></tr>


<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?> ><td  colspan="1"><div class="caption_fields">SSN</div><div class="error_message"><?php if (isset($sb1SSN_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="sb1SSN" value="<?php if (isset($_POST['sb1SSN']) && strlen(trim($_POST['sb1SSN'])) > 0) echo $_POST['sb1SSN']; else echo ""; ?>" />
</td><td><div class="caption_fields">Birth Date</div><div class="error_message"><?php if (isset($sb1birthdate_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="sb1birthdate" value="<?php if (isset($_POST['sb1birthdate']) && strlen(trim($_POST['sb1birthdate'])) > 0) echo $_POST['sb1birthdate']; else echo ""; ?>" /></td><td><div class="caption_fields">Phone</div><div class="error_message"><?php if (isset($sb1phone_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="sb1phone" value="<?php if (isset($_POST['sb1phone']) && strlen(trim($_POST['sb1phone'])) > 0) echo $_POST['sb1phone']; else echo ""; ?>" /></td><td></td></tr>


<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?>> <td><hr> </td><td><hr> </td><td><hr> </td> <td><hr> </td></tr>
<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?>> <td colspan="2"> SECONDARY BENEFICIARY # 2 </td><td></td><td></td><td></td> </tr>

<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?> ><td  colspan="1"><div class="caption_fields">Name</div><div class="error_message"><?php if (isset($sb2name_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="sb2name" value="<?php if (isset($_POST['sb2name']) && strlen(trim($_POST['sb2name'])) > 0) echo $_POST['sb2name']; else echo ""; ?>" />
</td><td><div class="caption_fields"> Relationship</div><div class="error_message"><?php if (isset($sb2relationship_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="sb2relationship" value="<?php if (isset($_POST['sb2relationship']) && strlen(trim($_POST['sb2relationship'])) > 0) echo $_POST['sb2relationship']; else echo ""; ?>" /></td><td></td><td></td></tr>

<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?> ><td  colspan="2"><div class="caption_fields">Street Address</div><div class="error_message"><?php if (isset($sb2saddress_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width2" name="sb2saddress" value="<?php if (isset($_POST['sb2saddress']) && strlen(trim($_POST['sb2saddress'])) > 0) echo $_POST['sb2saddress']; else echo ""; ?>" />
</td><td><div class="caption_fields">Percent Share</div><div class="error_message"><?php if (isset($sb2percentshare_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="sb2percentshare" value="<?php if (isset($_POST['sb2percentshare']) && strlen(trim($_POST['sb2percentshare'])) > 0) echo $_POST['sb2percentshare']; else echo ""; ?>" /></td><td></td><td></td></tr>

<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?> ><td  colspan="2"><div class="caption_fields">City</div><div class="error_message"><?php if (isset($sbcity_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="sb2city" value="<?php if (isset($_POST['sb2city']) && strlen(trim($_POST['sb2city'])) > 0) echo $_POST['sb2city']; else echo ""; ?>" />
</td><td><div class="caption_fields">State</div><div class="error_message"><?php if (isset($sb2state_invalid_flag)) echo "Invalid Value"; ?></div><select  class="input_width" name="sb2state">
<option value="" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], '') == 0) echo 'selected'; ?> >Select One</option>
<option value="AL" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'AL') == 0) echo 'selected'; ?> >Alabama</option>
<option value="AK" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'AK') == 0) echo 'selected'; ?> >Alaska</option>
<option value="AZ" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'AZ') == 0) echo 'selected'; ?> >Arizona</option>
<option value="AR" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'AR') == 0) echo 'selected'; ?> >Arkansas</option>
<option value="CA" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'CA') == 0) echo 'selected'; ?> >California</option>
<option value="CO" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'CO') == 0) echo 'selected'; ?> >Colorado</option>
<option value="CT" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'CT') == 0) echo 'selected'; ?> >Connecticut</option>
<option value="DE" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'DE') == 0) echo 'selected'; ?> >Delaware</option>
<option value="DC" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'DC') == 0) echo 'selected'; ?> >District of Columbia</option>
<option value="FL" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'FL') == 0) echo 'selected'; ?> >Florida</option>
<option value="GA" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'GA') == 0) echo 'selected'; ?> >Georgia</option>
<option value="HI" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'HI') == 0) echo 'selected'; ?> >Hawaii</option>
<option value="ID" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'ID') == 0) echo 'selected'; ?> >Idaho</option>
<option value="IL" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'IL') == 0) echo 'selected'; ?> >Illinois</option>
<option value="IN" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'IN') == 0) echo 'selected'; ?> >Indiana</option>
<option value="IA" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'IA') == 0) echo 'selected'; ?> >Iowa</option>
<option value="KS" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'KS') == 0) echo 'selected'; ?> >Kansas</option>
<option value="KY" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'KY') == 0) echo 'selected'; ?> >Kentucky</option>
<option value="LA" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'LA') == 0) echo 'selected'; ?> >Louisiana</option>
<option value="ME" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'ME') == 0) echo 'selected'; ?> >Maine</option>
<option value="MD" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'MD') == 0) echo 'selected'; ?> >Maryland</option>
<option value="MA" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'MA') == 0) echo 'selected'; ?> >Massachusetts</option>
<option value="MI" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'MI') == 0) echo 'selected'; ?> >Michigan</option>
<option value="MN" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'MN') == 0) echo 'selected'; ?> >Minnesota</option>
<option value="MS" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'MS') == 0) echo 'selected'; ?> >Mississippi</option>
<option value="MO" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'MO') == 0) echo 'selected'; ?> >Missouri</option>
<option value="MT" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'MT') == 0) echo 'selected'; ?> >Montana</option>
<option value="NE" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'NE') == 0) echo 'selected'; ?> >Nebraska</option>
<option value="NV" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'NV') == 0) echo 'selected'; ?> >Nevada</option>
<option value="NH" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'NH') == 0) echo 'selected'; ?> >New Hampshire</option>
<option value="NJ" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'NJ') == 0) echo 'selected'; ?> >New Jersey</option>
<option value="NM" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'NM') == 0) echo 'selected'; ?> >New Mexico</option>
<option value="NY" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'NY') == 0) echo 'selected'; ?> >New York</option>
<option value="NC" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'NC') == 0) echo 'selected'; ?> >North Carolina</option>
<option value="ND" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'ND') == 0) echo 'selected'; ?> >North Dakota</option>
<option value="OH" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'OH') == 0) echo 'selected'; ?> >Ohio</option>
<option value="OK" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'OK') == 0) echo 'selected'; ?> >Oklahoma</option>
<option value="OR" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'OR') == 0) echo 'selected'; ?> >Oregon</option>
<option value="PA" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'PA') == 0) echo 'selected'; ?> >Pennsylvania</option>
<option value="RI" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'RI') == 0) echo 'selected'; ?> >Rhode Island</option>
<option value="SC" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'SC') == 0) echo 'selected'; ?> >South Carolina</option>
<option value="SD" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'SD') == 0) echo 'selected'; ?> >South Dakota</option>
<option value="TN" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'TN') == 0) echo 'selected'; ?> >Tennessee</option>
<option value="TX" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'TX') == 0) echo 'selected'; ?> >Texas</option>
<option value="UT" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'UT') == 0) echo 'selected'; ?> >Utah</option>
<option value="VT" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'VT') == 0) echo 'selected'; ?> >Vermont</option>
<option value="VA" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'VA') == 0) echo 'selected'; ?> >Virginia</option>
<option value="WA" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'WA') == 0) echo 'selected'; ?> >Washington</option>
<option value="WV" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'WV') == 0) echo 'selected'; ?> >West Virginia</option>
<option value="WI" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'WI') == 0) echo 'selected'; ?> >Wisconsin</option>
<option value="WY" <?php if (isset($_POST['sb2state']) && strcasecmp($_POST['sb2state'], 'WY') == 0) echo 'selected'; ?> >Wyoming</option>
</select>
</td><td><div class="caption_fields">ZIP</div><div class="error_message"><?php if (isset($sb2zip_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="sb2zip" value="<?php if (isset($_POST['sb2zip']) && strlen(trim($_POST['sb2zip'])) > 0) echo $_POST['sb2zip']; else echo ""; ?>" /></td><td></td></tr>


<tr <?php if ($pageNumber != 4) echo "class=\"hidden_page_field\""; ?> ><td  colspan="1"><div class="caption_fields">SSN</div><div class="error_message"><?php if (isset($sb2SSN_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="sb2SSN" value="<?php if (isset($_POST['sb2SSN']) && strlen(trim($_POST['sb2SSN'])) > 0) echo $_POST['sb2SSN']; else echo ""; ?>" />
</td><td><div class="caption_fields">Birth Date</div><div class="error_message"><?php if (isset($sb2birthdate_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="sb2birthdate" value="<?php if (isset($_POST['sb2birthdate']) && strlen(trim($_POST['sb2birthdate'])) > 0) echo $_POST['sb2birthdate']; else echo ""; ?>" /></td><td><div class="caption_fields"> Phone</div><div class="error_message"><?php if (isset($sb2phone_invalid_flag)) echo "Invalid Value"; ?></div><input type="text" class="input_width" name="sb2phone" value="<?php if (isset($_POST['sb2phone']) && strlen(trim($_POST['sb2phone'])) > 0) echo $_POST['sb2phone']; else echo ""; ?>" /></td><td></td></tr>

<?php

if ($formgen_page_validated && ($pageNumber == $pagesCount))
{
	if ($formgen_action_confirm)
	{
		DisplayConfirmation();
	}
	else if ($formgen_action_submit)
	{
		DoSubmit();
		echo '<div class="form_title">'.GetSuccessMsg().'</div>';
	}
}

?>

<?php GenerateSubmitButton(); ?>
</table></form>
</div>
