<?php
declare(strict_types=1);

namespace bslagter\klas;

use bslagter\klas\app\School;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\IOFactory;

require 'vendor/autoload.php';

if ($argc !== 2) {
    echo sprintf('Gebruik: %s %s', $argv[0], 'locatie-van-spreadsheet-bestand.xlsx') . "\n";
    exit;
}

$path = realpath($argv[1]);

if ($path === false) {
    echo sprintf('Bestand niet gevonden: %s', $argv[1]) . "\n";
    exit;
}

try {
    $school = School::fromSpreadsheet($path);
} catch (Exception $e) {
    echo sprintf('Bestand kon niet worden gelezen: %s', $argv[1]) . "\n";
    exit;
}

$school->distribute(2);

try {

    $newPath = preg_replace('/\.(.*?)$/s', '-ingedeeld.xlsx', $path);

    $sheet = $school->toSpreadsheet();
    $writer = IOFactory::createWriter($sheet, "Xlsx");
    $writer->save($newPath);

    echo sprintf('Bestand verwerkt en opgeslagen op %s', $newPath) . "\n\n";

} catch (Exception $e) {
    echo sprintf('Bestand kon niet worden geschreven') . "\n";
    exit;
}

