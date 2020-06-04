<?php

namespace App\Cleaning;

use App\Robot\CleaningRobot;
use App\Cleaning\Contracts\IFloorCleaning;

/**
 * Class CarpetFloorIFloorCleaningService
 * @package App\Cleaning
 */
class CarpetFloorCleaningService implements IFloorCleaning
{
    /**
     * Takes 1 sec to cleaning 1 meter square
     * @var int
     */
    protected $cleaningTimePerMeterSquare = 2;

    /**
     * Area to be cleaned
     * @var
     */
    protected $area;

    /**
     * Robot instance
     * @var CleaningRobot
     */
    protected $robotInstance;

    /**
     * CarpetFloorIFloorCleaningService constructor.
     * @param Int $area
     */
    public function __construct(Int $area)
    {
        $this->area = $area;
        $this->robotInstance = new CleaningRobot();
    }

    /**
     * @return string
     */
    public function cleanFloor()
    {
        echo " \n Total area to be cleaned: ".$this->area." mSq";
        echo " \n Time taken per square meter: ".$this->cleaningTimePerMeterSquare." secs";
        $area = $this->area;

        while( $area) {
            $area = $area - ($this->robotInstance->getWorkTimeInOneCharge() / $this->cleaningTimePerMeterSquare);

            if($area < 0) {
                $area = 0;
            }
            echo " \n Area remaining to be cleaned: ".$area. " mSq";

            if ($area / ($this->robotInstance->getWorkTimeInOneCharge() / $this->cleaningTimePerMeterSquare)) {
                echo " \n Robot exhausted. Charging ... It will take ".$this->robotInstance->getFullChargeTime()." secs";
            }
        }

        echo " \n All cleaning done!!!";
        return "Cleaning done";
    }

}