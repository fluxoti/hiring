<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class fileReaderSpec extends ObjectBehavior
{
    function it_converts_data()
    {
        $this->dateConverter('20130713')->shouldReturn('13/07/2013');
    }

    function it_converts_salary()
    {
        $this->salaryConverter('100286')->shouldReturn('1002,86');
    }

    function it_makes_first_line()
    {
        $this->firstLine('ricardo','rua saldanha');
        $this->getDisplay()->shouldReturn("<h1>ricardo</h1>
                            <p>rua saldanha</p>");
        $this->company->shouldReturn(false);
    }

    function it_manages_the_table(){
        $this->tableManager('start');
        $this->table->shouldReturn("<table style='text-align: left;'>");
        $this->table = '';
        $this->tableManager('end');
        $this->table->shouldReturn("</table>");
        $this->table = '';
        $this->tableManager('start');
        $this->tableManager('end');
        $this->table->shouldReturn("<table style='text-align: left;'></table>");
    }

    function it_makes_the_table_header(){
        $this->tableHeader('start');
        $this->table->shouldReturn("<tr>
                            <th>Nome</th>
                            <th>Data admissão</th>
                            <th>Cargo</th>
                            <th>Salário</th>
                        </tr>");
    }

    function it_makes_the_table_lines(){
        $this->tableLine('ricardo', '13/07/1992', 'programador', '1008,89');
        $this->table->shouldReturn("<tr>
                            <td>ricardo</td>
                            <td>13/07/1992</td>
                            <td>programador</td>
                            <td>1008,89</td>
                        </tr>");
    }

    function it_returns_the_display(){
        $this->getDisplay()->shouldReturn("");
        $this->display = 'teste de display';
        $this->getDisplay()->shouldReturn("teste de display");
    }

    function it_runs_the_reader(){
        $this->display->shouldReturn("");
        $this->run("arquivo falso");
        $this->display->shouldReturn("Ocorreu um erro ao ler o arquivo!");
        $this->display = '';
        $this->run("funcionarios.txt");
        $this->display->shouldNotReturn("");
        $this->display->shouldNotReturn("Ocorreu um erro ao ler o arquivo!");
    }
}
