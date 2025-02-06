


// let department = "Clothing"; // or "Food", depending on user selection

// fetch(`generate_ids.php?department=${department}`)
//     .then(response => response.text())
//     .then(data => {
//         console.log("Generated ID:", data);
//     })
//     .catch(error => console.error("Error fetching ID:", error));




console.log(document.getElementById("department"))
// var clothingId = "<?php echo $C; ?>";
//     var foodId = "<?php echo $F; ?>";

var clothingId = ids.clothing;
var foodId = ids.food;
var user_nam = nameFrom.username;


            var names = /^[A-Z a-z]*$/;
            var phone_syn = /^[0-9]{10}$/;
            var pin_syn = /^[0-9]{6}$/;
            var eml = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-]+)\.([a-zA-Z]{2,5})$/;


            function validatePersonalInformation(){
                var firstname = document.form.firstname;
                var lastname = document.form.lastname;
                var address = document.form.address;
                var city = document.form.city;
                var state = document.form.state;
                var pincode = document.form.pincode;
                var phone = document.form.phone;
                var email = document.form.email;
                var DOB = document.form.DOB;
                console.log("Loaded....")
                if(firstname.value == "")
                {
                    document.getElementById('span1').style.display='';
                    firstname.focus();
                }
                else if(lastname.value == "")
                {
                    document.getElementById('span1.1').style.display='';lastname.focus();
                }
                else if(!firstname.value.match(names))
                {
                    alert("Name can contain only Alphabets");
                    firstname.focus();
                }
                else if(!lastname.value.match(names))
                {
                    alert("Name can contain only Alphabets");
                    lastname.focus();
                }
                else if(address.value == ""||city.value == ""||state.value == ""||pincode.value == "")
                {
                    document.getElementById('span2').style.display='';
                    address.focus();
                }
                else if(!city.value.match(names))
                {
                    alert("City name can contain only alphabets");
                    city.focus();
                }
                else if(!state.value.match(names))
                {
                    alert("State name can contain only alphabets");
                    state.focus();
                }
                else if(!pincode.value.match(pin_syn))
                {
                    alert("PinCode must be numerical input of 6 characters");
                    pincode.focus();
                }
                else if(phone.value == "")
                {
                    document.getElementById('span3').style.display='';
                    phone.focus();
                }
                else if(!phone.value.match(phone_syn))
                {
                    alert("Please enter numerical input of 10 characters for contact");
                    phone.focus();
                }
                else if(email.value != "" && !email.value.match(eml))
                {
                    alert("Please enter your Email Id in correct format(e.x. mark1.123abc@gmail.com)");
                    email.focus();
                }
                else if(DOB.value == "")
                {
                    document.getElementById('span4').style.display='';
                    DOB.focus();
                }
                else
                {
                    bd=new Date(DOB.value);
                    tod=new Date();
                    tod2=new Date();
                    tod.setFullYear(tod.getFullYear()-16);
                    tod2.setFullYear(tod2.getFullYear()-60);
                    if(tod.getTime() < bd.getTime())
                        alert("Age Limit 16 years(check Birthdate)");
                    else if(tod2.getTime() > bd.getTime())
                        alert("Age Limit 60 years(check Birthdate)");
                    else
                        return true;
                    DOB.focus();
                }
                return false;
            }

            function validateJobInformation(){
                var department=document.form.department;
                var title=document.form.title;
                var pswd=document.form.password;
                var store=document.form.store;
                var start_date = document.form.start_date;
                var salary = document.form.salary;
                var DOB = document.form.DOB;

                if(department.value == "")
                {
                    document.getElementById("span6").style.display='';
                    department.focus();
                }
                else if(title.value == "")
                {
                    document.getElementById('span5').style.display='';
                    title.focus();
                }
                else if(title.value=="Store Manager" && pswd.value=="")
                {
                    document.getElementById('span5.1').style.display='';
                    pswd.focus();
                }
                else if(store.value == "--")
                {
                    document.getElementById('span6.2').style.display='';
                    store.focus();
                }
                else if(start_date.value == "")
                {
                    document.getElementById("span7").style.display='';
                    start_date.focus();
                }
                else if(salary.value == "")
                {
                    document.getElementById("span8").style.display='';
                    salary.focus();
                }
                else if(!salary.value.match(/^[0-9]+/))
                {
                    alert("Salary must be numeric");
                    salary.focus();
                }
                else
                {
                    bd=new Date(DOB.value);
                    sd=new Date(start_date.value);
                    sd2=new Date(start_date.value);
                    sd.setFullYear(sd.getFullYear()-16);
                    sd2.setFullYear(sd2.getFullYear()-60);
                    tod=new Date();
                    sd3=new Date(start_date.value);
                    tod.setMonth(tod.getMonth()+2);
                    if(sd3.getTime() < bd.getTime())
                        alert("Please enter a valid start date");
                    else if(sd3.getTime() > tod.getTime())
                        alert("Forward start date limit 2 months");
                    else if(sd.getTime() < bd.getTime())
                        alert("Age Limit 16 years from date of birth(check Start date)");
                    else if(sd2.getTime() > bd.getTime())
                        alert("Age Limit 60 years from date of birth(check Start date)");
                    else
                        return true;
                    start_date.focus();
                }
                return false;
            }

            function validateEmergency(){
                var firstname = document.form.ecdfirstname;
                var lastname = document.form.ecdlastname;
                var address = document.form.ecdaddress;
                var city = document.form.ecdcity;
                var state = document.form.ecdstate;
                var pincode = document.form.ecdpincode;
                var phone = document.form.ecdphone;
                var relationship = document.form.relationship;

                if(firstname.value == "")
                {
                    document.getElementById('span9').style.display='';
                    firstname.focus();
                }
                else if(lastname.value == "")
                {
                    document.getElementById('span9.1').style.display='';lastname.focus();
                }
                else if(!firstname.value.match(names))
                {
                    alert("Name can contain only Alphabets");
                    firstname.focus();
                }
                else if(!lastname.value.match(names))
                {
                    alert("Name can contain only Alphabets");
                    lastname.focus();
                }
                else if(address.value == ""||city.value == ""||state.value == ""||pincode.value == "")
                {
                    document.getElementById('span10').style.display='';
                    address.focus();
                }
                else if(!city.value.match(names))
                {
                    alert("City name can contain only alphabets");
                    city.focus();
                }
                else if(!state.value.match(names))
                {
                    alert("State name can contain only alphabets");
                    state.focus();
                }
                else if(!pincode.value.match(pin_syn))
                {
                    alert("PinCode must be numerical input of 6 characters");
                    pincode.focus();
                }
                else if(phone.value == "")
                {
                    document.getElementById('span11').style.display='';
                    phone.focus();
                }
                else if(!phone.value.match(phone_syn))
                {
                    alert("Please enter numerical input of 10 characters for contact");
                    phone.focus();
                }
                else if(relationship.value == "")
                {
                    document.getElementById('span12').style.display='';
                    relationship.focus();
                }
                else
                    return true;
                return false;
            }
            function generate_eid(){
                console.log("generating....")
                let department = document.getElementById("department").value[0]; // or "Food", depending on user selection

fetch(`generate_ids.php?department=${department}`)
    .then(response => response.text())
    .then(data => {
        console.log("Generated ID:", data);
    })
    .catch(error => console.error("Error fetching ID:", error));
                var d=document.getElementById("department");
                var eid=document.getElementById("employee_id");
                console.log(d.value[0]);
                if(d.value[0]=="C")
                {
                    var result = clothingId
                    if(result >= 10)
                        result = "0"+result;
                    else if(result <10)
                        result = "00"+result;
                }
                else if(d.value[0]=="F")
                {
                    var result = foodId
                    if(result >= 10)
                        result = "0"+result;
                    else if(result <10)
                        result = "00"+result;
                }

                if(d.value[0]=='-')
                    eid.value="";
                else    
                    eid.value=d.value[0]+result;

            }

            function openpage(page_id, tab){
                var i, tabcontent, tablinks;
                page_content = document.getElementsByClassName("page_content");
                for (i = 0; i < page_content.length; i++) {
                    page_content[i].style.display = "none";
                }
                page = document.getElementsByClassName("page");
                for (i = 0; i < page.length; i++) {
                    page[i].className = page[i].className.replace(" active", "");
                }
                document.getElementById(page_id).style.display = "block";
                //            evt.currentTarget.className += " active";
                var t=document.getElementById(tab);
                t.className += " active";  
                
           // -------------JQUERY-&-AJAX----------------------------
            } 


