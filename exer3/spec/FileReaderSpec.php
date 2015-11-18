<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileReaderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('teste');
        $this->shouldHaveType('FileReader');
    }

    function it_should_return_companies()
    {

        $this->beConstructedWith('funcionarios.txt');



        $this->readCompany()->shouldContain('Technology Company Inc');
        $this->readCompany()->shouldContain('Wallaby Way 42 Sidney Australia');

    }

    function it_should_return_workers()
    {

        $this->beConstructedWith('funcionarios.txt');


        $this->readWorkers()[0]->shouldContain('John Doe');
        $this->readWorkers()[0]->shouldContain('08/02/2010');
        $this->readWorkers()[0]->shouldContain('Senior PHP Developer');
        $this->readWorkers()[0]->shouldContain('4.589,45');

    }
}
