<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ID Card</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: DejaVu Sans, sans-serif;
        }

        .card {
            width: 300px;
            height: 480px;
            background-color: #1b2370;
            color: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
        }

        /* TOP AREA */
        .top {
            background-color: #ffffff;
            height: 150px;
            text-align: center;
            padding-top: 15px;
        }

        .logo {
            width: 200px;
        }

        /* PHOTO */
        .photo-wrapper {
            position: absolute;
            top: 95px;
            left: 50%;
            transform: translateX(-50%);
            background: #1b2370;
            padding: 6px;
            border-radius: 18px;
        }

        .photo-wrapper img {
            width: 135px;
            height: 135px;
            border-radius: 14px;
            object-fit: cover;
            background: #fff;
        }

        /* CONTENT */
        .content {
            margin-top: 80px;
            text-align: center;
            padding: 10px 15px;
        }
        .contents{
            
            text-align: center;
            padding: 10px 15px;
        }

        .name {
            font-size: 20px;
            font-weight: bold;
            margin-top:5px;
        }

        .phone {
            font-size: 16px;
            margin-top: 4px;
            letter-spacing: 1px;
        }

        .designation {
            margin: 14px auto;
            background-color: #2f3dbd;
            padding: 8px 0;
            width: 85%;
            border-radius: 25px;
            font-size: 13px;
            font-weight: bold;
        }

        .details {
            font-size: 13px;
            line-height: 22px;
            text-align: center;
            padding-left: 20px;
        }
        .text {
            font-size: 13px;
            line-height: 22px;
            margin-bottom: 20px;
        }
        .footer {
            position: absolute;
            bottom: 25px;
            left: 25px;
            right: 25px;
            font-size: 12px;
            text-align: left;
        }

        .line {
            border-bottom: 1px solid #ff8c2b;
            margin: 8px 0 12px 0;
        }
    </style>
</head>

<body>
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
    <!-- FRONT SIDE -->
    <td align="center" width="50%" valign="top">

        <div class="card">

            <!-- TOP WHITE AREA -->
            <div class="top">
                <img src="{{ public_path('assets/images/m_foundation_logo.jpeg') }}"
                     class="logo">
            </div>

            <!-- PHOTO -->
            <div class="photo-wrapper">
                <img src="{{ public_path('storage/'.$user->profile_img) }}">
            </div>

            <!-- CONTENT -->
            <div class="content">
                <div class="name">
                    {{strtoupper($user->name)}}
                </div>

                <div class="phone">
                    {{$user->phone}}
                </div>

                <div class="designation">
                    FOUNDER &amp; DIRECTOR
                </div>

                <div class="details">
                    <strong>ID Number :</strong> MF/{{ $user->id }}/{{ date('Y') }}<br>
                    <strong>Joining Date :</strong> {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}
                </div>
            </div>

        </div>

    </td>

    <!-- BACK SIDE -->
    <td align="center" width="50%" valign="top">

        <div class="card">

            <div class="contents">
                <div class="title">
                    TERMS &amp;<br>CONDITIONS
                </div>

                <div class="text">
                    Identification: Carry the ID card at all times during
                    working hours for identification purposes.
                </div>

                <div class="text">
                    Authorized Use: The ID card is strictly for official
                    use and should not be shared or used for unauthorized
                    purposes.
                </div>

                <div class="contact-btn">
                    CONTACT ME
                </div>
            </div>

            <div class="footer">
                <strong>Phone :</strong> +91 9088998800
                <div class="line"></div>

                <strong>Email :</strong> hi@mahrorfoundation.com
                <div class="line"></div>

                <strong>Website :</strong>www.mahrorfoundation.com
                
            </div>

        </div>

    </td>
</tr>
</table>

</body>
</html>
