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
            <h1 class="h3 mb-2"><span style="color:orange">Notice</span> - Soft Breach on account {{ $mailData['account_number'] }}.</h1>
            <h5 class="text-teal-700">
                Soft Breach registered because {{ $mailData['reason'] }}
            </h5>
            <hr>
            <div class="space-y-3">
                <p class="text-gray-700">Dear {{ $mailData['name'] }}</p>
                <p class="text-gray-700">Ref: Account {{ $mailData['account_number'] }} at proppers.io</p>
                <p class="text-gray-700">
                    At {{ $mailData['time_of'] }} we registered a Soft Breach on account {{ $mailData['account_number'] }} because {{ $mailData['reason'] }} @if($mailData['type'] != "SLC") and you did not remedy
                    the situation in the allotted grace period of 10 minutes. @endif Incurring in a soft breach is not the end of the world, but it is a wake-up call to pay special attention to always
                    placing a stop loss, and to limit the total value of your stop losses to below your available risk (remember to always allow some margin for exchange rate fluctuations and
                    orders trading through their stop loss).<br /><br />
                    <b>Remember: 3 soft breaches equal a hard breach or disqualification, meaning failing the assessment on the account.</b>
                </p>
            </div>
            <hr>
            <p class="text-xs">You are receiving this email because you have or had an account at proppers.io. If you believe this to a mistake, please notify us by replying to this email, through our live chat,
                or by using the contact form at proppers.io.</p>
        </div>
    </div>
</div>
</body>
</html>
