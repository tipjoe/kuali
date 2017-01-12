<?php

/**
 * Class Elevator
 */
class Elevator
{

    private $id;
    private $targetFloor;
    private $floor;
    private $door;
    private $isWorking;
    private $isOccupied;
    private $isMoving;
    private $dispatcher;
    private $currentRequest;
    // Req#8 - count trips and floors.  See move() below for additional
    // on this requirement.
    private $tripCount;
    private $floorCount;

    // Initialize each elevator (done by dispatcher).
    public function __construct($dispatcher)
    {
        $this->dispatcher = $dispatcher;

        // Load trip and floor count from database.
        $this->tripCount = "trip count from database";
        $this->floorCount = "floor count from database";

    }

    public function dispatch(Request $request) {
        // Load current request
        $this->currentRequest = $request;

        // Parse request to determine whether to open/close door
        // or move to a target floor for pickup.  Subsequent
        // passenger request (floor button inside elevator) will
        // handle movement to that floor.

        // Change elevator's state so Dispatcher can account for it in future
        // selections.
    }

    // Open/close door could be one function with an argument, but I chose
    // separate methods to be explicit.
    // Should also handle opening/closing states since elevators
    // often don't finish the door operation (e.g. someone stops door).
    public function closeDoor() {
        $this->door = 'closed';

        // Req#3
        $this->dispatcher->report("report door action");

    }

    public function openDoor() {
        $this->door = 'open';

        // Req#3
        $this->dispatcher->report("report door action");
    }


    // Note on Req#7 - we don't explicitly limit which floors
    // can be chosen so no extra code is needed to allow it.
    public function move($targetFloor) {
        $this->targetFloor = $targetFloor;
        $this->tripCount++;
        $this->isMoving = true;
        $this->isOccupied = "ternary operation to decide t/f based on request type";

        // Decide if it's time for maintenance. Each time we hit 100 trips,
        // Set isWorking to false so it won't be able to receive another request.
        if ($this->tripCount % 100 == 0) {
            $this->isWorking = false;
        }

        // Req#4 and #5
        // Ensure passenger can't go higher or lower than available floors.
        if (($this->currentRequest->action == 'up' && $this->floor = $this->dispatcher->floorCount)
           || ($this->currentRequest->action == 'down' && $this->floor == 1)) {
            // Could make the program more flexible by specifying more floor attributes
            // in the Dispatcher rather than the hard coded 1 above. Private floor rules,
            // etc.

        }

        // Logic to detect movement to each new floor and increment
        // floorCount and report movement to dispatcher.
        // Req#2
        $this->dispatcher->report("report when elevator touches each floor.");

        // Report
        $this->dispatcher->report("report when elevator touches each floor.");

    }

    // Report to Dispatcher for movement, floor status, maintenance status, etc.
    public function report($info) {
        // Parse info to send correct report.
        // This may change the state in the Dispatcher along with firing event so it
        // can react immediately.
        $this->dispatcher->reportEvent($info);
    }









}