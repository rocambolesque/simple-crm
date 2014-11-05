<?php

namespace MeilleursAgents\Model;

class Company extends Model
{
    protected $tableName = 'company';

    public function get($id = null)
    {
        $records = array();
        if (isset($id)) {
            $records = array(parent::get($id));
        } else {
            $records = parent::get();
        }

        $model = new Address();
        for ($i = 0, $l = count($records) ; $i < $l ; $i++) {
            $addresses = $model->getFromCompany($records[$i]['id']);
            $records[$i]['addresses'] = $addresses;
        }

        if (isset($id)) {
            return $records[0];
        }
        return $records;
    }

    public function update($model)
    {
        $addresses = $model['addresses'];
        unset($model['addresses']);

        $query = 'UPDATE '.$this->tableName.' SET ';

        foreach ($model as $key => $value) {
            if ($key === 'id' || !$value) {
                continue;
            }
            $query .= $key.' = :'.$key.',';
        }

        $query = substr($query, 0, -1);

        $query .= ' WHERE id = :id';

        $sth = $this->dbh
            ->prepare($query);

        foreach ($model as $key => $value) {
            if ($value) {
                $sth->bindValue(':'.$key, $value);
            }
        }

        if (!$sth->execute()) {
            throw new \Exception(print_r($this->dbh->errorInfo(), true));
        }


        $addressModel = new Address();
        foreach ($addresses as $address) {
            $addressModel->update($address);
        }

        return $this->get($model['id']);
    }
}
