<?php

namespace Bebro\Blogas\Models;

class Tree extends Model
{
    public $name;
    public ?int $id = null;

    static public function all(): array
    {
        $sql = '
            SELECT * FROM trees
        ';

        $stmt = self::getPdo()->query($sql);
        return $stmt->fetchAll();
    }

    static public function find(int $id): ?Tree
    {
        $sql = '
            SELECT * FROM trees 
            WHERE id = ?
        ';

        $stmt = self::getPdo()->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        if (!$data) {
            return null;
        }

        $tree = new self();
        $tree->id = (int) $data['id'];
        $tree->name = (string) $data['name'];

        return $tree;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function store()
    {
        $sql = '
            INSERT INTO trees 
            (name) 
            VALUES (?)
        ';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->name]);
    }

    public function update($id)
    {
        $sql = '
            UPDATE trees 
            SET name = ?
            WHERE id = ?
        ';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->name, $id]);
    }

    public function delete($id)
    {
        $sql = '
            DELETE FROM trees 
            WHERE id = ?
        ';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

}
