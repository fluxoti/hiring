<?php

namespace Hiring\Exer3;


class ReaderFile
{

    protected $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    private function convertDate($data)
    {
        return date("d/m/Y", strtotime($data));;
    }

    private function convertSalary($salary)
    {
        return number_format($salary / 100, 2, ',', '.');
    }

    public function getCompany()
    {

        $str = strtok($this->file, "\n");

        $name = substr($str, 0, 30);
        $address = substr($str, 30, 69);

        return ['name' => $name, 'address' => $address];
    }

    public function getWorkers()
    {
        $workers = explode("\n",$this->file);
        $infos = array();

        if(count($workers) >0) {
            unset($workers[0]);


            foreach ($workers as $worker) {
                $name = substr($worker, 0, 20);
                $admission = $this->convertDate(substr($worker, 20, 8));
                $position = substr($worker, 28, 31);
                $salary = $this->convertSalary(substr($worker, 59, 7));

                $infos[] = [
                    'name' => $name,
                    'admission' => $admission,
                    'position' => $position,
                    'salary' => $salary
                ];
            }
        }
        return $infos;
    }

    public function getInfo()
    {
        $info = array();
        $info['Company'] = $this->getCompany();
        $info['Workers'] = $this->getWorkers();


        return $info;
    }

}
