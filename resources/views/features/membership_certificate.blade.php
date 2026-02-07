<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Membership Certificate</title>

    <style>
        body{
            margin:0;
            padding:0;
            font-family: DejaVu Sans, Arial, sans-serif;
            background:#f2f2f2;
        }

        .certificate-wrapper{
            width:100%;
            padding:20px;
            box-sizing:border-box;
        }

        .certificate{
            max-width:900px;
            margin:auto;
            background:#ffffff;
            border:12px solid #1a237e;
            padding:40px;
            box-sizing:border-box;
        }

        .header{
            text-align:center;
            margin-bottom:30px;
        }

        .header img{
            width:150px;
            margin-bottom:10px;
        }

        .org-name{
            font-size:26px;
            font-weight:bold;
            color:#1a237e;
        }

        .tagline{
            font-size:14px;
            color:#555;
        }

        .title{
            text-align:center;
            font-size:32px;
            font-weight:bold;
            margin:40px 0 20px;
            color:#000;
            letter-spacing:2px;
        }

        .content{
            font-size:18px;
            line-height:32px;
            text-align:center;
            color:#333;
            padding:0 20px;
        }

        .member-name{
            font-size:26px;
            font-weight:bold;
            color:#1a237e;
            margin:15px 0;
            text-transform:uppercase;
        }

        .details{
            margin-top:30px;
            text-align:center;
            font-size:16px;
        }

        .details strong{
            color:#000;
        }

        .footer{
            margin-top:50px;
            display:table;
            width:100%;
        }

        .footer .left,
        .footer .right{
            display:table-cell;
            width:50%;
            vertical-align:bottom;
            text-align:center;
        }

        .signature{
            margin-top:60px;
            border-top:1px solid #000;
            display:inline-block;
            padding-top:8px;
            font-weight:bold;
        }

        .seal{
            margin-top:20px;
            font-size:14px;
            color:#777;
        }

        @media(max-width:768px){
            .certificate{
                padding:25px;
            }

            .title{
                font-size:26px;
            }

            .member-name{
                font-size:22px;
            }

            .content{
                font-size:16px;
            }
        }
    </style>
</head>

<body>

<div class="certificate-wrapper">
    <div class="certificate">

        <!-- HEADER -->
        <div class="header">
            <img src="{{ public_path('assets/images/m_foundation_logo.jpeg') }}">
            <div class="org-name">Mahror Foundation</div>
            <div class="tagline">Serving Humanity with Commitment</div>
        </div>

        <!-- TITLE -->
        <div class="title">
            MEMBERSHIP CERTIFICATE
        </div>

        <!-- CONTENT -->
        <div class="content">
            This is to proudly certify that
            <div class="member-name">
                {{ $user->name }}
            </div>
            is an official member of <strong>Mahror Foundation</strong>.
            <br>
            This membership is granted in recognition of commitment,
            integrity, and dedication towards our mission and values.
        </div>

        <!-- DETAILS -->
        <div class="details">
            <strong>Membership ID :</strong> MF/{{ $user->id }}/{{ date('Y') }}<br>
            <strong>Issued On :</strong> {{ $user->created_at->format('d/m/Y') }}
        </div>

        <!-- FOOTER -->
        <div class="footer">
            <div class="left">
                <div class="signature">
                    Authorized Signatory
                </div>
                <div class="seal">
                    Mahror Foundation
                </div>
            </div>

            <div class="right">
                <div class="signature">
                    Founder & Director
                </div>
                <div class="seal">
                    Official Seal
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
