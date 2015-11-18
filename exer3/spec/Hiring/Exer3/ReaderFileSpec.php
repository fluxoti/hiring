<?php

namespace spec\Hiring\Exer3;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReaderFileSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('test');
        $this->shouldHaveType('Hiring\Exer3\ReaderFile');
    }

    function it_should_return_array_with_company_and_workers()
    {

        $file = "test\ntest";

        $this->beConstructedWith($file);

        $return =$this->getInfo();

        $return->shouldHaveCount(2);

        $return->shouldHaveKey('Company');
        $return->shouldHaveKey('Workers');
        $return['Company']->shouldHaveCount(2);
        $return['Workers']->shouldHaveCount(1);

    }

    function it_should_return_array_with_company_name_and_address()
    {
        $name ='Phpspec Company Inc           ';
        $address ='Street of test';
        $this->beConstructedWith($name.$address);

        $return =$this->getCompany();

        $return->shouldHaveCount(2);

        $return->shouldHaveKey('name');
        $return->shouldHaveKey('address');

        $return['name']->shouldBeEqualTo($name);
        $return['address']->shouldBeEqualTo($address);

    }

    function it_should_return_array_with_workers_data()
    {

        $workers = [
            ['name' => 'test1               ', 'admission' => '20150208','admissionDate' => '08/02/2015','position' =>'tester1                        ','salary' => '125445','salaryFormated' =>'1.254,45'],
            ['name' => 'test2               ', 'admission' => '20160208','position' =>'tester2                        ','salary' => '134545'],
        ];
        $file ="Phpspec Company Inc           Street of test\n";
        $file .= $workers[0]['name'].$workers[0]['admission'].$workers[0]['position'].$workers[0]['salary']."\n";
        $file .=$workers[1]['name'].$workers[1]['admission'].$workers[1]['position'].$workers[1]['salary']."";



        $this->beConstructedWith($file);

        $return =$this->getWorkers();

        $return->shouldHaveCount(2);

        $return[0]['name']->shouldBeEqualTo($workers[0]['name']);
        $return[0]['admission']->shouldBeEqualTo($workers[0]['admissionDate']);
        $return[0]['position']->shouldBeEqualTo($workers[0]['position']);
        $return[0]['salary']->shouldBeEqualTo($workers[0]['salaryFormated']);

    }



    public function getMatchers()
    {
        return [
            'haveKey' => function($subject, $key) {
                return array_key_exists($key, $subject);
            },
            'haveValue' => function($subject, $value) {
                return in_array($value, $subject);
            },
        ];
    }
}
