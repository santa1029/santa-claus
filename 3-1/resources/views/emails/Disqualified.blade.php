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
            <h1 class="h3 mb-2"><span style="color:red">Notice</span> - {{ $mailData['accounttypeName'] }} Account {{ $mailData['account_number'] }} disabled</h1>
            <h5 class="text-teal-700">
                @if($mailData['accounttypeAss']) We are sorry, you have failed your assessment on this account. @endif
                @if($mailData['accounttypeTrial']) This concludes your free trial. @endif
                @if($mailData['accounttypeEdu']) But don't worry, EDU accounts come with unlimited free resets. @endif
            </h5>
            <hr>
            <div class="space-y-3">
                <p class="text-gray-700">Dear {{ $mailData['name'] }}</p>
                <p class="text-gray-700">Ref: Account {{ $mailData['account_number'] }} at proppers.io</p>
                <p class="text-gray-700">
                    At {{ $mailData['time_of'] }} we registered that {{ $mailData['reason'] }}.
                    @if($mailData['accounttypeAss']) This means you have failed the assessment on that account. However, thanks to our system of resets at a reduced cost,
                    compared to new accounts, you can quickly get back in the saddle. Just log in to iTabula, choose Reset Account from the menu, and select account {{ $mailData['account_number'] }}.
                    Now check out at the advantageous reduced fee, prove that you do have what it takes, and become a funded trader.@endif
                    @if($mailData['accounttypeTrial']) This ends your free trial prematurely. However, now that you got the feel of things, it is the best moment to get an assessment account, and
                    get on your way to become a funded trader. Just go to our <a href="https:\\proppers.io\#get_funded">website (Click Here)</a> and select the package that suits you best.
                    Check out, and your assessment account will be automatically prepared for you. You'll receive your credentials almost immediately per email. @endif
                    @if($mailData['accounttypeEdu']) The great thing is that EDU accounts come with unlimited free resets. Just head over to iTabula, choose Reset Account from the menu,
                    and select account {{ $mailData['account_number'] }}. A new account will be prepared for you, and you'll receive your credentials almost immediately per email.
                    OR… now that you got the feel of things, it is a great moment to get an assessment account and get on your way to becoming a funded trader.
                    Just go to our <a href="https:\\proppers.io\#get_funded">website (Click Here)</a> and select the package of your preference. Check out, and your assessment account
                    will be automatically prepared for you. Your Edu account will stay active as a training account with unlimited resets, unless you cancel it. @endif
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
