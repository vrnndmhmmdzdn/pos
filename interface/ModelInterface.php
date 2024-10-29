<?php
interface ModelInterface
{
    public function CreateC($datas);
    public function AllC();
    public function DeleteC($id);
    public function FindC($id);
    public function UpdateC($id, $datas);
}
