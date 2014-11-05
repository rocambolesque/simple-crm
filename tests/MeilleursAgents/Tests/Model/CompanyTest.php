<?php

namespace MeilleursAgents\Tests\Model;

error_reporting(E_ALL); ini_set('display_errors', 1);

use MeilleursAgents\Model\Company;

class CompanyTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAll()
    {
        $model = new Company();
        $companies = $model->get();

        $this->assertCount(3, $companies);
    }

    public function testGet()
    {
        $id = 1100003;
        $model = new Company();
        $company = $model->get($id);

        $this->assertEquals($id, $company['id']);
    }

    public function testUpdate()
    {
        $id = 1100003;
        $name = time();

        $model = new Company();
        $company = $model->get($id);

        $company['name'] = $name;
        $this->assertTrue($model->update($company) !== false);

        $company = $model->get($id);
        $this->assertEquals($name, $company['name']);
    }

    public function testSearch()
    {
        $string = 'M';

        $model = new Company();
        $results = $model->search($string);

        $this->assertCount(2, $results);
    }
}
