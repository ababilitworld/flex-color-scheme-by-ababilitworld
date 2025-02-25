<?php

namespace AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Repository\Wordpress;

use Ababilitworld\{
        FlexColorSchemeByAbabilitworld\Package\ColorScheme\Repository\Contract\ColorScheme as ColorSchemeContract,
        FlexColorSchemeByAbabilitworld\Package\ColorScheme\Model\ColorScheme as ColorSchemeModel,
    };

use wpdb;

class ColorScheme implements ColorSchemeContract
{
    private wpdb $db;
    private string $table;

    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->table = $wpdb->prefix . 'color_schemes';
    }

    public function create(ColorSchemeModel $colorScheme): int
    {
        $this->db->insert($this->table, [
            'name' => $colorScheme->name,
            'colors' => json_encode($colorScheme->colors),
            'is_active' => $colorScheme->isActive ? 1 : 0
        ]);

        return $this->db->insert_id;
    }

    public function getAll(): array
    {
        $results = $this->db->get_results("SELECT * FROM {$this->table}", ARRAY_A);
        return array_map(fn($row) => new ColorSchemeModel($row['id'],$row['name'], json_decode($row['colors'], true), (bool) $row['is_active']), $results);
    }

    public function findById(int $id): ?ColorSchemeModel
    {

    }

    public function save(ColorSchemeModel $colorScheme): int
    {
        $this->db->insert($this->table, [
            'name' => $colorScheme->name,
            'colors' => json_encode($colorScheme->colors),
            'is_active' => $colorScheme->isActive ? 1 : 0
        ]);

        return $this->db->insert_id;
    }

    public function delete(int $id): void
    {

    }

    public function setActive(int $id): void
    {
        $this->db->update($this->table, ['is_active' => 0], ['is_active' => 1]);
        $this->db->update($this->table, ['is_active' => 1], ['id' => $id]);
    }
}
