<?php

Class FileReader
{
    private $file_name;

    public function __construct($file_name)
    {
        $this->file_name = $file_name;
    }

    public function readCompany() {

        $file = fopen($this->file_name, 'r');
        $line = fgets($file);

        $company = array();
        $company['name'] = trim(substr($line, 0, 30));
        $company['address'] = trim(substr($line, 30, 70));

        fclose($file);

        return $company;
    }


    public function readWorkers()
    {
        $file = fopen($this->file_name, 'r');
        $line = fgets($file);

        $workers = array();
        $i = 0;
        while ($line = fgets($file)) {
            $workers[$i]['name'] = trim(substr($line, 0, 20));
            $workers[$i]['date'] = $this->convert_date(trim(substr($line, 20, 8)));
            $workers[$i]['role'] = trim(substr($line, 28, 32));
            $workers[$i]['salary'] = number_format(trim(substr($line, 60, 8)) / 100, 2, ',', '.');

            $i++;
        }

        fclose($file);

        return $workers;
    }

    private function convert_date($date)
    {
        return date('d/m/Y', strtotime($date));
    }


}

?>