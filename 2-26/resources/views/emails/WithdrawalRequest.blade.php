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
                <h1>Kindly execute this withdrawal request</h1>
                <hr>
                <div class="space-y-3">
                    <p class="text-gray-700">Account number: {{ $mailData['mt4_account'] }}</p>
                </div>
                <div class="space-y-3">
                    <p class="text-gray-700">Withdrawal Amount: {{ $mailData['withdrawal_amount'] }}</p>
                </div>
                <div class="space-y-3">
                    <p class="text-gray-700">Special Instructions:</p>
                    <p class="text-gray-700">{{ $mailData['special_instructions'] }}</p>
                </div>
                <div class="space-y-3">
                    <p class="text-gray-700">Bank name and address:</p>
                    <p class="text-gray-700">{{ $mailData['bank_name_address'] }}</p>
                </div>
                <div class="space-y-3">
                    <p class="text-gray-700">ABA/Swift: {{ $mailData['aba_swift'] }}</p>
                </div>
                <div class="space-y-3">
                    <p class="text-gray-700">IBAN or Bank Account Number: {{ $mailData['IABN'] }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
