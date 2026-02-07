<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Achievement Certificate</title>

    <style>
        body{
            margin:0;
            padding:0;
            font-family: DejaVu Sans, Arial, sans-serif;
            background:#f3f3f3;
        }

        .wrapper{
            width:100%;
            padding:30px;
            box-sizing:border-box;
        }

        .certificate{
            max-width:900px;
            margin:auto;
            background:#ffffff;
            border:10px solid #bfa046;
            padding:45px;
            box-sizing:border-box;
        }

        .header{
            text-align:center;
            margin-bottom:30px;
        }

        .header img{
            width:120px;
            margin-bottom:10px;
        }

        .org-name{
            font-size:26px;
            font-weight:bold;
            color:#1a237e;
        }

        .tagline{
            font-size:14px;
            color:#666;
        }

        .title{
            text-align:center;
            font-size:34px;
            font-weight:bold;
            margin:40px 0 20px;
            color:#000;
            letter-spacing:2px;
        }

        .subtitle{
            text-align:center;
            font-size:18px;
            color:#555;
            margin-bottom:30px;
        }

        .content{
            text-align:center;
            font-size:18px;
            line-height:32px;
            color:#333;
            padding:0 30px;
        }

        .name{
            font-size:28px;
            font-weight:bold;
            color:#1a237e;
            margin:20px 0;
            text-transform:uppercase;
        }

        .achievement{
            font-size:17px;
            margin-top:15px;
            font-style:italic;
        }

        .details{
            margin-top:35px;
            text-align:center;
            font-size:16px;
        }

        .footer{
            margin-top:60px;
            display:table;
            width:100%;
        }

        .footer .left,
        .footer .right{
            display:table-cell;
            width:50%;
            text-align:center;
            vertical-align:bottom;
        }

        .sign{
            margin-top:60px;
            border-top:1px solid #000;
            display:inline-block;
            padding-top:8px;
            font-weight:bold;
        }

        .seal{
            margin-top:8px;
            font-size:13px;
            color:#777;
        }

        @media(max-width:768px){
            .certificate{
                padding:25px;
            }
            .title{
                font-size:28px;
            }
            .name{
                font-size:24px;
            }
        }
    </style>
</head>

<body>

<div class="wrapper">
    <div class="certificate">

        <!-- HEADER -->
        <div class="header">
            <img src="{{ public_path('assets/images/m_foundation_logo.jpeg') }}">
            <div class="org-name">Mahror Foundation</div>
            <div class="tagline">Serving Humanity with Commitment</div>
        </div>

        <!-- TITLE -->
        <div class="title">
            CERTIFICATE OF ACHIEVEMENT
        </div>

        <div class="subtitle">
            This certificate is proudly presented to
        </div>

        <!-- CONTENT -->
        <div class="content">
            <div class="name">
                {{ $user->name }}
            </div>

            <div class="achievement">
                For outstanding achievement and remarkable contribution in  
                <strong>{{ $achievement ?? 'Social Welfare Activities' }}</strong>,
                demonstrating dedication, excellence, and commitment.
            </div>
        </div>

        <!-- DETAILS -->
        <div class="details">
            <strong>Certificate No :</strong> ACH/{{ $user->id }}/{{ date('Y') }}<br>
            <strong>Date of Issue :</strong> {{ now()->format('d/m/Y') }}
        </div>

        <!-- FOOTER -->
        <div class="footer">
            <div class="left">
                <div class="sign">Authorized Signatory</div>
                <div class="seal">Mahror Foundation</div>
            </div>

            <div class="right">
                <div class="sign">Founder & Director</div>
                <div class="seal">Official Seal</div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
