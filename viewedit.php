
                    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
    <style>
        :root {
            --gradient-bg: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
            --card-bg: #ffffff;
            --primary: #4f46e5;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --border: #cbd5e1;
            --success: #10b981;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            background: var(--gradient-bg);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .profile-card {
            background: var(--card-bg);
            width: 100%;
            max-width: 500px;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
            overflow: hidden;
        }

        .profile-header {
            background: linear-gradient(135deg, #3b82f6 0%, #4f46e5 100%);
            padding: 25px;
            text-align: center;
            color: white;
        }

        .profile-body {
            padding: 30px;
        }

        .info-list {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .field-box {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .field-box label {
            font-size: 11px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .view-text {
            font-size: 15px;
            font-weight: 600;
            color: var(--text-dark);
            padding: 8px 0;
            border-bottom: 1.5px solid #f1f5f9;
        }

        .edit-input {
            display: none;
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--border);
            border-radius: 6px;
            font-size: 15px;
            color: var(--text-dark);
            outline: none;
            background: #fff;
        }

        .btn-container {
            margin-top: 30px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-edit {
            background: var(--primary);
            color: white;
        }

        .edit-actions-group {
            display: none;
            gap: 12px;
        }

        .btn-save { background: var(--success); color: white; flex: 1; }
        .btn-cancel { background: #e2e8f0; color: var(--text-muted); flex: 1; }

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
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 10px;
            color: #f8fafc;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .site-back-btn:hover {
            background: rgba(255,255,255,0.2);
        }
        .site-topbar-title {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.5px;
            color: #cbd5e1;
            text-transform: uppercase;
        }
        body { padding-top: 90px; }
    </style>
</head>
<body>

    <div class="site-topbar">
        <a href="userdashboard.php" class="site-back-btn">&larr; Back</a>
        <span class="site-topbar-title">Employee Record Management System</span>
    </div>

    <div class="profile-card">
        <div class="profile-header">
            <h2 id="topHeaderName">Alex Jones</h2>
        </div>

        <div class="profile-body">
            <div class="info-list">
                
                <div class="field-box hide-field">
                    <label>Employee ID</label>
                    <div class="view-text">EMP001</div>
                </div>

                <div class="field-box">
                    <label>Full Name</label>
                    <div class="view-text" id="vName">Deepika V</div>
                    <input type="text" class="edit-input" id="iName" value="Alex Jones">
                </div>

                <div class="field-box">
                    <label>Gender</label>
                    <div class="view-text" id="vGender">Male</div>
                    <select class="edit-input" id="iGender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="field-box">
                    <label>Date of Birth</label>
                    <div class="view-text" id="vDob">23.05.2005</div>
                    <input type="text" class="edit-input" id="iDob" value="15-07-1998">
                </div>

                <div class="field-box">
                    <label>Mobile Number</label>
                    <div class="view-text" id="vMobile">+91 9876543210</div>
                    <input type="text" class="edit-input" id="iMobile" value="+91 98765 43210">
                </div>

                <div class="field-box">
                    <label>Email Address</label>
                    <div class="view-text" id="vEmail">deepi23@gmail.com</div>
                    <input type="email" class="edit-input" id="iEmail" value="alex.jones@company.com">
                </div>

                <div class="field-box">
                    <label>Address</label>
                    <div class="view-text" id="vAddress">153,Gobichettipalayam</div>
                    <input type="text" class="edit-input" id="iAddress" value="42, Tech Park Street, Coimbatore">
                </div>

                <div class="field-box hide-field">
                    <label>Department</label>
                    <div class="view-text">it
                    </div>
                </div>

                <div class="field-box hide-field">
                    <label>Designation</label>
                    <div class="view-text">Software Developer</div>
                </div>

                <div class="field-box hide-field">
                    <label>Date of Joining</label>
                    <div class="view-text">1-07-2026</div>
                </div>

                <div class="field-box hide-field">
                    <label>Monthly Salary</label>
                    <div class="view-text">₹25,000</div>
                </div>

            </div>

            <div class="btn-container">
                <button class="btn btn-edit" id="editProfileBtn" onclick="startEdit()">Edit Profile</button>
                <div class="edit-actions-group" id="editActionsGroup">
                    <button class="btn btn-cancel" onclick="stopEdit(false)">Cancel</button>
                    <button class="btn btn-save" onclick="stopEdit(true)">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function startEdit() {
            var hiddenFields = document.querySelectorAll('.hide-field');
            for(var i = 0; i < hiddenFields.length; i++) {
                hiddenFields[i].style.display = 'none';
            }

            var views = ['vName', 'vGender', 'vDob', 'vMobile', 'vEmail', 'vAddress'];
            for(var j = 0; j < views.length; j++) {
                document.getElementById(views[j]).style.display = 'none';
            }

            var inputs = ['iName', 'iGender', 'iDob', 'iMobile', 'iEmail', 'iAddress'];
            for(var k = 0; k < inputs.length; k++) {
                document.getElementById(inputs[k]).style.display = 'block';
            }

            document.getElementById('editProfileBtn').style.display = 'none';
            document.getElementById('editActionsGroup').style.display = 'flex';
        }

        function stopEdit(isSave) {
            var fields = ['Name', 'Gender', 'Dob', 'Mobile', 'Email', 'Address'];

            if (isSave === true) {
                for(var m = 0; m < fields.length; m++) {
                    var inputVal = document.getElementById('i' + fields[m]).value;
                    document.getElementById('v' + fields[m]).innerText = inputVal;
                }
                document.getElementById('topHeaderName').innerText = document.getElementById('iName').value;
            } else {
                for(var n = 0; n < fields.length; n++) {
                    var viewTxt = document.getElementById('v' + fields[n]).innerText;
                    document.getElementById('i' + fields[n]).value = viewTxt;
                }
            }

            var hiddenFields = document.querySelectorAll('.hide-field');
            for(var i = 0; i < hiddenFields.length; i++) {
                hiddenFields[i].style.display = 'flex';
            }

            var views = ['vName', 'vGender', 'vDob', 'vMobile', 'vEmail', 'vAddress'];
            for(var j = 0; j < views.length; j++) {
                document.getElementById(views[j]).style.display = 'block';
            }

            var inputs = ['iName', 'iGender', 'iDob', 'iMobile', 'iEmail', 'iAddress'];
            for(var k = 0; k < inputs.length; k++) {
                document.getElementById(inputs[k]).style.display = 'none';
            }

            document.getElementById('editProfileBtn').style.display = 'block';
            document.getElementById('editActionsGroup').style.display = 'none';
        }
    </script>
</body>
</html>
