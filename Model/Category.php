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
        $id_query = "WHERE category_id = $id";
        return parent::Delete($id_query, $this->table);
    }
    public function UpdateC($id, $datas)
    {
        $id_query = "WHERE category_id = $id";
        return parent::Update($id_query, $datas, $this->table);
    }
    public function FindC($id)
    {
        $id_query = "WHERE category_id = $id";
        return parent::Find($id_query, $this->table);
    }
    public function SearchC($keyword)
    {
        $keyword = "WHERE category_name LIKE '%{$keyword}%'";
        return parent::Search($keyword, $this->table);
    }
    public function PaginateC($limit, $start)
    {
        return parent::Paginate($limit, $start, $this->table);
    }
}
