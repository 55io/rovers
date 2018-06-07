<?php
/**
 * Created by PhpStorm.
 * User: bdis1
 * Date: 25.02.2018
 * Time: 21:58
 */

namespace VSalin\Reader;

use Exception;

class Reader
{
    private $path = '';

    function __construct($path)
    {
        $this->path = $path;
    }

    public function readFromFile()
    {
        $result = array();
        $handle = @fopen($this->path, "r");
        if ($handle) {
            while (($buffer = fgets($handle)) !== false) {
                $result[] = preg_split("/[^\w]+?/", $buffer, -1, PREG_SPLIT_NO_EMPTY);
            }
            fclose($handle);
        } else {
            throw new Exception("Can't open input file");
        }
        return array_values(array_filter($result));
    }
}


