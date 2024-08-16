<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script>
var stateObject = {
"India": {
"Andhra Pradesh": ["Anantapur", "Chittoor", "East Godavari", "Guntur", "Krishna", "Kurnool", "Nellore", "Prakasam", "Sri Potti Sriramulu Nellore", "Srikakulam", "Viskhapatanam", "Viziangaram", "West Godavari", "Ysr District"],
"Arunachal Pradesh": ["Changlang", "Dibang Valley", "East Kameng", "East Slang", "Kurung Kumey", "Lohit", "Lower Dibang Vally", "Lower Subansiri", "Papum Pare", "Tawang", "Tirap", "Upper Slang", "Upper Subansiri", "West Kameng", "West Slang"],
"Assam": ["Barpeta", "Bongalgaon", "Cachar", "Darrang", "Dhemaji", "Dhubri", "Dibrugarh", "Dima Hasao", "Goalpara", "Golaghat", "Hailakandi", "Jorhat", "Kamrup", "Karbi Anglong", "Karimganj", "Kokrajhar", "Lakhimpur", "Marigaon", "Nagaon", "Nalbari", "Sivasagar", "Sonitpur", "Tinsukia"],
"Bihar": ["Araria", "Arwal", "Aurangabad", "Banka", "Bengusarai", "Bhagalpur", "Bhojpur", "Buxar", "Darbhanga", "East Champaran", "Gaya", "Gopalganj", "Jamul", "Jehanabad", "Kaimur", "Katihar", "Khagaria", "Kishnaganj", "Lakhisarai", "Madhepura", "Madhubani", "Munger", "Muzaffarpur", "Nalanda", "Nawada", "Patna", "Purnia", "Rohtas", "Saharsa", "Samastipur", "Saran", "Sheikhpura", "Sheohar", "Sitamarhi", "Siwan", "Supaul", "Vaishali", "West Champaran"],
"Chattisgarh": ["Bastar", "Bijapur", "Bilaspur", "Dantewada", "Dhamtari", "Durg", "Gariaband", "Janjgirchampa", "Jashpur", "Kabirdham", "Kanker", "Kawardha", "Korba", "Koriya", "Magasamund", "Narayanpur", "Raipur", "Rajnandgaon", "Surguja"],
"Delhi": ["Central Delhi", "East Delhi", "New Delhi", "New Delhi Central", "New Delhi South", "North Delhi", "North East Delhi", "North West Delhi", "South Delhi", "South West Delhi", "South Delhi", "South West Delhi", "West Delhi"],
"Goa": ["North Goa", "South Goa"],
"Gujarat": ["Ahmedabad", "Amreli", "Anand", "Banaskantha", "Bharuch", "Bhavnagar", "Dahod", "Dang", "Gandhinagar", "Jamnagar", "Junagadh", "Kachchh", "Kheda", "Mahesana", "Narmada", "Navsari", "Panchmahal", "Patan", "Porbandar", "Rajkot", "Sabarkantha", "Surat", "Surendra Nagar", "Tapi", "Vadodara", "Valsad"],
"Haryana": ["Ambala", "Bhiwani", "Faridabad", "Fatehabad", "Gurgaon", "Hisar", "Jhajjar", "Jind", "Kaithal", "Karnal", "Kurukshsetra", "Magendragarh", "Panchkula", "Panipat", "Rewari", "Rohtak", "Sirsa", "Sonipat", "Yamunagar"],
"Himachal Pradesh": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"Jharkhand": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"Karnataka": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"Kerala": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"Madhya Pradesh": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"Maharashtra": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"Manipur": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"Meghalaya": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"Mizoram": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"Nagaland": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"Odisha": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"Punjab": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"Rajasthan": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"Sikkim": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"Tamil Nadu": ["Ariyalur", "Chengalpattu", "Chennai", "Coimbatore", "Cuddalore", "Dharmapuri", "Dindigul", "Erode", "Kallakurichi", "Kanchipuram", "Kanyakumari", "Karur", "Krishnagiri", "Madurai", "Mayiladuthurai", "Nagapattinam", "Namakkal", "Nilgiris", "Perambalur", "Pudukkottai", "Ramanathapuram", "Ranipet", "Salem", "Sivagangai", "Tenkasi", "Thanjavur", "Theni", "Thoothukudi", "Tiruchirappalli", "Tirunelveli", "Tirupathur", "Tiruppur", "Tiruvallur", "Tiruvannamalai", "Tiruvarur", "Vellore", "Villupuram", "Virudhunagar"],
"Telangana": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"Tirupura": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"Uttar Pradesh": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"Uttarakhand": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
"West Bengal": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""]
},
 "Kerala": {
"Alberta": ["Acadia", "Bighorn"],
"": ["Washington"]
},
 "Karnataka": {
"Alberta": ["Acadia", "Bighorn"],
"": ["Washington"]
},
}
window.onload = function () {
var countySel = document.getElementById("countySel"),
stateSel = document.getElementById("stateSel"),
districtSel = document.getElementById("districtSel");
for (var country in stateObject) {
countySel.options[countySel.options.length] = new Option(country, country);
}
countySel.onchange = function () {
stateSel.length = 1; // remove all options bar first
districtSel.length = 1; // remove all options bar first
if (this.selectedIndex < 1) return; // done
for (var state in stateObject[this.value]) {
stateSel.options[stateSel.options.length] = new Option(state, state);
}
}
countySel.onchange(); // reset in case page is reloaded
stateSel.onchange = function () {
districtSel.length = 1; // remove all options bar first
if (this.selectedIndex < 1) return; // done
var district = stateObject[countySel.value][this.value];
for (var i = 0; i < district.length; i++) {
districtSel.options[districtSel.options.length] = new Option(district[i], district[i]);
}
}
}
</script>
</head>
<body>
<form name="myform" id="myForm">
Select State: <select name="state" id="countySel" size="1">
<option value="" selected="selected">Select Country</option>
</select>
<br>
<br>
Select District: <select name="countrya" id="stateSel" size="1">
<option value="" selected="selected">Please select Country first</option>
</select>
<br>
<br>
Select Town/Taluk: <select name="district" id="districtSel" size="1">
<option value="" selected="selected">Please select State first</option>
</select><br>
<input type="submit">
</form>
</body>
</html>
<!--
"Tamil Nadu": {
"Ariyalur": ["Ariyalur", "Jayamkondacholapuram", "Jayamkondcholapuram", "Jayamkondocholapuram", "Kattumannarkoil", "Lalgudi", "Sendurai", "Udayarpalayam"],
"Chennai": ["Ambattur", "Chennai", "Chennai City", "Chennai City Corporation", "Egmore Nungambakka", "Egmore Nungambakkam", "Egmore Nungambakkm", "Maduravoyal", "Mambalam", "Mylapore - Triplicane", "Perambur Puraswalkam", "Paerambur Purawalkam", "Tondiarpet For St George", "Tondiarpet For St Goerge", "Toniarpet For St George"],
"Coimbatore": ["Avanashi", "Coimbatore North", "Coimbatore", "Coimbatore South", "Dindigul", "Erode", "Madhavapuram", "Mettupalayam", "Mettupalayaam", "Plladam", "Pollachi", "Tiruppur", "Tirupur", "Udaamalpet", "Udamalpet", "Udamalpet Ho", "Udumalaipettai", "Valparai"],
"Cuddalore": ["Chidabamram", "Chidambaram", "Chidambaram North", "Cuddalore", "Kattmannarkoil", "Kattumanarkoil", "Kattumannarkioil", "Kattumannarkoil", "Kattummannarkoil", "Panruti", "Tittagudi", "Tittakudi", "Virudhachalam", "Vriddhachalam"],
"Dharmapuri": ["Dharmapuri", "Harur", "Krishnagiri", "Nallampalli", "Palacode", "Palakkodu", "Pappireddipatti", "Pappiredipatti", "Paupparapatti", "Pennagaram"],
"Dindigul": ["Dindigul", "Kodaikanal", "Natham", "Nilakkottai", "Nilakottai", "Oddanchatram", "Palani", "Vedasandur"],
"Erode": ["Bhavani", "Dharapram", "Dharapuram", "Dharaupram", "Erode", "Gobichettipalayam", "Kangayam", "Kangeyam", "Palladam", "Perundurai", "Sathy", "Sathyamangalam", "Tirupur"],
"Kanchipuram": ["Chengallpattu", "Chengalpatatu", "Chengalpattu", "Chengalpattu Taluk", "Chengalplattu", "Chennai City Corporation", "Cheyur", "Cheyyur", "Chingelpet", "Chinglepet", "Chingleput", "Kancheepuram", "Kanchipuram", "Mandurantakam", "Manduranthakam", "Saidapet", "Sholinganallur", "Sriperubudur", "Sriperubudur Taluk", "Sriperumbudur", "Tambaram", "Tirukalikundram", "Tirukalilkundram", "Tiruporur", "Uthiramerur", "Utiramerur", "Uttiramerur"],
"Kanyakumari": ["Agasteeswaram", "Agastheeswaram", "Kalkulam", "Kanyakumari", "Thovala", "Thovalai", "Vilavancode"],
"Karur": ["Aravakurichi", "Erode", "Karur", "Kirishnarayapuram", "Krishnarayapuram", "Kulithalai", "Kulittalai"],
"Krishnagiri": ["Barugur", "Denkanikotta", "Denkanikottai", "Harur", "Hosur", "Kaveripattinam", "Krishnagiri", "Mathur", "Palacode", "Pochampalli", "Uthangarai", "Uttangarai"],
"Madurai": ["Madurai", "Madurai North", "Madurai South", "Melur", "Peraiyur", "Thirumangalam", "Tirumangalam", "Tirumangalam Taluk", "Usilampatti", "Vadipatti"],
"Nagapattinam": ["Kilvelur", "Kuttalam", "Mayiaduthurai", "Mayiladuthurai", "Nagapattinam", "Nannilam", "Sirikali", "Sirkali Tk", "Tarangambadi", "Tharangampadi", "Tirukkuvalai", "Thirukkuvali", "Tirupanandal", "Tiruturaipundi", "Tiruvarur", "Tiurkuvalai", "Vendaraniam", "Vedaranyam", "Vedarniam"],
"Namakkal": ["Erode", "Namakkal", "Paramathi Velur", "Paramathivelur", "Paramthivelur", "Rasipuram", "Salem", "Sankari", "Tiruchengodu", "Tiruchengode"],
"Nilgiris": ["Coonoor", "Gudalur", "Kotagiri", "Kundah", "Pandalur", "Panthalur", "Udagamandalam", "Udhagamandalam"],
"Perambalur": ["Ariyalur", "Kunnam", "Perambalur", "Turaiyur", "Veppanthattai"],
"Pudukkotai": ["Alangudi", "Annavasal", "Aranangi", "Arantangi", "Aranthangi", "Avadaiyarkoil", "Gandarvakkotai", "Illuppur", "Kulathur", "Manamelkudi", "Orattanad", "Pudukottai", "Thirumayam", "Tirumayaam"],
"Ramanathapuram": ["Devakottai", "Kadaladi", "Kamudhi", "Mudukulanthur", "Paramakudi", "Ramanathapuram", "Ramaeswaram", "Tiruvadanai"],
"Salem": ["Attur", "Edappadi", "Gangavalli", "Idappadi", "Mettur", "Omalur", "Rasipuram", "Salem", "Sanakari", "Sankari", "Tiruchengodu", "Valapady", "Vazhapadi", "Yercaud"],
"Sivaganga": ["Devakottai", "Ilayangudi", "Karaikkudi", "Karaikudi-Kallal Block", "Karaikudi-Sakkottai Block", "Manamadurai", "Singampunari Block", "Sivanganga", "Tirppattur-singamounari Block", "Tirupathur", "Tirupathur-Singsmpunari Block", "Tirupathur-Kallal Block", "Tiruppuvanam", "Tiruvadanai"],
"Thanjavur": ["Kodavasal", "Kumbakonam", "Kuttalam", "Orthanadu", "Orattanad", "Papanasam", "Pattukottai", "Peravurani", "Thanjavur", "Thiruvaiyaru", "Thiruvidaimarudur", "Tirupanandal", "Tiruturaipundi", "Tiruvidaimarudur", "Valangaiman"],
"Theni": ["Andipatti", "Aundipatti", "Bondinayakanur", "Periyur", "Peiryakulam", "Theni", "Uthamapalayam"],
"Tiruchirappalli": ["Ariyalur", "Lalgudi", "Manachannalloor", "Manaparai", "Musiri", "Srirangam", "Thottiyam", "Thuraiyur", "Tiruchirappalli", "Trichy", "Turaiyur", "Ulundurpet"],
"Tirunelveli": ["Allangulam", "Amabasamudram", "Nanguneri", "Palayamkottai", "Radhapuram", "Sankarankovil", "Sengottai", "Sivagiri", "Tenkasi", "Tirunelveli", "Virakeralampudur", "Virudhunagar"],
"Tiruvallur": ["Ambattur", "Avadi", "Chennai Corporation", "Gummidipoondi", "Pallipat", "Ponneri", "Ponnamalee", "Sriperumbudur", "Thiruvallur", "Tirutani", "Tiruvallur", "Tritani", "Uthukottai"],
"Tiruvannamalai": ["Arani", "Chegam", "Chengam", "Cheyyar", "Cheyyaru", "Polur", "Thandrampattu", "Tiruannamalai", "Tiruvanamalai Taluk", "Tiruvnamali", "Tvmalai", "Vandavasi", "Vellor"],
"Tiruvarur": ["Kodavasal", "Koradacherry", "Mannargudi", "Nannilam", "Needamngalam", "Pattukottai", "Thiruthuraipoondi", "Tiruvarur", "Tiruturipundi", "Tiruvarur", "Valangaiman"],
"Tuticorin": ["Ettayapuram", "Kovilpatti", "Otapidaram", "Rivaikuntam", "Sankarankovil", "Santhankulam", "Srivaikuntam", "Thootukudi", "Tiruchendur", "Tirunelveli", "Tuticorin", "Vilathikulam"],
"Vellore": ["Arakkonam", "Arcot", "Arni", "Gudiyatham", "Katpadi", "Tirupathur", "Vandavasi", "Vaniyambadi", "Vellore", "Vellore Taluk", "Walajapet Taluk"],
"Villupuram": ["Chinnasalem Taluk", "Gingee", "Kallakurichi", "Kallakurichi", "Nettapakkam Communue Panchayat", "Panruti", "Sankapuram", "Tindivanam", "Tirukkoyilur", "Ulundurpet", "Vanur", "Villupuram"],
"Virudhunagar": ["Aruppukottai", "Kariapatti", "Rajapalayam", "Sattur", "Sivakasi", "Srivilliputhur", "Tiruchuli", "Virudhunagar"]

}
-->