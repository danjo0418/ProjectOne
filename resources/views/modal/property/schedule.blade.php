<div class="modal fade" id="schedulesiteview" tabindex="-1" role="dialog" aria-labelledby="schedulesiteviewLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-sm justify-content-center">
      <div class="modal-content col-md-8">
         <div class="modal-body">
            <p class="card-title text-center m-0"><strong>Schedule a Free Site Viewing Now!</strong></p>
            <p class="card-text text-center">Fill up the form below to schedule a site viewing.</p>
            <hr>
            <form method="POST" action="{{ URL::to('postSchedule') }}">
             @csrf
               <input type="hidden" value="{{ $detail->created_by }}" name="to">
               <input type="hidden" value="{{ $detail->name }}" name="property_name">
               <input type="hidden" value="{{ $detail->code }}" name="property_code">
               <div class="row">
                  <div class="col-md-6 col-sm-12">
                     <div class="form-group mb-1">
                        <label for="fname" class="fontmed">Firstname</label>
                        <input type="text" class="form-control pt-1" id="fname" placeholder="Firstname" name="fname" required/>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                     <div class="form-group mb-1">
                        <label for="lname" class="fontmed">Lastname</label>
                        <input type="text" class="form-control pt-1" id="lname" placeholder="Lastname" name="lname" required/>
                     </div>
                  </div>
               </div>

               <div class="form-group mb-1">
                  <label for="email" class="fontmed">Email</label>
                  <input type="email" class="form-control pt-1" id="email" placeholder="Email" name="email" required/>
               </div>

               <div class="form-group mb-1">
                  <label for="phone" class="fontmed">Phone Number</label>
                  <input type="number" class="form-control pt-1" id="phone" placeholder="Phone Number" name="phone" required/>
               </div>
               <div class="row">
                  <div class="col-md-6 col-sm-12">
                     <label for="pickdate" class="fontmed">Pick Date</label>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend date form_datetime">
                           <span class="input-group-text add-on">
                              <i class="fa fa-calendar" aria-hidden="true"></i>
                           </span>
                           <input size="16" type="text" id="pickdate" placeholder="Pick Date" class="form-control" readonly name="pickdate" required/>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                     <label for="picktime" class="fontmed">Pick Time</label>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <span class="input-group-text add-on">
                              <i class="fa fa-clock-o" aria-hidden="true"></i>
                           </span>
                        </div>
                        <select class="form-control" id="picktime" name="picktime" required>
                           <option selected disabled>Pick Time</option>
                           <option value="8:00 AM">8:00 AM</option>
                           <option value="8:30 AM">8:30 AM</option>
                           <option value="9:00 AM">9:00 AM</option>
                           <option value="9:30 AM">9:30 AM</option>
                           <option value="10:00 AM">10:00 AM</option>
                           <option value="10:30 AM">10:30 AM</option>
                           <option value="11:00 AM">11:00 AM</option>
                           <option value="11:30 AM">11:30 AM</option>
                           <option value="12:00 PM">12:00 PM</option>
                           <option value="12:30 PM">12:30 PM</option>
                           <option value="1:00 PM">1:00 PM</option>
                           <option value="1:30 PM">1:30 PM</option>
                           <option value="2:00 PM">2:00 PM</option>
                           <option value="2:30 PM">2:30 PM</option>
                           <option value="3:00 PM">3:00 PM</option>
                           <option value="3:30 PM">3:30 PM</option>
                           <option value="4:00 PM">4:00 PM</option>
                           <option value="4:30 PM">4:30 PM</option>
                           <option value="5:00 PM">5:00 PM</option>
                           <option value="5:30 PM">5:30 PM</option>
                           <option value="6:00 PM">6:00 PM</option>
                        </select>
                     </div>
                  </div>
               </div>
               <button class="btn btn-keyland btn-sm"><i class="fa fa-check"></i>Submit</button>
               <button class="btn btn-outline-keyland btn-sm" data-dismiss="modal">Close</button>

            </form>
         </div>
      </div>
   </div>
</div>


