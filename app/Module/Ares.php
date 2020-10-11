<?php

namespace App\Module;

class Ares
{
    /** @var string */
    private $ares_url = 'https://wwwinfo.mfcr.cz/cgi-bin/ares/darv_bas.cgi?ico=';

    /** @var int */
    private $ic;


    /**
     * @param int $ic IČ of subject
     */
    public function __construct($ic)
    {
        $this->ic = (int)$ic;
    }

    /**
     * @return array Data
     */
    public function getData()
    {
        $url = $this->ares_url . $this->ic;
        $file = $this->getXML($url);
        if ($file) $xml = simplexml_load_string($file);
        if (!isset($xml)) {
            return false;
        }
        $ns = $xml->getDocNamespaces();
        $data = $xml->children($ns['are']);
        $el = $data->children($ns['D'])->VBAS;

        $a = array();

        if (strval($el->ICO) == $this->ic) {
            $a['ic'] = strval($el->ICO);
            $a['dic'] = strval($el->DIC);
            $a['firma'] = strval($el->OF);

            $a['jmeno'] = "";
            $a['prijmeni'] = "";
            // detekce jména a firmy ..
            $firma = $a['firma'];
            $roz = explode(" ", $firma);
            $match = preg_match("/(s\.r\.o\.|s\. r\. o\.|spol\. s r\.o\.|a\.s\.|a\. s\.|v\.o\.s|v\. o\. s\.|o\.s\.|k\.s\.|kom\.spol\.)/", $firma);
            if (count($roz) == 2 and !$match) {
                // nenašli jsme shodu s firmou, pravděpodobně se jedná o živnostníka se jménem ..
                $a['jmeno'] = $roz[0];
                $a['prijmeni'] = $roz[1];
            }

            $a['ulice'] = strval($el->AA->NU);
            if (!empty($el->AA->CO) or !empty($el->AA->CD)) {
                // detekování popisného a orientačního čísla
                $a['ulice'] .= " ";
                if (!empty($el->AA->CD)) $a['ulice'] .= strval($el->AA->CD);
                if (!empty($el->AA->CO) and !empty($el->AA->CD)) $a['ulice'] .= "/";
                if (!empty($el->AA->CO)) $a['ulice'] .= strval($el->AA->CO);
            }

            $a['mesto'] = strval($el->AA->N);
            $a['psc'] = strval($el->AA->PSC);
            $a['stav'] = 'ok';
        } else {
            return false;
        }

        return  json_encode($a);
    }


    /**
     * @param string $url
     * @return string
     */
    private function getXML($url)
    {
        return file_get_contents($url);
    }
}
