<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;

// Buat instance DOMPDF
$dompdf = new Dompdf();

// Isi HTML yang akan diubah menjadi PDF
$html = '
<!DOCTYPE html>
<html>
<head>
    <title>Laporan PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Penjualan</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Produk A</td>
            <td>10</td>
            <td>Rp. 20,000</td>
            <td>Rp. 200,000</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Produk B</td>
            <td>5</td>
            <td>Rp. 30,000</td>
            <td>Rp. 150,000</td>
        </tr>
    </table>
</body>
</html>
';

// Load HTML ke DOMPDF
$dompdf->loadHtml($html);

// Atur ukuran dan orientasi kertas (opsional)
$dompdf->setPaper('A4', 'portrait');

// Render HTML menjadi PDF
$dompdf->render();

// Output PDF ke browser
$dompdf->stream("laporan_penjualan.pdf", ["Attachment" => false]);
?>
