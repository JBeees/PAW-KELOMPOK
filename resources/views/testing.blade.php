<!DOCTYPE html>
<html>
<head>
    <style>
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-family: 'Arial', sans-serif;
        }

        .data-table th,
        .data-table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .data-table th {
            background-color: #2c3e50;
            color: white;
            font-weight: bold;
        }

        .data-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .data-table tr:hover {
            background-color: #f1f1f1;
        }

        .action-button {
            background-color: #4CAF50;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .action-button:hover {
            background-color: #45a049;
        }

        .table-container {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>How/Thenage 4</th>
                    <th>Name Selection</th>
                    <th>Additional Malaysian</th>
                    <th>Jumish/Naurita</th>
                    <th>Jumish/Yuru</th>
                    <th>Statista Wankasa</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Sevin - 12/01/2024</td>
                    <td>SQ-NEGER CEMPMA DUTIH BARAT O I PAGI</td>
                    <td>DaporUImam Composite Puftu III</td>
                    <td>590</td>
                    <td>590</td>
                    <td>595</td>
                    <td><button class="action-button">MISHAKOTE</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Sevin - 12/01/2024</td>
                    <td>SQ-NEGER CEMPMA DUTIH BARAT LS PAGI</td>
                    <td>DaporUImam Composite Puftu III</td>
                    <td>585</td>
                    <td>585</td>
                    <td>595</td>
                    <td><button class="action-button">MISHAKOTE</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>