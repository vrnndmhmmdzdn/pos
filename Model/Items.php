<?php
require_once __DIR__ . '/Model.php';
//define('TABLE', 'owners');
class Items extends Model
{
    protected $table = 'items';

    public function CreateC($datas)
    {
        //var_dump($datas["post"]);
        //var_dump($datas["files"]);
        $nama_file = $datas["files"]["attachment"]["name"];
        $tmp_name = $datas["files"]["attachment"]["tmp_name"];
        $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $ekstensi_allowed = ["jpg", "jpeg", "JPG", "png", "webp", "heic", "raw"];

        if (!in_array($ekstensi_file, $ekstensi_allowed)) {
            return "ekstensi tidak sesuai";
        }
        if ($datas["files"]["attachment"]["size"] > 5120000) {
            return "file terlalu besar";
        }
        $nama_file = random_int(1000, 9999) . "." . $ekstensi_file;
        move_uploaded_file($tmp_name, "../../public/img/items/" . $nama_file);
        $datas = [
            "item_name" => $datas["post"]["item_name"],
            "attachment" => $nama_file,
            "price" => $datas["post"]["price"],
            "item_category_id" => $datas["post"]["item_category_id"],
        ];
        return parent::Create($datas, $this->table);
    }
    public function AllC()
    {
        return parent::Table($this->table);
    }
    public function DeleteC($id)
    {
        $id_query = " WHERE item_id = $id";
        return parent::Delete($id_query, $this->table);
    }
    public function UpdateC($id, $datas)
    {
        $attachment = '';
        if ($datas['files']['attachment']['name'] !== '') {
            $nama_file = $datas["files"]["attachment"]["name"];
            $tmp_name = $datas["files"]["attachment"]["tmp_name"];
            $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
            $ekstensi_allowed = ["jpg", "jpeg", "JPG", "png", "webp", "heic", "raw"];

            if (!in_array($ekstensi_file, $ekstensi_allowed)) {
                return "Ekstensi tidak sesuai";
            }
            if ($datas["files"]["attachment"]["size"] > 5120000) {
                echo "<script>alert('file terlalu besar')</script>";
                return false;
            }
            $nama_file = random_int(1000, 9999) . "." . $ekstensi_file;
            move_uploaded_file($tmp_name, "../../public/img/items/" . $nama_file);
            $attachment = $nama_file;
        }
        $datas = [
            "item_name" => $datas["post"]["name"],
            "price" => $datas["post"]["price"],
            "item_category_id" => $datas["post"]["item_category_id"]
        ];
        if ($attachment !== '') {
            $datas["attachment"] = $attachment;
        }
        $id_query = "WHERE item_id = $id";
        return parent::Update($id_query, $datas, $this->table);
    }
    public function FindC($id)
    {
        $id_query = "WHERE item_id = $id";
        return parent::Find($id_query, $this->table);
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
    public function AllPaginate($limit, $start)
    {
        $query = "SELECT * FROM items JOIN categories ON items.item_category_id = categories.category_id LIMIT $limit,$start";
        $result = mysqli_query($this->db, $query);
        return $this->Convert($result);
    }
}
