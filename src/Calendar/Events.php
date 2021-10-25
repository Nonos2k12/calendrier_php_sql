<?php 

namespace App\Calendar;

class Events {
    public function getEventsBetween(\Datetime $start, \Datetime $end): array {
        $pdo = new \PDO('mysql:host=localhost;dbname=tutocalendar', 'root', 'root', [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]);
        $sql = "SELECT * FROM events WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND'{$end->format('Y-m-d 23:59:59')}'";
        
        $statement = $pdo->query($sql);
        $results = $statement->fetchAll();
        return $results;
    }
}

?>