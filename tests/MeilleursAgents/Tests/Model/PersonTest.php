<?php

namespace MeilleursAgents\Tests\Model;

error_reporting(E_ALL); ini_set('display_errors', 1);

use MeilleursAgents\Model\Person;

class PersonTest extends \PHPUnit_Framework_TestCase
{
    public function testGetFromCompany()
    {
        $id = 1100003;
        $model = new Person();
        $persons = $model->getFromCompany($id);

        $this->assertCount(2, $persons);
    }

    public function testGet()
    {
        $id = 1300003;
        $model = new Person();
        $person = $model->get($id);

        $this->assertEquals($id, $person['id']);
    }

    public function testUpdate()
    {
        $id = 1300003;
        $name = time();

        $model = new Person();
        $person = $model->get($id);

        $person['name'] = $name;
        $this->assertTrue($model->update($person) !== false);

        $person = $model->get($id);
        $this->assertEquals($name, $person['name']);
    }
    public function testSearch()
    {
        $string = 'M';

        $model = new Person();
        $results = $model->search($string);

        $this->assertCount(2, $results);
    }
}
