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
            <h1 class="h3 mb-2"><span style="color:orange">Notification</span> - End of Trial.</h1>
            <h5 class="text-teal-700">Your 10-day free trial account has come to an end.</h5>
            <hr>
            <div class="space-y-3">
                <p class="text-gray-700">Dear {{ $mailData['name'] }}</p>
                <p class="text-gray-700">Ref: Trial Account {{ $mailData['account_number'] }} at proppers.io</p>
                <p class="text-gray-700">
                    Your 10-day free trial account has come to an end. We hope you enjoyed the functionalities of iTabula and the MT4 platform. </p>
                <p class="text-gray-700">
                    We would now like to invite you to start your real journey to becoming a successful funded prop trader by selecting one of our
                    <a href="https:\\proppers.io\#get_funded">assessment packages</a>, available from the Proppers´ <a href="https:\\proppers.io\#get_funded">main page</a>.</p>
                <p class="text-gray-700">
                    Should you have any questions whatsoever regarding the available assessment packages, the services included with these packages, live accounts,
                    or our educational plan, please do not hesitate to contact us, either through our website chat, by replying to this email, or by using the contact form found on our website.</p>
                <p class="text-gray-700">
                    <br />
                    <i>Kindly note that trial accounts are limited to one account per visitor, and a request for another one will be automatically denied by the online shop.</i></p>
            </div>
            <hr>
            <p class="text-xs">You are receiving this email because you requested, and received, a free trial account at proppers.io. If you believe this to a mistake, please notify us by replying to this email, through our live chat,
                or by using the contact form at proppers.io.</p>
        </div>
    </div>
</div>
</body>
</html>