//             function openpage(pageId, tabId) {
//     // Hide all pages
//     document.querySelectorAll('.page_content').forEach(page => page.style.display = 'none');
    
//     // Deactivate all tabs
//     document.querySelectorAll('.page').forEach(tab => tab.classList.remove('active'));

//     // Show selected page and activate selected tab
//     document.getElementById(pageId).style.display = 'block';
//     document.getElementById(tabId).classList.add('active');
// }

// Initial load to show first page
document.addEventListener("DOMContentLoaded", () => {
    openpage('page-1', 't1');
});


            $(document).on('change','#department,#title', function () {
                var d=document.getElementById('dept');
                d.value=document.getElementById('department').value;

                var d=document.getElementById('ttl');
                d.value=document.getElementById('title').value;

                $.ajax({
                    url: 'store.php',
                    data: $('#form1').serialize(),
                    dataType: 'html',
                    success: function(data){
                        $('#store').html(data);
                    }
                });
            });


            $(document).on('change', '#title,#store', function(){
                var d=document.getElementById('store');
                document.getElementById('str').value=d.value;

                if(document.getElementById('title').value=='Store Manager')
                {
                    document.getElementById('supervisor').value=user_nam;
                    $('.password').attr('hidden',false);
                    document.getElementById('span6.1').style.display="";
                }
                else
                {
                    document.getElementById('span6.1').style.display="none";
                    $('.password').attr('hidden',true);
                    $.ajax({
                        url: 'supervisor.php',
                        data: $('#form1').serialize(),
                        success: function(data){
                            $('#supervisor').val(data);
                        }
                    });
                }
            });




        
            // document.getElementById("t1").click();
            document.addEventListener("DOMContentLoaded", () => {
                document.getElementById("t1").click();
            });
            

            function send(){
                $.ajax({
                    url: 'send.php',
                    type: 'post',
                    data: $('#main_form').serialize(),
                    success: function(data){
                        alert(data);
                        if(data=="New record stored successfully")
                            location.reload(true);
                    }
                });
            }