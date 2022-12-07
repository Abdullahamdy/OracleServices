<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link href="http://fonts.cdnfonts.com/css/tajawal" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
          integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>    <!--load all styles for font aswesome -->
    <style type="text/css">
        @font-face {
            font-family: 'tajawal' !important;
            font-style: normal;
            font-weight: 400;
            src: url(http://fonts.cdnfonts.com/css/tajawal);
        }

        body {
            font-family: 'tajawal' !important;
            text-align: right;
            direction: rtl;
        }
        *{
            margin: 0;
            padding: 0;
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
        .point-primary {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #245B81;
            display: inline-block;
            margin: 0 5px;
        }

        .bd-F2 {
            background-color: #F2F3FE !important;
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
            .point-primary {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background-color: #245B81;
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
            .status {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background-color: #198754;
                display: inline-block;
                margin: 0 5px;
            }
            .soical {
                font-size: 24px;
            }

            .soical p:first-child {
                margin-bottom: 0 !important;
                color: #245B81;
                margin-top: 0;
                padding-left: 5px;

            }

            .soical p:last-child {
                margin-bottom: 0 !important;
                color: #0BB7A8;
                margin-top: 0;
                padding-left: 5px;

            }
            .success {
                border-radius: 8px;
                background-color: #198754;
                padding: 5px 2px;
                color: #FFFFFF;
            }
            .warnning {
                border-radius: 8px;
                background-color: #ffc107;
                padding: 5px 2px;
                color: #FFFFFF;
            }
            .danger {
                border-radius: 8px;
                background-color: #dc3545;
                padding: 5px 2px;
                color: #FFFFFF;
            }
            .tr-content{
                border: 1px solid #eee;
            }
            .tr-content tr{
                padding: 10px 5px;
            }
        }
        .soical {
            font-size: 24px;
        }

        .soical p:first-child {
            margin-bottom: 0 !important;
            color: #245B81;
            margin-top: 0;
            padding-left: 5px;

        }

        .soical p:last-child {
            margin-bottom: 0 !important;
            color: #0BB7A8;
            margin-top: 0;
            padding-left: 5px;

        }
        .status {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #198754;
            display: inline-block;
            margin: 0 5px;
        }
        .success {
            border-radius: 8px;
            background-color: #198754;
            padding: 5px 2px;
            color: #FFFFFF;
        }
        .warnning {
            border-radius: 8px;
            background-color: #ffc107;
            padding: 5px 2px;
            color: #FFFFFF;
        }
        .danger {
            border-radius: 8px;
            background-color: #dc3545;
            padding: 5px 2px;
            color: #FFFFFF;
        }
        .tr-content{
            border: 1px solid #eee;
        }
        .tr-content td{
            padding: 15px 5px;
        }
        @page {
            margin: 0 !important;
        }

        @media screen and (max-width: 600px) {
        }
    </style>
</head>

<body bgcolor="#151a30" style="background-color: #151a30; margin: 0 !important; padding: 0 !important;">
{{ $slot }}
</body>
@livewireScripts
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    window.onload = function (){
        document.getElementById("download").addEventListener("click", ()=>{
            const tasks = this.document.getElementById("applicants");
            var opt = {
                margin: -6,
                filename: 'applicants.pdf',
                html2canvas: {scale: 2},
                jsPDF: { unit: 'pt', format: 'a4', orientation: 'portrait'}
            };
            html2pdf().from(applicants).set(opt).save();
        })
    }
</script>
</html>
