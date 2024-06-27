<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding: 30px;
            width: 90%;
            max-width: 900px;
            margin: 30px auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 12px 15px;
            box-sizing: border-box;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
            border-color: #007BFF;
            outline: none;
        }
        .form-group textarea {
            height: 120px;
        }
        .buttons-container {
            margin-bottom: 20px;
        }
        .profile-button {
            border: none;
            border-radius: 10px;
            padding: 15px;
            margin: 10px 0;
            font-size: 1em;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.3s;
            background-color: #007BFF;
            color: #fff;
            width: 100%;
            box-sizing: border-box;
            text-decoration: none;
        }
        .profile-button:hover {
            transform: scale(1.05);
            background-color: #0056b3;
        }
        .profile-button .icon {
            font-size: 1.2em;
            margin-right: 10px;
        }
        .collapsible {
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
            padding: 12px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 16px;
            margin-bottom: 10px;
            border-radius: 8px;
            transition: background-color 0.3s;
            box-sizing: border-box;
        }
        .active, .collapsible:hover {
            background-color: #0056b3;
        }
        .content {
            padding: 0 18px;
            display: none;
            overflow: hidden;
            background-color: #f9f9f9;
            margin-bottom: 10px;
            box-sizing: border-box;
            border-radius: 8px;
        }
        .fa-icon {
            margin-right: 10px;
        }
        .button-preview {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e0f7fa;
            border-radius: 10px;
            padding: 15px;
            width: 100%;
            margin: 10px 0;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }
        .button-preview i {
            margin-right: 10px;
        }
        .custom-select {
            position: relative;
            display: inline-block;
            width: 100%;
            box-sizing: border-box;
        }
        .custom-select select {
            display: none; /*hide original select element*/
        }
        .select-selected {
            background-color: #e0f7fa;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            user-select: none;
            box-sizing: border-box;
        }
        .select-items {
            position: absolute;
            background-color: white;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 99;
            border: 1px solid #ddd;
            border-radius: 8px;
            max-height: 200px;
            overflow-y: auto;
            display: none;
            box-sizing: border-box;
        }
        .select-items div:hover, .same-as-selected {
            background-color: #ccc;
        }
        .select-arrow-active::after {
            content: "▲";
        }
        .select-selected::after {
            content: "▼";
            float: right;
            margin-left: 10px;
        }
        @media (max-width: 600px) {
            body {
                background-color: white;
            }
            .container {
                padding: 15px;
            }
            .profile-wrapper {
                width: 100%;
                padding: 10px;
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .profile-right {
                margin-top: 20px;
                border-top: 1px solid #ddd;
                padding-top: 20px;
                width: 100%;
                box-sizing: border-box;
            }
        }
        @media (min-width: 600px) {
            .container {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .profile-wrapper {
                width: 100%;
                padding: 20px;
                display: flex;
                flex-direction: row;
                justify-content: center;
            }
            .profile-left, .profile-right {
                width: 100%;
                padding: 20px;
                box-sizing: border-box;
                max-width: 450px; /* Ensuring each section doesn't exceed half the container's width */
            }
            .profile-left {
                border-right: 1px solid #ddd;
            }
        }
        .profile-info {
            text-align: center;
        }
        .profile-pic img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 0 auto;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
            box-sizing: border-box;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 90%;
            max-width: 600px;
            box-sizing: border-box;
            border-radius: 15px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .button-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        .separator {
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <?php wp_enqueue_script('jquery'); ?>
</head>
<body>
    <div class="container">
        <div class="profile-wrapper">
            <div class="profile-left">
                <h1>Create Profile</h1>
                <div class="form-group">
                    <label for="profileImage">Profile Image URL or Upload:</label>
                    <input type="text" id="profileImageUrl" placeholder="Enter image URL">
                    <input type="file" id="profileImageFile" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="customerName">Your Name:</label>
                    <input type="text" id="customerName">
                </div>
                <button type="button" class="collapsible" onclick="toggleDropdown('nameSizeColor')">Size and Color</button>
                <div class="content" id="nameSizeColor">
                    <div class="form-group">
                        <label for="customerNameSize">Name Size:</label>
                        <input type="number" id="customerNameSize" value="16" min="10" max="72">
                    </div>
                    <div class="form-group">
                        <label for="customerNameColor">Name Color:</label>
                        <div class="color-picker-container">
                            <input type="color" id="customerNameColor" value="#000000">
                            <div class="color-preview" id="nameColorPreview" style="background-color: #000000;"></div>
                            <div class="color-code" id="nameColorCode">Color Code: #000000</div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="customerDescription">Description (Markdown Supported):</label>
                    <textarea id="customerDescription" placeholder="Enter description with Markdown support..."></textarea>
                </div>
                <button type="button" class="collapsible" onclick="toggleDropdown('descriptionSizeColor')">Size and Color</button>
                <div class="content" id="descriptionSizeColor">
                    <div class="form-group">
                        <label for="customerDescriptionSize">Description Size:</label>
                        <input type="number" id="customerDescriptionSize" value="14" min="10" max="72">
                    </div>
                    <div class="form-group">
                        <label for="customerDescriptionColor">Description Color:</label>
                        <div class="color-picker-container">
                            <input type="color" id="customerDescriptionColor" value="#000000">
                            <div class="color-preview" id="descriptionColorPreview" style="background-color: #000000;"></div>
                            <div class="color-code" id="descriptionColorCode">Color Code: #000000</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="markdownHelp">Markdown Help:</label>
                        <select id="markdownHelp" onchange="showMarkdownHelp()">
                            <option value="">Select a Markdown format...</option>
                            <option value="**Bold**">**Bold**</option>
                            <option value="*Italic*">*Italic*</option>
                            <option value="_Italic_">_Italic_</option>
                            <option value="***Bold Italic***">***Bold Italic***</option>
                            <option value="__Underline__">__Underline__</option>
                            <option value="[Link text](any valid URL)">[Link text](any valid URL)</option>
                            <option value="\`Code\`">`Code`</option>
                            <option value="~~Strike~~">~~Strike~~</option>
                            <option value="==Highlight==">==Highlight==</option>
                            <option value="||Spoilers||">||Spoilers||</option>
                            <option value="[Color text]{colorname}">[Color text]{colorname}</option>
                            <option value="[Color text]{#colorcode}">[Color text]{#colorcode}</option>
                            <option value="Line\nBreak">Line\nBreak</option>
                            <option value="Non-Breaking\sSpace">Non-Breaking\sSpace</option>
                        </select>
                        <div id="markdownHelpDisplay" style="margin-top: 10px;"></div>
                    </div>
                </div>
                <button type="button" class="collapsible" onclick="toggleDropdown('personalMedicalInfo')">Personal and Medical Information</button>
                <div class="content" id="personalMedicalInfo">
                    <div class="form-group">
                        <label for="medicalTabLabel">Medical Tab Label:</label>
                        <input type="text" id="medicalTabLabel" placeholder="Enter label for medical tab" value="Medical Information">
                    </div>
                    <button type="button" class="collapsible" onclick="toggleDropdown('medicalTabSizeColor')">Medical Tab Size and Color</button>
                    <div class="content" id="medicalTabSizeColor">
                        <div class="form-group">
                            <label for="medicalTabLabelSize">Label Size:</label>
                            <input type="number" id="medicalTabLabelSize" value="16" min="10" max="72">
                        </div>
                        <div class="form-group">
                            <label for="medicalTabLabelColor">Label Color:</label>
                            <div class="color-picker-container">
                                <input type="color" id="medicalTabLabelColor" value="#000000">
                                <div class="color-preview" id="medicalTabLabelColorPreview" style="background-color: #000000;"></div>
                                <div class="color-code" id="medicalTabLabelColorCode">Color Code: #000000</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="medicalTabBackgroundColor">Label Background Color:</label>
                            <div class="color-picker-container">
                                <input type="color" id="medicalTabBackgroundColor" value="#007BFF">
                                <div class="color-preview" id="medicalTabBackgroundColorPreview" style="background-color: #007BFF;"></div>
                                <div class="color-code" id="medicalTabBackgroundColorCode">Color Code: #007BFF</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Personal Details:</label>
                        <input type="text" id="personalAge" placeholder="Age">
                        <input type="text" id="personalSex" placeholder="Sex">
                    </div>
                    <div class="separator"></div>
                    <div class="form-group">
                        <label>Medical History:</label>
                        <input type="text" id="medicalAllergies" placeholder="Allergies (medications, food, dyes, latex, etc.)">
                        <input type="text" id="medicalMedications" placeholder="Current medications, including dosages and schedules">
                        <input type="text" id="medicalConditions" placeholder="Pre-existing medical conditions (e.g., diabetes, asthma, heart conditions)">
                        <input type="text" id="medicalImmunization" placeholder="Immunization records">
                        <input type="text" id="medicalSurgeries" placeholder="Recent surgeries or hospitalizations">
                        <input type="text" id="medicalFamilyHistory" placeholder="Family medical history">
                    </div>
                    <div class="separator"></div>
                    <div class="form-group">
                        <label>Additional Information:</label>
                        <input type="text" id="additionalWeight" placeholder="Weight (important for medication dosages)">
                        <input type="text" id="additionalEquipment" placeholder="Medical equipment used (e.g., insulin pump, pacemaker)">
                        <input type="text" id="additionalPhysicians" placeholder="Names and contact information of primary care physicians and specialists">
                    </div>
                    <button type="button" class="collapsible" onclick="toggleDropdown('medicalInfoSizeColor')">Size and Color</button>
                    <div class="content" id="medicalInfoSizeColor">
                        <div class="form-group">
                            <label for="medicalInfoSize">Medical Information Size:</label>
                            <input type="number" id="medicalInfoSize" value="14" min="10" max="72">
                        </div>
                        <div class="form-group">
                            <label for="medicalInfoColor">Medical Information Color:</label>
                            <div class="color-picker-container">
                                <input type="color" id="medicalInfoColor" value="#000000">
                                <div class="color-preview" id="medicalInfoColorPreview" style="background-color: #000000;"></div>
                                <div class="color-code" id="medicalInfoColorCode">Color Code: #000000</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-right">
                <div class="buttons-container" id="buttonsContainer"></div>
                <button type="button" class="profile-button" onclick="addButton()">Add Button</button>
                <div class="button-row">
                    <button class="profile-button" id="previewButton" onclick="openModal()">Preview Profile</button>
                    <button class="profile-button" id="generateButton">Generate Profile</button>
                    <button class="profile-button" id="emailButton" onclick="emailProfile()">Email Profile</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Profile Preview -->
    <div id="profileModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div id="profilePreview"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('generateButton').addEventListener('click', generateProfile);
            document.getElementById('profileImageFile').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('profileImageUrl').value = e.target.result;
                        updateImagePreview(e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            document.getElementById('customerNameColor').addEventListener('input', function() {
                const color = this.value;
                document.getElementById('nameColorPreview').style.backgroundColor = color;
                document.getElementById('nameColorCode').textContent = 'Color Code: ' + color;
                this.style.backgroundColor = color;
            });
            document.getElementById('customerDescriptionColor').addEventListener('input', function() {
                const color = this.value;
                document.getElementById('descriptionColorPreview').style.backgroundColor = color;
                document.getElementById('descriptionColorCode').textContent = 'Color Code: ' + color;
                this.style.backgroundColor = color;
            });
            document.getElementById('medicalInfoColor').addEventListener('input', function() {
                const color = this.value;
                document.getElementById('medicalInfoColorPreview').style.backgroundColor = color;
                document.getElementById('medicalInfoColorCode').textContent = 'Color Code: ' + color;
                this.style.backgroundColor = color;
            });
            document.getElementById('medicalTabLabelColor').addEventListener('input', function() {
                const color = this.value;
                document.getElementById('medicalTabLabelColorPreview').style.backgroundColor = color;
                document.getElementById('medicalTabLabelColorCode').textContent = 'Color Code: ' + color;
                this.style.backgroundColor = color;
            });
            document.getElementById('medicalTabBackgroundColor').addEventListener('input', function() {
                const color = this.value;
                document.getElementById('medicalTabBackgroundColorPreview').style.backgroundColor = color;
                document.getElementById('medicalTabBackgroundColorCode').textContent = 'Color Code: ' + color;
                this.style.backgroundColor = color;
            });

            // Cache Busting
            const timestamp = new Date().getTime();
            const links = document.querySelectorAll('link[rel="stylesheet"], script[src]');
            
            links.forEach(link => {
                const url = new URL(link.href || link.src);
                url.searchParams.set('v', timestamp);
                if (link.tagName === 'LINK') {
                    link.href = url.toString();
                } else if (link.tagName === 'SCRIPT') {
                    link.src = url.toString();
                }
            });
        });

        function updateImagePreview(imageUrl) {
            const imgElement = document.querySelectorAll('#profileImagePreview');
            imgElement.forEach(function(element){
                element.src = imageUrl;
            });
        }

        function addButton() {
            const container = document.getElementById('buttonsContainer');
            const div = document.createElement('div');
            div.className = 'form-group';
            const buttonId = `button-${Date.now()}`;
            div.innerHTML = `
                <button type="button" class="collapsible">New Button</button>
                <div class="content">
                    <label>Button Label:</label>
                    <input type="text" class="button-label" placeholder="Enter button label" oninput="updateButtonTitle(this)">
                    <label>Button Icon:</label>
                    <div class="custom-select">
                        <div class="select-selected">Select an icon</div>
                        <div class="select-items">
                            <div data-value="fa-map-marker-alt"><i class="fas fa-map-marker-alt"></i> Location</div>
                            <div data-value="fa-phone-alt"><i class="fas fa-phone-alt"></i> Mobile</div>
                            <div data-value="fa-envelope"><i class="fas fa-envelope"></i> Email</div>
                            <div data-value="fa-facebook"><i class="fab fa-facebook"></i> Facebook</div>
                            <div data-value="fa-instagram"><i class="fab fa-instagram"></i> Instagram</div>
                            <div data-value="fa-whatsapp"><i class="fab fa-whatsapp"></i> WhatsApp</div>
                        </div>
                    </div>
                    <label>Button URL:</label>
                    <input type="text" class="button-url" placeholder="Enter button URL">
                    <div class="form-group">
                        <label>Button Background Color:</label>
                        <div class="color-picker-container">
                            <input type="color" class="button-color" value="#e0f7fa" oninput="updateButtonColor(this, '${buttonId}')">
                            <div class="color-preview" id="${buttonId}-bg-preview" style="background-color: #e0f7fa;"></div>
                            <div class="color-code" id="${buttonId}-bg-code">Color Code: #e0f7fa</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Button Label Color:</label>
                        <div class="color-picker-container">
                            <input type="color" class="button-label-color" value="#000000" oninput="updateButtonLabelColor(this, '${buttonId}')">
                            <div class="color-preview" id="${buttonId}-label-preview" style="background-color: #000000;"></div>
                            <div class="color-code" id="${buttonId}-label-code">Color Code: #000000</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Button Icon Color:</label>
                        <div class="color-picker-container">
                            <input type="color" class="button-icon-color" value="#000000" oninput="updateButtonIconColor(this, '${buttonId}')">
                            <div class="color-preview" id="${buttonId}-icon-preview" style="background-color: #000000;"></div>
                            <div class="color-code" id="${buttonId}-icon-code">Color Code: #000000</div>
                        </div>
                    </div>
                    <div class="button-preview profile-button" id="${buttonId}-preview">
                        <i class="fa-icon fas"></i>
                        <span class="button-preview-label">New Button</span>
                    </div>
                    <button type="button" class="profile-button" onclick="deleteButton(this)">Delete Button</button>
                </div>
            `;
            container.appendChild(div);

            initCustomSelect(div.querySelector('.custom-select'));
            initCollapsible(div.querySelector('.collapsible'));
        }

        function initCollapsible(button) {
            button.addEventListener('click', function() {
                this.classList.toggle('active');
                const content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }

        function initCustomSelect(selectDiv) {
            const selected = selectDiv.querySelector('.select-selected');
            const items = selectDiv.querySelector('.select-items');
            const options = items.querySelectorAll('div');

            selected.addEventListener('click', function() {
                closeAllSelect(this);
                items.style.display = items.style.display === 'block' ? 'none' : 'block';
                selected.classList.toggle('select-arrow-active');
            });

            options.forEach(option => {
                option.addEventListener('click', function() {
                    selected.innerHTML = this.innerHTML;
                    selected.setAttribute('data-value', this.getAttribute('data-value'));
                    items.style.display = 'none';
                    selected.classList.remove('select-arrow-active');

                    const icon = selectDiv.closest('.form-group').querySelector('.button-preview .fa-icon');
                    icon.className = `fa-icon fas ${this.getAttribute('data-value')}`;
                });
            });

            document.addEventListener('click', function(e) {
                if (!selectDiv.contains(e.target)) {
                    items.style.display = 'none';
                    selected.classList.remove('select-arrow-active');
                }
            });
        }

        function closeAllSelect(elmnt) {
            const items = document.querySelectorAll('.select-items');
            const selected = document.querySelectorAll('.select-selected');
            for (let i = 0; i < selected.length; i++) {
                if (elmnt == selected[i]) {
                    continue;
                }
                selected[i].classList.remove('select-arrow-active');
            }
            for (let i = 0; i < items.length; i++) {
                items[i].style.display = 'none';
            }
        }

        function updateButtonTitle(input) {
            const collapsibleButton = input.closest('.form-group').querySelector('.collapsible');
            collapsibleButton.textContent = input.value || 'New Button';

            const previewLabel = input.closest('.form-group').querySelector('.button-preview-label');
            previewLabel.textContent = input.value || 'New Button';
        }

        function updateButtonColor(input, buttonId) {
            const previewButton = document.getElementById(`${buttonId}-preview`);
            if (previewButton) {
                previewButton.style.backgroundColor = input.value;
            }
            const colorPreview = document.getElementById(`${buttonId}-bg-preview`);
            if (colorPreview) {
                colorPreview.style.backgroundColor = input.value;
            }
            const colorCode = document.getElementById(`${buttonId}-bg-code`);
            if (colorCode) {
                colorCode.textContent = 'Color Code: ' + input.value;
            }
            input.style.backgroundColor = input.value;
        }

        function updateButtonLabelColor(input, buttonId) {
            const previewLabel = document.getElementById(`${buttonId}-preview`).querySelector('.button-preview-label');
            if (previewLabel) {
                previewLabel.style.color = input.value;
            }
            const colorPreview = document.getElementById(`${buttonId}-label-preview`);
            if (colorPreview) {
                colorPreview.style.backgroundColor = input.value;
            }
            const colorCode = document.getElementById(`${buttonId}-label-code`);
            if (colorCode) {
                colorCode.textContent = 'Color Code: ' + input.value;
            }
            input.style.backgroundColor = input.value;
        }

        function updateButtonIconColor(input, buttonId) {
            const icon = document.getElementById(`${buttonId}-preview`).querySelector('.fa-icon');
            if (icon) {
                icon.style.color = input.value;
            }
            const colorPreview = document.getElementById(`${buttonId}-icon-preview`);
            if (colorPreview) {
                colorPreview.style.backgroundColor = input.value;
            }
            const colorCode = document.getElementById(`${buttonId}-icon-code`);
            if (colorCode) {
                colorCode.textContent = 'Color Code: ' + input.value;
            }
            input.style.backgroundColor = input.value;
        }

        function deleteButton(button) {
            button.closest('.form-group').remove();
        }

        function toggleDropdown(contentId) {
            const content = document.getElementById(contentId);
            content.style.display = content.style.display === "block" ? "none" : "block";
        }

        function generateProfileHTML() {
            const customerName = document.getElementById('customerName').value;
            const customerNameSize = document.getElementById('customerNameSize').value + "px";
            const customerNameColor = document.getElementById('customerNameColor').value;
            const customerDescription = marked.parse(document.getElementById('customerDescription').value.replace(/\n/g, '  \n'));
            const customerDescriptionSize = document.getElementById('customerDescriptionSize').value + "px";
            const customerDescriptionColor = document.getElementById('customerDescriptionColor').value;
            const profileImage = document.getElementById('profileImageUrl').value;
            const buttonLabels = document.querySelectorAll('.button-label');
            const buttonIcons = document.querySelectorAll('.select-selected');
            const buttonUrls = document.querySelectorAll('.button-url');
            const buttonColors = document.querySelectorAll('.button-color');
            const buttonLabelColors = document.querySelectorAll('.button-label-color');
            const buttonIconColors = document.querySelectorAll('.button-icon-color');
            const medicalTabLabel = document.getElementById('medicalTabLabel').value;
            const medicalTabLabelSize = document.getElementById('medicalTabLabelSize').value + "px";
            const medicalTabLabelColor = document.getElementById('medicalTabLabelColor').value;
            const medicalTabBackgroundColor = document.getElementById('medicalTabBackgroundColor').value;

            if (!customerName) {
                alert("Please enter a customer name.");
                return null;
            }

            const formatButtonUrl = (icon, url) => {
                switch (icon) {
                    case "fa-phone-alt":
                        return `tel:${url}`;
                    case "fa-envelope":
                        return `mailto:${url}`;
                    case "fa-facebook":
                    case "fa-instagram":
                    case "fa-whatsapp":
                    case "fa-map-marker-alt":
                        return url;
                    default:
                        return url;
                }
            };

            const buttons = [];
            for (let i = 0; i < buttonLabels.length; i++) {
                if (buttonLabels[i].value && buttonUrls[i].value) {
                    const formattedUrl = formatButtonUrl(buttonIcons[i].getAttribute('data-value'), buttonUrls[i].value);
                    buttons.push({
                        label: buttonLabels[i].value,
                        icon: buttonIcons[i].getAttribute('data-value'),
                        url: formattedUrl,
                        color: buttonColors[i].value,
                        labelColor: buttonLabelColors[i].value,
                        iconColor: buttonIconColors[i].value
                    });
                }
            }

            const personalDetails = {
                age: document.getElementById('personalAge').value,
                sex: document.getElementById('personalSex').value
            };

            const medicalHistory = {
                allergies: document.getElementById('medicalAllergies').value,
                medications: document.getElementById('medicalMedications').value,
                conditions: document.getElementById('medicalConditions').value,
                immunization: document.getElementById('medicalImmunization').value,
                surgeries: document.getElementById('medicalSurgeries').value,
                familyHistory: document.getElementById('medicalFamilyHistory').value
            };

            const additionalInformation = {
                weight: document.getElementById('additionalWeight').value,
                equipment: document.getElementById('additionalEquipment').value,
                physicians: document.getElementById('additionalPhysicians').value
            };

            const medicalInfoSize = document.getElementById('medicalInfoSize').value + "px";
            const medicalInfoColor = document.getElementById('medicalInfoColor').value;

            let personalDetailsHTML = "";
            if (personalDetails.age) personalDetailsHTML += `<p style="font-size: ${medicalInfoSize}; color: ${medicalInfoColor};"><strong>Age:</strong> ${personalDetails.age}</p>`;
            if (personalDetails.sex) personalDetailsHTML += `<p style="font-size: ${medicalInfoSize}; color: ${medicalInfoColor};"><strong>Sex:</strong> ${personalDetails.sex}</p>`;

            let medicalHistoryHTML = "";
            if (medicalHistory.allergies) medicalHistoryHTML += `<p style="font-size: ${medicalInfoSize}; color: ${medicalInfoColor};"><strong>Allergies:</strong> ${medicalHistory.allergies}</p>`;
            if (medicalHistory.medications) medicalHistoryHTML += `<p style="font-size: ${medicalInfoSize}; color: ${medicalInfoColor};"><strong>Current medications:</strong> ${medicalHistory.medications}</p>`;
            if (medicalHistory.conditions) medicalHistoryHTML += `<p style="font-size: ${medicalInfoSize}; color: ${medicalInfoColor};"><strong>Pre-existing medical conditions:</strong> ${medicalHistory.conditions}</p>`;
            if (medicalHistory.immunization) medicalHistoryHTML += `<p style="font-size: ${medicalInfoSize}; color: ${medicalInfoColor};"><strong>Immunization records:</strong> ${medicalHistory.immunization}</p>`;
            if (medicalHistory.surgeries) medicalHistoryHTML += `<p style="font-size: ${medicalInfoSize}; color: ${medicalInfoColor};"><strong>Recent surgeries or hospitalizations:</strong> ${medicalHistory.surgeries}</p>`;
            if (medicalHistory.familyHistory) medicalHistoryHTML += `<p style="font-size: ${medicalInfoSize}; color: ${medicalInfoColor};"><strong>Family medical history:</strong> ${medicalHistory.familyHistory}</p>`;

            let additionalInformationHTML = "";
            if (additionalInformation.weight) additionalInformationHTML += `<p style="font-size: ${medicalInfoSize}; color: ${medicalInfoColor};"><strong>Weight:</strong> ${additionalInformation.weight}</p>`;
            if (additionalInformation.equipment) additionalInformationHTML += `<p style="font-size: ${medicalInfoSize}; color: ${medicalInfoColor};"><strong>Medical equipment used:</strong> ${additionalInformation.equipment}</p>`;
            if (additionalInformation.physicians) additionalInformationHTML += `<p style="font-size: ${medicalInfoSize}; color: ${medicalInfoColor};"><strong>Primary care physicians and specialists:</strong> ${additionalInformation.physicians}</p>`;

            let medicalInfoHTML = "";
            if (personalDetailsHTML || medicalHistoryHTML || additionalInformationHTML) {
                medicalInfoHTML = `
                    <div class="separator"></div>
                    <div style="text-align: left;">
                        <button type="button" class="collapsible" onclick="toggleDropdown('generatedMedicalInfo')" style="font-size: ${medicalTabLabelSize}; color: ${medicalTabLabelColor}; background-color: ${medicalTabBackgroundColor};">${medicalTabLabel}</button>
                        <div id="generatedMedicalInfo" class="content">
                            ${personalDetailsHTML ? `<h3 style="font-size: ${medicalInfoSize}; color: ${medicalInfoColor};">Personal Details:</h3>${personalDetailsHTML}` : ''}
                            <div class="separator"></div>
                            ${medicalHistoryHTML ? `<h3 style="font-size: ${medicalInfoSize}; color: ${medicalInfoColor};">Medical History:</h3>${medicalHistoryHTML}` : ''}
                            <div class="separator"></div>
                            ${additionalInformationHTML ? `<h3 style="font-size: ${medicalInfoSize}; color: ${medicalInfoColor};">Additional Information:</h3>${additionalInformationHTML}` : ''}
                        </div>
                    </div>
                `;
            }

            const data = {
                name: customerName,
                nameSize: customerNameSize,
                nameColor: customerNameColor,
                description: customerDescription,
                descriptionSize: customerDescriptionSize,
                descriptionColor: customerDescriptionColor,
                profileImage: profileImage,
                buttons: buttons,
                medicalInfoHTML: medicalInfoHTML
            };

            return `
            <div class="container">
                <div class="profile-wrapper">
                    <div class="profile-left">
                        <div class="profile-pic">
                            <img id="profileImagePreview" src="${data.profileImage}" alt="Profile Image" />
                        </div>
                        <div class="profile-info">
                            <h1 style="font-size: ${data.nameSize}; color: ${data.nameColor};">${data.name}</h1>
                            <div style="font-size: ${data.descriptionSize}; color: ${data.descriptionColor};">${data.description}</div>
                            ${data.medicalInfoHTML}
                        </div>
                    </div>
                    <div class="profile-right">
                        ${data.buttons.map(button => `
                        <a href="${button.url}" target="_blank" class="profile-button" style="background-color: ${button.color}; color: ${button.labelColor}; display: flex; justify-content: flex-start; align-items: center;">
                            <i class="fa-icon fas ${button.icon}" style="color: ${button.iconColor};"></i>
                            <span style="flex-grow: 1; text-align: center;">${button.label}</span>
                        </a>`).join('')}
                    </div>
                </div>
            </div>`;
        }

        function generateProfile() {
            const profileHTML = generateProfileHTML();
            if (!profileHTML) return;

            const template = `
            <!DOCTYPE HTML>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Profile Page</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                        background-color: #f5f5f5;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        min-height: 100vh;
                    }
                    .container {
                        display: flex;
                        flex-direction: column;
                        background-color: white;
                        border-radius: 10px;
                        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                        padding: 20px;
                        width: 90%;
                        max-width: 900px;
                        margin: 20px auto;
                    }
                    .profile-left, .profile-right {
                        background-color: white;
                    }
                    .profile-left {
                        padding: 20px;
                        text-align: center;
                        width: 100%;
                    }
                    .profile-pic img {
                        width: 100px;
                        height: 100px;
                        border-radius: 50%;
                        object-fit: cover;
                        display: block;
                        margin: 0 auto;
                    }
                    .profile-info h1 {
                        margin: 20px 0 10px;
                        font-size: 2em;
                    }
                    .profile-info p {
                        margin: 0;
                        color: gray;
                    }
                    .profile-right {
                        padding: 20px;
                        width: 100%;
                        display: flex;
                        flex-direction: column;
                    }
                    .profile-button {
                        border: none;
                        border-radius: 10px;
                        padding: 15px;
                        margin: 10px 0;
                        text-align: center;
                        font-size: 1em;
                        display: flex;
                        justify-content: flex-start;
                        align-items: center;
                        cursor: pointer;
                        transition: transform 0.2s;
                    }
                    .profile-button:hover {
                        transform: scale(1.05);
                    }
                    .profile-button .icon {
                        font-size: 1.2em;
                        margin-right: 10px;
                    }
                    .fa-icon {
                        margin-right: 10px;
                    }
                    @media (max-width: 600px) {
                        body {
                            background-color: white;
                        }
                        .container {
                            width: 100%;
                        }
                        .profile-wrapper {
                            flex-direction: column;
                            align-items: center;
                        }
                        .profile-left, .profile-right {
                            width: 100%;
                            padding: 10px;
                            border: none;
                        }
                        .profile-right {
                            margin-top: 20px;
                            border-top: 1px solid #ddd;
                            padding-top: 20px;
                        }
                    }
                    @media (min-width: 600px) {
                        .container {
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                        }
                        .profile-wrapper {
                            width: 100%;
                            padding: 20px;
                            display: flex;
                            flex-direction: row;
                            justify-content: center;
                        }
                        .profile-left, .profile-right {
                            width: 100%;
                            padding: 20px;
                            box-sizing: border-box;
                            max-width: 450px; /* Ensuring each section doesn't exceed half the container's width */
                        }
                        .profile-left {
                            border-right: 1px solid #ddd;
                        }
                    }
                    .profile-button {
                        border: none;
                        border-radius: 10px;
                        padding: 15px;
                        margin: 10px 0;
                        font-size: 1em;
                        display: flex;
                        align-items: center;
                        cursor: pointer;
                        transition: transform 0.2s, background-color 0.3s;
                        background-color: #007BFF;
                        color: #fff;
                        width: 100%;
                        box-sizing: border-box;
                        text-decoration: none;
                    }
                    .profile-button:hover {
                        transform: scale(1.05);
                        background-color: #0056b3;
                    }
                    .profile-button .icon {
                        font-size: 1.2em;
                        margin-right: 10px;
                    }
                    .profile-button span {
                        flex-grow: 1;
                        text-align: center;
                    }
                    .separator {
                        border-top: 1px solid #ddd;
                        margin: 20px 0;
                    }
                    .collapsible {
                        background-color: #007BFF;
                        color: white;
                        cursor: pointer;
                        padding: 18px;
                        width: 100%;
                        border: none;
                        text-align: left;
                        outline: none;
                        font-size: 15px;
                        border-radius: 8px; /* Making the corners round */
                    }
                    .active, .collapsible:hover {
                        background-color: #0056b3;
                    }
                    .content {
                        padding: 0 18px;
                        display: none;
                        overflow: hidden;
                        background-color: #f1f1f1;
                        border-radius: 8px; /* Making the corners round */
                    }
                </style>
            </head>
            <body>
                ${profileHTML}
                <script>
                    function toggleDropdown(contentId) {
                        var content = document.getElementById(contentId);
                        if (content.style.display === "block") {
                            content.style.display = "none";
                        } else {
                            content.style.display = "block";
                        }
                    }
                <\/script>
            </body>
            </html>`;

            const blob = new Blob([template], { type: 'text/html' });
            const a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = `profile.html`;
            a.click();
        }

        function openModal() {
            const profileHTML = generateProfileHTML();
            if (!profileHTML) return;
            document.getElementById('profilePreview').innerHTML = profileHTML;
            document.getElementById('profileModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('profileModal').style.display = "none";
        }

        function showMarkdownHelp() {
            const selectedValue = document.getElementById('markdownHelp').value;
            document.getElementById('markdownHelpDisplay').textContent = selectedValue;
        }

        function emailProfile() {
            const profileHTML = generateProfileHTML();
            if (!profileHTML) return;

            const toEmail = prompt("Please enter the recipient's email address:");
            if (!toEmail) {
                alert("Email address is required.");
                return;
            }

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                data: {
                    action: 'send_profile_email',
                    profile_html: profileHTML,
                    to_email: toEmail,
                    security: '<?php echo wp_create_nonce('send_profile_nonce'); ?>'
                },
                success: function(response) {
                    if (response.success) {
                        alert('Email sent successfully.');
                    } else {
                        alert('Failed to send email: ' + response.data);
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        }
    </script>
</body>
</html>
