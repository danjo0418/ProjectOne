<div class="modal fade" id="agentAssign" tabindex="-1" role="dialog" aria-labelledby="agentAssignLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-sm justify-content-center">
      <div class="modal-content">
         <div class="modal-body">
            <div class="text-center mb-4">
               <p class="card-title mb-0"><strong>ASSIGN AGENT TO PROPERTY</strong></p>
               <hr>
               <p class="card-text">Do you want to assign agent on <strong class="js-pname"></strong> property? Please select agent below.</p>
            </div>
            <form method="POST" action="{{ URL::to('postAssignAgent') }}">
               @csrf
               <input type="hidden" value="{{ $detail->id }}"  name="property_id">
               <input type="hidden" class="js-valpname" name="property_name">
               <div class="col-md-12">
                  <div class="ml-1 js-assigntoall">
                     <input type="checkbox" id="selectall">
                     <label for="selectall">Select all agents.</label>
                  </div>
                  <div class="row js-listing-agents">
                     
                  </div>
               </div>
               <div class="col-md-12 mt-4">
                  <button class="btn btn-keyland btn-sm"><i class="fa fa-check"></i> Assign</button>
                  <button class="btn btn-outline-keyland btn-sm" data-dismiss="modal">Close</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>


