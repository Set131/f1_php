<?php

require_once('core/providers/mysql_provider.php');

class News extends MySqlProvider{
    public function add_news($title, $about, $details, $photo, $source, $publish){
        $sql_query = 'insert into news (title, about, details, photo, source, publish)';
        $sql_query .= " values (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('ssssss', $title, $about, $details, $photo, $source, $publish);
        if(!$stmt->execute()){
            throw new Exeption('Помилка виконання SQL-запиту на додавання новини');
        }
    }
    public function get_news(){
        $news = [];
        $sql = 'select * from news';
        $result = $this->conn->query($sql);
        if (!$result) {
            throw new Exeption('Помилка виконання SQL-запиту на зчитування новин');
        } elseif ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $news[] = $row;
            }
        }
        return $news;
    }

    public function get_article($aid){
        $sql = 'select * from news where id=?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $aid);
        $stmt->execute();
        $result = $stmt->get_result();
        $article = $result->fetch_assoc();
        return $article;
    }
}