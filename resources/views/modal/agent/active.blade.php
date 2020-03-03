<div class="modal fade" id="activeAgent" tabindex="-1" role="dialog" aria-labelledby="activeAgentLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-sm justify-content-center">
      <div class="modal-content col-md-6">
         <div class="modal-body">
            <p class="card-title"><strong>ACTIVATE AGENT</strong></p>
            <p class="card-text">Are you sure you want to mark <strong class="js-activename"></strong> as <span class="text-success">Active</span> agent?</p>
            <form method="POST" action="{{ URL::to('active-agent') }}">
               @csrf
               <div class="form-group">
                  <input type="hidden" class="form-control js-agentid" name="agent_id"/>
                  <input type="hidden" class="form-control js-ac-name" name="agent_name">
               </div>
               <button class="btn btn-keyland btn-sm"><i class="fa fa-check"></i> Activate</button>
               <button class="btn btn-outline-keyland btn-sm" data-dismiss="modal">Close</button>
            </form>
         </div>
      </div>
   </div>
</div>


