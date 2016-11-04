<?php
namespace App;

class Race
{
    /** @var string $id */
    public $id;

    /** @var string $name */
    public $name;

    /** @var Position[] */
    protected $positions;

    /**
     * Race constructor.
     * @param string $id
     * @param string $name
     * @param Position[] $positions
     */
    public function __construct($id, $name, $positions)
    {
        $this->id = $id;
        $this->name = $name;
        $this->positions = $positions;
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
     * @return Position[]
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * @return Race[]
     */
    public static function all()
    {
        $positions = Position::allGroupedByRaceId();

        return [
            new Race('orks', 'Orks', $positions['orks']),
            new Race('humans', 'Humans', $positions['humans']),
        ];
    }
}
