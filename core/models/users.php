<?php

require_once('core/providers/mysql_provider.php');

class Users extends MySqlProvider{
    public function add_user($login, $passw, $email, $regdate, $birthday, $role_id, $status_id){
        $sql_query = 'insert into users (login, password, email, regdate, birthday, role_id, status_id)';
        $sql_query .= " values (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('sssssii', $login, $passw, $email, $regdate, $birthday, $role_id, $status_id);
        if(!$stmt->execute()){
            throw new Exeption('Помилка виконання SQL-запиту на додавання користувача');
        }
    }

    public function check_free_login($login){
        $sql_query = 'select login from users where login=?';
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('s', $login);
        if(!$stmt->execute()){
            throw new Exeption('Помилка виконання SQL-запиту на додавання користувача');
        }
        $result = $stmt->get_result();
        $N = $result->num_rows;
        return($N === 0);
    }
    //3 homework check_free_email

    public function check_auth_user($login, $passw){
        $sql_query = 'select * from users where login=? and password=?';
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('ss', $login, $passw);

        if(!$stmt->execute()){
            throw new Exeption('Помилка виконання SQL-запиту на авторизацію користувача');
        }
        $result = $stmt->get_result();
        $N = $result->num_rows;
        return($N === 1);
    }
}