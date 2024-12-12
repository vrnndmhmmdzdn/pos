<?php
require_once __DIR__ . '/Model.php';
//define('TABLE', 'owners');
class Users extends Model
{
    protected $table = 'users';
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

    public function Register($datas)
    {
        $name = $datas['post']['username'];
        $email = $datas['post']['email'];
        $gender = $datas['post']['gender'];
        $password = $datas['post']['password'];

        $query = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $result = mysqli_query($this->db, $query);
        if (mysqli_num_rows($result) > 0) {
            return "Email telah terdaftar";
        }
        $nama_file = $datas["files"]["avatar"]["name"];
        $tmp_name = $datas["files"]["avatar"]["tmp_name"];
        $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $ekstensi_allowed = ["jpg", "jpeg", "JPG", "png", "webp", "heic", "raw"];

        if (!in_array($ekstensi_file, $ekstensi_allowed)) {
            return "Ekstensi tidak sesuai";
        }
        if ($datas["files"]["avatar"]["size"] > 5120000) {
            echo "<script>alert('file terlalu besar')</script>";
            return false;
        }
        $nama_file = random_int(1000, 9999) . "." . $ekstensi_file;
        move_uploaded_file($tmp_name, "../public/img/users/" . $nama_file);

        $password = base64_encode($password);

        $register_query = "INSERT INTO {$this->table} (username,avatar,gender,email,password) VALUES ('$name','$nama_file','$gender','$email','$password')";
        $result = mysqli_query($this->db, $register_query);
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION["username"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["avatar"] = $nama_file;

        $user_detail = [
            'username' => $name,
            'email' => $email,
            'avatar' => $nama_file,
        ];

        return $user_detail;
    }

    public function Login($email, $password)
    {
        $query = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $result = mysqli_query($this->db, $query);
        if (mysqli_num_rows($result) == 0) {
            return "User tidak ditemukan";
        }
        $user = mysqli_fetch_assoc($result);
        if (base64_decode($user['password'], false) == $password) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION["username"] = $user["username"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["avatar"] = $user["avatar"];

            $user_detail = [
                'username' => $user['username'],
                'email' => $email,
                'avatar' => $user['avatar'],
            ];
            return $user_detail;
        } else {
            return "Password salah";
        }
    }
    public function Logout()
    {
        session_destroy();
        session_reset();
    }
    public function updatePassword($id, $oldPass, $newPass)
    {
        $query = "SELECT * FROM {$this->table} WHERE user_id = $id";
        $result = mysqli_query($this->db, $query);
        if (mysqli_num_rows($result) == 0) {
            return "Data tidak ditemukan";
        }
        $user = mysqli_fetch_assoc($result);
        if (base64_decode($user['password'], false) !== $oldPass) {
            return "Password salah";
        }
        $newPass = base64_encode($newPass);
        $queryUpdate = "UPDATE {$this->table} SET password = '$newPass' WHERE user_id = '$id'";
        $resultUpdate = mysqli_query($this->db, $queryUpdate);
        if ($resultUpdate === false) {
            return "Update gagal";
        }
        return [
            'username' => $user['username'],
            'email' => $user['email'],
            'avatar' => $user['avatar'],
        ];
    }
}
