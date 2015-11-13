<?php

class fileReader {

    public $file;
    public $handle;
    public $table = '';
    public $display = '';
    public $company = true;

    public function dateConverter($date){
        return date("d/m/Y", strtotime($date));
    }

    public function salaryConverter($salary){
        return substr_replace($salary, ',', -2, 0);
    }

    public function firstLine($name, $address){
        $this->display .= "<h1>{$name}</h1>
                            <p>{$address}</p>";
        $this->company = false;
    }

    public function tableManager($action){
        $this->table .= $action == 'start' ? "<table style='text-align: left;'>" : "</table>";
    }

    public function tableHeader(){
        $this->table .= "<tr>
                            <th>Nome</th>
                            <th>Data admissão</th>
                            <th>Cargo</th>
                            <th>Salário</th>
                        </tr>";
    }

    public function tableLine($name, $date, $office, $salary){
        $this->table .= "<tr>
                            <td>{$name}</td>
                            <td>{$date}</td>
                            <td>{$office}</td>
                            <td>{$salary}</td>
                        </tr>";
    }

    public function getDisplay(){
        return $this->display;
    }

    public function run($file){

        if (file_exists($file)) {

            $handle = fopen($file, "r");

            $this->tableManager('start');

            while (!feof($handle)) {
                $line = fgets($handle);
                if($this->company){
                    $name = substr($line, 0, 30);
                    $address = substr($line, 30, 70);
                    $this->firstLine($name, $address);
                 }else{
                    $name = substr($line, 0, 20);
                    $date = $this->dateConverter(substr($line, 20, 8));
                    $office = substr($line, 28, 31);
                    $salary = $this->salaryConverter(substr($line, 59, 6));
                    $this->tableLine($name, $date, $office, $salary);
                }
            }

            $this->tableManager('end');

            fclose($handle);

            $this->display .= $this->table;
        }else{
            $this->display = 'Ocorreu um erro ao ler o arquivo!';
        }
    }

}