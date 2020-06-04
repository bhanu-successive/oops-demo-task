<?php

namespace App;

use App\Cleaning\CarpetFloorIFloorCleaningService;
use App\Cleaning\HardFloorIFloorCleaningService;

/**
 * Class FloorCleaning
 * @package App
 */
class FloorCleaning
{

    protected $area;
    protected $floor;
    protected $cleaningInstance;
    /**
     * It takes 30 secs to fully charge the robot
     * @var int
     */
    protected $fullChargeTime = 30;

    /** In one charge robot can clean for 60 secs
     * @var int
     */
    protected $workTimeInOneCharge = 60;

    public function __construct(String $floor = null, Int $area = null)
    {
        $this->area = $area;
        $this->floor = $floor;
    }

    public function setCleaningInstance()
    {
        if ($this->area === 0) {
            throw new \ErrorException('Invalid Area');
        }

        if ($this->floor && !in_array(strtolower($this->floor), ['hard', 'carpet'])) {
            throw new \ErrorException('Invalid Floor');
        }

        echo " \n ...... Initialise Cleaning service ..... ";
        if (strtolower($this->floor) === 'hard') {
            $this->cleaningInstance = new HardFloorIFloorCleaningService($this->area);
        }

        if (strtolower($this->floor) === 'carpet') {
            $this->cleaningInstance = new CarpetFloorIFloorCleaningService($this->area);
        }
    }

    public function startCleaning()
    {
        return $this->cleaningInstance->cleanFloor();
    }

}