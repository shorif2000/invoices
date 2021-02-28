<?php
namespace Database\Seeders;

use Illuminate\Database\Connection;
use Illuminate\Database\Seeder as BaseSeeder;
use Illuminate\Database\DatabaseManager;

class Seeder extends BaseSeeder {

    /**
     * @param  string|null  $name
     * @return Connection
     */
    public function getDatabaseConnection($name = null): Connection
    {
        /** @var DatabaseManager $db */
        $db = app(DatabaseManager::class);
        return $db->connection($name);
    }

    /**
     * @param int $delta An offset to apply to the resulting id
     * @return int
     */
    public function incrementingId($delta = 0): int
    {
        static $id = 1;
        $id += $delta;
        return ($id++);
    }

    /**
     * @return \Carbon\Carbon
     */
    public function timestamp(): \Carbon\Carbon
    {
        return \Carbon\Carbon::now();
    }

    /**
     * @param $attributes
     * @return array
     */
    public function withTimestamps($attributes): array
    {
        return array_merge([
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ], $attributes);
    }

    /**
     * @param $idColumn
     * @param $attributes
     * @return array
     */
    public function withTimestampsAndId($idColumn, $attributes): array
    {
        return array_merge([ $idColumn => $this->incrementingId() ], $this->withTimestamps($attributes));
    }

}
