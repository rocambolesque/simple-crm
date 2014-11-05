<?php

namespace MeilleursAgents\Controller;

use MeilleursAgents\Model\Company;

class CompanyController
{
    public function getAll()
    {
        $model = new Company();
        $companies = $model->get();
        require(__DIR__.'/../../../views/company/show.php');
    }

    public function get($parameters)
    {
        $model = new Company();
        $companies = array($model->get($parameters['id']));
        require(__DIR__.'/../../../views/company/show.php');
    }

    public function update($parameters, $request)
    {
        $model = new Company();
        $company = null;

        if (empty($request)) {
            $company = $model->get($parameters['id']);
        } else {
            $company = $model->update($request);
        }

        require(__DIR__.'/../../../views/company/edit.php');
    }

    public function search($parameters, $request)
    {
        $model = new Company();
        $companies = array();
        if (isset($request['search'])) {
            $companies = $model->search($request['search']);
        }
        require(__DIR__.'/../../../views/company/search.php');
    }
}
