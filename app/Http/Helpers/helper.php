<?php
function rupiah($uang)
{
    $rp = number_format($uang, 0, ',', '.');
    return "Rp. " . $rp;
}

function tanggal($date)
{
    return date('d-m-Y', strtotime($date));
}
