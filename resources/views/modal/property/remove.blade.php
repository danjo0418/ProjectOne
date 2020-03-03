<div class="modal fade show" id="removeAgent" tabindex="-1" role="dialog" aria-labelledby="removeAgentLabel" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-sm justify-content-center">
      <div class="modal-content col-md-7">
         <div class="modal-body">
            <p class="card-title mb-0"><strong>REMOVE AGENT ON PROPERTY</strong></p>
            <hr>
            <p class="card-text">Do you want to remove <strong class="2r-agent"> </strong> as agent on <strong class="2r-property"> </strong> property?</p>
            <form method="POST" action="{{ URL::to('postRemoveAgent') }}">  
               @csrf         
               <div class="form-group">
                  <input type="hidden" class="js-proid" name="property_agentid">
                  <input type="hidden" class="js-proname" name="property_name">
                  <input type="hidden" class="js-proagent" name="agent_name">
               </div>
               <button class="btn btn-keyland btn-sm"><i class="fa fa-check"></i> Remove</button>
               <button class="btn btn-outline-keyland btn-sm" data-dismiss="modal">Close</button>
            </form>
         </div>
      </div>
   </div>
</div>