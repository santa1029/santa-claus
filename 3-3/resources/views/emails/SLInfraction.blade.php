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
            <h1 class="h3 mb-2"><span style="color:red">Warning</span> - Trade without Stop Loss.</h1>
            <h5 class="text-teal-700">Every trade has to have a Stop Loss set.</h5>
            <hr>
            <div class="space-y-3">
                <p class="text-gray-700">Dear {{ $mailData['name'] }}</p>
                <p class="text-gray-700">Ref: Trade with ticket: {{ $mailData['order_number'] }} on account {{ $mailData['account_number'] }} at proppers.io</p>
                <p class="text-gray-700">
                    You didn't place a stop loss on the above-mentioned order. In accordance with our trading rules, every position must have a valid Stop Loss.<br />
                    Our system has activated a 10-minute grace period. YOU MUST place a valid stop loss on the position before this grace period ends. Failing to do so will result in a soft breach.
                    Three soft breaches will lead to a hard breach, equivalent to ending -and you failing- the assessment. Kindly note that closing this, or another position, without a Stop Loss in place
                    will result in an immediate soft breach.<br /><br />
                    During the above-mentioned grace period, you will not receive any further emails about not having a SL on a position. It is your full and sole responsibility that all your positions
                    have a stop loss in place. Should you open more positions without SL, (even in this grace period), a message will be added to the Alerts in iTabula (the bell icon at the right top of the screen).
                    You can also always check for current issues with positions by selecting "Issues" from the iTabula menu.
                </p>
                <p class="text-gray-700">
                    Allow us to emphasize that the full and sole responsibility for having a SL on all your positions lies with you, and uniquely with you, even when you do not receive an alert or email,
                    receive them late, or when the position isn't listed as a position with issues.
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
