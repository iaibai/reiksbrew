<?php
namespace App;

class Position
{
    /** @var string id */
    public $id;

    /** @var string name */
    public $name;

    /** @var int $movement */
    public $movement;

    /** @var int $agility */
    public $agility;

    /** @var int strength */
    public $strength;

    /** @var int $armour */
    public $armour;

    /** @var string[] $skillIds */
    public $skillIds;

    /**
     * Position constructor.
     * @param string $id
     * @param string $name
     * @param int $movement
     * @param int $agility
     * @param int $strength
     * @param int $armour
     * @param string[] $skillIds
     */
    public function __construct(string $id, string $name, int $movement, int $agility, int $strength, int $armour, array $skillIds = array())
    {
        $this->id = $id;
        $this->name = $name;
        $this->movement = $movement;
        $this->agility = $agility;
        $this->strength = $strength;
        $this->armour = $armour;
        $this->skillIds = $skillIds;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getMovement()
    {
        return $this->movement;
    }

    /**
     * @return int
     */
    public function getAgility()
    {
        return $this->agility;
    }

    /**
     * @return int
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @return int
     */
    public function getArmour()
    {
        return $this->armour;
    }

    /**
     * @return string[]
     */
    public function getSkillIds()
    {
        return $this->skillIds;
    }

    /**
     * return Position[]
     */
    public static function getByRaceId($raceId)
    {
        $all = self::allGroupedByRaceId();
        return !empty($all[$raceId]) ? $all[$raceId] : array();
    }

    /**
     * Returns an array of positions grouped by raceId.
     * So [$raceId][] = Position
     * @return array
     */
    public static function allGroupedByRaceId()
    {
        return [
            'orks' => [
                new Position('ork_lineman', 'Lineman', 4, 3, 3, 8),
                new Position('ork_blitzer', 'Blitzer', 4, 3, 3, 8),
                new Position('ork_thrower', 'Thrower', 4, 3, 3, 8),
                new Position('ork_blackorc', 'Black Orc Blocker', 4, 3, 3, 8)
            ],

            'humans' => [
                new Position('human_lineman', 'Lineman', 4, 3, 3, 8),
                new Position('human_thrower', 'Lineman', 4, 3, 3, 8),
                new Position('human_catcher', 'Lineman', 4, 3, 3, 8)
            ]
        ];
    }
}
