# JJSOFT Exercise (Comparative Market Analysis (CMA))

Technologies Used : Core PHP , HTML, Ajax, jQuery, Bootstrap and MySql

Codding Pattern : Classes and Objects

Source Code Path : https://github.com/sijoph/jjsoftExercise.git

Landing Page

1. Developed the lead collection form with folowing fields : First Name, Last Name, Email Address, Phone number, Address and Home square footage
	
2. The lead collection form details will be save on each changes made on any inputs. 
   For that functionality, used Ajax call when "onkeyup" event.
   
3. Also we are collecting all details when form post submission.

4. Landing page url : http://localhost/index.php



Dashboard listing page for Agent

1. Dashboard will list all leads information collected by landing page form.

2. Dashboard listing consists of First & Last name, Email Address, Lead created date.

3. Agent dashboard only will get by correct auid (?auid=603AEC402B9363218DED7762BA6A3D3E).

4. Agent dashboard page url :  http://localhost/dashboard.php?auid=603AEC402B9363218DED7762BA6A3D3E


Single Lead Details Page For Agent 
 
 1. Each leads has unique lead ids (luid). Get the lead details if only have correct "luid".

 2. Single lead details page url : http://localhost/lead_details.php?luid=5c51bd6874276
 
 
 
Database File

1. Database file with MySql table datas : Database.zip
