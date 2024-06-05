<?php

namespace APP\Model\Data;

class Data
{
    private $connection;

    function __construct()
    {
        $this->connection = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), getenv('MYSQL_DATABASE'));
    }

    public function get_all(): array
    {
        $sql = "SELECT * FROM ekatte";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get_all_raw(): object
    {
        $sql = "SELECT * FROM ekatte";
        return $this->connection->query($sql);
    }

    public function get_limit_page($offset, $limit): object
    {
        $sql = "SELECT * FROM ekatte LIMIT $limit,$offset";
        return $this->connection->query($sql);
    }

    public function query($query): bool
    {
        return $this->connection->query($query);
    }

    public function get_filtered_data($filter, $limit, $offset): array
    {

        $sql = "SELECT * FROM ekatte";
        $conditions = [];
        foreach ($filter as $key => $value) {
            if (!empty($value)) {
                $conditions[] = " $key LIKE '%$value%'";
            }
        }

        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(' AND ', $conditions);
        }

        $get_all_row_data = $this->connection->query($sql);

        $sql .= " LIMIT $limit,$offset";
        $page_data = $this->connection->query($sql);

        return [$get_all_row_data->num_rows, $page_data];
    }

    public function close(): bool
    {
        return $this->connection->close();
    }
}
