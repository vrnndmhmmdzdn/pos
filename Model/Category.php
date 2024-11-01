<?php
require_once __DIR__ . '/Model.php';
//define('TABLE', 'owners');
class Category extends Model
{
    protected $table = 'categories';
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
    public function SearchC($keyword)
    {
        $keyword = "WHERE name LIKE '%{$keyword}%'";
        return parent::Search($keyword, $this->table);
    }
    public function PaginateC($limit, $start)
    {
        return parent::Paginate($limit, $start, $this->table);
    }
}
