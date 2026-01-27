<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Kennie') ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Future styles will go here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        header,
        footer {
            text-align: center;
            background-color: #fff;
            padding: 10px 0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        main {
            max-width: 400px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"] {
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            /* green */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }

        .flash-message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            text-align: center;
        }

        .flash-error {
            color: #a94442;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        .flash-success {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        nav a {
            margin: 0 10px;
            text-decoration: none;
            color: #007bff;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .grid-full {
            grid-column: span 3;
        }

        label {
            font-weight: 500;
        }

        #disability-wrapper {
            display: none;
        }

        .admin-btn {
            display: inline-block;
            background: #16a34a;
            color: #fff;
            padding: 10px 14px;
            margin-right: 8px;
            margin-top: 5px;
            border-radius: 4px;
            font-size: 14px;
        }

        .admin-btn:hover {
            background: #15803d;
        }
    </style>

</head>

<body>

    <?= $this->include('partials/header') ?>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('partials/footer') ?>

    <!-- Future scripts will go here -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Main layout loaded fine');
            document.getElementById('document_type').addEventListener('change', function() {
                const docInput = document.getElementById('document_number');

                if (this.value === 'id') {
                    docInput.placeholder = 'Enter ID Number';
                } else if (this.value === 'passport') {
                    docInput.placeholder = 'Enter your passport';
                } else {
                    docInput.placeholder = 'Select document type first';
                }
            });

            // Counties → Constituencies
            document.getElementById('county').addEventListener('change', function() {
                fetch(`/index.php/ajax/constituencies/${this.value}`)
                    .then(res => res.json())
                    .then(data => {
                        let constituency = document.getElementById('constituency');
                        constituency.innerHTML = '<option value="">Select constituency</option>';
                        data.forEach(row => {
                            constituency.innerHTML += `<option value="${row.id}">${row.name}</option>`;
                        });
                    });
            });

            // Constituencies → Wards
            document.getElementById('constituency').addEventListener('change', function() {
                fetch(`/index.php/ajax/wards/${this.value}`)
                    .then(res => res.json())
                    .then(data => {
                        let ward = document.getElementById('ward');
                        ward.innerHTML = '<option value="">Select ward</option>';
                        data.forEach(row => {
                            ward.innerHTML += `<option value="${row.id}">${row.name}</option>`;
                        });
                    });
            });

            const pwdSelect = document.getElementById('is_pwd');
            const disabilityWrapper = document.getElementById('disability-wrapper');
            const disabilitySelect = disabilityWrapper.querySelector('select');

            function toggleDisability() {
                if (pwdSelect.value === 'yes') {
                    disabilityWrapper.style.display = 'block';
                    disabilitySelect.setAttribute('required', 'required');
                } else {
                    disabilityWrapper.style.display = 'none';
                    disabilitySelect.removeAttribute('required');
                    disabilitySelect.value = '';
                }
            }

            // Initial state (important for validation reloads)
            toggleDisability();

            // On change
            pwdSelect.addEventListener('change', toggleDisability);
        });
    </script>

</body>

</html>
