
    

        
   <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Employee Management Pro</title>

<style>
body{
    margin:0;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #74ebd5, #ACB6E5);
    min-height:100vh;
    padding:20px;
}

/* Main Card */
.container{
    max-width:1100px;
    margin:auto;
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

/* Title */
h2{
    text-align:center;
    color:#333;
    margin-bottom:20px;
}

/* Form */
form{
    display:grid;
    grid-template-columns: repeat(3,1fr);
    gap:12px;
    margin-bottom:20px;
}

form input, form select{
    padding:10px;
    border:1px solid #ddd;
    border-radius:8px;
    outline:none;
    transition:0.3s;
    font-family: inherit;
    font-size:14px;
    background:white;
    color:#333;
}

form input:focus, form select:focus{
    border-color:#4facfe;
    box-shadow:0 0 5px rgba(79,172,254,0.5);
}

/* Buttons */
.btn{
    padding:10px;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-weight:bold;
    transition:0.3s;
}

.add-btn{
    background:#28a745;
    color:white;
}

.add-btn:hover{background:#218838;}

.update-btn{
    background:#007bff;
    color:white;
}

.update-btn:hover{background:#0056b3;}

/* Table */
table{
    width:100%;
    border-collapse:collapse;
    overflow:hidden;
    border-radius:10px;
}

th{
    background:linear-gradient(90deg,#007bff,#00c6ff);
    color:white;
    padding:12px;
}

td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #eee;
}

tr:hover{
    background:#f1f7ff;
}

/* Action buttons */
.actions-cell{
    display:flex;
    flex-wrap:wrap;
    gap:6px;
    justify-content:center;
    min-width:180px;
}

.action-btn{
    padding:6px 10px;
    border:none;
    border-radius:6px;
    cursor:pointer;
    color:white;
    font-size:12px;
    white-space:nowrap;
}

.edit{background:#ffc107;}
.view{background:#17a2b8;}
.delete{background:#dc3545;}

/* View Modal */
.modal-overlay{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.5);
    display:none;
    align-items:center;
    justify-content:center;
    z-index:100;
}

.modal-overlay.show{
    display:flex;
}

.modal-box{
    background:white;
    width:90%;
    max-width:420px;
    border-radius:12px;
    padding:22px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

.modal-box h3{
    margin-top:0;
    color:#333;
    text-align:center;
    border-bottom:1px solid #eee;
    padding-bottom:10px;
}

.modal-row{
    display:flex;
    justify-content:space-between;
    padding:8px 0;
    border-bottom:1px solid #f5f5f5;
    font-size:14px;
}

.modal-row span:first-child{
    color:#888;
    font-weight:bold;
}

.modal-row span:last-child{
    color:#333;
    text-align:right;
}

.modal-close-btn{
    margin-top:16px;
    width:100%;
    padding:10px;
    border:none;
    border-radius:8px;
    background:#6c757d;
    color:white;
    font-weight:bold;
    cursor:pointer;
}

.modal-close-btn:hover{background:#5a6268;}

/* Name field + suggestion box */
.name-wrap{
    position:relative;
}

.name-wrap input{
    width:100%;
    box-sizing:border-box;
}

.suggestion-box{
    position:absolute;
    top:calc(100% + 4px);
    left:0;
    width:100%;
    background:white;
    border:1px solid #ddd;
    border-radius:8px;
    box-shadow:0 6px 16px rgba(0,0,0,0.15);
    max-height:180px;
    overflow-y:auto;
    z-index:10;
    display:none;
}

.suggestion-box.show{
    display:block;
}

.suggestion-item{
    padding:10px;
    cursor:pointer;
    text-align:left;
    font-size:14px;
    color:#333;
    border-bottom:1px solid #f0f0f0;
}

.suggestion-item:last-child{
    border-bottom:none;
}

.suggestion-item:hover{
    background:#f1f7ff;
}

.suggestion-item small{
    display:block;
    color:#888;
    font-size:11px;
}

.suggestion-item .sug-label{
    color:#555;
    font-weight:normal;
}

.suggestion-item .sug-value{
    color:#222;
    font-weight:bold;
}

/* Search section */
.search-section{
    max-width:400px;
    margin:0 auto 20px auto;
}

.search-section label{
    display:block;
    font-size:13px;
    font-weight:bold;
    color:#555;
    margin-bottom:6px;
}

.search-wrap{
    position:relative;
}

.search-wrap input{
    width:100%;
    box-sizing:border-box;
    padding:10px;
    border:1px solid #ddd;
    border-radius:8px;
    outline:none;
    font-size:14px;
}

.search-wrap input:focus{
    border-color:#4facfe;
    box-shadow:0 0 5px rgba(79,172,254,0.5);
}

.site-topbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 24px;
    background: rgba(15, 23, 42, 0.9);
    backdrop-filter: blur(12px);
    box-sizing: border-box;
    z-index: 1000;
}
.site-back-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 16px;
    background: rgba(255,255,255,0.15);
    border: 1px solid rgba(255,255,255,0.25);
    border-radius: 10px;
    color: #ffffff;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
}
.site-back-btn:hover {
    background: rgba(255,255,255,0.28);
}
.site-topbar-title {
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.5px;
    color: #ffffff;
    text-transform: uppercase;
}
body { padding-top: 70px; }
</style>
</head>

<body>

<div class="site-topbar">
    <a href="admin3.php" class="site-back-btn">&larr; Back</a>
    <span class="site-topbar-title">Employee Record Management System</span>
</div>

<div class="container">

<h2>Employee Management System</h2>

<!-- SEARCH BY NAME (separate from Add form, side suggestion box) -->
<div class="search-section">
    <label>Search Employee by Name</label>
    <div class="search-wrap">
        <input type="text" id="searchName" placeholder="Type a name..." autocomplete="off">
        <div class="suggestion-box" id="searchSuggestions"></div>
    </div>
</div>

<!-- FORM -->
<form id="empForm">

<input type="text" id="empId" placeholder="Employee ID" required>

<!-- Name field with side suggestion box -->
<div class="name-wrap">
<input type="text" id="name" placeholder="Name" autocomplete="off" required>
<div class="suggestion-box" id="nameSuggestions"></div>
</div>

<!-- Gender changed from text input to dropdown -->
<select id="gender" required>
    <option value="" disabled selected>Select Gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
</select>

<input type="date" id="dob" required>
<input type="text" id="mobile" placeholder="Mobile" required>
<input type="email" id="email" placeholder="Email" required>
<input type="text" id="address" placeholder="Address" required>
<input type="text" id="dept" placeholder="Department" required>
<input type="text" id="desig" placeholder="Designation" required>
<input type="date" id="doj" required>
<input type="number" id="salary" placeholder="Salary" required>

<!-- BUTTONS -->
<button type="submit" class="btn add-btn">Add</button>
<button type="button" class="btn update-btn" onclick="updateEmployee()">Update</button>

</form>

<!-- TABLE -->
<table>
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Gender</th>
<th>DOB</th>
<th>Mobile</th>
<th>Email</th>
<th>Dept</th>
<th>Designation</th>
<th>Salary</th>
<th>Actions</th>
</tr>
</thead>

<tbody id="tableBody"></tbody>
</table>

</div>

<!-- VIEW MODAL -->
<div class="modal-overlay" id="viewModal">
    <div class="modal-box">
        <h3>Employee Details</h3>
        <div id="viewModalBody"></div>
        <button class="modal-close-btn" onclick="closeViewModal()">Close</button>
    </div>
</div>

<script>

let employees = [
{
empId:"EMP001",
name:"Deepika V",
gender:"Female",
dob:"2005-04-23",
mobile:"9876543210",
email:"deepi23@gmail.com",
address:"123,Gobichettipalayam",
dept:"IT",
desig:"Software Developer",
doj:"2025-07-01",
salary:25000
}
];

let editIndex = -1;

const form = document.getElementById("empForm");

function render(){
    const tbody = document.getElementById("tableBody");
    tbody.innerHTML="";

    employees.forEach((emp,index)=>{
        tbody.innerHTML += `
        <tr>
        <td>${emp.empId}</td>
        <td>${emp.name}</td>
        <td>${emp.gender}</td>
        <td>${emp.dob}</td>
        <td>${emp.mobile}</td>
        <td>${emp.email}</td>
        <td>${emp.dept}</td>
        <td>${emp.desig}</td>
        <td>${emp.salary}</td>
        <td>
            <div class="actions-cell">
                <button class="action-btn view" onclick="viewEmp(${index})">View</button>
                <button class="action-btn edit" onclick="editEmp(${index})">Edit</button>
                <button class="action-btn delete" onclick="deleteEmp(${index})">Delete</button>
            </div>
        </td>
        </tr>
        `;
    });
}

/* ADD */
form.addEventListener("submit",function(e){
    e.preventDefault();

    // FIX: removed the broken statement that was sitting inside the
    // object literal (was causing a JS syntax error, so Add never worked).
    const emp = {
        empId: document.getElementById("empId").value,
        name: document.getElementById("name").value,
        gender: document.getElementById("gender").value,
        dob: document.getElementById("dob").value,
        mobile: document.getElementById("mobile").value,
        email: document.getElementById("email").value,
        address: document.getElementById("address").value,
        dept: document.getElementById("dept").value,
        desig: document.getElementById("desig").value,
        doj: document.getElementById("doj").value,
        salary: document.getElementById("salary").value
    };

    employees.push(emp);
    form.reset();
    render();
});

/* EDIT */
function editEmp(index){
    let emp = employees[index];

    document.getElementById("empId").value = emp.empId;
    document.getElementById("name").value = emp.name;
    document.getElementById("gender").value = emp.gender;
    document.getElementById("dob").value = emp.dob;
    document.getElementById("mobile").value = emp.mobile;
    document.getElementById("email").value = emp.email;
    document.getElementById("address").value = emp.address;
    document.getElementById("dept").value = emp.dept;
    document.getElementById("desig").value = emp.desig;
    document.getElementById("doj").value = emp.doj;
    document.getElementById("salary").value = emp.salary;

    editIndex = index;
}

/* UPDATE BUTTON */
function updateEmployee(){
    if(editIndex === -1){
        alert("Please click Edit first!");
        return;
    }

    employees[editIndex] = {
        empId: document.getElementById("empId").value,
        name: document.getElementById("name").value,
        gender: document.getElementById("gender").value,
        dob: document.getElementById("dob").value,
        mobile: document.getElementById("mobile").value,
        email: document.getElementById("email").value,
        address: document.getElementById("address").value,
        dept: document.getElementById("dept").value,
        desig: document.getElementById("desig").value,
        doj: document.getElementById("doj").value,
        salary: document.getElementById("salary").value
    };

    form.reset();
    editIndex = -1;
    render();
}

/* VIEW */
function viewEmp(index){
    const emp = employees[index];
    const modalBody = document.getElementById("viewModalBody");

    modalBody.innerHTML = `
        <div class="modal-row"><span>Employee ID</span><span>${emp.empId}</span></div>
        <div class="modal-row"><span>Name</span><span>${emp.name}</span></div>
        <div class="modal-row"><span>Gender</span><span>${emp.gender}</span></div>
        <div class="modal-row"><span>DOB</span><span>${emp.dob}</span></div>
        <div class="modal-row"><span>Mobile</span><span>${emp.mobile}</span></div>
        <div class="modal-row"><span>Email</span><span>${emp.email}</span></div>
        <div class="modal-row"><span>Address</span><span>${emp.address}</span></div>
        <div class="modal-row"><span>Department</span><span>${emp.dept}</span></div>
        <div class="modal-row"><span>Designation</span><span>${emp.desig}</span></div>
        <div class="modal-row"><span>Date of Joining</span><span>${emp.doj}</span></div>
        <div class="modal-row"><span>Salary</span><span>${emp.salary}</span></div>
    `;

    document.getElementById("viewModal").classList.add("show");
}

function closeViewModal(){
    document.getElementById("viewModal").classList.remove("show");
}

/* Close modal when clicking outside the box */
document.getElementById("viewModal").addEventListener("click", function(e){
    if(e.target === this){
        closeViewModal();
    }
});

/* DELETE */
function deleteEmp(index){
    employees.splice(index,1);
    render();
}

/* NAME SUGGESTION BOX */
const nameInput = document.getElementById("name");
const suggestionBox = document.getElementById("nameSuggestions");

nameInput.addEventListener("input", function(){
    const query = nameInput.value.trim().toLowerCase();

    if(query === ""){
        suggestionBox.classList.remove("show");
        suggestionBox.innerHTML = "";
        return;
    }

    const matches = employees
        .map((emp, index) => ({ emp, index }))
        .filter(item => item.emp.name.toLowerCase().includes(query));

    if(matches.length === 0){
        suggestionBox.classList.remove("show");
        suggestionBox.innerHTML = "";
        return;
    }

    suggestionBox.innerHTML = matches.map(item => `
        <div class="suggestion-item" data-index="${item.index}">
            <span class="sug-label">Name:</span> <span class="sug-value">${item.emp.name}</span>
            <small>
                <span class="sug-label">ID:</span> ${item.emp.empId}
                &nbsp;|&nbsp;
                <span class="sug-label">Dept:</span> ${item.emp.dept}
                &nbsp;|&nbsp;
                <span class="sug-label">Mobile:</span> ${item.emp.mobile}
            </small>
        </div>
    `).join("");

    suggestionBox.classList.add("show");
});

/* Click a suggestion -> fill the whole form (reuses editEmp) */
suggestionBox.addEventListener("click", function(e){
    const item = e.target.closest(".suggestion-item");
    if(!item) return;

    const index = Number(item.dataset.index);
    editEmp(index);

    suggestionBox.classList.remove("show");
    suggestionBox.innerHTML = "";
});

/* Hide suggestions when clicking anywhere else */
document.addEventListener("click", function(e){
    if(!e.target.closest(".name-wrap")){
        suggestionBox.classList.remove("show");
    }
});

/* SEARCH BOX (separate from Add form's name field) */
const searchInput = document.getElementById("searchName");
const searchSuggestions = document.getElementById("searchSuggestions");

searchInput.addEventListener("input", function(){
    const query = searchInput.value.trim().toLowerCase();

    if(query === ""){
        searchSuggestions.classList.remove("show");
        searchSuggestions.innerHTML = "";
        return;
    }

    const matches = employees
        .map((emp, index) => ({ emp, index }))
        .filter(item => item.emp.name.toLowerCase().includes(query));

    if(matches.length === 0){
        searchSuggestions.innerHTML = `<div class="suggestion-item">No matching employee</div>`;
        searchSuggestions.classList.add("show");
        return;
    }

    searchSuggestions.innerHTML = matches.map(item => `
        <div class="suggestion-item" data-index="${item.index}">
            <span class="sug-label">Name:</span> <span class="sug-value">${item.emp.name}</span>
            <small>
                <span class="sug-label">ID:</span> ${item.emp.empId}
                &nbsp;|&nbsp;
                <span class="sug-label">Dept:</span> ${item.emp.dept}
                &nbsp;|&nbsp;
                <span class="sug-label">Mobile:</span> ${item.emp.mobile}
            </small>
        </div>
    `).join("");

    searchSuggestions.classList.add("show");
});

/* Click a search suggestion -> open View modal (read-only, doesn't touch the Add form) */
searchSuggestions.addEventListener("click", function(e){
    const item = e.target.closest(".suggestion-item");
    if(!item || item.dataset.index === undefined) return;

    const index = Number(item.dataset.index);
    viewEmp(index);

    searchSuggestions.classList.remove("show");
    searchInput.value = "";
});

document.addEventListener("click", function(e){
    if(!e.target.closest(".search-wrap")){
        searchSuggestions.classList.remove("show");
    }
});

render();

</script>

</body>
</html>
