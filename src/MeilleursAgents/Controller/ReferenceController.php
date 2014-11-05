<?php

namespace MeilleursAgents\Controller;

class ReferenceController
{
    public function create($parameters, $request)
    {
        $modelName = 'MeilleursAgents\Model\\'.$this->modelName;
        $model = new $modelName();
        $person = null;
        $resourceName = $this->resourceName;

        if (empty($request)) {
            $fields = $model->getFields();
            require(__DIR__.'/../../../views/reference/create.php');
        } else {
            $resource = $model->create($request);
            require(__DIR__.'/../../../views/reference/show.php');
        }
    }
}
