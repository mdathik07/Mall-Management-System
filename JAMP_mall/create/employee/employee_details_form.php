<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mall";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$sql="SELECT CONCAT(fname, ' ', mname, ' ', lname) AS fullname FROM employee_details where id='".$_SESSION['eid']."';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
//-----To get Full Name of manager
$name=$row['fullname'];








$sql=$conn->prepare("CALL generate_id('clothing',@genid);") or die ('Unable to prepare'. $conn->error);
        $sql->execute();

        $sql = $conn->prepare('SELECT @genid');
        $sql->execute();

        $sql->bind_result($C);
        $sql->fetch();
                echo $C;
        $C++;
        $sql->close();

        $sql = $conn->prepare("CALL generate_id('food',@genid);") or die ('Unable to prepare'. $conn->error);
        $sql->execute();

        $sql = $conn->prepare('SELECT @genid');
        $sql->execute();

        $sql->bind_result($F);
        $sql->fetch();
                echo $F;
        $F++;
        echo "Clothing ID: $C <br>";
    echo "Food ID: $F <br>";
        $sql->close();


?>






<!doctype html>

<html>
    <head>
        <title>JAMP | Hire</title>
        <link rel="stylesheet" type="text/css" href="../../include/style_empl.css"/>
        <link rel="stylesheet" type="text/css" href="../../include/font.css">
        <script>
            const ids = {
                clothing :<?php echo json_encode($C); ?>,
                food :<?php echo json_encode($F); ?>
            };
            const nameFrom = {
                user_name : <?php echo json_encode($name); ?>
            }
        </script>



        <script src="../../include/jquery-3.2.1.js"></script>
        <script src="script.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
        <style>
            
    </style>
    </head>

    <body>
        <div class="employee_details_form">
            <h2><strong>Employee details</strong></h2>
            <!--------------Navigation Bar------------------------------------------------->
            <div class="page-nav">
                <ul>
                    <li class="page active" id="t1" onclick="openpage('page-1','t1')"  style="width: 33.33%"><a style="width: 100%"><strong>Personal Information</strong></a></li>

                    <li class="page" id="t2" onclick="if(validatePersonalInformation())openpage('page-2', 't2')" style="width: 33.33%"><a style="width: 100%"><strong>Job Information</strong></a></li>

                    <li class="page" id="t3" onclick="if(validatePersonalInformation() && validateJobInformation())openpage('page-3', 't3')" style="width: 33.33%"><a style="width: 100%"><strong>Emergency Contact Details</strong></a></li>
                </ul>
            </div>
            <!--------------Hidden Form for AJAX------------------------------------------->
            <form id='form1' action="" method="post" hidden>
                <input type="text" id="dept" name="dept" placeholder="dept">
                <input type="text" id="ttl" name="ttl" placeholder="ttl">
                <input type="text" id="str" name="str" placeholder="str">
                <input type="submit" id="submit">
            </form>
            
            <!----------------------------------------------------------------------------->
            <form id="main_form" name="form" action="" method="post">

                <div class="page_content" id="page-1" name="PersonalInformation">
                    <fieldset class="name">
                        <legend><strong>Name</strong><a style="color: red"><strong>*</strong></a></legend>
                        <input type="text" name="firstname" onclick="document.getElementById('span1').style.display='none'" onkeypress="document.getElementById('span1').style.display='none'" placeholder="First" required style="width: 33%;" oninput="this.value=this.value.toUpperCase()">
                        <input type="text" name="middlename" placeholder="Middle" style="width: 33%" oninput="this.value=this.value.toUpperCase()">
                        <input type="text" name="lastname" onclick="document.getElementById('span1.1').style.display='none'" onkeypress="document.getElementById('span1.1').style.display='none'" placeholder="Last" style="width: 32.5%" oninput="this.value=this.value.toUpperCase()">
                        <span id="span1" style="display:none">Please enter FirstName</span>
                        <span id="span1.1" style="display:none">Please enter LastName</span>
                    </fieldset>
                    <fieldset style="margin-top: 10px;" class=address>
                        <legend>
                            <strong>Address</strong><a style="color: red"><strong>*</strong></a><br>
                        </legend>
                        <input type="text" name="address" onclick="document.getElementById('span2').style.display='none'" onkeypress="document.getElementById('span2').style.display='none'" placeholder="Address" required style="width: 100%; margin-bottom: 5px" oninput="this.value=this.value.toUpperCase()">
                        <input type="text" name="city" onclick="document.getElementById('span2').style.display='none'" onkeypress="document.getElementById('span2').style.display='none'" placeholder="City" required style="width: 49.7%; margin-bottom: 5px" oninput="this.value=this.value.toUpperCase()">
                        <input type="text" name="state" onclick="document.getElementById('span2').style.display='none'" onkeypress="document.getElementById('span2').style.display='none'" placeholder="State" required style="width: 49.7%" oninput="this.value=this.value.toUpperCase()">
                        <input type="text" name="pincode" onclick="document.getElementById('span2').style.display='none'" onkeypress="document.getElementById('span2').style.display='none'" placeholder="Pin code" required style="width: 49.7%">
                        <select name="country" required style="width: 49.7%">
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antarctica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo, Republic of(Brazzaville)">Congo, Republic of(Brazzaville)</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Democratic Republic of the Congo (Kinshasa)">Democratic Republic of the Congo (Kinshasa)</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="East Timor (Timor-Leste)">East Timor (Timor-Leste)</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="English English Name">English English Name</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands">Falkland Islands</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Territories">French Southern Territories</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Great Britain">Great Britain</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Holy See">Holy See</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option selected value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Ivory Coast">Ivory Coast</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, Democratic People's Rep. (North Korea)">Korea, Democratic People's Rep. (North Korea)</option>
                            <option value="Korea, Republic of (South Korea)">Korea, Republic of (South Korea)</option>
                            <option value="Kosovo">Kosovo</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao, People's Democratic Republic">Lao, People's Democratic Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libya">Libya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macau">Macau</option>
                            <option value="Macedonia, Rep. of">Macedonia, Rep. of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia, Federal States of">Micronesia, Federal States of</option>
                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar, Burma">Myanmar, Burma</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Palestinian territories">Palestinian territories</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn Island">Pitcairn Island</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion Island">Reunion Island</option>
                            <option value="Romania">Romania</option>
                            <option value="Russian Federation">Russian Federation</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Sudan">South Sudan</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria, Syrian Arab Republic">Syria, Syrian Arab Republic</option>
                            <option value="Taiwan (Republic of China)">Taiwan (Republic of China)</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Tibet">Tibet</option>
                            <option value="Timor-Leste (East Timor)">Timor-Leste (East Timor)</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Vatican City State (Holy See)">Vatican City State (Holy See)</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                            <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
                            <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                        <span id="span2" style="display:none">Please enter your Complete Address</span>
                    </fieldset>
                    <fieldset style="margin-top: 10px;" class=phone>
                        <legend><strong>Phone</strong><a style="color: red"><strong>*</strong></a></legend>
                        <input type="text" name="phone" onclick="document.getElementById('span3').style.display='none'" onkeypress="document.getElementById('span3').style.display='none'" required style="width: 49.7%">
                        <span id="span3" style="display:none">Please enter your Contact number</span>
                    </fieldset>
                    <fieldset style="margin-top: 10px;" class=email>
                        <legend><strong>Email</strong><br></legend>
                        <input type="text" name="email" style="width: 49.7%" oninput="this.value=this.value.toUpperCase()">
                    </fieldset>
                    <fieldset style="margin-top: 10px;" class=DOB>
                        <legend><strong>Birth Date</strong></legend>
                        <input type="date" name="DOB" onclick="document.getElementById('span4').style.display='none'" onkeypress="document.getElementById('span4').style.display='none'" style="width: 25%">
                        <span id='span4' style="display:none">Please select your Date of Birth</span>
                    </fieldset>

                    <input type="button" class="btn" onclick="if(validatePersonalInformation())openpage('page-2','t2')" value="Next" style="margin-left:4px;margin-top: 10px;">
                </div>

                <div class="page_content" id="page-2" name="JobInformation">
                    <fieldset style="margin-top: 10px;" class=department>
                        <legend><strong>Department</strong><a style="color: red"><strong>*</strong></a><br></legend>
                        <select name=department id="department" onclick="document.getElementById('span6').style.display='none'" onkeypress="document.getElementById('span6').style.display='none'" style="width: 50%;" onchange="generate_eid()">
                            <?php if(preg_match('/^A.*/',$_SESSION["eid"]))echo "<option value='-'></option>
                        <option value='Clothing'>Clothing</option>
                        <option value='Food'>Food</option>";
                            else if(preg_match('/^C.*/',$_SESSION["eid"]))
                                echo"<option value='-'></option><option value='Clothing'>Clothing</option>";
                            else
                                echo"<option value='-'></option><option value='Food'>Food</option>";
                            ?>
                        </select>
                        <span id="span6" style="display:none"><br>Please select Department</span>
                    </fieldset>

                    <fieldset class=title style="margin-top: 10px;">
                        <legend><strong>Title</strong><a style="color: red"><strong>*</strong></a></legend>
                        <select name=title id="title" onclick="document.getElementById('span5').style.display='none'" onkeypress="document.getElementById('span5').style.display='none'" onchange="document.getElementById('span5').style.display='none'" style="width: 50%;">
                            <option></option>
                            <option value="Sale Clerk">Sales Clerk</option>
                            <?php if(preg_match('/^A.*/',$_SESSION["eid"]))echo "<option value='Store Manager'>Store Manager</option>";
                            ?>
                        </select>
                        <span id="span5" style="display:none"><br>Please select Title</span>
                    </fieldset>


                    <fieldset style="margin-top: 10px;" class="employee_id">
                        <legend><strong>Employee ID</strong><a style="color: red"><strong>*</strong></a></legend>
                        <input type="text" style="width: 50%; cursor: not-allowed" name="employee_id" id="employee_id" readonly="readonly">
                    </fieldset>

                    <fieldset style="margin-top: 10px;" class="password" hidden="true">
                        <legend><strong>Password</strong><strong style="color: red;">*</strong></legend>
                        <input type="text" style="width: 50%" onclick="document.getElementById('span5.1').style.display='none'" onkeypress="document.getElementById('span5.1').style.display='none'" name="password" id="password">
                        <span id="span5.1" style="display:none"><br>Please Enter Password</span>
                    </fieldset>

                    <fieldset style="margin-top: 10px;" class=department>
                        <legend><strong>Store</strong><a style="color: red"><strong>*</strong></a><br></legend>
                        <select name=store id="store" onclick="document.getElementById('span6.2').style.display='none'" onkeypress="document.getElementById('span6.2').style.display='none'" style="width: 50%;" onchange="generate_eid()">
                            <option value="--">--</option>
                        </select>
                        <span id="span6.1" style="display:none"><br>(Note: If no store is available, then all stores have already been assigned managers.)</span>
                        <span id="span6.2" style="display:none"><br>Please select Store</span>
                    </fieldset>

                    <fieldset style="margin-top: 10px;" class="Supervisor">
                        <legend><strong>Supervisor</strong><a style="color: red"><strong>*</strong></a></legend>
                        <input type="text" style="width: 50%; cursor: not-allowed" name="supervisor" id="supervisor" readonly="readonly">
                    </fieldset>

                    <fieldset style="margin-top: 10px;" class=start_date>
                        <legend><strong>Start Date</strong><a style="color: red"><strong>*</strong></a></legend>
                        <input name="start_date" onclick="document.getElementById('span7').style.display='none'" onkeypress="document.getElementById('span7').style.display='none'" type="date" style="width: 25%">
                        <span id="span7" style="display:none"><br>Please select Start Date</span>
                    </fieldset>

                    <fieldset style="margin-top: 10px;" class=salary>
                        <legend><strong>Salary</strong><a style="color: red"><strong>*</strong></a></legend>
                        <input type="text" name="salary" onclick="document.getElementById('span8').style.display='none'" onkeypress="document.getElementById('span8').style.display='none'" style="width: 50%">
                        <span id="span8" style="display:none"><br>Please enter Salary</span>
                    </fieldset>

                    <input type="button" class="btn" onclick="openpage('page-1','t1')" value="Previous" style="margin-left:4px;margin-top: 10px;">
                    <input type="button" class="btn" onclick="if(validateJobInformation())openpage('page-3' ,'t3')" value="Next">  
                </div>

                <div class="page_content" id="page-3" name="Emergency">
                    <fieldset class=Name>
                        <legend><strong>Name</strong><a style="color: red"><strong>*</strong></a></legend>
                        <input type="text" name="ecdfirstname" onclick="document.getElementById('span9').style.display='none'" onkeypress="document.getElementById('span9').style.display='none'" oninput="this.value=this.value.toUpperCase()" placeholder="First" required style="width: 33%;">
                        <input type="text" name="ecdmiddlename" oninput="this.value=this.value.toUpperCase()" placeholder="Middle" style="width: 33%">
                        <input type="text" name="ecdlastname" onclick="document.getElementById('span9.1').style.display='none'" onkeypress="document.getElementById('span9.1').style.display='none'" oninput="this.value=this.value.toUpperCase()" placeholder="Last" style="width: 32.5%">
                        <span id='span9' style="display:none">Please enter First name</span>
                        <span id='span9.1' style="display:none">Please enter Last name</span>
                    </fieldset>
                    <fieldset style="margin-top: 10px;" class=address>
                        <legend><strong>Address</strong><a style="color: red"><strong>*</strong></a><br>
                        </legend>
                        <input type="text" name="ecdaddress" onclick="document.getElementById('span10').style.display='none'" onkeypress="document.getElementById('span10').style.display='none'" oninput="this.value=this.value.toUpperCase()" placeholder="Address" required style="width: 100%; margin-bottom: 5px">
                        <input type="text" name="ecdcity" onclick="document.getElementById('span10').style.display='none'" onkeypress="document.getElementById('span10').style.display='none'" oninput="this.value=this.value.toUpperCase()" placeholder="City" required style="width: 49.7%; margin-bottom: 5px">
                        <input type="text" name="ecdstate" onclick="document.getElementById('span10').style.display='none'" onkeypress="document.getElementById('span10').style.display='none'" oninput="this.value=this.value.toUpperCase()" placeholder="State" required style="width: 49.7%">
                        <input type="text" name="ecdpincode" onclick="document.getElementById('span10').style.display='none'" onkeypress="document.getElementById('span10').style.display='none'" placeholder="Pin code" required style="width: 49.7%">
                        <select name="ecdcountry" required style="width: 49.7%">
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antarctica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo, Republic of(Brazzaville)">Congo, Republic of(Brazzaville)</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Democratic Republic of the Congo (Kinshasa)">Democratic Republic of the Congo (Kinshasa)</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="East Timor (Timor-Leste)">East Timor (Timor-Leste)</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="English English Name">English English Name</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands">Falkland Islands</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Territories">French Southern Territories</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Great Britain">Great Britain</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Holy See">Holy See</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option selected value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Ivory Coast">Ivory Coast</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, Democratic People's Rep. (North Korea)">Korea, Democratic People's Rep. (North Korea)</option>
                            <option value="Korea, Republic of (South Korea)">Korea, Republic of (South Korea)</option>
                            <option value="Kosovo">Kosovo</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao, People's Democratic Republic">Lao, People's Democratic Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libya">Libya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macau">Macau</option>
                            <option value="Macedonia, Rep. of">Macedonia, Rep. of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia, Federal States of">Micronesia, Federal States of</option>
                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar, Burma">Myanmar, Burma</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Palestinian territories">Palestinian territories</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn Island">Pitcairn Island</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion Island">Reunion Island</option>
                            <option value="Romania">Romania</option>
                            <option value="Russian Federation">Russian Federation</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Sudan">South Sudan</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria, Syrian Arab Republic">Syria, Syrian Arab Republic</option>
                            <option value="Taiwan (Republic of China)">Taiwan (Republic of China)</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Tibet">Tibet</option>
                            <option value="Timor-Leste (East Timor)">Timor-Leste (East Timor)</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Vatican City State (Holy See)">Vatican City State (Holy See)</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                            <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
                            <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                        <span id="span10" style="display:none">Please enter Complete Address</span>
                    </fieldset>
                    <fieldset style="margin-top: 10px;" class=phone>
                        <legend><strong>Phone</strong><a style="color: red"><strong>*</strong></a></legend>
                        <input type="text" name="ecdphone" onclick="document.getElementById('span11').style.display='none'" onkeypress="document.getElementById('span11').style.display='none'" required style="width: 49.7%">
                        <br>
                        <span id="span11" style="display:none">Please enter your Contact number</span>
                    </fieldset>
                    <fieldset style="margin-top: 10px;" class=relationship>
                        <legend><strong>Relationship</strong><a style="color: red"><strong>*</strong></a></legend>
                        <input type="text" name="relationship" onclick="document.getElementById('span12').style.display='none'" onkeypress="document.getElementById('span12').style.display='none'" oninput="this.value=this.value.toUpperCase()" required style="width: 49.7%">

                        <span id="span12" style="display:none"><br>Please enter Reletionship with customer</span>
                    </fieldset>
                    <input type="button" class="btn" value="Previous" onclick="openpage('page-2', 't2')" style="margin-left:4px;margin-top: 10px;">
                    <input type="button" class="btn" value="submit" id="main_submit" onclick="if(validateEmergency())send()">
                </div>
            </form>
        </div>

        <!-- <?php
        $sql=$conn->prepare("CALL generate_id('clothing',@genid);") or die ('Unable to prepare'. $conn->error);
        $sql->execute();

        $sql = $conn->prepare('SELECT @genid');
        $sql->execute();

        $sql->bind_result($C);
        $sql->fetch();
                echo $C;
        $C++;
        $sql->close();

        $sql = $conn->prepare("CALL generate_id('food',@genid);") or die ('Unable to prepare'. $conn->error);
        $sql->execute();

        $sql = $conn->prepare('SELECT @genid');
        $sql->execute();

        $sql->bind_result($F);
        $sql->fetch();
                echo $F;
        $F++;
        echo "Clothing ID: $C <br>";
    echo "Food ID: $F <br>";
        $sql->close();
        ?> -->

    </body>
</html> 