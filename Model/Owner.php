<?php
require_once __DIR__ . '/Model.php';
//define('TABLE', 'owners');
class Owner extends Model
{
    protected $table = 'owners';
    public function CreateC($datas)
    {
        return parent::Create($datas, $this->table);
    }
    public function AllC()
    {
        return parent::Table($this->table);
    }
    public function DeleteC($id)
    {
        return parent::Delete($id, $this->table);
    }
    public function UpdateC($id, $datas)
    {
        return parent::Update($id, $datas, $this->table);
    }
    public function FindC($id)
    {
        return parent::Find($id, $this->table);
    }
}
