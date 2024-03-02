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
            <h1 class="h3 mb-2">Welcome to your Education Account</h1>
            <h5 class="text-teal-700">We have created your Educational Account with lots of educational resources.</h5>
            <hr>
            <div class="space-y-3">
                <p class="text-gray-700">Dear {{ $mailData['first_name'] }}</p>
                <p class="text-gray-700">Ref: your order number {{ $mailData['order_number'] }} at Proppers</p>
                @if ($mailData['first'])
                    <p class="text-gray-700">
                        We have created a new user for you with the following credentials:</p>
                    <p class="text-gray-700">Login: Your email, {{ $mailData['email'] }}<br />
                        Password {{ $mailData['user_password'] }}<br />
                        Use these credentials to log in to our dashboard at https://itabula.proppers.io, where you can follow your Edu and future accounts,
                        get free market analysis, education, news, and more.
                    </p>
                @endif
                <p class="text-gray-700">We have created your first Edu (demo) account for you on our MT4 platform, under your user {{ $mailData['email'] }}. As long as you stay subscribed to the Edu package, you have unlimited free resets.</p>
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
            <p class="text-xs">Please note that this is an Educational Account. Use it to get acquainted with the trading platform, and our dashboard. Learn about trading, and test out strategies.
                Results on an Educational account cannot be passed on to an assessment account; no rights can be obtained from these results.
                Educational accounts come with unlimited free resets as long as you are subscribed to the Edu package. Please do not abuse of this feature, like resetting the account multiple times just for the sake or resetting.
            </p>
        </div>
    </div>
</div>
</body>
</html>
