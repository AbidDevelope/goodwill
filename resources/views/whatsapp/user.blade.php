<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" > --}}
    <meta charset="utf-8">
    <title>Bill</title>
    <style>
        body {
            max-width: 100%;
            padding: 1.5%;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <div class="row">
        @if (Session::has('success'))
            <div class="alert-danger">
                <span>{{ Session::get('success') }}</span>
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert-danger">
                <span>{{ Session::get('error') }}</span>
            </div>
        @endif
        <div class="sendpdf float-right">
            
        </div>
    </div>
    <div class="body">
        <div style="text-align: center">
            <h3 style="margin: 0;">Twilio Commerce</h3>
            <h5 style="margin: 0;">supersales@example.com</h5>
        </div>
        <div class="content">
            <div style="margin: -2px;">
                <div style="float: left;">
                    <p>Mobile Number : {{ $user->mobile }} </p>
                    <p>Invoice Number:- TWC-{{ $user->id }} </p>
                </div>
                <div style="float: right;">
                    <p style="margin-right: 20px;">
                        Date: {{ \Carbon\Carbon::now()->toFormattedDateString() }}
                    </p>
                </div>
            </div>
            <div style="clear: both;"></div>
            <div class="centre" style="text-align: center;">
                <h3>Invoice</h3>
            </div>
            <div>
                <p>Name: {{ $user->name }}</p>
            </div>
            <hr />
            <div style="padding: 30px 0px 30px 0px;">
                <p class="amount">{{ $user->email }}
                    <span style="float: right;"> {{ $user->name }}</span>
                </p>
            </div>
            <hr />
            <p><a href="#">Pay with Stripe</a></p>
        </div>
    </div>
</body>

</html>
