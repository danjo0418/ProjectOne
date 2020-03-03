<div class="modal fade" id="declineAgent" tabindex="-1" role="dialog" aria-labelledby="declineAgentLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-sm justify-content-center">
      <div class="modal-content col-md-8">
         <div class="modal-body">
            <p class="card-title text-center m-0"><strong>DECLINE AGENT</strong></p>
            <hr>
            <p class="card-text">Some information of <span class="text-primary dec-name"></span> are not reliable. If you want to decline his/her application. Please notify to this email <span class="text-primary dec-email"></span>.</p>
            <form method="POST" action="{{ URL::to('decline-agent') }}">
               @csrf
               <input type="hidden" class="decline-id" name="agent_id">
               <input type="hidden" class="decline-name" name="agent_name">
               <button class="btn btn-keyland btn-sm"><i class="fa fa-check"></i> Decline</button>
               <button class="btn btn-outline-keyland btn-sm" data-dismiss="modal">Close</button>
            </form>
         </div>
      </div>
   </div>
</div>


