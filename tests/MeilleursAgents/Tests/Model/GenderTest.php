<?php

namespace MeilleursAgents\Tests\Model;

error_reporting(E_ALL); ini_set('display_errors', 1);

use MeilleursAgents\Model\Gender;

class GenderTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $gender = array(
            'value' => time()
        );

        $model = new Gender();
        $result = $model->create($gender);

        $this->assertTrue(isset($result['id']));
        $this->assertEquals($gender['value'], $result['value']);
    }
}
