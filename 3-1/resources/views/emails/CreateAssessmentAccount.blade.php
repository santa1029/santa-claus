<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style>
        table, td, div, h1, p {font-family: Arial, sans-serif;}
    </style>
</head>
<body class="bg-light">
<div class="container">
    <div class="row my-6">
        <div class="col-4">
            <img class="img-fluid" src="https://itabula.proppers.io/assets/images/logo-dark.png" alt="Proppers Logo">
        </div>
        <div class="col-4">
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h1 class="h3 mb-2">{{ $mailData['package'] }} Assessment Account Created</h1>
            <h5 class="text-teal-700">We have created your {{ $mailData['package'] }} Assessment Account.</h5>
            <hr>
            <div class="space-y-3">
                <p class="text-gray-700">Dear {{ $mailData['first_name'] }}</p>
                <p class="text-gray-700">Ref: your order number {{ $mailData['order_number'] }} at proppers.io</p>
                @if ($mailData['first'])
                    <p class="text-gray-700">
                        We have created a new user for you with the following credentials:</p>
                    <p class="text-gray-700">Login: Your email, {{ $mailData['email'] }}<br />
                        Password {{ $mailData['user_password'] }}<br />
                        Use these credentials to log in to our dashboard at https://itabula.proppers.io, where you can follow your current and future accounts,
                        get free market analysis, education, news, and more.
                    </p>
                @endif
                <br />
                <p class="text-gray-700">We have created a {{ $mailData['package'] }} account for you on our MT4 platform, under @if ($mailData['first']) this @else your existing @endif user {{ $mailData['email'] }}.</p>
                <p class="text-gray-700">
                    Please download the MT4 platform for:<br />
                    <ul>
                    <li><a href='https://download.mql5.com/cdn/web/17771/mt4/strathoscapital4setup.exe'>Windows OS</a></li>
                    <li><a href='https://download.mql5.com/cdn/mobile/mt4/android?server=StrathosCapital-Demo,StrathosCapital-live1'>Android</a></li>
                    <li><a href='https://download.mql5.com/cdn/web/metaquotes.software.corp/mt4/MetaTrader4.dmg?utm_source=www.metatrader4.com&utm_campaign=download.mt4.macos'>Mac OS</a></li>
                    </ul>
                    (Kindly note these apps are broker specific.)<br /><br />
                    Your account number: {{ $mailData['account_number'] }}<br />
                    Your login: {{ $mailData['account_number'] }} (same as your account number)<br />
                    Your password: {{ $mailData['account_password'] }}<br />
                    Server: StrathosCapital-Demo<br />
                </p>
                <p class="text-gray-700">Should you have questions or require more information, please contact us by replying to this email, or by using the live chat on our website
                    <a href="https://proppers.io" target="_blank">proppers.io</a>.
                </p>
            </div>
            <hr>
            <p class="text-xs">Please make sure you are fully aware of the trading rules, as found on the home page of our website, and described in our terms and conditions, especially
                the conditions for, and results of, a soft breach and a hard breach. We cannot, and will not, undo the results of a soft or hard breach, unless in a case of an error on our part.
                To qualify for a live account, you need to both reach the profit target and minimum trading days. Once that achieved, your account will be audited in the shortest time possible.
            </p>
        </div>
    </div>
</div>
</body>
</html>
