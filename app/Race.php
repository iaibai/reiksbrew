<?php
namespace App;

use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class Race
{
    /** @var string $id */
    public $id;

    /** @var string $name */
    public $name;

    /** @var string $defaultPositionId */
    public $defaultPositionId;

    /** @var Position[] */
    public $positions;

    /**
     * Race constructor.
     * @param string $id
     * @param string $name
     * @param string $defaultPositionId
     * @param Position[] $positions
     */
    public function __construct($id, $name, $defaultPositionId, $positions)
    {
        $this->id = $id;
        $this->name = $name;
        $this->defaultPositionId = $defaultPositionId;
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
            new Race('orks', 'Orks', 'ork_lineman', $positions['orks']),
            new Race('humans', 'Humans', 'human_lineman', $positions['humans']),
        ];
    }

    /**
     * @param $raceId
     * @return Race
     * @throws ResourceNotFoundException
     */
    public static function findOrFail($raceId)
    {
        $all = self::all();
        foreach ($all as $race) {
            if ($race->id == $raceId) {
                return $race;
            }
        }

        throw new ResourceNotFoundException();
    }
}
