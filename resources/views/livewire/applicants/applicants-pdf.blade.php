<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link href="http://fonts.cdnfonts.com/css/tajawal" rel="stylesheet">
    <style type="text/css">
        @font-face {
            font-family: 'tajawal';
            font-style: normal;
            font-weight: 400;
            src: url(http://fonts.cdnfonts.com/css/tajawal);
        }

        body {
            font-family: 'tajawal';
            text-align: right;
            direction: rtl;
            color: #ddd;
        }
        html {
            background-color: #151a30 !important;
        }

        .sp-edit {
            padding: 4px 8px;
            background-color: #dc3545;
            border-radius: 10px;
            color: #ffffff;
        }

        .sp-edit-danger {
            padding: 2px 8px;
            background-color: #dc3545;
            border-radius: 10px;
            color: #ffffff;
        }

        .sp-edit-success {
            padding: 2px 8px;
            background-color: #198754 !important;
            border-radius: 10px;
            color: #ffffff;
        }

        .sp-edit-warning {
            padding: 2px 8px;
            background-color: #ffc107;
            border-radius: 10px;
            color: #ffffff;
        }

        .sp-edit-info {
            padding: 2px 8px;
            background-color: #17a2b8;
            border-radius: 10px;
            color: #ffffff;
        }

        .point {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #ffc107;
            display: inline-block;
            margin: 0 5px;
        }

        .point-red {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #dc3545;
            display: inline-block;
            margin: 0 5px;
        }

        .bd-F2 {
            background-color: #222b45 !important;
            -webkit-print-color-adjust: exact;
            box-shadow: 2px 2px 10px rgb(163 163 163);
            border-radius: 10px;
        }

        .t-bg-E7 {
            -webkit-print-color-adjust: exact;
            box-shadow: 2px 2px 10px rgb(163 163 163);
        }

        .pagebreak {
            page-break-after: always;
        }

        @media print {
            html {
                width: 100%;
            }

            body {
                width: 100% !important;
                background-color: #151a30 !important;
                -webkit-print-color-adjust: exact;
            }

            .pagebreak {
                page-break-after: always;
            }

            .pagebreak-2 {
                page-break-before: always;
            }

            .t-bg-E7 {
                background-color: #E7EDF5 !important;
                -webkit-print-color-adjust: exact;
                box-shadow: 5px 5px 6px rgba(0 0 0 1);
            }

            table .bg-E7 {
                background-color: #E7EDF5 !important;
                -webkit-print-color-adjust: exact;
            }

            .t-bg-E7 {
                -webkit-print-color-adjust: exact;
                box-shadow: 2px 2px 10px rgb(163 163 163);
            }

            .bd-F2 {
                background-color: #F2F3FE !important;
                -webkit-print-color-adjust: exact;
                box-shadow: 1px 1px 6px rgba(163 163 163 1);
                border-radius: 10px;
            }

            .bd-F21 {
                background-color: #151a30 !important;
                -webkit-print-color-adjust: exact;

            }

            .sp-edit {
                padding: 4px 8px;
                background-color: #dc3545;
                border-radius: 10px;
                color: #ffffff;
            }

            .sp-edit-danger {
                padding: 2px 8px;
                background-color: #dc3545;
                border-radius: 10px;
                color: #ffffff;
            }

            .sp-edit-warning {
                padding: 2px 8px;
                background-color: #ffc107;
                border-radius: 10px;
                color: #ffffff;
            }

            .sp-edit-info {
                padding: 2px 8px;
                background-color: #17a2b8;
                border-radius: 10px;
                color: #ffffff;
            }

            .point {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background-color: #ffc107;
                display: inline-block;
                margin: 0 5px;
            }

            h2 .point-red {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background-color: #dc3545;
                display: inline-block;
                margin: 0 5px;
            }
        }

        @media screen and (max-width: 600px) {
        }
    </style>
    <style type="text/css">
        @font-face {
            font-family: 'tajawal';
            font-style: normal;
            font-weight: 400;
            src: url(http://fonts.cdnfonts.com/css/tajawal);
        }

        body {
            width: 100%;
            margin: 0;
            padding: 0;
            font-family: 'tajawal';
            direction: rtl;
            text-align: right;
        }

        .color-000 {
            color: #ddd;
        }

        .img-logo {
            width: 220px;
            padding-right: 60px;
        }

        .soical {
            font-size: 24px;
            margin-top: 18px;

        }

        .soical p:first-child {
            margin-bottom: 0 !important;
            color: #245B81;
            margin-top: 0;
            border-left: 2px solid #ddd;
            padding-left: 5px;

        }

        .soical p:last-child {
            margin-bottom: 0 !important;
            color: #0BB7A8;
            margin-top: 0;
            border-left: 2px solid #ddd;
            padding-left: 5px;

        }

        .background-th {
            background-color: rgba(11, 207, 192, 0.16);
            -webkit-print-color-adjust: exact;
        }

        table .tr-content {
            background-color: rgba(255, 255, 255, 0.2);
            -webkit-print-color-adjust: exact;

        }

        table .tr-content td, table .tr-content th {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }


        @media print {
            body {
                width: 100%;
                margin: 0;
                padding: 0;
                font-family: 'tajawal';
                direction: rtl;
                text-align: right;
            }

            .color-000 {
                color: #ddd;
            }

            .img-logo {
                width: 220px;
                padding-right: 60px;
            }

            .soical {
                font-size: 24px;
                margin-top: 18px;

            }

            .soical p:first-child {
                margin-bottom: 0 !important;
                color: #245B81;
                margin-top: 0;
                border-left: 2px solid #245B81;
                padding-left: 5px;

            }

            .soical p:last-child {
                margin-bottom: 0 !important;
                color: #0BB7A8;
                margin-top: 0;
                border-left: 2px solid #245B81;
                padding-left: 5px;

            }

            .background-th {
                background-color: rgba(11, 207, 192, 0.16);
                -webkit-print-color-adjust: exact;
            }

            table .tr-content {
                background-color: rgba(255, 255, 255, 0);
                -webkit-print-color-adjust: exact;

            }

            table .tr-content td, table .tr-content th {
                padding: .75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
                border-left: 0;
                border-right: 0;
            }

            .status {
                background-color: limegreen;
                -webkit-print-color-adjust: exact;
                border-radius: 10px;
                padding: 2px 7px;
                color: white;
            }

            .status-w {
                background-color: #ffc107;
                -webkit-print-color-adjust: exact;
                border-radius: 10px;
                padding: 2px 7px;
                margin-bottom: 5px;
                color: white;
            }
        }
    </style>
</head>

<body bgcolor="#151a30" style="background-color: #151a30; margin: 0 !important; padding: 0 !important;">
<div style="text-align: center;margin: 20px 0">
    <button id="download" style="margin: 0 auto !important;text-align:center;font-family: 'tajawal';padding: .375rem 15px;background-color: #198754;font-size:19px;color: white;cursor: pointer;border: 0;border-radius: 5px">
        {{ __('Export PDF') }}</button>
</div>
<div id="applicants">
    <table width="100%" class="t-bg-E7" border="0" bgcolor="#222b45" style="box-shadow:1px 1px 6px rgba(163 163 163 1);">
        <tr width="100%" class="bg-E7" bgcolor="#222b45"
            style="margin: 20px 40px ;box-shadow:5px 5px 6px rgba(163 163 163 1);">
            <td style="padding: 40px" align="right">
                <img src="{{ asset('assets/images/logo-white.png') }}"
                     style="width: 80px ; text-align: right" alt="">
            </td>
            <td align="left" style="padding: 30px">
                <h2 style="margin-bottom: 5px">{{ __('Bill details') }}</h2>
                <h3 style="margin-top: 0;padding-left: 45px">2021 - 2022</h3>
            </td>
        </tr>
    </table>
    <table width="100%" align="right" border="0" bgcolor="#222b45" class="bd-F21" style="padding: 20px 10px;">
        <tr align="right">
            <td width="70%">
                <h2 style="margin: 0px ; text-align: right; display: inline-block ;"><p class="point-red"></p>{{ __('The details') }}</h2>
            </td>
        </tr>
    </table>
    <table width="100%" align="right" border="0" bgcolor="#222b45" class="bd-F2" style="padding:20px 30px ">
        <tr align="right">
            <td width="50%"><h4 style="margin: 5px">{{ __('Service Name') }}</h4></td>
            <td width="50%"><h4 style="margin: 5px">{{$applicant->service ? $applicant->service->name_lang : ''}}</h4></td>
        </tr>
        <tr align="right">
            <td width="50%"><h4 style="margin: 5px">{{ __('Package Name') }}</h4></td>
            <td width="50%"><h4 style="margin: 5px">{{$applicant->package ? $applicant->package->name_lang : ''}}</h4></td>
        </tr>
        <tr align="right">
            <td width="50%"><h4 style="margin: 5px">{{ __('Price SAR') }}</h4></td>
            <td width="50%"><h4 style="margin: 5px">{{$applicant->price_after}}</h4></td>
        </tr>
        <tr align="right">
            <td width="50%"><h4 style="margin: 5px">{{ __('Type') }}</h4></td>
            <td width="50%"><h4
                    style="margin: 5px">{{($applicant->package and $applicant->package->type) ? $applicant->package->type->name_lang : __('Undefined')}}</h4></td>
        </tr>
        @if($applicant->status == 3)
            <tr align="right">
                <td width="50%">
                    <h4 style="margin: 5px">{{ __('Status') }}</h4>
                </td>
                <td width="50%">
                    <h4 style="display:inline-block ;margin: 5px ;padding: 2px 8px;background-color: #198754 !important;border-radius: 10px;color: #ffffff;" class="sp-edit-success">{{ __('Active Applicant') }}</h4>
                </td>
            </tr>
        @endif
        @if($applicant->file)
            @if($applicant->status == 3)
                <tr align="right">
                    <td width="50%">
                        <h4 style="margin: 5px">{{ __('Attachments') }}</h4>
                    </td>
                    <td width="50%">
                        <a href="{{$applicant->file}}" style="margin: 5px ;padding: 2px 8px;background-color: #17a2b8;border-radius: 10px;color: #ffffff; text-decoration: none" class="sp-edit-info">{{ __('Attachments') }}</a>
                    </td>
                </tr>
            @endif
        @endif
    </table>
</div>
</body>
</html>
