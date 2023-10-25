<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        #footer {
            width: 100%;
            text-align: center;
            font-size: 11px;
            font-family: sans-serif;
        }

        #footer-left {
            text-align: left;
        }

        #footer-right {
            text-align: right;
        }
    </style>
</head>

<body>

    <table id="footer">
        <tr>
            <td id="footer-left">Copyright © OZA DUERP Online</td>
            <td id="footer-right">{{ $single_document->name_enterprise }}</td>
        </tr>
    </table>

</body>

</html>
