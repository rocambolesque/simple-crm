<?php

namespace MeilleursAgents\Controller;

use MeilleursAgents\Model\Person;

class PersonController
{
    public function getFromCompany($parameters)
    {
        $model = new Person();
        $persons = $model->getFromCompany($parameters['id']);
        require(__DIR__.'/../../../views/person/show.php');
    }

    public function get($parameters)
    {
        $model = new Person();
        $persons = array($model->get($parameters['id']));
        require(__DIR__.'/../../../views/person/show.php');
    }

    public function update($parameters, $request)
    {
        $model = new Person();
        $person = null;

        if (empty($request)) {
            $person = $model->get($parameters['id']);
        } else {
            $person = $model->update($request);
        }

        require(__DIR__.'/../../../views/person/edit.php');
    }

    public function search($parameters, $request)
    {
        $model = new Person();
        $persons = array();
        if (isset($request['search'])) {
            $persons = $model->search($request['search']);
        }
        require(__DIR__.'/../../../views/person/search.php');
    }
}
