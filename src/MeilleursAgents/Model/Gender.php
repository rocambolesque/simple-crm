<?php

namespace MeilleursAgents\Model;

class Gender extends Model
{
    protected $tableName = 'ref_gender';
    protected $fields = ['enabled', 'value'];

    public function getFields()
    {
        return $this->fields;
    }
}
