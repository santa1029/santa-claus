<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Kindly execute this deposit request</h1>
                <hr>
                <div class="space-y-3">
                    <p class="text-gray-700">Account number: {{ $mailData['mt4_account'] }}</p>
                </div>
                <div class="space-y-3">
                    <p class="text-gray-700">Deposit Amount: {{ $mailData['deposit_amount'] }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
