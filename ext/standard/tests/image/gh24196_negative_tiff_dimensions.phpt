--TEST--
GH-24196: Reject negative TIFF dimensions from signed IFD field formats
--FILE--
<?php
function tiffWithDimensions(int $widthType, int $widthValue, int $heightType, int $heightValue): string {
    return "II" . pack('vVv', 42, 8, 2)
        . pack('vvVV', 0x0100, $widthType, 1, $widthValue)
        . pack('vvVV', 0x0101, $heightType, 1, $heightValue)
        . pack('V', 0);
}

$cases = [
    'signed short negative width' => [8, 0xffff, 3, 1],
    'signed long negative width' => [9, 0xffffffff, 3, 1],
    'signed short negative height' => [3, 1, 8, 0xffff],
    'signed long negative height' => [3, 1, 9, 0xffffffff],
];

foreach ($cases as $label => [$wType, $wValue, $hType, $hValue]) {
    echo "$label: ";
    var_dump(@getimagesizefromstring(tiffWithDimensions($wType, $wValue, $hType, $hValue)) === false);
}

$valid = @getimagesizefromstring(tiffWithDimensions(8, 12, 9, 20));
echo 'positive signed values preserved: ';
var_dump($valid !== false && $valid[0] === 12 && $valid[1] === 20);
?>
--EXPECT--
signed short negative width: bool(true)
signed long negative width: bool(true)
signed short negative height: bool(true)
signed long negative height: bool(true)
positive signed values preserved: bool(true)
