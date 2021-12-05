<?php 

declare(strict_types=1);

namespace App;

require_once('Exception/StorageException.php');

use App\Exception\ConfigurationException;
use App\Exception\StorageException;
use PDO;
use PDOException;
use Throwable;

class Database 
{
    private PDO $connection;

    public function __construct(array $config)
    {
        try {
            $this->checkDatbaseConnectionProperties($config);
            $this->connectionToDatabase($config);
        } catch(PDOException $e) {
            throw new StorageException('connection ERROR!');
        }
    }

    public function createNote(array $data):void {
        try {
            $title = $this->connection->quote($data['task-title']);
            $description = $this->connection->quote($data['description']);
            $date = $this->connection->quote(date('Y-m-d H:i:s'));

            $query = "INSERT INTO notes(title, description, created) VALUES($title, $description, $date)";
            $this->connection->exec($query);
        } catch(Throwable $e) {
            throw new StorageException('Sorry we cannot add yuor note to database please try later :(');
        }
    }

    private function connectionToDatabase(array $config): void {
        $dsn = "mysql:host={$config['host']};dbname={$config['databaseName']}";
        $this->connection = new PDO(
            $dsn,
            $config['databaseUserName'],
            $config['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }

    private function checkDatbaseConnectionProperties(array $config): void {
        if(self::checkIfPropertiesToConnectToDatabaseAreExist($config))
            throw new ConfigurationException('Host, password, database username or database name are empty!');
    }

    private function checkIfPropertiesToConnectToDatabaseAreExist(array $config): bool {
        return (empty($config['host']) || empty($config['databaseName']) || empty($config['databaseUserName']) || empty($config['password']));
    }
}