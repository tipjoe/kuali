#Elevator Design Exercise

**Author: Joe Tippetts**

This is in response to Kuali's request to design an elevator system. 

##Initial Thinking

A building has one or more Elevators that need to operate in unison.  Each
elevator has controls for its own actions, triggered by passengers pushing
 buttons.  In addition a central Dispatcher needs to coordinate system level
 requests by passengers who haven't yet boarded an elevator.

**Note:**
The numbers indicated in the code (e.g. Req#1) correspond to your requirements doc.

##Design
Elements of the system. 

###Classes

####Elevator
An elevator.

#####Attributes
* floor - tells which floor the elevator is currently on [1..n]. If moving, this
    is the destination it's moving toward.
* door - state of the elevator door [open | opening | closed | closing]. 
* isWorking - is the elevator working [true] or in maintenance mode [false]?
* isOccupied - does the elevator have passengers? You know this if a request hasn't
    been completed.
* isMoving - is the elevator moving?
* dispatcher - reference to containing dispatcher to which elevator reports.
* tripCount - total count of trips (handled requests) made by elevator.
* floorCount - total count of floors passed.

#####Methods
* dispatch(request) - request from dispatcher.
* close() - close the elevator door if it's open.
* open() - opens the elevator door if it's stopped and not in 
    maintenance.
* move(floor) - based on request sent to dispatcher, tells the elevator to move 
    to the specified floor. Reports to dispatcher at each floor. If trip count is 
    divisible by 100 when a request is re
* report() - how elevators tell dispatcher about their current state.  Saved in  


####Dispatcher
Coordinates movements between working elevators to choose the fastest
option for passengers.  Singleton to ensure all reports from elevators and
requests from passengers are handled in order.

#####Attributes
* elevators[] - Composed collection of elevator objects.
* elevatorCount - number of elevators in the building.
* floorCount - number of floors in building. 
* openRequests[] - array of elevator requests in the order they're made should
    be processed first-in, first-out (FIFO). 

#####Methods
* constructor(numElevators, numFloors) - initialize dispatcher with number of 
    elevators and floors in the building.
* chooseElevator(request) - choose best elevator based on request. Returns
    elevator.

####Request
Requests made from passengers to the Dispatcher. These happen in each floor's 
lobby [up | down] and inside each elevator [floor number | close | open].

#####Attributes
* created - timestamp request was made.
* started - timestamp when elevator was dispatched to fulfill request.
* completed - timestamp when request was finished.
* floor - the floor the request is made from.
* action - the action associated with the request [up | down | floor | open | close].


