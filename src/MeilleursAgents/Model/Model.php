<?php

namespace MeilleursAgents\Model;

class Model
{
    public function __construct()
    {
        $this->dbh = new \PDO('sqlite://home/vagrant/ma/data/ma.db');
    }

    public function get($id = null)
    {
        $query = 'SELECT * FROM '.$this->tableName;

        if (isset($id)) {
            $query .= ' WHERE '.$this->tableName.'.id = :id';
        }

        $sth = $this->dbh
            ->prepare($query);

        if (isset($id)) {
            $sth->bindParam(':id', $id, \PDO::PARAM_INT);
        }

        if (!$sth->execute()) {
            throw new \Exception(print_r($this->dbh->errorInfo(), true));
        }

        $records = $sth->fetchAll(\PDO::FETCH_ASSOC);

        if (isset($id)) {
            return $records[0];
        }
        return $records;
    }

    public function update($model)
    {
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
        return $this->get($model['id']);
    }

    public function search($string)
    {
        $query = 'SELECT * FROM '.$this->tableName.' WHERE name LIKE :name';

        $sth = $this->dbh
            ->prepare($query);

        $sth->bindValue(':name', '%'.$string.'%');

        if (!$sth->execute()) {
            throw new \Exception(print_r($this->dbh->errorInfo(), true));
        }

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getFromCompany($id)
    {
        $query = 'SELECT * FROM '.$this->tableName.' WHERE company_id = :id';

        $sth = $this->dbh
            ->prepare($query);

        $sth->bindParam(':id', $id, \PDO::PARAM_INT);

        if (!$sth->execute()) {
            throw new \Exception(print_r($this->dbh->errorInfo(), true));
        }

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create($model)
    {
        $fields = [];
        $values = [];
        foreach ($model as $key => $value) {
            if (!$value) {
                continue;
            }
            $fields[] = $key;
            $values[] = ':'.$key;
        }

        $query = 'INSERT INTO '.$this->tableName.' ('.implode(',', $fields).') VALUES ('.implode(',', $values).')';

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
        return $this->get($this->dbh->lastInsertId());
    }
}
