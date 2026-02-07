<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Appointment Card</title>

    <style>
        body{
            margin:0;
            padding:0;
            font-family: DejaVu Sans, Arial, sans-serif;
            background:#f4f6f9;
        }

        .wrapper{
            width:100%;
            padding:20px;
            box-sizing:border-box;
        }

        .card{
            width:520px;
            margin:auto;
            background:#ffffff;
            border:3px solid #1a237e;
            padding:25px;
            box-sizing:border-box;
        }

        .header{
            display:table;
            width:100%;
            margin-bottom:20px;
        }

        .header .logo,
        .header .org{
            display:table-cell;
            vertical-align:middle;
        }

        .header .logo img{
            width:120px;
        }

        .header .org{
            text-align:right;
        }

        .org-name{
            font-size:20px;
            font-weight:bold;
            color:#1a237e;
        }

        .org-tag{
            font-size:13px;
            color:#555;
        }

        .title{
            text-align:center;
            font-size:24px;
            font-weight:bold;
            margin:25px 0;
            color:#000;
            border-bottom:2px solid #1a237e;
            padding-bottom:8px;
            letter-spacing:1px;
        }

        .content{
            font-size:15px;
            line-height:26px;
            color:#333;
            text-align:center;
        }

        .name{
            font-size:22px;
            font-weight:bold;
            color:#1a237e;
            margin:10px 0;
            text-transform:uppercase;
        }

        .details{
            margin-top:25px;
            font-size:14px;
        }

        .details table{
            width:100%;
            border-collapse:collapse;
        }

        .details td{
            padding:6px 0;
        }

        .label{
            font-weight:bold;
            width:40%;
            color:#000;
        }

        .footer{
            margin-top:35px;
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
            margin-top:50px;
            border-top:1px solid #000;
            display:inline-block;
            padding-top:6px;
            font-weight:bold;
            font-size:14px;
        }

        @media(max-width:600px){
            .card{
                width:100%;
            }
        }
    </style>
</head>

<body>

<div class="wrapper">
    <div class="card">

        <!-- HEADER -->
        <div class="header">
            <div class="logo">
                <img src="{{ public_path('assets/images/m_foundation_logo.jpeg') }}">
            </div>
            <div class="org">
                <div class="org-name">Mahror Foundation</div>
                <div class="org-tag">Serving Humanity with Commitment</div>
            </div>
        </div>

        <!-- TITLE -->
        <div class="title">
            APPOINTMENT CARD
        </div>

        <!-- CONTENT -->
        <div class="content">
            This is to officially appoint
            <div class="name">
                {{ $user->name }}
            </div>
            as a member of <strong>Mahror Foundation</strong>
            in the following capacity:
        </div>

        <!-- DETAILS -->
        <div class="details">
            <table>
                <tr>
                    <td class="label">Designation</td>
                    <td>: {{ $user->designation ?? 'Member' }}</td>
                </tr>
                <tr>
                    <td class="label">Appointment ID</td>
                    <td>: AP/{{ $user->id }}/{{ date('Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Appointment Date</td>
                    <td>: {{ $user->created_at->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Valid Till</td>
                    <td>: {{ now()->addYear()->format('d/m/Y') }}</td>
                </tr>
            </table>
        </div>

        <!-- FOOTER -->
        <div class="footer">
            <div class="left">
                <div class="sign">Authorized Signatory</div>
            </div>
            <div class="right">
                <div class="sign">Founder & Director</div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
