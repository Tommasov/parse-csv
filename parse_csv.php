<?php
/**
 *
 *
 * Funzione per convertire un csv in array
 *
 * @param string $filename
 * @param string $delimiter
 *
 * @return array|bool
 */
function parse_csv($filename = '', $delimiter = ',')
{

    if (!file_exists($filename) || !is_readable($filename)) {
        return false;
    }

    $header = null;
    $data = array();

    if (($handle = fopen($filename, 'r')) !== false) {

        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
            if (!$header) {
                $header = $row;
            } else {
                $data[] = array_combine($header, $row);
            }
        }

        fclose($handle);
    }

    return $data;
}
