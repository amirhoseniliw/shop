<?php 

require_once __DIR__ . '/../../../../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('defaultFont', 'DejaVu Sans');
$options->set('isRemoteEnabled', true);
$options->set('isHtml5ParserEnabled', true);

$dompdf = new Dompdf($options);

$html = '
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            direction: rtl;
            text-align: right;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <p>سلام دنیا! این یک تست فارسی با فونت داخلی Dompdf است.</p>
</body>
</html>
';

$dompdf->loadHtml($html, 'UTF-8');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("test.pdf", ["Attachment" => false]);
