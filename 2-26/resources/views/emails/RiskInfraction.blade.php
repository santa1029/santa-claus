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
            <h1 class="h3 mb-2"><span style="color:red">Warning</span> - Using Too Much Risk.</h1>
            <h5 class="text-teal-700">The total value of your SLs cannot exceed the available risk.</h5>
            <hr>
            <div class="space-y-3">
                <p class="text-gray-700">Dear {{ $mailData['name'] }}</p>
                <p class="text-gray-700">Ref: Account {{ $mailData['account_number'] }} at proppers.io</p>
                <p class="text-gray-700">
                    The total value of SLs of the open orders on the above-mentioned account, exceeds the maximum allowed risk. In accordance with our trading rules, the total value of the stop losses
                    of the orders on an account, cannot exceed the available risk on that account. The available risk is defined as the difference between the current balance and the maximum draw down level.</p>
                <p class="text-gray-700">
                    <i>Kindly note that if you were opening and closing trades at the same moment, this situation might already be resolved. Please check iTabula for the available and used risk on the mentioned account.</i></p>
                <p class="text-gray-700">
                    In any case, our system has activated a 10-minute grace period. Risk used MUST BE REDUCED to below the available risk level before this grace period ends. Failing to do so will result in a soft breach.
                    Three soft breaches will lead to a hard breach, equivalent to ending -and you failing- the assessment.<br /><br />
                    During the above-mentioned grace period, you will not receive any further emails about risk on this account. It is your full and sole responsibility that the used risk (total of the value of all stop losses)
                    is below the available risk for that account at all time. You can check iTabula for the available and used risk on your accounts at any time.
                </p>
                <p class="text-gray-700">
                    Allow us to emphasize that the full and sole responsibility for staying within the allowed risk limit, lies with you, and uniquely with you, even when you do not receive an alert or email,
                    receive them late, or when iTabula is down, or showing erroneous information. A good trader knows his risk position at all times.
                </p>
            </div>
            <hr>
            <p class="text-xs">You are receiving this email because you have an account at proppers.io. If you believe this to a mistake, please notify us by replying to this email, through our live chat,
                or by using the contact form at proppers.io.</p>
        </div>
    </div>
</div>
</body>
</html>
