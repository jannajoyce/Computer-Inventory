<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Inventory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 10px;
        }
        h1, p {
            text-align: center;
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        @media print {
            body, .container {
                width: 100%;
                margin: 0;
                padding: 0;
            }
            h1 {
                font-size: 18px;
            }
            p {
                font-size:13px
            }
            table {
                width: 100%;
                font-size: 10px;
            }
            th, td {
                padding: 4px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Inventory Report</h1>
    <p>Date: {{ \Carbon\Carbon::now()->format('F j, Y') }}</p>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
        <tr>
            <th>ARTICLE/ITEM</th>
            <th>DESCRIPTION/BRAND</th>
            <th>PROPERTY NUMBER</th>
            <th>UNIT</th>
            <th>UNIT VALUE</th>
            <th>QUANTITY</th>
            <th>LOCATION</th>
            <th>CONDITION</th>
            <th>REMARKS</th>
            <th>P.O. NUMBER</th>
            <th>DEALER</th>
            <th>DATE ACQUIRED</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->brand }}</td>
                <td>{{ $item->property_number }}</td>
                <td>{{ $item->unit }}</td>
                <td>{{ $item->unit_value }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->location }}</td>
                <td>{{ $item->condition }}</td>
                <td>{{ $item->remarks }}</td>
                <td>{{ $item->po_number }}</td>
                <td>{{ $item->dealer }}</td>
                <td>{{ $item->date_acquired }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script>
    window.onload = function() {
        window.print();
    };
</script>
</body>
</html>
