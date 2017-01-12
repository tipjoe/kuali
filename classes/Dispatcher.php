<?php


/**
 * This is the heart of the elevator app, efficiently coordinating requests with the
 * elevators for fastest response to passengers.
 */
class Dispatcher
{
    private $elevators; // Collection of elevator objects.
    private $elevatorCount;
    private $floorCount;
    private $openRequests; // Collection of open requests sent to dispatcher.

    public function __construct($numElevators, $numFloors)
    {
        // Req#1
        $this->elevatorCount = $numElevators;
        $this->floorCount = $numFloors;

    }

    // This is the logic to choose the best elevator to dispatch based on
    // proximity and current state.
    public function chooseElevator(Request $request)
    {
        // First pass will narrow number of elevators.
        foreach($this->elevators as $k => $elev) {

        }

        // Second pass will pick best (or randomly choose between equal alternatives)

        // After elevator is chosen, dispatch the request using the correct key.
        $this->elevators["key"]->dispatch($request);

    }

    // Receive reports from elevators.  Use them to:
    // * change state of dispatcher
    // * fire events (i.e. communicating status, such as elevator moving between floors)
    // * etc.
    public function report($info)
    {

    }


}